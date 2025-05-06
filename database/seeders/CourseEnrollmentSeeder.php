<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseEnrollmentSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'student')->get();
        $courses = Course::all();

        foreach ($courses as $course) {
            // Randomly enroll between 5 and 20 students in each course
            $randomStudents = $users->random(rand(5, 20));
            
            foreach ($randomStudents as $student) {
                $course->students()->attach($student->id, [
                    'enrolled_at' => now()->subDays(rand(1, 30))
                ]);
            }

            // Update course stats
            $course->updateStats();
        }
    }
} 