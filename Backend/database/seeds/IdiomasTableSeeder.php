<?php

use App\Idioma;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Idioma::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear artículos en su nombre
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunos articulos

            for ($j = 0; $j < 5; $j++) {
                Idioma::create([
                    'idioma' => $faker->country,
                    'nivel' => $faker->numberBetween($int1=0,$int2=99),
                    'user_id'=>$user->id,
                ]);
            }
        }
    }
}
