<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;

class PerfisTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
        	'name' => 'Gestor',
        	'description' => 'Responsavel pela Gerência de licitações da SES-PE',
        ]);

        Profile::create([
        	'name' => 'Databases',
        	'description' => 'Responsavel pela criação de ARP da SES-PE',
        ]);

        Profile::create([
        	'name' => 'Gerente',
        	'description' => 'Responsavel pelas permissões aos novos usúarios',
        ]);

        Profile::create([
        	'name' => 'Solicitante',
        	'description' => 'Atribuição ao usúario para solicitar ARPs',
        ]);
    }
}
