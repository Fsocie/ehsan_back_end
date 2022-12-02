<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /********************ADMINISTRATEURS********************/
        $user1 = User::create([
            'nom'=>'Abalo',
            'prenoms'=>'Koffi',
            'telephone'=>'93624686',
            'email'=>'admin@admin.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        $user2 = User::create([
            'nom'=>'Kolawole',
            'prenoms'=>'Aremi',
            'telephone'=>'93624687',
            'email'=>'admin@admin1.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        /********************AGENTS********************/
        $user3 = User::create([
            'nom'=>'AFI',
            'prenoms'=>'Kemenou',
            'telephone'=>'90102030',
            'email'=>'agent@agent.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user4 = User::create([
            'nom'=>'Agbevivi',
            'prenoms'=>'komlan',
            'telephone'=>'90908070',
            'email'=>'agent@agent1.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        /********************UTILISATEURS********************/
        $user5 = User::create([
            'nom'=>'Olawole',
            'prenoms'=>'Oladjimedji',
            'telephone'=>'90908071',
            'email'=>'utilisateur@utilisateur.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user6 = User::create([
            'nom'=>'Alao',
            'prenoms'=>'Medje',
            'telephone'=>'90908072',
            'email'=>'utilisateur@utilisateur1.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user7 = User::create([
            'nom'=>'Olayitan',
            'prenoms'=>'Akambi',
            'telephone'=>'90908073',
            'email'=>'utilisateur@utilisateur2.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user8 = User::create([
            'nom'=>'Fela',
            'prenoms'=>'Kuti',
            'telephone'=>'90908074',
            'email'=>'utilisateur@utilisateur3.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user9 = User::create([
            'nom'=>'Gbemisoke',
            'prenoms'=>'Okeola',
            'telephone'=>'90908075',
            'email'=>'utilisateur@utilisateur4.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);
        $user10 = User::create([
            'nom'=>'Adededji',
            'prenoms'=>'Adeleke',
            'telephone'=>'90908076',
            'email'=>'utilisateur@utilisateur5.com',
            'is_admin'=>'0',
            'password'=> bcrypt('123456'),
        ]);

    

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAgent = Role::create(['name' => 'Agent']);
        $roleUtilisateur = Role::create(['name' => 'Utilisateur']);

        $permissions = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissions);

        $user1->assignRole([$roleAdmin->id]);
        $user2->assignRole([$roleAdmin->id]);
        $user3->assignRole([$roleAgent->id]);
        $user4->assignRole([$roleAgent->id]);
        $user5->assignRole([$roleUtilisateur->id]);
        $user6->assignRole([$roleUtilisateur->id]);
        $user7->assignRole([$roleUtilisateur->id]);
        $user8->assignRole([$roleUtilisateur->id]);
        $user9->assignRole([$roleUtilisateur->id]);
        $user10->assignRole([$roleUtilisateur->id]);
    }
}
