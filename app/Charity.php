<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charity extends Model {
    use SoftDeletes;
    
    protected $table = 'charities';
    
    public function videos() {
        return $this->hasMany('App\Video');
    }
}
