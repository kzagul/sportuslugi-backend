<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Institution;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_moderator' => false,
            'verified_moderator' => false,
            'moderator_of' => null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }

    public function newUser(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_moderator' => false,
            'verified_moderator' => false,
            'moderator_of' => null,
        ]);

        event(new Registered($user));

        return response()->noContent();
    }

    public function newOrganization(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_moderator' => $request->is_moderator,
            'verified_moderator' => false,
            'moderator_of' => $request->moderator_of,
        ]);

        $role = Role::find(3);

        $user->roles()->attach($role);

        $contact_user_of_request = $request->contact_user_of;
        // $institution = Institution::find($contact_user_of_request);
        $institution = Institution::where('name', $contact_user_of_request);

        $institution->contactUsers()->attach($user);

        $user->contactUserOf()->attach($institution);

        event(new Registered($user));

        return response()->noContent();
    }
}
