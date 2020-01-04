<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    public $timestamps = true;

    public function type_post(){
        return $this->belongsTo('App\TypePost','type_id');
    }
}
