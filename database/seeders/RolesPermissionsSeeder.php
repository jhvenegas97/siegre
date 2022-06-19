<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

         $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'Jonathan Venegas', 
            'email' => 'admin@gmail.com',
            'identification_id' => '401',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole([$role->id]);
    }
}
