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
                'alamat' => 'Jalan Tugu Pahlawan, Tanjungpinang Kode 29121',
                'telepon1' => '+62 852-7222-2515',
                'telepon2' => '',
                'email' => 'kel.bukitcermin@tanjungpinangkota.go.id',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://instagram.com/',
                'youtube' => 'https://youtube.com/',
                'whatsapp' => 'https://wa.me/',
                'copyright' => '© SMART-RT 2022. All rights reserved.'
            ]
        );
    }
}
