<?php

use App\Models\Solicitante;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SolicitantesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		Solicitante::create([
			'cnpj' => '10.572.048/0001-28',
			'orgao' => 'SES-PE',
			'ramal' => '81 31840985',
			'estado' => 'PE',
			'user_id' => 1,

			'created_at' => Carbon::now()->toDateTimeString(),
			   'updated_at' => Carbon::now()->toDateTimeString(),
		]);


        Solicitante::create([
        		'cnpj' => '12345678912',
        		'orgao' => 'SES-SP',
        		'ramal' => '5515263485',
        		'estado' => 'SP',
        		'user_id' => 4,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);

        	Solicitante::create([
        		'cnpj' => '12345678458',
        		'orgao' => 'SES-BH',
        		'ramal' => '5515263658',
        		'estado' => 'SP',
        		'user_id' => 5,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '12345678248',
        		'orgao' => 'SES-PR',
        		'ramal' => '5515463485',
        		'estado' => 'SP',
        		'user_id' => 6,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '1234858248',
        		'orgao' => 'Hospital Agamenon Magalhães',
        		'ramal' => '5515447885',
        		'estado' => 'PE',
        		'user_id' => 7,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '78965423123',
        		'orgao' => 'Hospital Barão de Lucena',
        		'ramal' => '551544586',
        		'estado' => 'PE',
        		'user_id' => 8,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '789654231434',
        		'orgao' => 'Hospital Colônia Professor Alcides Codeceira',
        		'ramal' => '23545486',
        		'estado' => 'PE',
        		'user_id' => 9,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '3123123',
        		'orgao' => 'Hospital da Restauração',
        		'ramal' => '5515443534',
        		'estado' => 'PE',
        		'user_id' => 10,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '3123123322',
        		'orgao' => 'Hospital Getúlio Vargas',
        		'ramal' => '55154324',
        		'estado' => 'PE',
        		'user_id' => 11,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
        	Solicitante::create([
        		'cnpj' => '3123322',
        		'orgao' => 'Hospital Otávio de Freitas',
        		'ramal' => '512332',
        		'estado' => 'PE',
        		'user_id' => 12,

        		'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
        	]);

        
    }
}
