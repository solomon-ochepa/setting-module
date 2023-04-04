<?php

use Modules\Setting\app\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('setting')) {
    function setting(String|array $name, $default = null)
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "settings." . Str::slug($name, '.');
        if (Cache::has($key) and !$changed) {
            return Cache::get($key);
        }

        $setting = Setting::where('name', $name)->Orwhere('config', $name)->value('value');

        if ($setting) {
            $value = $setting;
        } else {
            $value = $default;
        }

        Cache::put($key, $value, 60);
        return $value;
    }
}
