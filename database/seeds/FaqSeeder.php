<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            "question" => "Bagaimana cara mendaftar di aplikasi sistem informasi masyarakat kelurahan?",
            "answer" => "Untuk mendaftar, klik tombol Pendataan Warga di halaman utama aplikasi, isi formulir dengan informasi yang diminta, seperti NO KK, NIK, Nama Lengkap dan lain-lain.",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('faqs')->insert([
            "question" => "Apa saja layanan yang tersedia di aplikasi SMART-RT?",
            "answer" => "Aplikasi ini menyediakan berbagai layanan seperti Pendataan Warga dan Pengaduan.",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        DB::table('faqs')->insert([
            "question" => "Bagaimana cara mengajukan pengaduan atau laporan melalui aplikasi?",
            "answer" => "Untuk mengajukan pengaduan atau laporan, cukup pergi ke halaman utama kemudian cari Pengaduan dan isi formulir.",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        DB::table('faqs')->insert([
            "question" => "Apakah informasi pribadi saya aman di aplikasi ini?",
            "answer" => "Kita sangat menjaga privasi dan keamanan data. Semua informasi pribadi yang Anda berikan akan disimpan dengan aman dan hanya digunakan untuk tujuan layanan kelurahan.",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        DB::table('faqs')->insert([
            "question" => "Bagaimana cara memperbarui data kependudukan melalui aplikasi?",
            "answer" => "Untuk memperbarui data kependudukan, cukup hubungi hubungi admin maka data akan diperbarui melalui aplikasi.",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
