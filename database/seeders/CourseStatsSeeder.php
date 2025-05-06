<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseStatsSeeder extends Seeder
{
    public function run()
    {
        $courseIcons = [
            'english course' => '📚',
            'germani course' => '📚',
            'japan course' => '🎌',
            'video course' => '🎥',
            'private course' => '👨‍🏫',
            'all course' => '📖'
        ];

        Course::all()->each(function ($course) use ($courseIcons) {
            $course->update([
                'impressions' => rand(1000, 100000),
                'total_sales' => rand(10, 100),
                'total_students' => rand(10, 100),
                'icon' => $courseIcons[strtolower($course->name)] ?? '📚',
                'total_revenue' => $course->total_sales * $course->price
            ]);
        });
    }
} 