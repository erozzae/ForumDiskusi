<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    
    public function User(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function Komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
