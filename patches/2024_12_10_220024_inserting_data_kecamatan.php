<?php

use Jalameta\Patcher\Patch;

class InsertingDataKecamatan extends Patch
{
    /**
     * Run patch script.
     *
     * @return void
     */
    public function patch()
    {
        $command = $this->command;
        $command->info("START INSERTING DATA KECAMATAN");

        $filePath = __DIR__ . "/data/m_kecamatan.csv";
        if (file_exists($filePath)) {
            $command->info("LOADING DATA KECAMATAN");

            $file = fopen($filePath, "r");
            if ($file !== false) {
                $chunkSize = 1000; // Jumlah data per batch
                $dataKecamatan = [];
                $count = 0;
                $batchCount = 0;
                $now = \Carbon\Carbon::now();

                // Skip header row
                fgetcsv($file, 0, ',');

                while (($row = fgetcsv($file, 0, ',')) !== false) {
                    $dataKecamatan[] = [
                        "id"          => $row[0],
                        "id_prov"     => $row[1],
                        "id_kab"      => $row[2],
                        "kode_bps"    => $row[3],
                        "nama_bps"    => $row[4],
                        "kode_dagri"  => $row[5],
                        "kode_dagri2" => $row[6],
                        "nama_dagri"  => $row[7],
                        "created_at"  => $now,
                        "updated_at"  => $now,
                    ];

                    $count++;

                    // Jika mencapai chunk size, lakukan insert batch
                    if (count($dataKecamatan) === $chunkSize) {
                        \Illuminate\Support\Facades\DB::table("m_kecamatan")->insert($dataKecamatan);
                        $batchCount++;
                        $dataKecamatan = []; // Reset array
                    }
                }

                // Insert sisa data yang belum diproses
                if (!empty($dataKecamatan)) {
                    \Illuminate\Support\Facades\DB::table("m_kecamatan")->insert($dataKecamatan);
                    $batchCount++;
                }

                fclose($file);

                $command->info("Successfully inserted {$count} rows into m_kecamatan in {$batchCount} batches.");
            } else {
                $command->error("Failed to open the file.");
            }
        } else {
            $command->error("File not found: $filePath");
        }

        $command->info("FINISH INSERTING DATA KECAMATAN");
    }
}
