<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    public function run()
    {
        Persona::insert([
            ['N_documento' => '123456789', 'correo' => 'juanperez@example.com', 'nombre' => 'Juan Perez', 'telefono' => '3123456789', 'tipoDocumento_id' => 1],
            ['N_documento' => '987654321', 'correo' => 'mariagomez@example.com', 'nombre' => 'Maria Gomez', 'telefono' => '3119876543', 'tipoDocumento_id' => 2],
            ['N_documento' => '456789123', 'correo' => 'carlosramirez@example.com', 'nombre' => 'Carlos Ramirez', 'telefono' => '3204567891', 'tipoDocumento_id' => 1],
        ]);
    }
}

// php artisan db:seed  TODOS LOS SEEDERS
//php artisan db:seed --class=PersonaSeeder  UN SEEDER ESPECIFICO
