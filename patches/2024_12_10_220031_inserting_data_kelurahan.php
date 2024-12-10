<?php

use Jalameta\Patcher\Patch;

class InsertingDataKelurahan extends Patch
{
    /**
     * Run patch script.
     *
     * @return void
     */
    public function patch()
    {
        $command = $this->command;
        $command->info("START INSERTING DATA KELURAHAN");

        $filePath = __DIR__ . "/data/m_kelurahan.csv";
        if (file_exists($filePath)) {
            $command->info("LOADING DATA KELURAHAN");

            $file = fopen($filePath, "r");
            if ($file !== false) {
                $chunkSize = 1000; // Jumlah data per batch
                $dataKelurahan = [];
                $count = 0;
                $batchCount = 0;
                $now = \Carbon\Carbon::now();

                // Skip header row
                fgetcsv($file, 0, ',');

                while (($row = fgetcsv($file, 0, ',')) !== false) {
                    $dataKelurahan[] = [
                        "id"           => $row[0],
                        "id_prov"      => $row[1],
                        "id_kab"       => $row[2],
                        "id_kec"       => $row[3],
                        "kode_bps"     => $row[4],
                        "nama_bps"     => $row[5],
                        "kode_dagri"   => $row[6],
                        "kode_dagri2"  => $row[7],
                        "nama_dagri"   => $row[8],
                        "tipe"         => $row[9],
                        "created_at"   => $now,
                        "updated_at"   => $now,
                    ];

                    $count++;

                    // Jika mencapai chunk size, lakukan insert batch
                    if (count($dataKelurahan) === $chunkSize) {
                        \Illuminate\Support\Facades\DB::table("m_kelurahan")->insert($dataKelurahan);
                        $batchCount++;
                        $dataKelurahan = []; // Reset array
                    }
                }

                // Insert sisa data yang belum diproses
                if (!empty($dataKelurahan)) {
                    \Illuminate\Support\Facades\DB::table("m_kelurahan")->insert($dataKelurahan);
                    $batchCount++;
                }

                fclose($file);

                $command->info("Successfully inserted {$count} rows into m_kelurahan in {$batchCount} batches.");
            } else {
                $command->error("Failed to open the file.");
            }
        } else {
            $command->error("File not found: $filePath");
        }

        $command->info("FINISH INSERTING DATA KELURAHAN");
    }
}
