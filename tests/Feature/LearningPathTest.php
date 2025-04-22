<?php
namespace Tests\Feature;

use App\Models\Agency; 
use App\Models\Path;
use App\Models\Course;
use App\Models\PathDetail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Filament\Facades\Filament;
use Spatie\Permission\Models\Role;
use PHPUnit\Framework\Attributes\Test;


class LearningPathTest extends TestCase
{
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

    private function createAgency(): Agency{
        return Agency::create([
            'name' => 'English Bandung',
            'slug' => 'english-bdg',
            'cover' => 'agency-default-cover.jpg',
            'description' => 'This is a default description for the agency',
            'address' => 'Jl. Soekarno-Hatta, Bandung',
            'contact' => 'contact@example.com',
        ]);
    }

    #[Test]
    public function learningpathaccessiblebyadmin(){
       $user = $this->createAdmin();
       Filament::setCurrentPanel(Filament::getPanel('admin'));
       $this->actingAs($user);
       $response = $this->get('/admin/paths');
       $response->assertStatus(200);
    }

    #[Test]
    public function learningpathcreated()
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
    public function learningpathhavemultiplecourses()
    {
        
        $path = Path::create([
            'name' => 'Advanced English Path',
            'description' => 'Advanced level English learning path.',
        ]);

        $agency = $this->createAgency();

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

    #[Test]
    public function pathdetailcasaccessrelatedcourses()
    {
        
        $agency = $this->createAgency();
    
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
