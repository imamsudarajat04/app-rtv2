<?php

use Jalameta\Patcher\Patch;

class InsertingDataProvinsi extends Patch
{
    /**
     * Run patch script.
     *
     * @return void
     */
    public function patch()
    {
        $command = $this->command;
        $command->info("START INSERTING DATA PROVINSI");

        $filePath = __DIR__ . "/data/m_provinsi.csv";
        if (file_exists($filePath)) {
            $command->info("LOADING DATA PROVINSI");

            $file = fopen($filePath, "r");
            if ($file !== false) {
                $count = 0;
                $now = \Carbon\Carbon::now();
                $dataProvinsi = [];

                // Skip header row
                fgetcsv($file, 0, ',');

                while (($row = fgetcsv($file, 0, ',')) !== false) {
                    $dataProvinsi[] = [
                        "id"          => $row[0],
                        "kode_bps"    => $row[1],
                        "nama_bps"    => $row[2],
                        "kode_dagri"  => $row[3],
                        "nama_dagri"  => $row[4],
                        "created_at"  => $now,
                        "updated_at"  => $now,
                    ];

                    $count++;
                }

                fclose($file);

                // Bulk insert for better performance
                \Illuminate\Support\Facades\DB::table("m_provinsi")->insert($dataProvinsi);

                $command->info("Successfully inserted {$count} rows into m_provinsi.");
            } else {
                $command->error("Failed to open the file.");
            }
        } else {
            $command->error("File not found: $filePath");
        }

        $command->info("FINISH INSERTING DATA PROVINSI");
    }
}
