<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();
        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.

        $password = Hash::make('123123');
        $image_name = $faker->image('public\storage\usersimages', 400, 300, null, false);
        User::create([
            'name' => 'Administrador',
            'lastname'=>'ApellidoAdmin',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'identificationCard'=>'1720804432',
            'telephoneNumber'=>'0992514455',
            'address'=>'Pifo, Feliciano Vega Pasaje A E3-17',
            'dateOfBirth'=>'29/09/1997',
            'career'=>null,
            'institution'=>'Escuela Politecnica Nacional',
            'semester'=>null,
            'totalSemestrerCarrer'=>null,
            'request'=>true,
            'descriptionRequest'=>'Usuario Verificado',
            'image' => 'public/usersimages/' . $image_name,
            'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
            'typeUser'=>'A'

        ])->assignRole('administrador');

        // Generar algunos usuarios Pasantes verificados para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
            'name' =>$faker->firstName,
            'lastname'=>$faker->lastName,
            'email' =>$faker->email,
            'password' => $password,
            'identificationCard'=>$faker->buildingNumber,
            'telephoneNumber'=>$faker->buildingNumber,
            'address'=>$faker->address,
            'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
            'career'=>$faker->randomElement($array = array ('Desarrollo de Sofware','Agua y saniamiento ambiental','Electromescanica','Telecomunicaciones')),
            'institution'=>'Escuela Politecnica Nacional',
            'semester'=>$faker->randomElement($array = array ('Primero','Segundo','Tercer','Cuarto','Quinto')),
            'totalSemestrerCarrer'=>'6',
            'request'=>true,
            'descriptionRequest'=>'Usuario verificado',
            'image' => 'public/usersimages/' . $image_name,
            'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
            'typeUser'=>'P'
            ])->assignRole('pasante');
        }
        // Generar algunos usuarios Pasantes no verificados para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
                'name' =>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email' =>$faker->email,
                'password' => $password,
                'identificationCard'=>$faker->buildingNumber,
                'telephoneNumber'=>$faker->buildingNumber,
                'address'=>$faker->address,
                'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
                'career'=>$faker->randomElement($array = array ('Desarrollo de Sofware','Agua y saniamiento ambiental','Electromescanica','Telecomunicaciones')),
                'institution'=>'Escuela Politecnica Nacional',
                'semester'=>$faker->randomElement($array = array ('Primero','Segundo','Tercer','Cuarto','Quinto')),
                'totalSemestrerCarrer'=>'6',
                'request'=>false,
                'descriptionRequest'=>'Usuario rechazado por motivos....',
                'image' => 'public/usersimages/' . $image_name,
                'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
                'typeUser'=>'P'
            ])->assignRole('pasante');
        }
        // Generar algunos usuarios Pasantes pendientes para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
                'name' =>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email' =>$faker->email,
                'password' => $password,
                'identificationCard'=>$faker->buildingNumber,
                'telephoneNumber'=>$faker->buildingNumber,
                'address'=>$faker->address,
                'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
                'career'=>$faker->randomElement($array = array ('Desarrollo de Sofware','Agua y saniamiento ambiental','Electromescanica','Telecomunicaciones')),
                'institution'=>'Escuela Politecnica Nacional',
                'semester'=>$faker->randomElement($array = array ('Primero','Segundo','Tercer','Cuarto','Quinto')),
                'totalSemestrerCarrer'=>'6',
                'request'=>null,
                'descriptionRequest'=>'Estamos verificando tú usuario',
                'image' => 'public/usersimages/' . $image_name,
                'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
                'typeUser'=>'P'
            ])->assignRole('pasante');
        }

        // Generar algunos usuarios Empresa verificados para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
            'name' =>$faker->firstName,
            'lastname'=>$faker->lastName,
            'email' =>$faker->email,
            'password' => $password,
            'identificationCard'=>$faker->buildingNumber,
            'telephoneNumber'=>$faker->buildingNumber,
            'address'=>$faker->address,
            'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
            'career'=>null,
            'institution'=>'Escuela Politecnica Nacional',
            'semester'=>null,
            'totalSemestrerCarrer'=>null,
            'request'=>true,
                'descriptionRequest'=>'Usuario Verificado',
            'image' => 'public/usersimages/' . $image_name,
            'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
            'typeUser'=>'E'

            ])->assignRole('empresa');
        }
        // Generar algunos usuarios Empresa pendientes para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
                'name' =>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email' =>$faker->email,
                'password' => $password,
                'identificationCard'=>$faker->buildingNumber,
                'telephoneNumber'=>$faker->buildingNumber,
                'address'=>$faker->address,
                'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
                'career'=>null,
                'institution'=>'Escuela Politecnica Nacional',
                'semester'=>null,
                'totalSemestrerCarrer'=>null,
                'request'=>null,
                'descriptionRequest'=>'Estamos verificando a tú usuario',
                'image' => 'public/usersimages/' . $image_name,
                'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
                'typeUser'=>'E'

            ])->assignRole('empresa');
        }
        // Generar algunos usuarios Empresa no verificados para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $image_name = $faker->image('public/storage/usersimages', 400, 300, null,false);

            User::create([
                'name' =>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email' =>$faker->email,
                'password' => $password,
                'identificationCard'=>$faker->buildingNumber,
                'telephoneNumber'=>$faker->buildingNumber,
                'address'=>$faker->address,
                'dateOfBirth'=>$faker->date($format = 'd/m/Y', $max = 'now'),
                'career'=>null,
                'institution'=>'Escuela Politecnica Nacional',
                'semester'=>null,
                'totalSemestrerCarrer'=>null,
                'request'=>false,
                'descriptionRequest'=>'Usuario Rechazado por motivos ...',
                'image' => 'public/usersimages/' . $image_name,
                'document'=> 'public/usersdocuments/esPI9k0sdD1cpYsQlrg4hxTVnNpucLWqjZ1nIP4Y.pdf',
                'typeUser'=>'E'

            ])->assignRole('empresa');
        }

    }
}
