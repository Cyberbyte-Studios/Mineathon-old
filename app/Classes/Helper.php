<?php
namespace App\Classes;

use DB;
use Auth;
use Cache;
use App\Setting;
use App\Guest;
use App\Sponsor;

class Helper {

    public function debug() {
        if (Auth::check()) {
		    if (Auth::user()->level >= 3) {
		        $load = sys_getloadavg();
		        echo ' Page Time: '. microtime(true) - LARAVEL_START;
		        echo ' Load: ' . $load[0].' '.$load[1].' '.$load[2];
		        echo ' Server: '. $_SERVER['SERVER_ADDR'];
    		}
		}
    }
    
    public function upload($logo, $name) {
        if ($logo->isValid()) {
            $filename = slug($name).'-'.str_random(5).'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path().'/public/uploads/images/', $filename);
            $img = Image::make(public_path().'/public/uploads/images/'.$filename);
            $img->fit(200, 200)->save(public_path().'/public/uploads/images/200/'.$filename);
            return $filename;
        }
    }
    
    public function sponsors() {
        return Cache::rememberForever('sponsors', function() {
            return Sponsor::all();
        });
    }
    
    public function guests() {
        return Cache::rememberForever('guests', function() {
            return Guest::all();
        });
    }
    
    public function settings($setting) {
        $settings = Cache::rememberForever('settings', function() {
            $allSettings = Setting::all();
            
            for ($i = 0; $i <= (count($allSettings) - 1); $i++) 
            $settings[$allSettings[$i]->key] = $allSettings[$i]->value;
            return $settings;
        });
        
        return $settings[$setting];
    }
    
}