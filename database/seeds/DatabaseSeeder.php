<?php

use App\GlobalSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Artisan::call("patcher:run");
        $this->call([
            FaqSeeder::class,
            UserSeeder::class,
            AboutSeeder::class,
            ManfaatSeeder::class,
            ReligionSeeder::class,
            GlobalSettingSeeder::class,
            HeaderSettingSeeder::class,
            FooterSettingsSeeder::class,
            DataWargaSeeder::class,
        ]);
    }
}
