<?php

use Illuminate\Database\Seeder;

class PontesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\TipoDePonte::class, 4)->create();

        factory(App\Estrada::class, 4)->create();


            //Registo da Provincia de Maputo e seus Distritos
            factory(App\Provincia::class,1)->create(['nome_provincia' => 'Maputo'])->each(
                function ($provincia){


                    factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Maputo Cidade'])->each(
                        function ($distrito){           
                });

                 factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Manhiça'])->each(
                        function ($distrito){           
                });

                factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Boane'])->each(
                        function ($distrito){           
                });

                    
                });


        factory(App\Provincia::class,1)->create(['nome_provincia' => 'Sofala'])->each(
            function ($provincia){


                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Maganja']);

                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Beira']);
            });

        factory(App\Provincia::class,1)->create(['nome_provincia' => 'Tete'])->each(
            function ($provincia){


                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Tete']);

            });


        factory(App\Provincia::class,1)->create(['nome_provincia' => 'Gaza'])->each(
            function ($provincia){

                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Chokwe']);

                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Manjacaze']);
            });

        factory(App\Provincia::class,1)->create(['nome_provincia' => 'Manica'])->each(
            function ($provincia){

                factory(App\Distrito::class,1)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Chimoio']);

            });




    }
}
