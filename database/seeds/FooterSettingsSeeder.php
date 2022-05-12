<?php

use Illuminate\Database\Seeder;

class FooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\FooterSettings::create(
            [
                'alamat' => 'Jl. Raya Kedungwuni No. 1, Kedungwuni, Kec. Kedungwuni, Kota Bandung, Jawa Barat 40257',
                'telepon1' => '+62812-123456789',
                'telepon2' => '+62812-123456789',
                'email' => 'info@example.com',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://instagram.com/',
                'youtube' => 'https://youtube.com/',
                'whatsapp' => 'https://wa.me/',
                'copyright' => 'Copyright © 2022. All rights reserved.'
            ]
        );
    }
}
