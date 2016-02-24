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
        Cache::flush('charities_pending');
        
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
        if (Auth::user()->level >= 4) {
            $charities = Charity::withTrashed()->where('published', '0')->get();
        } else {
            $charities = Charity::where('published', '0')->get();
        }
        return view('admin.pendingCharities', ['charities' => $charities]);        
    }
    
    public function approve(Request $request) {
        $this->validate($request, ['id' => 'required|integer']);
        $charity = Charity::findOrFail($request->id);
        $charity->published = 2;
        $charity->save();
        
        Cache::flush('charities');
        Cache::flush('charities_pending');
    }
    
    public function deny(Request $request) {
        $this->validate($request, ['id' => 'required|integer']);
        $charity = Charity::findOrFail($request->id);
        $charity->published = 1;
        $charity->save();
        
        Cache::flush('charities');
        Cache::flush('charities_pending');
    }    

}