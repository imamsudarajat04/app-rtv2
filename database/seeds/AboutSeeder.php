<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\About::create(
            [
                'title'          => 'VISI & MISI',
                'description'    => 'Terwujudnya kemandirian masyarakat dalam menjaga Kelestarian lingkungan untuk menunjang peningkatan kualitas lingkungan yang layak, bersih, hijau dan sehat.',
                'title_one'      => 'MISI 1',
                'subtitle_one'   => 'Meningkatkan kesadaran dan partisipasi masyarakat dalam menjaga dan melestarikan lingkungan hidup khususnya kelurahan Bukit Cermin.',
                'title_two'      => 'MISI 2',
                'subtitle_two'   => 'Membangun Masyarakat yang sadar lingkungan yang Bersih, Hijau dan Sehat sebagai salah satu proses ramah lingkungan.',
                'title_three'    => 'MISI 3',
                'subtitle_three' => 'Membangun kemitraan dengan Masyarakat, LPM, PKK, Karang Taruna Kelurahan sebagai ujung tombak dalam upaya menjaga dan memelihara kelestarian lingkungan di wilayah Kelurahan Bukit Cermin.',
                'title_four'     => 'MISI 4',
                'subtitle_four'  => 'Membangun motivasi dan partisipasi dalam rangka menumbuhkan potensi masyarakat agar lebih berperan aktif.',
                'title_five'     => 'MISI 5',
                'subtitle_five'  => 'Mewujudkan PHBS dengan memberantas Buang Air Besar Sembarangan dan pembuatan Sumber air bersih.',
            ]
        );
    }
}
