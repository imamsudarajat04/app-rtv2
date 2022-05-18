<?php

use Illuminate\Database\Seeder;

class GlobalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\GlobalSetting::create(
            [
                'button_name' => 'Klik Disini',
            ]
        );
    }
}
