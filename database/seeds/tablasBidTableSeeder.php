<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as carbon;


class tablasBidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

		for($i=0; $i<50; $i++)
		{
			$folio=$faker->unique()->numberBetween(1000000000,1999999999);
			$id1=DB::table('familia_bid')->insertGetId(array(
				'folio' 	=> $folio,
				'direccion' => $faker->streetAddress(),
				'latitud' 	=> $faker->latitude(),
				'longitud'	=> $faker->longitude(),
				'altura'	=> $faker->numberBetween(3500,4200),
				'created_at'=> $faker->dateTimeBetween('-2 years','now'),
				'updated_at'=> $faker->dateTimeBetween('-2 years','now')
			));
			$aleatorio=$faker->numberBetween(2,10);
			for($j=1; $j<=$aleatorio; $j++)
			{
				$nacimiento=$faker->date('Y-m-d','-2 years');
				list($ano,$mes,$dia)=explode('-', $nacimiento);
				$edad=Carbon::createFromDate($ano,$mes,$dia)->age;
				$id2=DB::table('integrante_familia_bid')->insertGetId(array(
					'familia_id'	=>$id1,
					'integrante_id'	=>$j,
					'nombre'		=>$faker->firstName(),
					'paterno'		=>$faker->lastName(),
					'materno'		=>$faker->lastName(),
					'fecha_nacimiento' => $nacimiento,
					'edad'			=> $edad,
					'created_at'	=> $faker->dateTimeBetween('-2 years','now'),
					'updated_at'	=> $faker->dateTimeBetween('-2 years','now')
				));
				if($edad<6)
				{
					$aleatorio=$faker->numberBetween(2,10);
					for($j=1; $j<=$aleatorio; $j++) {
						DB::table('integrante_seguimiento_bid')->insert(array(
							'familia_id' => $id1,
							'rel_integrante_id' => $id2,
							'fecha_visita' => $faker->dateTimeBetween('-2 years', 'now'),
							'hora_visita' => $faker->time('H:i:s', 'now'),
							'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
							'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
						));
					}
				}
			}


		}
		echo('fin de llenado de las tablas');

    }
}
