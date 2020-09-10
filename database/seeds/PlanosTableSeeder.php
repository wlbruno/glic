<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	Plan::create([
          	'name' => 'Fornecedores',
          	'url' => 'fornecedores',
          	'description' => 'Área destinada aos fornecedores de medicamentos, produtos, aquisições e serviços.',
        	]);

        	Plan::create([
          	'name' => 'Órgãos não participantes',
          	'url' => 'orgaonaoparticipante',
          	'description' => 'Área destinada aos órgãos participantes da Ata de Registro de Preços da SES-PE.',
        	]);	
        	Plan::create([
          	'name' => 'Órgãos Participantes',
          	'url' => 'orgaoparticipante',
          	'description' => 'Área destinada aos órgãos não participantes da Ata de Registro de Preços da SES-PE.',
        	]);
         Plan::create([
          	'name' => 'GLIC',
          	'url' => 'glic',
          	'description' => 'Área destinada aos colaboradores da Gerência de Licitações da SES-PE.',
        	]);
    
    }
}
