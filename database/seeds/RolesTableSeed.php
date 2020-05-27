<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create([
        	'name' => 'add_ata',
        	'description' => 'Criar atas',
        ]);

        Role::create([
        	'name' => 'edit_ata',
        	'description' => 'Editar atas',
        ]);

        Role::create([
        	'name' => 'remover_ata',
        	'description' => 'Remover atas',
        ]);

        Role::create([
            'name' => 'add_objetos',
            'description' => 'adicionar objetos',
        ]);

        Role::create([
            'name' => 'edit_objetos',
            'description' => 'editar objetos',
        ]);

        Role::create([
            'name' => 'remover_objetos',
            'description' => 'remover objetos',
        ]);

        Role::create([
            'name' => 'add_fornecedores',
            'description' => 'adicionar fornecedores',
        ]);

        Role::create([
            'name' => 'edit_fornecedores',
            'description' => 'editar fornecedores',
        ]);

        Role::create([
            'name' => 'remover_fornecedores',
            'description' => 'Remover fornecedores',
        ]);

        Role::create([
            'name' => 'atas',
            'description' => 'atas',
        ]);

        Role::create([
            'name' => 'objetos',
            'description' => 'objetos',
        ]);

        Role::create([
            'name' => 'fornecedores',
            'description' => 'fornecedores',
        ]);

        Role::create([
            'name' => 'permissoes',
            'description' => 'permissoes',
        ]);
         Role::create([
            'name' => 'add_permissoes',
            'description' => 'adicionar permissoes',
        ]);

          Role::create([
            'name' => 'remover_permissoes',
            'description' => 'remover permissoes',
        ]);

        Role::create([
            'name' => 'usuarios',
            'description' => 'usuarios',
        ]);

        Role::create([
            'name' => 'admin',
            'description' => 'admin',
        ]);


          DB::table('permission_role')->insert([
          
          		'permission_id' => 1,
          		'role_id' => 1,
          ]);
          DB::table('permission_role')->insert([
          		'permission_id' => 2,
          		'role_id' => 2,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 3,
              'role_id' => 3,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 4,
              'role_id' => 4,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 5,
              'role_id' => 5,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 6,
              'role_id' => 6,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 7,
              'role_id' => 7,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 8,
              'role_id' => 8,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 9,
              'role_id' => 9,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 10,
              'role_id' => 10,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 11,
              'role_id' => 11,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 12,
              'role_id' => 12,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 13,
              'role_id' => 13,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 14,
              'role_id' => 14,
          ]);
           DB::table('permission_role')->insert([
              'permission_id' => 15,
              'role_id' => 15,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 16,
              'role_id' => 16,
          ]);
          DB::table('permission_role')->insert([
              'permission_id' => 17,
              'role_id' => 17,
          ]);

          

    }
}
