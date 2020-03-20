<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_History extends Model
{
    protected $guarded = array('id');
    protected $table='mynews.profile_histories';

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
}
