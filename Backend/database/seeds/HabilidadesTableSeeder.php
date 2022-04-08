<?php

use App\Habilidad;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class HabilidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Habilidad::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear habilidades en su nombre
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunas habilidades
            $num_h = 2;
            for ($j = 0; $j < $num_h; $j++) {
                Habilidad::create([
                    'descripcion' => $faker->paragraph,
                    'dominio' => $faker->numberBetween($int1=0,$int2=99),
                    'habilidad'=>$faker->sentence,
                    'user_id'=>$user->id,
                ]);
            }
        }
    }
}
