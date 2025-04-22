<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {

    $agency = Agency::first() ?? Agency::factory()->create();

    return [
      'name' => 'Course ' . $this->faker->sentence(3), // Hapus tanda kurung pada word
      'slug' => $this->faker->slug(),
      'cover' => 'default.jpg',
      'price' => $this->faker->numberBetween(1000, 10000),
      'diskon_price' => $this->faker->numberBetween(500, 9000),
      'level' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced']),
      'description' => $this->faker->paragraph(),
      'id_agency' => $agency->id,
      'id_category' => 1
    ];
  }
}
