<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentPost extends Model
{
    protected $table     = 'coment_post';
    protected $fillable  = ['user_id','post_id','content'];
    public $timestamps = true;
 
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    
    public function reply(){
        return $this->hasMany('App\Reply','comment_id','id');
    }
}
