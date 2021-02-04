<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds = ['admin' => 'admin', 'lect' => 'lecturer', 'invig' => 'invig', 'stud' => 'student'];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if(Auth::check()) {
          if(in_array(Auth::user()->usertype, $allowedRoleIds)) {
            return $next($request);
          }
        }

        return redirect('/');

    }
}
