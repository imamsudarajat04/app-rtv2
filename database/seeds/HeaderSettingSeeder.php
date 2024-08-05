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
                'app_name' => 'SMART-RT',
                'title' => 'SMART-RT KELURAHAN BUKIT CERMIN',
                'subtitle' => 'Pendataan Penduduk di SMART-RT',
            ]
        );
    }
}
