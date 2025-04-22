<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgencyFactory extends Factory
{
  protected $model = Agency::class;

  public function definition(): array
  {
    $name = $this->faker->company();
    return [
      'name' => $name,
      'cover' => $this->faker->imageUrl(),
      'description' => $this->faker->paragraph(),
      'slug' => Str::slug($name),
      'address' => $this->faker->address(),
      'contact' => $this->faker->phoneNumber(),
      'category_id' => 1,
    ];
  }
}