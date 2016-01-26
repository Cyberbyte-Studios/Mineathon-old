<?php
namespace App\Http\Controllers\Admin;

use Cache;
use App\Guest;
use App\Sponsor;
use App\User;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller {

    public function addGuest(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url'  => 'required|string|url',
            'logo' => 'required|image',
        ]);
        
        $guest = new Guest;
        $guest->name = $request->name;
        $guest->url = $request->url;
        
        $guest->image = Helper::upload($request->file('logo'), $request->name);
        $guest->save();

        Cache::flush('guests');
        
        return redirect('dashboard');
    }
    
    public function removeGuest(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        
        $guest = Guest::findOrFail($request->id);
        $guest->delete();
        
        Cache::flush('guests');
    }
    
    public function editGuest(Request $request) {
        $this->validate($request, [
            'id'   => 'required|integer',
            'name' => 'required|string|max:32',
            'url'  => 'required|string|url',
            'logo' => 'image',
        ]);
        
        $guest = Guest::findOrFail($request->id);
        $guest->name = $request->name;
        $guest->url = $request->url;
        
        if(!is_null($request->file('logo'))) {
            $guest->image = Helper::upload($request->file('logo'), $request->name); 
        }
        $guest->save();

        Cache::flush('guests');
        
        return redirect('dashboard');        
    }
    
    public function toggleGuests() {
        if (Helper::settings('guests')) {
            Helper::updateSettings('guests','0');
        } else {
            Helper::updateSettings('guests','1');
        }
        return redirect('dashboard');
    }
}