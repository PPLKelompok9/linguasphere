<?php

namespace Tests\Unit;

use App\Models\Agency;
use App\Models\Path;
use App\Models\Course;
use App\Models\PathDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LearningPathUnitTest extends TestCase
{
    use RefreshDatabase;

    private function createAgency(): Agency{
        return Agency::create([
            'name' => 'Kampung British',
            'slug' => 'kampungbritish-bdg',
            'cover' => 'kampungbritish-cover.jpg',
            'description' => 'kampung british bandung',
            'address' => 'Jl. Soekarno-Hatta, Kota Bandung',
            'contact' => 'kampungbritishbdg@google.com',
        ]);
    }

    #[Test]
    public function path_can_be_created()
    {
        $path = Path::create([
            'name' => 'English for Beginners',
            'description' => 'Basic English learning path.',
        ]);

        $this->assertDatabaseHas('paths', [
            'name' => 'English for Beginners',
        ]);
    }

    #[Test]
    public function path_can_have_multiple_courses()
    {
        $path = Path::create([
            'name' => 'Advanced English Path',
            'description' => 'Advanced level English learning path.',
        ]);

        $agency = $this->createAgency();

        $course1 = Course::create([
            'name' => 'Course 1',
            'slug' => 'course-1',
            'cover' => 'default.jpg',
            'price' => 1000,
            'diskon_price' => 800,
            'level' => 'advanced',
            'description' => 'desc 1',
            'id_agency' => $agency->id,
            'id_category' => 1,
        ]);

        $course2 = Course::create([
            'name' => 'Course 2',
            'slug' => 'course-2',
            'cover' => 'default.jpg',
            'price' => 1200,
            'diskon_price' => 1000,
            'level' => 'advanced',
            'description' => 'desc 2',
            'id_agency' => $agency->id,
            'id_category' => 1,
        ]);

        PathDetail::create([
            'id_path' => $path->id,
            'id_course' => $course1->id,
            'position' => 1,
        ]);
        
        PathDetail::create([
            'id_path' => $path->id,
            'id_course' => $course2->id,
            'position' => 2,
        ]);

        $this->assertCount(2, $path->pathDetails);
    }

    #[Test]
    public function path_detail_can_access_related_course()
    {
        $agency = $this->createAgency();

        $course = Course::create([
            'name' => 'Advanced English',
            'slug' => 'advanced-english',
            'cover' => 'default.jpg',
            'price' => 1500,
            'diskon_price' => 1200,
            'level' => 'advanced',
            'description' => 'desc',
            'id_agency' => $agency->id,
            'id_category' => 1,
        ]);

        $path = Path::create([
            'name' => 'English Path',
            'description' => 'desc',
        ]);

        $detail = PathDetail::create([
            'id_path' => $path->id,
            'id_course' => $course->id,
            'position' => 1,
        ]);

        $this->assertEquals('Advanced English', $detail->course->name);
    }
}
