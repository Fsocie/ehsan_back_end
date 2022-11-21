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
        // \App\Models\contacts::factory(10)->create();
        //1- php artisan db:seed --class=PermissionTableSeeder
        $this->call(PermissionTableSeeder::class);
        //2- php artisan db:seed --class=CreateAdminUserSeeder
        $this->call(CreateAdminUserSeeder::class);
    }
}
