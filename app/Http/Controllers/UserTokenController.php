<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'deviced_name' => 'required'
        ]);

        $user =User::where('email', $request->get('email')->first());

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['El email no existe o no coincide con nuestros datos.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken()
        ]);
    }
}
