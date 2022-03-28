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
            'nom'=>'Admin',
            'prenoms'=>'dav',
            'telephone'=>'93624686',
            'email'=>'admin@ehsan.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        $user2 = User::create([
            'nom'=>'editeur',
            'prenoms'=>'editeur',
            'telephone'=>'1010',
            'email'=>'editeur@editeur.com',
            'is_admin'=>'1',
            'password'=> bcrypt('123456'),
        ]);
        $user3 = User::create([
            'nom'=>'utilisateur',
            'prenoms'=>'utilisateur',
            'telephone'=>'1111',
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
