<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function user(){

        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id','facebbok','youtube','about','avatar'];
}
