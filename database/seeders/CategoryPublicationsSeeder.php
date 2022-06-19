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
        $categories = [
            'News'
        ];

        foreach ($categories as $category) {
            CategoryPublication::create(['name_category_publication' => $category]);
        }
    }
}
