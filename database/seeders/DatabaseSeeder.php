<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
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
        $this->call(CreatePermissionSeeder::class);
        $this->call(CreateRolesSeeder::class);
        $this->call(CreateUsersSeeder::class);
        
     
    }
}
