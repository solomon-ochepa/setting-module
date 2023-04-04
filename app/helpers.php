<?php

use Modules\Setting\app\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('setting')) {
    function setting(String $slug, $default = null, bool $string = true)
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "settings." . Str::slug($slug, '.');
        if (Cache::has($key) and !$changed) {
            return Cache::get($key);
        }

        $setting = Setting::where('name', $slug)->Orwhere('slug', $slug)->Orwhere('config', $slug)->value('value');
        if ($setting and $string) {
            // dd($setting);
            if (is_array($setting) and count($setting) > 1) {
                $value = implode(',', $setting);
            } else if (is_array($setting)) {
                $value = $setting[0];
            } else {
                $value = $setting;
            }
        } else if ($setting) {
            $value = $setting;
        } else {
            $value = $default;
        }

        Cache::put($key, $value, 60);
        return $value;
    }
}
