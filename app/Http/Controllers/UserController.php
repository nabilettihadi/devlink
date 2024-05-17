<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $links = $user->links;
            $platforms = Platform::all();

            return view('users.index', compact('user', 'links', 'platforms'));
        } else {
            return redirect()->route('login');
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('links.index');
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('users.index')->with('success', 'Registration successful!');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('links.index');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/users');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
