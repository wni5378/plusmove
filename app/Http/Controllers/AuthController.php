<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function register(Request $request): array
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create($fields);

        $role = Role::findOrCreate('User', 'web');

        $user->givePermissionTo([
            'driver-assignments-list',
        ]);

        $user->assignRole([$role->id]);

        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    /**
     * @param Request $request
     * @return array|string[]
     */
    public function login(Request $request): array
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.',
            ];
        }

        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function logout(Request $request): array
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You have been logged out.',
        ];
    }
}
