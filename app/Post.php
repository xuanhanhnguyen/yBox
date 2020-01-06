<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['type_id','title','content','end_date','image','total_coment','total_like','total_share','create_by','total_view','description'];
    public $timestamps = true;

    public function type_post(){
        return $this->belongsTo('App\TypePost','type_id');
    }
    
    public function user(){
        return $this->hasOne('App\User','id','create_by');
    }

    public function comment(){
        return $this->hasMany('App\ComentPost','post_id','id');
    }


}
