<?php
namespace App\Http\Controllers\Admin;

use Cache;
use App\Guest;
use App\Sponsor;
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
    
}