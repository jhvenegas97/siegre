<?php

namespace Database\Seeders;

use App\Models\CategoryPublication;
use Illuminate\Database\Seeder;

class CategoryPublicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/categorias-publicaciones.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                CategoryPublication::create([
                    "name_category_publication" => $data['0']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
