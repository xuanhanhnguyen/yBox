<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table     = 'comment_reply';
    protected $fillable  = ['user_id','comment_id','content'];
    public $timestamps = true;
     
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
