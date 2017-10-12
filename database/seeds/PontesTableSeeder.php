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
        factory(App\Role::class, 3)->create();
        factory(App\User::class, 3)->create();

        factory(App\TipoDePonte::class, 4)->create();

        factory(App\Estrada::class, 4)->create();

        factory(App\Country::class)->create()->each( function ($country){

            //Registo da Provincia de Maputo e seus Distritos
            factory(App\Provincia::class)->create(['country_id' => $country->id,'nome_provincia' => 'Maputo'])->each(
                function ($provincia){


                    factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Maputo Cidade'])->each(
                        function ($distrito){           
                });


                 factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Matola'])->each(
                        function ($distrito){           
                });

                 factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Manhiça'])->each(
                        function ($distrito){           
                });

                factory(App\Distrito::class)->create(['provincia_id' => $provincia->id,'nome_distrito' => 'Boane'])->each(
                        function ($distrito){           
                });

                    
                });

        });



    }
}
