<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model {
    use SoftDeletes;
    
    public function charity() {
        return $this->belongsTo('App\Charity');
    }
    
    public function user() {
        return $this->hasOne('App\User');
    }
}
