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
            'nome' => 'SERVIÇO DE LOCAÇÃO EM EQUIPAMENTOS ÁUDIO VISUAL DO TIPO MICROFONE COM HO. SEMMANUTENÇÃO CORRETIVA',
            'nefisco' => '435435-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE LOCAÇÃO EM EQUIPAMENTOS ÁUDIO VISUAL DO TIPO MICROFONE SEM FIO. SEM MANUTENÇÃO CORRENTIVA',
            'nefisco' => '654324-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE GRAVAÇÃO E ÁUDIO- DO TIPO GRAVAÇÃO DIGITAL COM ENTREGA DE CD/DVD, COM OPERADOR',
            'nefisco' => '123456-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE LOCACAO EM EQUIPAMENTOS AUDIOVISUAL DO TIPO SISTEMA DÊ SOM.CONTENDO AMPLIFICADOR. MESA DE SOM. CAIXAS DE RETORNO, CAIXAS DE SOM E MCRGFONES COMPEDESTAL. PARA PUBLICO DE ATE 50 PESSOAS. SEM MANUTENCAO',
            'nefisco' => '454435-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE LOCACAO EM EQUIPAMENTOS AUDIOVISUAL DO TIPO SISTEMA DÊ SOM. CONTENDO AMPLIFICADOR. MESA DE SOM. CAIXAS DE RETORNO, CAIXAS DE SOM E MCRGFONES COM PEDESTAL. PARA PUBLICO DE ATE 50 PESSOAS. SEM MANUTENCAO',
            'nefisco' => '454355-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE LOCACAO EM EQUIPAMENTOS AUDIOVISUAL DO TIPO SISTEMA DE SOM CONTENDO AMPLIFICADOR  MESA DE SOM CAIXAS DE RETORNO CAIXAS DE SOM E MICROFONES COM PEDESTAL PARA PUBLICO DE ATE 200 ESSOAS, SEM MANUTENCAO',
            'nefisco' => '999954-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
            'nome' => 'SERVIÇO DE LOCAÇÃO EM EQUIPAMENTO DE ÁUDIO VISUAL DO TIPO SISTEMA DE SOM CONTENDO AMPLIFICADOR,MESA DE SOM E MICROFONES COM PEDESTAL ,PARA PÚBLICO DE ATÉ 400 PESSOAS ,SEM MANUTENÇÃO',
            'nefisco' => '4355475-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
         [
           'nome' => 'SERVIÇO DE LOCAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA - DATA SHOW, SEM MANUTENÇÃO',
           'nefisco' => '435767-3',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        ]);
    }
}
