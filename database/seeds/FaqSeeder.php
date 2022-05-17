<?php

use Illuminate\Database\Seeder;
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
        $data = [];

        for($i=1; $i < 6; $i++) {
            $data[] = [
                'question' => 'Pertanyaan ' . $i,
                'answer' => 'Jawaban ' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('faqs')->insert($data);
    }
}
