<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePost extends Model
{
    protected $table = 'type_post';
    protected $fillable = 'name';
    public $timestamps = true;

    public function post(){
        return $this->hasMany('App\Post','type_id','id');
    }
    
}
