<?php

namespace App\Console\Commands;

use App\Data_warga;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateAgeCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:age-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update citizen age category based on birth date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $citizens = Data_warga::all();

        foreach ($citizens as $citizen) {
            $age = Carbon::parse($citizen->tanggal_lahir)->age;

            if ($age >= 0 && $age <= 6) {
                $category  = 'Balita';
            } elseif ($age >= 7 && $age <= 12) {
                $category = 'Anak-anak';
            } elseif ($age >= 13 && $age <= 18) {
                $category = 'Remaja';
            } elseif ($age >= 19 && $age <= 59) {
                $category = 'Dewasa';
            } else {
                $category = 'Lansia';
            }

            if ($citizen->kategori_usia !== $category) {
                $citizen->update(['kategori_usia' => $category]);
            }
        }

        $this->info('Age categories updated successfully.');
    }
}
