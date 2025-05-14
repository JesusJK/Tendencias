<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Multa;

class MultaSeeder extends Seeder
{
    public function run()
    {
        Multa::insert([
            ['persona_id' => 1, 'total' => 5000],
            ['persona_id' => 3, 'total' => 2000],
        ]);
    }
}
