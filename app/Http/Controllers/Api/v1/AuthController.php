<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($credentials)) {
            return response()->json(['success' => false, 'error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $authToken = $user->createToken('authToken')->plainTextToken;


        return response()->json([
            'success' => true,
            'data' => [
                'email' => $user->email,
                'access_token' => $authToken,
                'token_type' => 'Bearer'
                ]
            ],
            Response::HTTP_OK);

    }

    public function logout(Request $request) {

        $request->user()->tokens()->delete();
        return response()->json(['success' => true], Response::HTTP_OK);
    }
}
