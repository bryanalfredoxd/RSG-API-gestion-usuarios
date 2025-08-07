<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Obtiene el usuario a través del token JWT
            $user = JWTAuth::parseToken()->authenticate();

            // Verifica si el usuario existe y si su rol es 'admin'
            if ($user && $user->role == 'admin') {
                return $next($request);
            }
        } catch (\Exception $e) {
            // Si el token no es válido o no hay token, se manejará en el middleware de JWT
        }

        // Si el usuario no es admin o no está autenticado, devuelve un error 403
        return response()->json(['error' => 'Unauthorized. Admin access required.'], 403);
    }
}