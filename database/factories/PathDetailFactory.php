<?php
namespace Database\Factories;

use App\Models\Course;
use App\Models\Path;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PathDetail>
 */
class PathDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_path' => Path::factory(),
            'id_course' => Course::factory(),
        ];
    }
}