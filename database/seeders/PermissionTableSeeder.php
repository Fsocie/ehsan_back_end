<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'parametre-list',
            
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'collecte-list',
            'collecte-create',
            'collecte-edit',
            'collecte-delete',
         ];
 
      
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
