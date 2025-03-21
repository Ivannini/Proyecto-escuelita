<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'nombre'            => $this->faker->name(),
            'correo'            => $this->faker->unique()->safeEmail(),
            'fecha_nacimiento'  => $this->faker->date(),
            'ciudad'            => $this->faker->city(),
        ];
    }
}
