<?php

namespace Database\Factories;
use App\Models\Secret;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SecretFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Secret::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'secret' => $this->faker->text()
        ];
    }
}
