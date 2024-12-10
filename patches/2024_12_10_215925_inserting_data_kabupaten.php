<?php

use Jalameta\Patcher\Patch;
use Illuminate\Console\Command;

class InsertingDataKabupaten extends Patch
{
    /**
     * Run patch script.
     *
     * @return void
     */
    public function patch()
    {
        $command = $this->command;
        $command->info("START INSERTING DATA KABUPATEN");

        $filePath = __DIR__ . "/data/m_kabupaten.csv";
        if (file_exists($filePath)) {
            $command->info("LOADING DATA KABUPATEN");

            $file = fopen($filePath, "r");
            if ($file !== false) {
                $count = 0;
                $now = \Carbon\Carbon::now();
                $dataKabupaten = [];

                // Skip header row
                fgetcsv($file, 0, ',');

                while (($row = fgetcsv($file, 0, ',')) !== false) {
                    $dataKabupaten[] = [
                        "id"          => $row[0],
                        "id_prov"     => $row[1],
                        "kode_bps"    => $row[2],
                        "nama_bps"    => $row[3],
                        "kode_dagri"  => $row[4],
                        "kode_dagri2" => $row[5],
                        "nama_dagri"  => $row[6],
                        "tipe"        => $row[7],
                        "created_at"  => $now,
                        "updated_at"  => $now,
                    ];

                    $count++;
                }

                fclose($file);

                // Bulk insert for better performance
                \Illuminate\Support\Facades\DB::table("m_kabupaten")->insert($dataKabupaten);

                $command->info("Successfully inserted {$count} rows into m_kabupaten.");
            } else {
                $command->error("Failed to open the file.");
            }
        } else {
            $command->error("File not found: $filePath");
        }

        $command->info("FINISH INSERTING DATA KABUPATEN");
    }
}
