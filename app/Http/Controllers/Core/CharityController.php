<?php
namespace App\Http\Controllers\Core;

use Auth;
use Cache;
use Helper;
use DB;
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
        
        $id = DB::table('charities')->insertGetId([
            'name' => $request->charity, 
            'description' => $request->description,
            'url' => $request->url,
            'published' => '0',
        ]);

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
    
    public function pending() {
        $charities = Charity::where('published', '0')->get();

        return view('admin.pendingCharities', ['charities' => $charities]);        
    }
    
    public function approve(Request $request) {
        Cache::flush('charities');
        $this->validate($request, ['id' => 'required|integer']);
        $charity = Charity::findOrFail($request->id);
        $charity->published = 2;
        $charity->save();
    }
    
    public function deny(Request $request) {
        Cache::flush('charities');        
        $this->validate($request, ['id' => 'required|integer']);
        $charity = Charity::findOrFail($request->id);
        $charity->published = 1;
        $charity->save();               
    }    

}