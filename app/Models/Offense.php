<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offense extends Model
{
    //
    protected $fillable = [
        'offense_type',
        'demerit',
    ];
}
