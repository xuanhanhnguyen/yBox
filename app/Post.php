<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['type_id','title','content','end_date','image','totle_coment','total_like','total_share','create_by'];
    public $timestamps = true;

    public function type_post(){
        return $this->belongsTo('App\TypePost','type_id');
    }
}
