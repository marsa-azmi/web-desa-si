<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surat extends Model
{
    protected $guarded = [];
    public const JENIS = [
        'Tidak Mampu' => 'Surat Keterangan Tidak Mampu',
        'Usaha' => 'Surat Keterangan Usaha',
        'Domisili' => 'Surat Keterangan Domisili',
        'Pengantar' => 'Surat Pengantar',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getLabelJenisAttribute(): string {
        return self::JENIS[$this->jenis_surat] ?? $this->jenis_surat;
    }
}