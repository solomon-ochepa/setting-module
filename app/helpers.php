<?php

use Modules\Setting\app\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('setting')) {
    function setting(String|array $name, $default = null)
    {
        if (is_string($name)) {
            $changed    = false; // $user->isDirty(); // true
            $prefix     = "settings." . Str::slug($name, '.');
            if (Cache::has($prefix) and !$changed) {
                return Cache::get($prefix);
            }

            $setting = Setting::where('name', $name)->Orwhere('config', $name)->value('value') ?? $default;

            Cache::put($prefix, $setting, 60);
            return $setting;
        } else {
            foreach ($name as $key => $value) {
                $setting = Setting::firstOrCreate(['name' => $key, 'value' => $value])->value('value');

                $prefix = "settings." . Str::slug($key, '.');
                Cache::put($prefix, $setting, 60);
            }
        }
    }
}
