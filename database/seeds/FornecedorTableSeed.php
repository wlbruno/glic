<?php

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Carbon\Carbon;

class FornecedorTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('fornecedores')->insert([
        [
            'fornecedor' => 'EMS Corp.',
            'cnpj' => '42.343.242/3543-54',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'fornecedor' => 'Negócio em cápsula.',
            'cnpj' => '87.513.485/4616-84',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Hypermarcas',
            'cnpj' => '55.787.897/9845-21',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Sanofi',
            'cnpj' => '75.667.843/2423-42',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Novartis',
            'cnpj' => '64.398.456/9843-53',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Aché',
            'cnpj' => '45.572.341/2312-31',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Eurofarma',
            'cnpj' => '65.464.585/2346-54',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
            'fornecedor' => 'Takeda',
            'cnpj' => '46.864.684/6846-46',
            
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        ]);
    }
}
