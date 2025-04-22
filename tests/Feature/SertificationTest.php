<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Agency;
use App\Models\Category;
use App\Models\Sertification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class SertificationTest extends TestCase
{
    use RefreshDatabase;

    protected $agency;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create base data for all tests
        $this->agency = Agency::factory()->create([
            'name' => 'ETS',
            'cover' => 'ets-cover.jpg',
            'description' => 'Educational Testing Service',
            'slug' => 'ets',
            'address' => 'Princeton, NJ',
            'contact' => '1234567890'
        ]);

        $this->category = Category::factory()->create([
            'name' => 'English',
            'slug' => 'english',
            'description' => 'English Language Tests',
            'icon' => 'language'
        ]);
    }

    #[Test]
    public function sertification_index_page_can_be_rendered()
    {
        // Arrange
        $sertification = Sertification::factory()->create([
            'name' => 'TOEFL iBT',
            'cover' => 'toefl-cover.jpg',
            'description' => 'Test of English as a Foreign Language',
            'slug' => 'toefl-ibt',
            'price' => 2000000,
            'level' => 'Intermediate',
            'id_agency' => $this->agency->id,
            'id_category' => $this->category->id
        ]);

        // Act
        $response = $this->get(route('sertifications.index'));

        // Assert
        $response->assertStatus(200)
                ->assertViewIs('Sertifications.index')
                ->assertSee('TOEFL iBT')
                ->assertSee('2.000.000')
                ->assertSee('Intermediate');
    }

    #[Test]
    public function search_functionality_works()
    {
        // Arrange
        $sertification1 = Sertification::factory()->create([
            'name' => 'TOEFL Test',
            'id_agency' => $this->agency->id,
            'id_category' => $this->category->id
        ]);

        $sertification2 = Sertification::factory()->create([
            'name' => 'IELTS Exam',
            'id_agency' => $this->agency->id,
            'id_category' => $this->category->id
        ]);

        // Act
        $response = $this->get(route('sertifications.index', ['search' => 'TOEFL']));

        // Assert
        $response->assertSuccessful()
                ->assertSee('TOEFL Test')
                ->assertDontSee('IELTS Exam');
    }

    #[Test]
    public function category_filter_works()
    {
        // Arrange
        $category2 = Category::factory()->create(['name' => 'Korean']);
        
        $sertification1 = Sertification::factory()->create([
            'name' => 'TOEFL Test',
            'id_agency' => $this->agency->id,
            'id_category' => $this->category->id
        ]);

        $sertification2 = Sertification::factory()->create([
            'name' => 'TOPIK Test',
            'id_agency' => $this->agency->id,
            'id_category' => $category2->id
        ]);

        // Act
        $response = $this->get(route('sertifications.index', ['category' => $this->category->id]));

        // Assert
        $response->assertSuccessful()
                ->assertSee('TOEFL Test')
                ->assertDontSee('TOPIK Test');
    }

    #[Test]
    public function show_sertification_details_page()
    {
        // Arrange
        $sertification = Sertification::factory()->create([
            'name' => 'TOEFL iBT',
            'description' => 'Test of English as a Foreign Language',
            'price' => 2000000,
            'level' => 'Intermediate',
            'id_agency' => $this->agency->id,
            'id_category' => $this->category->id
        ]);

        // Act
        $response = $this->get(route('sertifications.show', $sertification->slug));

        // Assert
        $response->assertSuccessful()
                ->assertViewIs('Sertifications.show')
                ->assertSee('TOEFL iBT')
                ->assertSee('Test of English as a Foreign Language')
                ->assertSee('Intermediate')
                ->assertSee('ETS');
    }
}