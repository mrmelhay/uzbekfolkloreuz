<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HasTranslations
{
    /**
     * Get the title attribute based on current locale.
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        $column = "title_{$locale}";
        
        // Fallback to 'uz' if the requested locale column is empty (or null)
        if (empty($this->attributes[$column])) {
             return $this->attributes['title_uz'] ?? '';
        }

        return $this->attributes[$column];
    }

    /**
     * Get the content attribute based on current locale.
     *
     * @return string
     */
    public function getContentAttribute()
    {
        $locale = App::getLocale();
        $column = "content_{$locale}";

        // Fallback to 'uz' if the requested locale column is empty
        if (empty($this->attributes[$column])) {
             return $this->attributes['content_uz'] ?? '';
        }

        return $this->attributes[$column];
    }

    /**
     * Get the subtitle attribute based on current locale.
     *
     * @return string
     */
    public function getSubtitleAttribute()
    {
        $locale = App::getLocale();
        $column = "subtitle_{$locale}";

        if (empty($this->attributes[$column])) {
             return $this->attributes['subtitle_uz'] ?? '';
        }

        return $this->attributes[$column];
    }

    /**
     * Get the description attribute based on current locale.
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        $locale = App::getLocale();
        $column = "description_{$locale}";

        if (empty($this->attributes[$column])) {
             return $this->attributes['description_uz'] ?? '';
        }

        return $this->attributes[$column];
    }

    /**
     * Get the button_text attribute based on current locale.
     *
     * @return string
     */
    public function getButtonTextAttribute()
    {
        $locale = App::getLocale();
        $column = "button_text_{$locale}";

        if (empty($this->attributes[$column])) {
             return $this->attributes['button_text_uz'] ?? '';
        }

        return $this->attributes[$column];
    }
}
