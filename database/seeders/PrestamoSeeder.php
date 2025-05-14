<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;

class PrestamoSeeder extends Seeder
{
    public function run()
    {
        Prestamo::insert([
            ['fecha_prestamo' => now(), 'estado' => 'Entregado', 'persona_id' => 1, 'material' => 'harry potter', 'fecha_devolucion' => now()->addDays(7), 'fecha_entrega' => now()->addDays(7), 'dias_retraso' => 0],
            ['fecha_prestamo' => now()->subDays(10), 'estado' => 'Retrasado', 'persona_id' => 2, 'material' => 'hola', 'fecha_devolucion' => now()->subDays(3), 'fecha_entrega' => null, 'dias_retraso' => 3],
            ['fecha_prestamo' => now()->subDays(20), 'estado' => 'Entregado', 'persona_id' => 3, 'material' => 'jesus de nazaret', 'fecha_devolucion' => now()->subDays(13), 'fecha_entrega' => now()->subDays(13), 'dias_retraso' => 0],
        ]);
    }
}

