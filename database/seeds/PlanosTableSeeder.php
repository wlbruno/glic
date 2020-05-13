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
          	'name' => 'GLIC',
          	'url' => 'glic',
          	'description' => 'Gerencia de licitações',
        	]);

        	Plan::create([
          	'name' => 'Orgão não participante',
          	'url' => 'orgaonaoparticipante',
          	'description' => 'Orgãos não participante do processo da SES-PE',
        	]);	
        	Plan::create([
          	'name' => 'Orgão Participante',
          	'url' => 'orgaoparticipante',
          	'description' => 'Orgãos participante do processo da SES-PE',
        	]);
        	Plan::create([
          	'name' => 'Fornecedores',
          	'url' => 'fornecedores',
          	'description' => 'Fornecedores',
        	]);
    
    }
}
