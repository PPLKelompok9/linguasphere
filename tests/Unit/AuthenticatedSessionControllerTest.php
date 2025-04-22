<?php

namespace Tests\Unit\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mockery;
use Tests\TestCase;

class AuthenticatedSessionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testCreate()
    {
        $controller = new AuthenticatedSessionController();
        $view = $controller->create();
        
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('auth.login', $view->getName());
    }

    public function testStore()
    {
        $request = Mockery::mock(LoginRequest::class);
        $request->shouldReceive('authenticate')->once();
        $request->shouldReceive('session->regenerate')->once();
        
        $controller = new AuthenticatedSessionController();
        $response = $controller->store($request);
        
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }

    public function testDestroy()
    {
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('session->invalidate')->once();
        $request->shouldReceive('session->regenerateToken')->once();
        
        // Mock Auth facade
        Auth::shouldReceive('guard')->with('web')->once()->andReturnSelf();
        Auth::shouldReceive('logout')->once();
        
        $controller = new AuthenticatedSessionController();
        $response = $controller->destroy($request);
        
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
}