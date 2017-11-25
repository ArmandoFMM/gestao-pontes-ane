<?php

use Illuminate\Database\Seeder;

class ProblemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registo de Categorias de Problemas Padrão
        DB::table('categorias')->insert([
            'designacao_categoria' => 'Acessos e Tabuleiro',
            'descricao_categoria' => '',
        ]);

        DB::table('categorias')->insert([
            'designacao_categoria' => 'Tabuleiro',
            'descricao_categoria' => '',
        ]);

        DB::table('categorias')->insert([
            'designacao_categoria' => 'Parapeitos',
            'descricao_categoria' => '',
        ]);

        DB::table('categorias')->insert([
            'designacao_categoria' => 'Rio',
            'descricao_categoria' => '',
        ]);

        DB::table('categorias')->insert([
            'designacao_categoria' => 'Leito Do Rio',
            'descricao_categoria' => '',
        ]);


        // Registo de Problemas Padrão

        //Acessos e Tabuleiro
        DB::table('problemas')->insert([
            'designacao_problema' => 'Superfície da Estrada com ondulação',
            'descricao_problema' => '',
            'categoria_id' => 1
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Má construção da drenagem da estrada de acesso á ponte',
            'descricao_problema' => '',
            'categoria_id' => 1
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Drenos da estrada bloqueados ou destruidos',
            'descricao_problema' => '',
            'categoria_id' => 1
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Água retida na ponte',
            'descricao_problema' => '',
            'categoria_id' => 1
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Drenos do tabuleiro entupidos ou destruidos',
            'descricao_problema' => '',
            'categoria_id' => 1
        ]);


        //Tabuleiro
        DB::table('problemas')->insert([
            'designacao_problema' => 'Refluimento na superfície',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Fendas sobre as juntas',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Fissuração do betão',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Degradação do Betão',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Armadura do Betão exposta',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Betão de má qualidade',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Desgaste da superfície do Betão devido a pequenas pedras',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Lancis Destruidos ou soltos',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

        DB::table('problemas')->insert([
            'designacao_problema' => 'Passeios destruidos',
            'descricao_problema' => '',
            'categoria_id' => 2
        ]);

    }
}
