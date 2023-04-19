<?php

use Illuminate\Support\Facades\Schema;
use Modules\Setting\app\Models\Setting;

if (!function_exists('setting')) {
    function setting(String|array $name, $default = null)
    {
        if (!Schema::hasTable('settings')) {
            return $default;
        }

        if (is_string($name)) {
            $setting = Setting::where('name', $name)->Orwhere('config', $name)->value('value') ?? $default;
            return $setting;
        } else {
            foreach ($name as $key => $value) {
                $setting = Setting::firstOrCreate(['name' => $key, 'value' => $value])->value('value');
            }
        }
    }
}
