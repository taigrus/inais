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

		//Facilitadores
		//1 Wilson
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '1 - Wilson',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//2 Milton
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '2 - Milton',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//3 Francisca
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '3 - Francisca',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//4 Gilka
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '4 - Gilka',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//5 Wilma
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '5 - Wilma',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//6 Lucy
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '6 - Lucy',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//7 Paula
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '7 - Paula',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//8 Marilu
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '8 - Marilu',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//9 Maria
		DB::table('facilitador_bid')->insert(array(
			'nombre' => '9 - Maria',
			'paterno' => 'sin dato',
			'materno' => null,
			'telefono' => null,
			'direccion' => null,
			'fecha_nacimiento' => null,
			'otras_referencias' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('pais')->insert(array(
      'nombre' => 'Bolivia',
      'descripcion' => 'POBLACION DE 10 MILLONES DE PERSONAS',
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('pais')->insert(array(
      'nombre' => 'Peru',
      'descripcion' => 'POBLACION DE 10 MILLONES DE PERSONAS',
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'LA PAZ',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'COCHABAMBA',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'CHUQUISACA',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'SANTA CRUZ',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'CUSCO',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'LIMA',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'CAYAU',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('departamento')->insert(array(
      'nombre' => 'AREQUIPA',
      'descripcion' => 'POBLACION DE 4 MILLONES DE PERSONAS',
      'pais_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('provincia')->insert(array(
      'nombre' => 'MURILLO',
      'descripcion' => 'PROVINCIA MURILLO',
      'departamento_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

    DB::table('municipio')->insert(array(
			'nombre' => 'LA PAZ',
			'descripcion' => 'POBLACION DE 1 MILLON DE PERSONAS',
      'provincia_id' => 1,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('municipio')->insert(array(
			'nombre' => 'EL ALTO',
			'descripcion' => 'POBLACION DE 1 MILLON DE PERSONAS',
      'provincia_id' => 1,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('poblacion')->insert(array(
			'nombre' => 'LA PAZ',
			'descripcion' => 'POBLACION DE 1 MILLON DE PERSONAS',
      'municipio_id' => 1,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('poblacion')->insert(array(
      'nombre' => 'EL ALTO',
      'descripcion' => 'POBLACION DE 1.5 MILLONES DE PERSONAS',
      'municipio_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		//Distritos
    DB::table('distrito')->insert(array(
      'nombre' => 'MACRODITRITO CENTRO',
      'descripcion' => 'Distrito central de La Paz',
      'poblacion_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		DB::table('distrito')->insert(array(
			'nombre' => 'Distrito 8',
			'descripcion' => 'Distrito 8 ciudad de El alto',
      'poblacion_id' => 2,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		DB::table('distrito')->insert(array(
			'nombre' => 'Distrito 10',
			'descripcion' => 'Distrito 10 ciudad de El alto',
      'poblacion_id' => 2,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('distrito')->insert(array(
      'nombre' => 'Distrito 5',
      'descripcion' => 'Distrito 5 ciudad de El alto',
      'poblacion_id' => 2,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		//Urbanizaciones
    DB::table('urbanizacion')->insert(array(
      'nombre' => 'MIRAFLORES',
      'descripcion' => null,
      'distrito_id' => 1,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		DB::table('urbanizacion')->insert(array(
			'nombre' => 'SENKATA 79',
			'descripcion' => null,
      'distrito_id' => $faker->numberBetween(2,4),
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));
		DB::table('urbanizacion')->insert(array(
			'nombre' => 'JUANCITO PINTO',
			'descripcion' => 'NINGUNA',
      'distrito_id' => $faker->numberBetween(2,4),
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));
		DB::table('urbanizacion')->insert(array(
			'nombre' => 'ATIPIRIS',
			'descripcion' => null,
      'distrito_id' => $faker->numberBetween(2,4),
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('urbanizacion')->insert(array(
      'nombre' => 'CHIJIMARCA',
      'descripcion' => null,
      'distrito_id' => $faker->numberBetween(2,4),
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		//vias
    DB::table('via')->insert(array(
			'nombre' => 'AVENIDA',
			'descripcion' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		DB::table('via')->insert(array(
			'nombre' => 'CALLE',
			'descripcion' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('via')->insert(array(
      'nombre' => 'CARRETERA',
      'descripcion' => null,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		DB::table('via')->insert(array(
			'nombre' => 'PASAJE',
			'descripcion' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('via')->insert(array(
      'nombre' => 'PASEO',
      'descripcion' => null,
      'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
      'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
    ));

		DB::table('via')->insert(array(
			'nombre' => 'PLAZA',
			'descripcion' => null,
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//alcantarillado
		DB::table('alcantarillado')->insert(array(
			'descripcion' => '1 - Conexión intradomiciliaria funcionando con desague a pozo (del baño)',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		DB::table('alcantarillado')->insert(array(
			'descripcion' => '2 - Conexión intradomiciliaria funcionando con desague a red de alcantarillado (del baño)',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		DB::table('alcantarillado')->insert(array(
			'descripcion' => '3 - Sin conexión (solo pozo ciego o ninguno)',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		DB::table('alcantarillado')->insert(array(
			'descripcion' => '4 - Hogares sin datos (rechazo o sin contacto)',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('genero')->insert(array(
			'descripcion' => 'MASCULINO',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

    DB::table('genero')->insert(array(
			'descripcion' => 'FEMENINO',
			'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
			'updated_at' => $faker->dateTimeBetween('-2 years', 'now')
		));

		//Familias
		for($i=0; $i<50; $i++)
		{
			$folio=$faker->unique()->numberBetween(1000000000,1999999999);
			$id1=DB::table('familia_bid')->insertGetId(array(
				'folio' 	=> $folio,
				'facilitador_id' => $faker->numberBetween(1,9),
				'urbanizacion_id' => $faker->numberBetween(1,5),
				'nombre_jefe_hogar' => $faker->firstName(),
				'telefono' => $faker->numberBetween(60000000,79999999),
				'via_id' => $faker->numberBetween(1,6),
				'direccion' => $faker->streetAddress(),
				'numero_puerta' => $faker->numberBetween(1,4200),
				'otras_referencias' => $faker->text(50),
				'fecha_encuesta_lb' => $faker->dateTimeBetween('-4 years','-1 years'),
				'alcantarillado_id' => $faker->numberBetween(1,4),
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
					'integrante_id_csra'	=>$j,
					'nombre'		=>$faker->firstName(),
					'paterno'		=>$faker->lastName(),
					'materno'		=>$faker->lastName(),
					'fecha_nacimiento' => $nacimiento,
          'genero' => $faker->numberBetween(1,2);
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
