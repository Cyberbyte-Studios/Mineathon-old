<?php
namespace App\Http\Controllers\Core;

use Cache;
use Helper;
use App\Video;
use App\Charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharityController extends Controller {
    
    public function newCharity(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        
        $charity = new Charity;
        $video->name = $request->name;
        $charity->description = $request->description;
        $charity->image = Helper::upload($request->file('logo'), $request->name);

        $charity->save();

        $charity = Cache::rememberForever('+charity_'.$id, function() {
            return Video::with('charity')->findOrFail($id);
        });
        
        Cache::flush('charities');
        
        return view('core.charity', ['charity' => $charity]);
    }
    
    public function video($id) {
        $video = Cache::rememberForever('video_'.$id, function() use ($id) {
            return Video::with('charity')->findOrFail($id); 
        });
        
        return view('core.video', ['video' => $video]);
    }
    
    public function addCharity() {
        $charities = Cache::rememberForever('charities', function() {
            return Charity::get();
        });
        
        return view('core.addcharity', ['charities' => $charities]);
    }

}