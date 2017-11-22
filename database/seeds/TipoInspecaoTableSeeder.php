<?php

use Illuminate\Database\Seeder;

class TipoInspecaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_inspecaos')->insert([
            'designacao_tipo_inspecao' => 'Primeira inspecção detalhada',
            'descricao_tipo_inspecao' => 'Observação visual detalhada da estrutura da ponte e ensaios de carga, de modo a registar as características da estrutura (geometria, tipo de construção, materiais, etc.) e também tem como objectivo detectar todas as anomalias que resultem de erros de construção'
        ]);

        DB::table('tipo_inspecaos')->insert([
            'designacao_tipo_inspecao' => 'Inspecção de rotina',
            'periodicidade' => 12,
            'descricao_tipo_inspecao' => 'Observação visual da parte emersa da ponte, sobretudo para avaliar o seu estado de manutenção'
        ]);

        DB::table('tipo_inspecaos')->insert([
            'designacao_tipo_inspecao' => 'Inspecção principal',
            'periodicidade' => 36,
            'descricao_tipo_inspecao' => 'Observação da estrutura emersa e imersa se possível com meios de acesso que permitam fazer a observação a uma distância ao toque de todos os componentes da ponte e possibilitem a caracterização das anomalias.'
        ]);
    }
}
