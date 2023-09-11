<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;
use App\Models\VehicleStat;

class AdminAuthController extends Controller
{
    public function index()
    {
        // Ambil data yang diperlukan untuk halaman dashboard admin, seperti daftar pemesanan, statistik, atau informasi lainnya
        $reservations = Reservation::all();
        $vehicleStats = VehicleStat::all();

        // Render tampilan dashboard admin dan kirimkan data yang diperlukan ke tampilan
        return view('dashboard.admin', compact('reservations', 'vehicleStats'));
    }
    
    public function login(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'data' => $validatedData->errors()
            ], 400);
        }

        $validatedData = $validatedData->validated();

        $admin = Admin::where('email', $validatedData['email'])->first();

        if (!$admin || !Hash::check($validatedData['password'], $admin->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect',
            ]);
        }

        $token = $admin->createToken('authToken')->plainTextToken;

        Auth::guard('admin')->login($admin);

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully.',
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->user()->tokens()->delete();
        }

        return response()->json([
            "message" => "User logged out successfully."
        ], 200);
    }
}
