<?php

use App\Capacitacion;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class CapacitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Vaciar la tabla.
         Capacitacion::truncate();
         $faker = \Faker\Factory::create();
         $users = App\User::all();
         foreach ($users as $user) {
             // iniciamos sesión con este usuario de pasante
             JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
             // Y ahora con este usuario creamos una solicitud
             for ($i = 0; $i < 3; $i++) {
                Capacitacion::create([
                    'nombreCapacitacion'=>$faker->text,
                    'nombreInstitucionCapacitadora'=>$faker->company,
                    'fechaInicioCapacitacion'=>$faker->dateTimeThisCentury($max = 'now', $timezone = null),
                    'fechaFinCapacitacion'=>$faker->dateTimeThisCentury($max = 'now', $timezone = null),
                    'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
                    'user_id'=>$user->id,
                ]);
            }
         }

    }
}
