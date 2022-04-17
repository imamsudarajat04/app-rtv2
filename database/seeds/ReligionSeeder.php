<?php

use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Religions::create([
            'name' => 'Islam'
        ]);

        \App\Religions::create([
            'name' => 'Kristen Protestan'
        ]);

        \App\Religions::create([
            'name' => 'Kristen Katolik'
        ]);

        \App\Religions::create([
            'name' => 'Hindu'
        ]);

        \App\Religions::create([
            'name' => 'Buddha'
        ]);

        \App\Religions::create([
            'name' => 'Khonghucu'
        ]);
    }
}
