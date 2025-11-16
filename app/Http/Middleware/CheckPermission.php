<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            abort(401);
        }

        $controller = class_basename($request->route()->getController());
        $action = $request->route()->getActionMethod();

        if (!$user->hasAccess($controller, $action)) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
