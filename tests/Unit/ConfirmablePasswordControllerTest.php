<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Tests\TestCase;

class ConfirmablePasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow()
    {
        $controller = new ConfirmablePasswordController();
        $view = $controller->show();
        
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('auth.confirm-password', $view->getName());
    }

    public function testStoreWithValidPassword()
    {
        // Buat user untuk pengujian
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);
        
        // Login sebagai user tersebut
        $this->actingAs($user);
        
        // Kirim request ke route konfirmasi password
        $response = $this->post(route('password.confirm'), [
            'password' => 'password',
        ]);
        
        // Pastikan session berisi konfirmasi password
        $this->assertTrue(session()->has('auth.password_confirmed_at'));
        
        // Verifikasi redirect
        $response->assertRedirect(route('dashboard'));
    }

    public function testStoreWithInvalidPassword()
    {
        // Buat user untuk pengujian
        $user = User::factory()->create([
            'password' => Hash::make('correct-password'),
        ]);
        
        // Login sebagai user tersebut
        $this->actingAs($user);
        
        // Kirim request dengan password yang salah
        $response = $this->post(route('password.confirm'), [
            'password' => 'wrong-password',
        ]);
        
        // Verifikasi response
        $response->assertSessionHasErrors('password');
        
        // Pastikan session tidak berisi konfirmasi password
        $this->assertFalse(session()->has('auth.password_confirmed_at'));
    }
} 