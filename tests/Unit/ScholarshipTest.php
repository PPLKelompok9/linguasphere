<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Course;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ScholarshipTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $scholarship;
    private $course;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a course
        $this->course = Course::factory()->create();

        // Create a scholarship
        $this->scholarship = Scholarship::create([
            'title' => 'Test Scholarship',
            'description' => 'Test Description',
            'requirements' => ['requirement1', 'requirement2'],
            'benefits' => ['benefit1', 'benefit2'],
            'course_id' => $this->course->id,
            'slots_available' => 10,
            'deadline' => now()->addMonth(),
            'status' => 'open'
        ]);
    }

    /** @test */
    public function it_belongs_to_a_course()
    {
        $this->assertInstanceOf(Course::class, $this->scholarship->course);
    }

    /** @test */
    public function it_can_determine_if_it_is_open()
    {
        // Test open scholarship
        $this->assertTrue($this->scholarship->isOpen());

        // Test closed scholarship
        $this->scholarship->update(['status' => 'closed']);
        $this->assertFalse($this->scholarship->isOpen());

        // Test expired scholarship
        $this->scholarship->update([
            'status' => 'open',
            'deadline' => now()->subDay()
        ]);
        $this->assertFalse($this->scholarship->isOpen());

        // Test full scholarship
        $this->scholarship->update([
            'deadline' => now()->addMonth(),
            'slots_available' => 0
        ]);
        $this->assertFalse($this->scholarship->isOpen());
    }

    /** @test */
    public function it_can_track_remaining_slots()
    {
        $initialSlots = $this->scholarship->slots_available;
        
        // Create some applications
        $users = User::factory(3)->create(['role' => 'student']);
        foreach ($users as $user) {
            $this->scholarship->applications()->create([
                'user_id' => $user->id,
                'motivation_letter' => 'Test motivation',
                'cv_path' => 'test.pdf',
                'status' => 'pending'
            ]);
        }

        $remainingSlots = $initialSlots - 3;
        $this->assertEquals(
            $remainingSlots,
            $this->scholarship->slots_available - $this->scholarship->applications()->count()
        );
    }

    /** @test */
    public function it_casts_requirements_and_benefits_as_arrays()
    {
        $this->assertIsArray($this->scholarship->requirements);
        $this->assertIsArray($this->scholarship->benefits);
    }

    /** @test */
    public function it_casts_deadline_as_datetime()
    {
        $this->assertInstanceOf(\Carbon\Carbon::class, $this->scholarship->deadline);
    }
} 