<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table      = 'role';
    protected $fillable   = ['name'];
    public    $timestamps = true;

    public function user(){
        return $this->hasMany('App\User','role_id','id');
    }
}
