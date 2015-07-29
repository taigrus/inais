<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class usersAndProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        \DB::table('roles')->insert(array(
            'descripcion'   => 'Administrador del sistema' ,
            'permisos'      => '111000',
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ));

        \DB::table('roles')->insert(array(
            'descripcion'   => 'Usuario del sistema' ,
            'permisos'      => '100000',
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ));

        \DB::table('roles')->insert(array(
            'descripcion'   => 'Invitado del sistema' ,
            'permisos'      => '000000',
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ));

        $idr = \DB::table('users')->insertGetId(array(
            'first_name'  => 'Raúl',
            'last_name' => 'Burgos',
            'email' => 'rburgos@csra-bolivia.org',
            'password' => \Hash::make('EmdLa1975'),
            'active' => true,
            'type_id' => 1,
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ));

        \DB::table('user_profiles')->insert(array(
            'user_id'   => $idr,
            'bio'       => $faker->paragraph(rand(2,5)) ,
            'twitter'   => 'http://www.twitter.com/utasawa',
            'website'   => 'http;//www.' . $faker->domainName,
            'birthdate' => '1975/03/22',
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ));

        for($i=0; $i<30; $i++) {
            $nombre=$faker->firstName;
            $apellido=$faker->lastName;
            $id = \DB::table('users')->insertGetId(array(
                'first_name' => $nombre,
                'last_name' => $apellido,
                'email' => $faker->unique()->email,
                'password' => \Hash::make('secret'),
                'active' => true,
                'type_id' => 2,
                'created_at' => $faker->date('Y-m-d H:i:s'),
                'updated_at' => $faker->date('Y-m-d H:i:s')
            ));

            \DB::table('user_profiles')->insert(array(
                'user_id'   => $id,
                'bio'       => $faker->paragraph(rand(2,5)) ,
                'twitter'   => 'http://www.twitter.com/' . $faker->userName,
                'website'   => 'http;//www.' . $faker->domainName,
                'birthdate' => $faker->dateTimeBetween('-45 years','-18 years')->format('Y-m-d  '),
                'created_at' => $faker->date('Y-m-d H:i:s'),
                'updated_at' => $faker->date('Y-m-d H:i:s')
            ));
        }

    }
}