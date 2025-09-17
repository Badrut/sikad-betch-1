<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        $roleId = Role::where('name', $request->role)->first()->id;

        if ($user->role_id === $roleId) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have permission to view this page.');
    }
}
