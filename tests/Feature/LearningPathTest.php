<?php
namespace Tests\Feature;

use App\Models\Agency; 
use App\Models\Path;
use App\Models\Course;
use App\Models\PathDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LearningPathTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_learning_path_can_be_created()
    {
        $path = Path::create([
            'name' => 'English for Beginners',
            'description' => 'Basic English learning path.',
        ]);

        $this->assertDatabaseHas('paths', [
            'name' => 'English for Beginners',
        ]);
    }

    /** @test */
    public function a_learning_path_can_have_multiple_courses()
    {
        
        $path = Path::create([
            'name' => 'Advanced English Path',
            'description' => 'Advanced level English learning path.',
        ]);

        $agency = Agency::create([
            'name' => 'English Agency',
            'slug' => 'english-agency',
            'cover' => 'agency-default-cover.jpg',
            'description' => 'This is a default description for the agency',
            'address' => 'This is a default description for the agency',
            'contact' => 'This is a default description for the agency',
        ]);

        $course1 = Course::create([
            'name' => 'Advanced English Course 1',
            'slug' => 'advanced-english-course-1',
            'cover' => 'default.jpg',
            'price' => 1000,
            'diskon_price' => 800,
            'level' => 'advanced',
            'description' => 'Course description here.',
            'id_agency' => $agency->id, 
            'id_category' => 1, 
        ]);

        $course2 = Course::create([
            'name' => 'Advanced English Course 2',
            'slug' => 'advanced-english-course-2',
            'cover' => 'default.jpg',
            'price' => 1200,
            'diskon_price' => 1000,
            'level' => 'advanced',
            'description' => 'Course description here.',
            'id_agency' => $agency->id, 
            'id_category' => 1, 
        ]);

        
        PathDetail::create([
            'id_path' => $path->id,
            'id_course' => $course1->id,
        ]);

        PathDetail::create([
            'id_path' => $path->id,
            'id_course' => $course2->id,
        ]);

        $this->assertCount(2, $path->pathDetails);
    }

    /** @test */
    public function path_detail_can_access_related_course()
    {
        
        $agency = Agency::create([
            'name' => 'English Agency',
            'slug' => 'english-agency',
            'cover' => 'agency-default-cover.jpg',
            'description' => 'This is a default description for the agency',
            'address' => 'This is a default description for the agency',
            'contact' => 'This is a default description for the agency',
        ]);

    
    $course = Course::create([
        'name' => 'Advanced English',
        'slug' => 'advanced-english',
        'cover' => 'default.jpg',
        'price' => 1500,
        'diskon_price' => 1200,
        'level' => 'advanced',
        'description' => 'Advanced course description.',
        'id_agency' => $agency->id,  
        'id_category' => 1, 
    ]);

    $path = Path::create([
        'name' => 'English Path',
        'description' => 'English learning path description.',
    ]);

    
    $detail = PathDetail::create([
        'id_path' => $path->id,
        'id_course' => $course->id,
    ]);

    
    $this->assertEquals('Advanced English', $detail->course->name);
    }
}
