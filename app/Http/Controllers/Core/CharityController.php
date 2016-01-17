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
            'charity' => 'required|string',
            'description' => 'required|string',
            'url' => 'required|string',            
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
        
        $charity = new Charity;
        $charity->name = $request->charity;
        $charity->description = $request->description;
        $charity->url = $request->url;

        $charity->save();

        $charity = Cache::rememberForever('charity_'.$id, function() use($id){
            return Charity::findOrFail($id);
        });
        
        Cache::flush('charities');
        
        return view('core.charity', ['charity' => $charity]);
    }
    
    
    public function charity($id) {
        $charity = Cache::rememberForever('charity_'.$id, function() use($id) {
            return Charity::findOrFail($id);
        });
        
        return view('core.charity', ['charity' => $charity]);
    }    
    
    public function addCharity() {
        return view('core.addCharity');
    }

}