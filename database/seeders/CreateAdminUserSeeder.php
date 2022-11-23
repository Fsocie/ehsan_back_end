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
        $user1 = User::create([
            'nom'=>'Abalo',
            'prenoms'=>'Koffi',
            'telephone'=>'93624686',
            'email'=>'admin@admin.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        $user2 = User::create([
            'nom'=>'AFI',
            'prenoms'=>'Kemenou',
            'telephone'=>'90102030',
            'email'=>'editeur@editeur.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        $user3 = User::create([
            'nom'=>'Agbevivi',
            'prenoms'=>'komlan',
            'telephone'=>'90908070',
            'email'=>'utilisateur@utilisateur.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);

    

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleEditeur = Role::create(['name' => 'Editeur']);
        $roleUtilisateur = Role::create(['name' => 'Utilisateur']);

        $permissions = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissions);

        $user1->assignRole([$roleAdmin->id]);
        $user2->assignRole([$roleEditeur->id]);
        $user3->assignRole([$roleUtilisateur->id]);
    }
}
