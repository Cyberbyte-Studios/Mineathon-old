<?php
namespace App\Http\Controllers\Core;

use Cache;
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
        $charity->image = $this->upload($request->file('logo'), $request->name);

        $charity->save();

        $charity = Cache::rememberForever('charity_'.$id, function() {
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
    
    private function upload($logo, $name) {
        if ($logo->isValid()) {
            $filename = slug($name).'-'.str_random(5).'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path().'/public/uploads/images/', $filename);
            $img = Image::make(public_path().'/public/uploads/images/'.$filename);
            $img->fit(200, 200)->save(public_path().'/public/uploads/images/200/'.$filename);
            return $filename;
        }
    }
}