<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use \App\Traits\HasTranslations;

    protected $fillable = [
        'title_uz',
        'title_en',
        'subtitle_uz',
        'subtitle_en',
        'description_uz',
        'description_en',
        'image',
        'image_mobile',
        'button_text_uz',
        'button_text_en',
        'button_url',
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

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
