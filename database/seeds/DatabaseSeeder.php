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
        $this->call(FaqSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ManfaatSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(GlobalSettingSeeder::class);
        $this->call(HeaderSettingSeeder::class);
        $this->call(FooterSettingsSeeder::class);
    }
}