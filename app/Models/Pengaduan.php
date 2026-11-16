<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded = [];

    public const KATEGORI = ['Infrastruktur', 'Keamanan', 'Pelayanan', 'Lingkungan', 'Lainnya'];
}