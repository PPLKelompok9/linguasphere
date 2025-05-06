<?php

namespace Database\Factories;

use App\Models\Sertification;
use App\Models\Agency;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SertificationFactory extends Factory
{
    protected $model = Sertification::class;

    public function definition(): array
    {
        $name = $this->faker->sentence(3);
        return [
            'name' => $name,
            'cover' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'slug' => Str::slug($name),
            'price' => $this->faker->numberBetween(1000000, 5000000),
            'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'id_agency' => Agency::factory(),
            'id_category' => Category::factory()
        ];
    }
}