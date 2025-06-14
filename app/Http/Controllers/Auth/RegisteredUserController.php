<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   */
  public function create(): View
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
      'photo' => 'nullable|image|max:2048',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    if ($request->hasFile('photo')) {
      $file = $request->file('photo');
      $filename = uniqid() . '.' . $file->getClientOriginalExtension();

      $file->storeAs('', $filename, 'public');

      $supabaseUrl = env('SUPABASE_URL');
      $bucket = env('SUPABASE_BUCKET');
      $photoUrl = "{$supabaseUrl}/storage/v1/object/public/{$bucket}/{$filename}";

      $user->photo = $photoUrl;
      $user->save();

      app(\App\Services\SupabaseService::class)->uploadImage($file, $filename);
    }

    $user->assignRole('user');

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('dashboard.user', absolute: false));
  }
}
