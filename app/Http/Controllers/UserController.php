<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Frontend.index');
    }

    public function registerUser(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role ?? 'user',
        ]);


        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Successfully login');
            }
            if ($user->role === 'user') {
                return redirect()->route('Home')->with('success', 'Successfully login');
            }
            if ($user->role === 'parent') {
                return redirect()->route('parent.dashboard')->with('success', 'Successfully login');
            }
        }

        return redirect()->route('register.form')->with('error', 'Something went wrong please register again');

    }

    public function loginUser(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Successfully login');
            }
            if ($user->role === 'user') {
                return redirect()->route('Home')->with('success', 'Successfully login');
            }
            if ($user->role === 'parent') {
                return redirect()->route('parent.dashboard')->with('success', 'Successfully login');
            }

            return redirect()->route('login.form')->with('error', 'Invalid credentials.')->withInput();
        }




        return redirect()->route('login.form')->with('error', 'Invalid credentials.');

    }

    public function logoutuser()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'You have been logged out.');
    }

    public function showRegister()
    {
        return view('Frontend.register');
    }
    public function showLogin()
    {
        return view('Frontend.login');
    }
    public function showAbout()
    {
        return view('Frontend.about');
    }
    public function showAdmin()
    {
        return view('Admin.dashboard');
    }
}
