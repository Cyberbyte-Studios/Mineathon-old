<?php
namespace App\Http\Controllers\Core;

use Cache;
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
        
        $video = new Video;
        $video->charity_id = $request->charity;
        $video->youtube = $request->youtube;
        $video->user = $request->email;
        $video->save();
        
        dd($video);

        $video = Cache::rememberForever('video_'.$id, function() {
            return Video::with('charity')->findOrFail($id);
        });
        
        Cache::flush('videos');
        
        return view('core.video', ['video' => $video]);
    }
    
    public function video($id) {
        $video = Cache::rememberForever('video_'.$id, function() use ($id) {
            return Video::with('charity')->findOrFail($id); 
        });
        
        return view('core.video', ['video' => $video]);
    }
    
    public function addVideo() {
        $charities = Cache::rememberForever('charities', function() {
            return Charity::get();
        });
        
        return view('core.addVideo', ['charities' => $charities]);
    }
}