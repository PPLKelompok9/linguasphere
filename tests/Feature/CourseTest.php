<?php

namespace Tests\Feature;

use App\Models\Agency;
use App\Models\Course;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    use RefreshDatabase;

    protected function setUp(): void{
        parent::setUp();
        Role::firstOrCreate(['name'=>'admin']);

    }

    private function createAdmin(): User
    {
        $user = User::create([
            'name' => 'Test Admin',
            'email' => 'testadmin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('admin');
        return $user;
    }

    private function createAgency(string $name, string $slug): Agency
    {
        return Agency::create([
            'name' => $name,
            'slug' => $slug,
            'cover' => "$slug.jpg",
            'description' => "Courses from $name",
            'address' => 'Jl. Pendidikan, Indonesia',
            'contact' => "$slug@example.com",
        ]);
    }

    private function createCourses(Agency $agency, array $courses): void
    {
        foreach ($courses as $course) {
            Course::create([
                'name' => $course['name'],
                'slug' => $course['slug'],
                'cover' => 'default.jpg',
                'price' => $course['price'],
                'diskon_price' => $course['diskon_price'],
                'level' => $course['level'],
                'description' => $course['description'],
                'id_agency' => $agency->id,
                'id_category' => 1,
            ]);
        }
    }

    public function test_course_creation_for_english_and_german_agencies(): void
    {
        $englishAgency = $this->createAgency('English Academy', 'english-academy');
        $germanAgency = $this->createAgency('German Institute', 'german-institute');

        $englishCourses = [
            ['name' => 'English Basics', 'slug' => 'english-basics', 'price' => 1000, 'diskon_price' => 800, 'level' => 'beginner', 'description' => 'Learn basic English.'],
            ['name' => 'Conversational English', 'slug' => 'conversational-english', 'price' => 1200, 'diskon_price' => 950, 'level' => 'intermediate', 'description' => 'Improve your conversation.'],
            ['name' => 'Business English', 'slug' => 'business-english', 'price' => 1500, 'diskon_price' => 1300, 'level' => 'advanced', 'description' => 'Professional English course.'],
            ['name' => 'TOEFL Preparation', 'slug' => 'toefl-prep', 'price' => 1600, 'diskon_price' => 1400, 'level' => 'advanced', 'description' => 'Prepare for TOEFL exam.'],
            ['name' => 'Grammar Mastery', 'slug' => 'grammar-mastery', 'price' => 900, 'diskon_price' => 750, 'level' => 'intermediate', 'description' => 'Master English grammar.'],
        ];

        $germanCourses = [
            ['name' => 'Deutsch Grundlagen', 'slug' => 'deutsch-grundlagen', 'price' => 1100, 'diskon_price' => 900, 'level' => 'beginner', 'description' => 'Grundkurs Deutsch.'],
            ['name' => 'Gespräche auf Deutsch', 'slug' => 'gespraeche-deutsch', 'price' => 1300, 'diskon_price' => 1000, 'level' => 'intermediate', 'description' => 'Sprechen üben.'],
            ['name' => 'Wirtschaftsdeutsch', 'slug' => 'wirtschaftsdeutsch', 'price' => 1600, 'diskon_price' => 1400, 'level' => 'advanced', 'description' => 'Deutsch für Beruf.'],
            ['name' => 'TestDaF Vorbereitung', 'slug' => 'testdaf-prep', 'price' => 1700, 'diskon_price' => 1500, 'level' => 'advanced', 'description' => 'TestDaF Training.'],
            ['name' => 'Grammatik Intensiv', 'slug' => 'grammatik-intensiv', 'price' => 1000, 'diskon_price' => 850, 'level' => 'intermediate', 'description' => 'Grammatik verbessern.'],
        ];

        $this->createCourses($englishAgency, $englishCourses);
        $this->createCourses($germanAgency, $germanCourses);

        $this->assertDatabaseCount('courses', 10);

        $englishCoursesInDb = Course::where('id_agency', $englishAgency->id)->get();
        $germanCoursesInDb = Course::where('id_agency', $germanAgency->id)->get();

        $this->assertCount(5, $englishCoursesInDb);
        $this->assertCount(5, $germanCoursesInDb);

        $this->assertEquals('English Academy', $englishCoursesInDb->first()->agency->name);
        $this->assertEquals('German Institute', $germanCoursesInDb->first()->agency->name);
    }
}
