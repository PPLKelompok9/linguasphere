<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Agency; 
use App\Models\Course;
use App\Models\User;

class KursusTest extends TestCase
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
            'name' => 'Kampung Inggris Bandung',
            'slug' => 'kampunginggris',
            'cover' => 'kampunginggris.jpg',
            'description' => 'kampunginggrisbdg',
            'address' => 'Jl. Dago, Kota Bandung',
            'contact' => 'kampunginggris@example.com',
        ]);
    }

    #[Test]
    public function courseaccessiblebyadmin(){
       $user = $this->createAdmin();
       Filament::setCurrentPanel(Filament::getPanel('admin'));
       $this->actingAs($user);
       $response = $this->get('/admin/courses');
       $response->assertStatus(200);
    }

    #[Test]
    public function coursecreated()
    {
        $agency = $this->createAgency();

        $course = Course::create([
            'name' => 'Fundamental English',
            'slug' => 'fundamentalenglish',
            'cover' => 'default.jpg',
            'price' => 1000,
            'diskon_price' => 0,
            'level' => 'beginner',
            'description' => 'fundamental english',
            'id_agency' => $agency->id, 
            'id_category' => 1, 
        ]);

        $this->assertDatabaseHas('courses', [
            'name' => 'English for Beginners',
        ]);
    }
}
