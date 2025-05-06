<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;
use Illuminate\View\View;
use Tests\TestCase;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateReturnsCorrectView()
    {
        // Gunakan unit test untuk method create
        $controller = new RegisteredUserController();
        $view = $controller->create();
        
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('auth.register', $view->getName());
    }

    public function testStoreCreatesNewUser()
    {
        Event::fake();
        
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        
        $response = $this->post(route('register'), $userData);
        
        // Verifikasi pengguna telah dibuat
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
        
        // Verifikasi event telah dipancarkan
        Event::assertDispatched(Registered::class);
        
        // Pengguna seharusnya sudah login
        $this->assertAuthenticated();
        
        // Seharusnya di-redirect ke dashboard
        $response->assertRedirect(route('dashboard'));
    }
    
    public function testValidationFailsWithInvalidData()
    {
        $response = $this->post(route('register'), [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);
        
        // Validasi gagal, kembali ke halaman dengan error
        $response->assertSessionHasErrors(['name', 'email', 'password']);
        
        // Tidak ada pengguna yang dibuat
        $this->assertDatabaseCount('users', 0);
    }
} 