<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MultaPrestamo;
use App\Models\Prestamo;
use App\Models\Multa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MultaPrestamo>
 */
class MultaPrestamoFactory extends Factory
{
    protected $model = MultaPrestamo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'valor' => $this->faker->randomFloat(2, 5, 100), // Multas entre 5 y 100
            'multa_id' => Multa::factory(),
            'prestamo_id' => Prestamo::factory(),
        ];
    }
}
