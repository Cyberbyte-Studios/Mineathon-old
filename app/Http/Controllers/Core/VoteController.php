<?php
namespace App\Http\Controllers\Core;

use Cache;
use App\Video;
use App\Charity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class VoteController extends Controller {
    
    public function votes(Request $request) {
        $charities = Cache::rememberForever('charities', function() {
            return Charity::where('published', 2)->with(['videos' => function($query) {
                $query->where('published', 2);
            }])->orderBy('votes', 'desc')->get();
        });
        
        $voted = false;
        
        if ($request->session()->has('lastVoted')) {
            if ($request->session()->get('lastVoted') + 43200 > time()) {
                $voted = true;
            }
        }
        if ($request->cookie('lastVoted') + 43200 > time()) {
            $voted = true;
        }
        
        return view('core.vote', ['charities' => $charities, 'voted' => $voted]);
    }
    
    public function vote(Request $request) {
        $response = new Response(['success' => true]);
        $this->validate($request, [
            'charity' => 'required',
        ]);
        
        if ($request->session()->has('lastVoted')) {
            if ($request->session()->get('lastVoted') + 43200 > time()) {
                return ['success' => false, 'message' => 'Already voted', 'timeLeft' => $request->session()->get('lastVoted') + 43200 - time()];
            }
        }
        
        $request->session()->put('lastVoted', time());
        $response->withCookie(cookie()->forever('lastVoted', time()));

        $video = Charity::where('id', $request->charity)->first();
        $video->increment('votes');
        $video->save();
        
        Cache::flush('charities');
        Cache::flush('charities_pending');
        
        return $response;
    }
}