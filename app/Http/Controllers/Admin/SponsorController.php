<?php
namespace App\Http\Controllers\Admin;

use Cache;
use App\Guest;
use App\Sponsor;
use App\User;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorController extends Controller {

    public function addSponsor(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url'  => 'required|string|url',
            'logo' => 'required|image',
        ]);
        
        $sponsor = new Sponsor;
        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        
        $sponsor->image = Helper::upload($request->file('logo'), $request->name);
        $sponsor->save();

        Cache::flush('sponsors');
        
        return redirect('dashboard');
    }
    
    public function removeSponsor(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        
        $sponsor = Sponsor::findOrFail($request->id);
        $sponsor->delete();
        
        Cache::flush('sponsors');
    }
    
    public function editSponsor(Request $request) {
        $this->validate($request, [
            'id'   => 'required|integer',
            'name' => 'required|string|max:32',
            'url'  => 'required|string|url',
            'logo' => 'image',
        ]);
        
        $sponsor = Sponsor::findOrFail($request->id);
        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        
        if(!is_null($request->file('logo'))) {
            $sponsor->image = Helper::upload($request->file('logo'), $request->name); 
        }
        
        $sponsor->save();

        Cache::flush('sponsors');
        
        return redirect('dashboard');        
    } 
    
    public function toggleSponsors() {
        if (Helper::settings('sponsors')) {
            Helper::updateSettings('sponsors','0');
        } else {
            Helper::updateSettings('sponsors','1');
        }        
        return redirect('dashboard');
    }
}