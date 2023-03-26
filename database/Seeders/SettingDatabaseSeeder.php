<?php

namespace Modules\Setting\database\Seeders;

use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SettingSeeder::class]);
    }
}
