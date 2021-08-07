<?php

namespace Database\Factories;

use App\Models\Exercice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'video_url' => $this->faker->url,
            'is_enabled' => true,
        ];
    }
}
