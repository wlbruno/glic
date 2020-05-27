<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ObjetoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('objetos')->insert([
        [
            'nome' => 'DIPIRONA',
            'nefisco' => '435435-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Paracetamol',
            'nefisco' => '654324-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Acetazolamida',
            'nefisco' => '123456-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Acetilcisteína',
            'nefisco' => '454435-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Adenosina',
            'nefisco' => '454355-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Albendazol',
            'nefisco' => '999954-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Alentuzumabe',
            'nefisco' => '4355475-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Bacitracina',
            'nefisco' => '435767-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Bleomicina',
            'nefisco' => '954473-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Bromocriptina',
            'nefisco' => '943584-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'Orlistate',
            'nefisco' => '656584-3',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        ]);
    }
}
