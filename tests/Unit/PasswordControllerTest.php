<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\PasswordController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Mockery;
use Tests\TestCase;

class PasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testUpdate()
    {
        $validatedData = [
            'current_password' => 'current-password',
            'password' => 'new-password',
        ];
        
        // Mock user
        $user = Mockery::mock(User::class);
        $user->shouldReceive('update')
            ->once()
            ->with([
                'password' => 'hashed-password',
            ]);
        
        // Mock request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('validateWithBag')
            ->once()
            ->andReturn($validatedData);
        
        $request->shouldReceive('user')
            ->once()
            ->andReturn($user);
        
        // Mock Hash facade
        Hash::shouldReceive('make')
            ->once()
            ->with($validatedData['password'])
            ->andReturn('hashed-password');
        
        // Mock untuk back()
        $redirectResponse = Mockery::mock(RedirectResponse::class);
        $redirectResponse->shouldReceive('with')
            ->once()
            ->with('status', 'password-updated')
            ->andReturn($redirectResponse);
        
        Redirect::shouldReceive('back')
            ->once()
            ->andReturn($redirectResponse);
            
        // Jalankan controller
        $controller = new PasswordController();
        $response = $controller->update($request);
        
        // Periksa hasil
        $this->assertSame($redirectResponse, $response);
    }
} 