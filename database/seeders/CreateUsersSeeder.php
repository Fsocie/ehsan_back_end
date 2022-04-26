<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [

                'nom' => 'admin',
                'prenoms' => 'admin',
                'telephone' => '101010',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('123456789'),

            ],
            [
                'nom' => 'writer',
                'prenoms' => 'writer',
                'telephone' => '111111',
                'email' => 'writer@writer.com',
                'is_admin' => '0',
                'password' => bcrypt('123456789'),

            ],
            [
                'nom' => 'user',
                'prenoms' => 'user',
                'telephone' => '121212',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('123456789'),

            ],


        ];


        // php artisan db:seed --class=CreateUsersSeeder
        foreach ($user as $key => $value) {

            User::create($value);
        }
    }
}
