<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        TipoDocumento::insert([
            ['nombre' => 'Cedula de Ciudadania', 'abreviatura' => 'CC'],
            ['nombre' => 'Tarjeta de Identidad', 'abreviatura' => 'TI'],
            ['nombre' => 'Cedula de Extranjeria', 'abreviatura' => 'CE'],
        ]);
    }
}
