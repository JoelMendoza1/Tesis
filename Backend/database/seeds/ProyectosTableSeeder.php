<?php

use App\Proyecto;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Proyecto::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear instrucciones en su nombre
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunas instrucciones
            $num_i = 2;
            for ($j = 0; $j < $num_i; $j++) {
                Proyecto::create([
                    'proyecto' => $faker->word,
                    'description'=>$faker->text,
                    'link' => $faker->url,
                    'user_id'=>$user->id,
                ]);
            }
        }
    }
}
