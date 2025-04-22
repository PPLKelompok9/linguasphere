<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mockery;
use Tests\TestCase;

class EmailVerificationPromptControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testInvokeWhenEmailVerified()
    {
        // Buat mock untuk user
        $user = Mockery::mock(User::class);
        $user->shouldReceive('hasVerifiedEmail')
            ->once()
            ->andReturn(true);
        
        // Buat mock untuk request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('user')
            ->once()
            ->andReturn($user);
        
        // Panggil controller dan periksa response
        $controller = new EmailVerificationPromptController();
        $response = $controller->__invoke($request);
        
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }

    public function testInvokeWhenEmailNotVerified()
    {
        // Buat mock untuk user
        $user = Mockery::mock(User::class);
        $user->shouldReceive('hasVerifiedEmail')
            ->once()
            ->andReturn(false);
        
        // Buat mock untuk request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('user')
            ->once()
            ->andReturn($user);
        
        // Panggil controller dan periksa response
        $controller = new EmailVerificationPromptController();
        $response = $controller->__invoke($request);
        
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('auth.verify-email', $response->getName());
    }
} 