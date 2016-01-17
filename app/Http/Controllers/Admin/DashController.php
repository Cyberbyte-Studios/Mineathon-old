<?php
namespace App\Http\Controllers\Admin;

use Cache;
use App\Guest;
use App\Sponsor;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashController extends Controller {
    
    public function dashboard() {
        $guests = Cache::rememberForever('guests', function() {
            return Guest::get();
        });
        $sponsors = Cache::rememberForever('sponsors', function() {
            return Sponsor::get();
        });      
        
        return view('admin.dash', ['guests' => $guests, 'sponsors' => $sponsors]);
    }
    
    public function toggleGuests() {
        if (Helper::settings('guests')) {
            Helper::updateSettings('guests','0');
        } else {
            Helper::updateSettings('guests','1');
        }
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
    
    public function updateGuest(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url' => 'required|string',
            'image' => 'required|image',
        ]);
    }
    
    public function updateSponsor(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url' => 'required|string',
            'image' => 'required|image',
        ]);        
    }
    
    public function addGuest(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url' => 'required|string',
            'image' => 'required|image',
        ]);
        
        $guest = new Guest;
        $guest->name = $request->name;
        $guest->url = $request->url;
        $guest->image = Helper::upload($request->file('logo'), $request->name);

        $guest->save();

        Cache::flush('guests');

        $guests = Cache::rememberForever('guests', function() {
            return Guest::get();
        });
        $sponsors = Cache::rememberForever('sponsors', function() {
            return Sponsor::get();
        });      
        
        return view('admin.dash', ['guests' => $guests, 'sponsors' => $sponsors]);     
    }
    
    public function addSponsor(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'url' => 'required|string',
            'image' => 'required|image',
        ]);
        
        $sponsor = new Sponsor;
        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        $sponsor->image = Helper::upload($request->file('logo'), $request->name);

        $sponsor->save();

        Cache::flush('sponsors');

        $guests = Cache::rememberForever('guests', function() {
            return Guest::get();
        });
        $sponsors = Cache::rememberForever('sponsors', function() {
            return Sponsor::get();
        });      
        
        return view('admin.dash', ['guests' => $guests, 'sponsors' => $sponsors]);           
    }
}