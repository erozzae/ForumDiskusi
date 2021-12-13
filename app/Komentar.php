<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    public function User(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function Forum(){
        return $this->belongsTo('App\Forum','forum_id','id');
    }
}
