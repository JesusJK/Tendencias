<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MultaPrestamo;

class MultaPrestamoSeeder extends Seeder
{
    public function run()
    {
        MultaPrestamo::insert([
            ['multa_id' => 1, 'fecha' => now(), 'valor' => 5000, 'prestamo_id' => 2],
            ['multa_id' => 2, 'fecha' => now()->subDays(5), 'valor' => 2000, 'prestamo_id' => 3],
        ]);
    }
}
