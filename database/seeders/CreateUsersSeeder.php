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
      
        $userAdmin= User::create([
                    'nom'=>'admin',
                    'prenoms'=>'admin',
                    'telephone'=>'10101010',
                    'email'=>'admin@admin.com',
                    'is_admin'=>'1',
                    'password'=> bcrypt('123456789'),
                    ]);

        $userWriter=User::create([
                    'nom'=>'writer',
                    'prenoms'=>'writer',
                    'telephone'=>'20202020',
                    'email'=>'writer@writer.com',
                    'is_admin'=>'1',
                    'password'=> bcrypt('123456789'),
        ]);
        $userUser=User::create([
                    'nom'=>'user',
                    'prenoms'=>'user',
                    'telephone'=>'30303030',
                    'email'=>'user@user.com',
                    'is_admin'=>'0',
                    'password'=> bcrypt('123456789'),
                ]);
        
             $userAdmin->assignRole('admin',"writer","user");
             $userWriter->assignRole("writer","user");
             $userUser->assignRole("user");



        /*foreach ($user as $key => $value) {
            User::create($value);
        }*/
    }
}
