<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Course;
use App\Models\Scholarship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ScholarshipControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $user;
    private $scholarship;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user
        $this->user = User::factory()->create(['role' => 'student']);

        // Create a course
        $course = Course::factory()->create();

        // Create a scholarship
        $this->scholarship = Scholarship::create([
            'title' => 'Test Scholarship',
            'description' => 'Test Description',
            'requirements' => ['requirement1', 'requirement2'],
            'benefits' => ['benefit1', 'benefit2'],
            'course_id' => $course->id,
            'slots_available' => 10,
            'deadline' => now()->addMonth(),
            'status' => 'open'
        ]);
    }

    /** @test */
    public function guest_cannot_view_scholarships()
    {
        $response = $this->get(route('scholarships.index'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_view_scholarships()
    {
        $response = $this->actingAs($this->user)
            ->get(route('scholarships.index'));

        $response->assertStatus(200);
        $response->assertViewIs('scholarships.index');
        $response->assertViewHas('scholarships');
    }

    /** @test */
    public function user_can_view_scholarship_details()
    {
        $response = $this->actingAs($this->user)
            ->get(route('scholarships.show', $this->scholarship));

        $response->assertStatus(200);
        $response->assertViewIs('scholarships.show');
        $response->assertViewHas('scholarship');
        $response->assertSee($this->scholarship->title);
    }

    /** @test */
    public function user_can_apply_for_scholarship()
    {
        Storage::fake('public');

        $response = $this->actingAs($this->user)
            ->post(route('scholarships.apply', $this->scholarship), [
                'motivation_letter' => $this->faker->paragraph(3),
                'cv' => UploadedFile::fake()->create('cv.pdf', 100)
            ]);

        $response->assertRedirect(route('scholarships.show', $this->scholarship));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('scholarship_applications', [
            'scholarship_id' => $this->scholarship->id,
            'user_id' => $this->user->id,
            'status' => 'pending'
        ]);
    }

    /** @test */
    public function user_cannot_apply_for_closed_scholarship()
    {
        $this->scholarship->update(['status' => 'closed']);

        $response = $this->actingAs($this->user)
            ->post(route('scholarships.apply', $this->scholarship), [
                'motivation_letter' => $this->faker->paragraph(3),
                'cv' => UploadedFile::fake()->create('cv.pdf', 100)
            ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function user_cannot_apply_with_invalid_data()
    {
        $response = $this->actingAs($this->user)
            ->post(route('scholarships.apply', $this->scholarship), [
                'motivation_letter' => 'too short', // Less than 100 characters
                'cv' => UploadedFile::fake()->create('cv.txt', 100) // Wrong file type
            ]);

        $response->assertSessionHasErrors(['motivation_letter', 'cv']);
    }

    /** @test */
    public function user_cannot_apply_multiple_times()
    {
        // First application
        $this->actingAs($this->user)
            ->post(route('scholarships.apply', $this->scholarship), [
                'motivation_letter' => $this->faker->paragraph(3),
                'cv' => UploadedFile::fake()->create('cv.pdf', 100)
            ]);

        // Second application
        $response = $this->actingAs($this->user)
            ->post(route('scholarships.apply', $this->scholarship), [
                'motivation_letter' => $this->faker->paragraph(3),
                'cv' => UploadedFile::fake()->create('cv.pdf', 100)
            ]);

        $response->assertStatus(403);

        $this->assertEquals(1, $this->scholarship->applications()->where('user_id', $this->user->id)->count());
    }
} 