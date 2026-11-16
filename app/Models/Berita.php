<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $guarded = [];

    protected $casts = ['is_published' => 'boolean'];

    // URL berita memakai slug, bukan angka id
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getRingkasanAttribute(): string
    {
        return Str::limit(strip_tags($this->konten), 130);
    }
}