<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    //
    protected $table='students';
    protected $fillable = [
'name',
'course',
'section',
'email'
    ];


}
