<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SharePost extends Model
{
    protected $table = 'share_post';
    protected $fillable = ['user_id', 'post_id', 'content'];
    public $timestamps = true;
}
