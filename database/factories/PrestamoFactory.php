<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prestamo;
use App\Models\Persona;
use App\Models\Material;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaPrestamo = $this->faker->dateTimeBetween('-1 month', 'now');
        $diasDeRetraso = $this->faker->numberBetween(0, 10);

        return [
            'fecha_prestamo' => $fechaPrestamo,
            'estado' => $this->faker->randomElement(['activo', 'devuelto', 'retrasado']),
            'persona_id' => Persona::factory(),
            'fecha_devolucion' => $this->faker->dateTimeBetween($fechaPrestamo, '+1 month'),
            'fecha_entrega' => $this->faker->boolean(70) ? $this->faker->dateTimeBetween($fechaPrestamo, '+2 weeks') : null,
            'dias_retraso' => $diasDeRetraso,
        ];
    }
}
