<?php
namespace App\Classes;

use DB;
use Auth;
use Cache;
use Image;
use App\Setting;
use App\Guest;
use App\Sponsor;

class Helper {

    public function getPendingCharities () {
        return DB::table('charities')->where('published', '0')->count();
    }
    
    public function getPendingVideos () {
        return DB::table('videos')->where('published', '0')->count();
    }

    public function debug() {
        if (Auth::check()) {
		    if (Auth::user()->level >= 3) {
		        $load = sys_getloadavg();
		        echo ' Version: v1.0.7';
		        echo ' Load: ' . $load[0].' '.$load[1].' '.$load[2];
		        echo ' Server: <a href="#" data-toggle="tooltip" title="'.$_SERVER['SERVER_ADDR'].'">'.$this->serverName($_SERVER['SERVER_ADDR']).'</a>';
		        if (app()->environment() != 'production') {
		            echo ' - DEV MODE';
		        }
    		}
		}
    }
    
    public function urlSafe($url) {
        $url = str_replace ('http://', '', $url);
        $url = str_replace ('https://', '', $url);
        $url = str_replace ('//', '', $url);
        return'http://'.$url;
    }
    
    public function serverName($ip) {
        switch ($ip) {
            case '10.131.119.172':
                return 'Server 1';
            case '10.131.136.35':
                return 'Server 2';
            default:
                return $ip;
        }
    }
    
    public function upload($logo, $name) {
        if ($logo->isValid()) {
            $filename = str_slug($name).'-'.str_random(5).'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path().'/uploads/images/', $filename);
            $img = Image::make(public_path().'/uploads/images/'.$filename);
            $img->fit(200, 200)->save(public_path().'/uploads/images/200/'.$filename);
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
    
    public function updateSettings($setting, $value) {
        $thisSetting = Setting::where('key', $setting)->first();
        Cache::flush('settings');
        $thisSetting->value = $value;
        $thisSetting->save();
    }
    
}