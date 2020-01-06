<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $table      = 'like_post';
    protected $fillable   = ['user_id','post_id'];
    public    $timestamps = true;
}
