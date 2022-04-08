<?php

use App\Empresa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Empresa::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear habilidades en su nombre
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunas habilidades
            $image_name = $faker->image('public/storage/empresasimages', 400, 300, null,false);
            if($user->typeUser=='E'){
                Empresa::create([
                    'RUC'=>$faker->unique()->buildingNumber,
                    'nombreEmpresa'=>$faker->company,
                    'tipoEmpresa'=>$faker->randomElement($array = array ('Privada','Publica')),
                    'telefonoEmpresa'=>$faker->buildingNumber,
                    'emailEmpresa'=>$faker->unique()->email,
                    'direccionEmpresa'=>$faker->address,
                    'imagen' => 'public/empresasimages/' . $image_name,
                    'user_id'=>$user->id,
                ]);
            }


        }
    }

}
