<?php

use Illuminate\Database\Seeder;

class HeaderSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\HeaderSettings::create(
            [
                'app_name' => 'SILUR',
                'title' => 'Sistem Informasi Lurah',
                'subtitle' => 'Sistem Informasi Lurah',
            ]
        );
    }
}
