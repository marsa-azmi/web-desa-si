<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $guarded = [];
    protected $casts = ['tanggal_lahir' => 'date:Y-m-d'];
}