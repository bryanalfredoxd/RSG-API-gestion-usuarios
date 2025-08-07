<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Devuelve los datos del usuario autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        // Obtiene el usuario autenticado a través del token JWT
        $user = JWTAuth::parseToken()->authenticate();

        return response()->json($user);
    }

    /**
     * Devuelve una lista paginada de todos los usuarios.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Obtiene el número de usuarios por página desde la solicitud,
        // con un valor predeterminado de 15.
        $perPage = $request->get('limit', 15);

        // Paginación de todos los usuarios
        $users = User::paginate($perPage);

        return response()->json($users);
    }
}
