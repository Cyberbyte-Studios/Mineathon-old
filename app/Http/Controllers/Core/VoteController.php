<?php
namespace App\Http\Controllers\Core;

use Cache;
use App\Video;
use App\Charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller {
    
    public function votes() {
        $charities = Cache::rememberForever('charities', function() {
            return Charity::with(['videos' => function($query) {
                $query->where('published', 2);
            }])->get();
        });
        
        return view('core.vote', ['charities' => $charities]);
    }
    
    public function vote() {
        Video::increment('votes');
        return ['success' => true];
    }
}