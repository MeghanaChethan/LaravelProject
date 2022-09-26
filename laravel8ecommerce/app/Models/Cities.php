<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //
    protected $primaryKey = 'city_key';

    protected $fillable = [
        'city', 'state_key', 'status'
    ];

}
