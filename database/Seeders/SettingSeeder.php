<?php

namespace Modules\Setting\database\Seeders;

use Modules\Setting\app\Models\Setting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config()->all() as $key => $data) {
            $this->seed_configs($key, $data);
        }
    }

    public function seed_configs($key, $data, $excepts = [])
    {
        foreach ($data as $name => $value) {
            if (!in_array($name, $excepts)) {
                if (is_array($value)) {
                    return $this->seed_configs("$key $name", $value, $excepts);
                } else {
                    Setting::firstOrCreate([
                        'name'      => Str::title("$key $name")
                    ], [
                        'value'     => $value,
                        'config'    => Str::slug("$key $name", '.')
                    ]);
                }
            }
        }
    }
}
