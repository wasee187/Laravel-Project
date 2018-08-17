<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    public $fillable = [

        'site_name','contact_number','email','address'
    ];
}
