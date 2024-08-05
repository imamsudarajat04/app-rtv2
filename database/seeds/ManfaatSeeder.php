<?php

use Illuminate\Database\Seeder;

class ManfaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ManfaatSetting::create(
            [
                'title'                     => 'Manfaat',
                'description'               => 'Aplikasi Sistem Informasi Masyarakat Kelurahan adalah platform digital yang dirancangan untuk meningkatkan transparansi, komunikasi,
                                                dan partisipasi aktif warga dalam pembangunan dan pengembangan lingkungan kelurahan. Aplikasi ini menyediakan akses mudah bagi warga untuk dapat
                                                menyampaikan aspirasi, keluhan, dan pertanyaan secara langsung kepada pihak kelurahan.',
                'icon_one'                  => 'bx bx-chat',
                'title_one'                 => 'Komunikasi Dua Arah',
                'short_description_one'     => 'Warga dapat menyampaikan aspirasi, keluhan, atau pertanyaan melalui aplikasi kepada pihak kelurahan.',
                'icon_two'                  => 'bx bxs-bar-chart-alt-2',
                'title_two'                 => 'Peningkatan Partisipasi Masyarakat',
                'short_description_two'     => 'Aplikasi dapat mendorong warga untuk terlibat dan berpartisipasi dalam pembangunan dan pengembangan kelurahan.',
                'icon_three'                => 'bx bx-shield-quarter',
                'title_three'               => 'Peningkatan Keamanan Lingkungan',
                'short_description_three'   => 'Aplikasi dapat menjadi sarana bagi warga untuk melaporkan isu-isu terkait keamanan dan ketertiban di lingkungan kelurahan.',
                'icon_four'                 => 'bx bx-home',
                'title_four'                => 'Integrasi dengan Teknologi Kota Cerdas (Smart City)',
                'short_description_four'    => 'Aplikasi dapat terintegrasi dengan sistem dan platform yang digunakan dalam pengembangan kota cerdas di tingkat pemerintah daerah.',
            ]
        );
    }
}
