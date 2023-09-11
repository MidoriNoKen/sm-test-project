<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApproverAuthController extends Controller
{
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

        $approver = Approver::where('email', $validatedData['email'])->first();

        if (!$approver || !Hash::check($validatedData['password'], $approver->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect',
            ]);
        }

        $token = $approver->createToken('authToken')->plainTextToken;

        Auth::guard('approver')->login($approver);

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully.',
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('approver')->check()) {
            Auth::guard('approver')->user()->tokens()->delete();
        }

        return response()->json([
            "message" => "User logged out successfully."
        ], 200);
    }
}
