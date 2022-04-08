<?php

use App\Oferta;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class OfertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Vaciamos la tabla comments
       Oferta::truncate();
       $faker = \Faker\Factory::create();

       // Obtenemos todos los artículos de la bdd
       $empresas = \App\Empresa::all();

       // Obtenemos todos los usuarios
       //$users = \App\User::all();
       //foreach ($users as $user) {
           // iniciamos sesión con cada uno
           //JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

           // Creamos un comentario para cada artículo con este usuario
           foreach ($empresas as $empresa) {
            for ($i = 0; $i < 2; $i++) {

               Oferta::create([
                   'oferta' => $faker->text,
                   'fechaOferta'=>$faker->date($format = 'd/m/Y', $max = 'now'),
                   'descripcionOferta'=>$faker->paragraph,
                   'horario'=>$faker->time($format = 'H:i', $max = 'now'),
                   'numberoPostulantes'=>$faker->randomDigitNotNull,
                   'direcionOferta'=>$faker->address,
                   'carreraOferta'=>$faker->jobTitle,
                   'visible'=>$faker->boolean,
                   'empresa_id' => $empresa->id,

               ]);
            }
           }
       }
    //}
}
