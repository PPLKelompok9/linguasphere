<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();
        
        foreach ($courses as $course) {
            Scholarship::create([
                'title' => $course->name . ' Excellence Scholarship',
                'description' => 'This scholarship program aims to support outstanding students who wish to pursue their studies in ' . $course->name . '. Recipients will receive comprehensive support throughout their academic journey.',
                'requirements' => [
                    'Minimum GPA of 3.0',
                    'Strong academic background',
                    'Demonstrated leadership abilities',
                    'Active participation in extracurricular activities',
                    'Letter of recommendation'
                ],
                'benefits' => [
                    'Full course fee coverage',
                    'Monthly stipend',
                    'Learning materials and resources',
                    'Access to exclusive workshops',
                    'Mentorship opportunities'
                ],
                'course_id' => $course->id,
                'slots_available' => rand(5, 15),
                'deadline' => now()->addMonths(rand(1, 6)),
                'status' => 'open'
            ]);
        }
    }
} 