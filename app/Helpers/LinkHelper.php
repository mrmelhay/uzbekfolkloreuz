<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class LinkHelper
{
    public static function route($name, $params = [])
    {
        $locale = App::getLocale();
        $currentRouteName = Route::currentRouteName();
        $isLocalized = Str::endsWith($currentRouteName, '.localized');

        // Determine if we should use the localized route
        // Use localized if:
        // 1. Current locale is NOT 'uz' (default)
        // 2. OR we are currently on a localized route (e.g. /uz/...)
        $useLocalized = $locale !== 'uz' || $isLocalized;

        if ($useLocalized) {
            $params['locale'] = $locale;
            return route($name . '.localized', $params);
        }

        return route($name, $params);
    }
}
