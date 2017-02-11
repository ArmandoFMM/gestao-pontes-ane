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

        factory(App\Country::class)->create()->each( function ($country){
            
            factory(App\Provincia::class, 4)->create(['country_id' => $country->id])->each(
                function ($provincia){


                    factory(App\Distrito::class)->create(['provincia_id' => $provincia->id])->each(
                        function ($distrito){
                            
                });

                    
                });
        });



    }
}
