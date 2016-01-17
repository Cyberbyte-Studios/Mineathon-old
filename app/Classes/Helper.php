<?php
namespace App\Classes;

use DB;
use Auth;
use Cache;

class Helper {
    protected $cacheTime = 7500;
    
    public function debug() {
        if (Auth::check()) {
		    if (Auth::user()->level >= 3) {
		        $load = sys_getloadavg();
		        echo 'Page Time: '.microtime(true) - LARAVEL_START;
		        echo ' Load: '.$load[0].' '.$load[1].' '.$load[2];
		        echo ' Server: '.$_SERVER['SERVER_ADDR'];
    		}
		}
    }
    
    // public function settings($setting, $default = null) {
    //     $settings = Cache::remember('settings_' . Helper::currentCommunity(), $this->cacheTime,
    //     function() {
    //         return Community::find(Helper::currentCommunity());
    //     });

    //     //$settings = $globalSettings + $settings;
    //     if (isset($settings[$setting])) {
    //         return $settings[$setting];
    //     } else {
    //         return $default;
    //     }
    // }
    
}