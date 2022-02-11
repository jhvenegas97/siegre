<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identification;

class IdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/identificaciones.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Identification::create([
                    "cod_estudiantil" => $data['0'],
                    "documento" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
