<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;
use App\Models\Approver;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password', 'user_type');
        $userType = $request->input('user_type');

        // Lakukan auth berdasarkan tipe pengguna
        if ($userType === 'admin') {
            $model = Admin::class;
        } elseif ($userType === 'approver') {
            $model = Approver::class;
        } else {
            return back()->withErrors(['email' => 'Invalid user type.']);
        }

        if (Auth::guard($userType)->attempt($credentials)) {
            // Pengguna berhasil masuk
            return redirect()->route($userType . '.dashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
