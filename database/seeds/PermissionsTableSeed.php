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
        	'name' => 'add_atas',
        	'description' => 'Criar ARPs',
        ]);

        Permission::create([
        	'name' => 'edit_atas',
        	'description' => 'Editar ARPs',
        ]);

        Permission::create([
        	'name' => 'show_atas',
        	'description' => 'Visualizar ARPs',
        ]);

        Permission::create([
        	'name' => 'remove_atas',
        	'description' => 'Remover ARPs',
        ]);
    }
}
