<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowHr extends Model
{
    protected $table = 'follow_hr';
    protected $fillable = ['hr_id','user_id'];
    public $timestamps = true;
}
