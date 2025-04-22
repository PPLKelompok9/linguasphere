<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PretestControllerTest extends TestCase
{
  use RefreshDatabase;

  protected $user;

  protected function setUp(): void
  {
    parent::setUp();

    $this->user = User::factory()->create();
  }

  #[\PHPUnit\Framework\Attributes\Test]
  public function it_can_show_pretest_index_page()
  {
    $courses = Course::factory()->count(3)->create();

    $response = $this->actingAs($this->user)
      ->get('/pretest');

    $response->assertStatus(200);
    $response->assertViewIs('pretest.main');
    $response->assertViewHas('courses');
  }

  #[\PHPUnit\Framework\Attributes\Test]
  public function it_can_show_specific_pretest_page()
  {
    $course = Course::factory()->create();

    $response = $this->actingAs($this->user)
      ->get('/pretest/' . $course->slug);

    $response->assertStatus(200);
    $response->assertViewIs('pretest.show');
    $response->assertViewHas('course');
  }

  #[\PHPUnit\Framework\Attributes\Test]
  public function it_returns_404_for_invalid_course_slug()
  {
    $response = $this->actingAs($this->user)
      ->get('/pretest/invalid-slug');

    $response->assertStatus(404);
  }
}