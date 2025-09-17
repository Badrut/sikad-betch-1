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
        $role = Role::where('id', $user->role_id)->first();
        if (!$role) {
            return redirect('/login')->with('error', 'Role not found.');
        }

        if ($user->role_id === $role->id) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'You do not have permission to view this page.');
    }
}
