<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DataWargaSeeder extends Seeder
{
    public function run()
    {
        $jsonPath = database_path('seeds/DataSeeder.json');
        $jsonData = file_get_contents($jsonPath);
        $data = json_decode($jsonData, true);
        
        foreach ($data as $item) {
            // Add created_at and updated_at timestamps
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            
            DB::table('data_wargas')->insert($item);
        }
        
        $this->command->info('Data warga seeded successfully from JSON file!');
    }
}