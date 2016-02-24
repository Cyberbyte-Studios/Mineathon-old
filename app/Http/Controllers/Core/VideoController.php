<?php
namespace App\Http\Controllers\Core;

use DB;
use Auth;
use Cache;
use Session;
use App\Video;
use App\Charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller {
    
    public function newVideo(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:64',
            'charity' => 'required|integer|exists:charities,id',
            'youtube' => 'required|alpha_dash|max:32',
        ]);
        
        $id = DB::table('videos')->insertGetId([
            'charity_id' => $request->charity, 
            'youtube' => $request->youtube,
            'user' => $request->email,
            'published' => '0',            
        ]);
        
        $video = Cache::rememberForever('video_'.$id, function() use ($id) {
            return Video::with('charity')->findOrFail($id);
        });
        
        Cache::flush('videos');
        
        return redirect('video/'.$id);
    }

    public function video($id) {
        $video = Cache::rememberForever('video_'.$id, function() use ($id) {
            return Video::with('charity')->findOrFail($id); 
        });
        
        return view('core.video', ['video' => $video]);
    }

    public function pending() {
        if (Auth::user()->level >= 4) {
            $videos = Video::withTrashed()->where('published', '0')->with('charity')->get();
        } else {
            $videos = Video::where('published', '0')->with('charity')->get();
        }
        
        return view('admin.pendingVideo', ['videos' => $videos]);        
    }
    
    public function approve(Request $request) {
        Cache::flush('videos');
        $this->validate($request, ['id' => 'required|integer']);
        $video = Video::findOrFail($request->id);
        $video->published = 2;
        $video->save();
    }
    
    public function deny(Request $request) {
        Cache::flush('videos');
        $this->validate($request, ['id' => 'required|integer']);
        $video = Video::findOrFail($request->id);
        $video->published = 1;
        $video->save();               
    }
    
    public function addVideo() {
        $charities = Cache::rememberForever('charities_pending', function() {
            return Charity::where('published', 2)->orWhere('published', 0)->get();
        });
        
        return view('core.addVideo', ['charities' => $charities]);
    }
}