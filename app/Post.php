<?php

namespace App;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Slugger;
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function getRouteKeyName() {
        return 'slug';
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
