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

               'nom'=>'Admin',
               'prenoms'=>'dav',
               'telephone'=>'93624686',

               'email'=>'admin@ehsan.com',

                'is_admin'=>'1',

               'password'=> bcrypt('123456'),

            ],

            [

               'nom'=>'User',
               'prenoms'=>'toto',

               'email'=>'user@itsolutionstuff.com',

                'is_admin'=>'0',

               'password'=> bcrypt('123456'),

            ],

        ];



        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
