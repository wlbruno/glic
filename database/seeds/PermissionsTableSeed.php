<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'name' => 'add_ata',
        	'description' => 'Criar atas',
        ]);

        Permission::create([
        	'name' => 'edit_ata',
        	'description' => 'Editar atas',
        ]);

        Permission::create([
        	'name' => 'remover_ata',
        	'description' => 'Remover atas',
        ]);

        Permission::create([
            'name' => 'add_objetos',
            'description' => 'adicionar objetos',
        ]);

        Permission::create([
            'name' => 'edit_objetos',
            'description' => 'editar objetos',
        ]);

        Permission::create([
            'name' => 'remover_objetos',
            'description' => 'remover objetos',
        ]);

        Permission::create([
            'name' => 'add_fornecedores',
            'description' => 'adicionar fornecedores',
        ]);

        Permission::create([
            'name' => 'edit_fornecedores',
            'description' => 'editar fornecedores',
        ]);

        Permission::create([
            'name' => 'remover_fornecedores',
            'description' => 'Remover fornecedores',
        ]);

        Permission::create([
            'name' => 'atas',
            'description' => 'atas',
        ]);

        Permission::create([
            'name' => 'objetos',
            'description' => 'objetos',
        ]);

        Permission::create([
            'name' => 'fornecedores',
            'description' => 'fornecedores',
        ]);

        Permission::create([
            'name' => 'permissoes',
            'description' => 'permissoes',
        ]);
            Permission::create([
            'name' => 'add_permissoes',
            'description' => 'adicionar permissoes',
        ]);

          Permission::create([
            'name' => 'remover_permissoes',
            'description' => 'remover permissoes',
        ]);

        Permission::create([
            'name' => 'usuarios',
            'description' => 'usuarios',
        ]);

        Permission::create([
            'name' => 'admin',
            'description' => 'admin',
        ]);
    }
}
