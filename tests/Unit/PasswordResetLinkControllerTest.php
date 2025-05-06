<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Mockery;
use Tests\TestCase;

class PasswordResetLinkControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testCreate()
    {
        $controller = new PasswordResetLinkController();
        $view = $controller->create();
        
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('auth.forgot-password', $view->getName());
    }

    public function testStoreResetLinkSent()
    {
        $email = 'test@example.com';
        
        // Mock request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('validate')
            ->once()
            ->with([
                'email' => ['required', 'email'],
            ]);
        $request->shouldReceive('only')
            ->with('email')
            ->andReturn(['email' => $email]);
        
        // Mock Password facade
        Password::shouldReceive('sendResetLink')
            ->once()
            ->with(['email' => $email])
            ->andReturn(Password::RESET_LINK_SENT);
        
        // Mock untuk back()
        $redirectResponse = Mockery::mock(RedirectResponse::class);
        $redirectResponse->shouldReceive('with')
            ->once()
            ->with('status', \Mockery::any())
            ->andReturn($redirectResponse);
        
        Redirect::shouldReceive('back')
            ->once()
            ->andReturn($redirectResponse);
        
        // Jalankan controller
        $controller = new PasswordResetLinkController();
        $response = $controller->store($request);
        
        // Verifikasi response
        $this->assertSame($redirectResponse, $response);
    }

    public function testStoreResetLinkFailed()
    {
        $email = 'test@example.com';
        $status = Password::INVALID_USER;
        
        // Mock request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('validate')
            ->once()
            ->with([
                'email' => ['required', 'email'],
            ]);
        $request->shouldReceive('only')
            ->with('email')
            ->andReturn(['email' => $email]);
        
        // Mock Password facade
        Password::shouldReceive('sendResetLink')
            ->once()
            ->with(['email' => $email])
            ->andReturn($status);
        
        // Mock untuk back() with errors
        $redirectResponse = Mockery::mock(RedirectResponse::class);
        
        $redirectResponse->shouldReceive('withInput')
            ->once()
            ->with(['email' => $email])
            ->andReturnSelf();
            
        $redirectResponse->shouldReceive('withErrors')
            ->once()
            ->withArgs(function($errors) use ($status) {
                return is_array($errors) && 
                       array_key_exists('email', $errors) &&
                       !empty($errors['email']);
            })
            ->andReturnSelf();
        
        Redirect::shouldReceive('back')
            ->once()
            ->andReturn($redirectResponse);
        
        // Jalankan controller
        $controller = new PasswordResetLinkController();
        $response = $controller->store($request);
        
        // Verifikasi response
        $this->assertSame($redirectResponse, $response);
    }
} 