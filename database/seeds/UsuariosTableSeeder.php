<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
	        	'plan_id' => 1,
	        	'name' => 'Administrador',
	        	'email' => 'admin@admin.com',
	        	'password' => bcrypt('qweqweqweqwe'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	     User::create([
	        	'plan_id' => 1,
	        	'name' => 'Willian Bruno',
	        	'email' => 'willianbruno.sespe@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 1,
	        	'name' => 'test',
	        	'email' => 'test.sespe@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 2,
	        	'name' => 'orgao nao participante',
	        	'email' => 'orgaoNP@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 2,
	        	'name' => 'orgao nao participante',
	        	'email' => 'orgaoNPP@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 2,
	        	'name' => 'orgao nao participante',
	        	'email' => 'orgaoNPPP@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	       User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital Agamenon Magalhães',
	        	'email' => 'hospitalagamenon@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital Barão de Lucena',
	        	'email' => 'hospitalbaraodelucena@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital Colônia Professor Alcides Codeceiraa',
	        	'email' => 'hospital@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital da Restauração',
	        	'email' => 'hospitalrestauracao@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital Getúlio Vargas',
	        	'email' => 'hospitaletuliovaras@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
	        User::create([
	        	'plan_id' => 3,
	        	'name' => 'Hospital Otávio de Freitas',
	        	'email' => 'hospitalotaviodefreitas@gmail.com',
	        	'password' => bcrypt('123456'),

	        	'created_at' => Carbon::now()->toDateTimeString(),
           		'updated_at' => Carbon::now()->toDateTimeString(),
	        ]);
    	
    }
}
