<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Auth; 
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if(auth()->user()->active == 1){
            if(auth()->user()->type == 1){
                return $next($request);
            }
            Auth::logout();
            return redirect("/")->with("error","You don't have admin access.");
        }
        Auth::logout();
        return redirect("/")->with("error","You don't have active access.");
        
       
    }
}