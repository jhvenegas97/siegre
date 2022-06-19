<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(IdentificationSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(AcademicLevelSeeder::class);
        $this->call(RolesPermissionsSeeder::class);
        $this->call(CategoryPublicationsSeeder::class);
    }
}
