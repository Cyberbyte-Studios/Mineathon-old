<?php
namespace App\Http\Controllers\Admin;

use Cache;
use DB;
use App\Guest;
use App\Sponsor;
use App\User;
use Helper;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashController extends Controller {
    
    public function dashboard() {
        if (Auth::user()->level < 2) {
            return view('admin.noPermission');
        }
        $guests = Cache::rememberForever('guests', function() {
            return Guest::get();
        });
        $sponsors = Cache::rememberForever('sponsors', function() {
            return Sponsor::get();
        });
        
        return view('admin.dash', ['guests' => $guests, 'sponsors' => $sponsors]);
    }
    
    public function users() {
        $users = User::where("level", "<", "3")->get();
        return view('admin.approveUsers', ['users' => $users]);
    }
     
    public function removeUser(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        
        $user = User::findOrFail($request->id);
        $user->level = 1;
        $user->save();
        
        //todo: no return???? look into
    }  
     
    public function approveUser(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        
        $user = User::findOrFail($request->id);
        $user->level = 2;
        $user->save();
    }  
    
    public function video() {
        $videos = Cache::rememberForever('videos', function() {
            return Video::all();
        });

        return view('admin.video', ['videos' => $videos]);
    }
    
    public function charity() {
        $videos = Cache::rememberForever('videos', function() {
            return Video::all();
        });

        return view('admin.video', ['videos' => $videos]);
    }
    
    public function toggleVote() {
        if (Helper::settings('votes')) {
            Helper::updateSettings('votes','0');
        } else {
            Helper::updateSettings('votes','1');
        }        
        return redirect('dashboard');
    }
     
    public function toggleDonate() {
        if (Helper::settings('donate')) {
            Helper::updateSettings('donate','0');
        } else {
            Helper::updateSettings('donate','1');
        }        
        return redirect('dashboard');
    }
}