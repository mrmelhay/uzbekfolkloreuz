<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use \App\Traits\HasTranslations;

    protected $fillable = [
        'title_uz',
        'title_en',
        'content_uz',
        'content_en',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
