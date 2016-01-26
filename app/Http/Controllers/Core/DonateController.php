<?php
namespace App\Http\Controllers\Core;

use Cache;
use DB;
use App\Charity;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonateController extends Controller {
    
    public function donate() {
        $charity = Charity::orderBy('votes','DESC')->first();
        
        return view('core.donate', ['charity' => $charity]);
    }
}