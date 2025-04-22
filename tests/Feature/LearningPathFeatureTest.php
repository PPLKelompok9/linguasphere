<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Filament\Facades\Filament;
use Spatie\Permission\Models\Role;
use PHPUnit\Framework\Attributes\Test;

class LearningPathFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void{
        parent::setUp();
        Role::firstOrCreate(['name'=>'admin']);
    }

    private function createAdmin(): User
    {
        $user = User::create([
            'name' => 'Admin Linugasphere',
            'email' => 'adminlinguasphere@linguasphere.com',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('admin');
        return $user;
    }

    #[Test]
    public function learning_path_is_accessible_by_admin()
    {
        $user = $this->createAdmin();
        Filament::setCurrentPanel(Filament::getPanel('admin'));
        $this->actingAs($user);

        $response = $this->get('/admin/paths');
        $response->assertStatus(200);
    }

}
