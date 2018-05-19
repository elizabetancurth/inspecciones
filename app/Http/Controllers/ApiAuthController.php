<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ApiAuthController extends Controller
{
    public function UserAuth(Request $request)
    {
        $credenciales = $request->only('email', 'password');
        $token = null;

        try
        {
            if( ! $token = JWTAuth::attempt($credenciales))
            {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }

        }
        catch(JWTException $ex)
        {
            return response()->json(['error' => 'Error en autenticación'], 500);
        }

        return response()->json(compact('token'));
    }
}
