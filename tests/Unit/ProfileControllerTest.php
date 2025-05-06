<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfileUpdateRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Mockery;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testEdit()
    {
        $user = Mockery::mock(User::class);
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('user')->once()->andReturn($user);

        $controller = new ProfileController();
        
        $view = $controller->edit($request);
        
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('profile.edit', $view->getName());
        $this->assertArrayHasKey('user', $view->getData());
        $this->assertSame($user, $view->getData()['user']);
    }

    public function testUpdate()
    {
        $user = Mockery::mock(User::class);
        $user->shouldReceive('fill')->once()->andReturnSelf();
        $user->shouldReceive('isDirty')->with('email')->once()->andReturn(true);
        $user->shouldReceive('save')->once();
        
        $user->shouldReceive('setAttribute')->with('email_verified_at', null);
        
        $request = Mockery::mock(ProfileUpdateRequest::class);
        $request->shouldReceive('validated')->once()->andReturn(['email' => 'test@example.com']);
        $request->shouldReceive('user')->times(4)->andReturn($user);
        
        Redirect::shouldReceive('route')->with('profile.edit')->once()->andReturnSelf();
        Redirect::shouldReceive('with')->with('status', 'profile-updated')->once()->andReturn(new RedirectResponse('/profile'));
        
        $controller = new ProfileController();
        $response = $controller->update($request);
        
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }

    public function testDestroy()
    {
        $user = Mockery::mock(User::class);
        $user->shouldReceive('delete')->once();
        
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('validateWithBag')->once()->with('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        
        $request->shouldReceive('user')->once()->andReturn($user);
        
        $session = Mockery::mock();
        $session->shouldReceive('invalidate')->once()->andReturnSelf();
        $session->shouldReceive('regenerateToken')->once()->andReturnSelf();
        $request->shouldReceive('session')->twice()->andReturn($session);
        
        Auth::shouldReceive('logout')->once();
        
        Redirect::shouldReceive('to')->with('/')->once()->andReturn(new RedirectResponse('/'));
        
        $controller = new ProfileController();
        $response = $controller->destroy($request);
        
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
} 