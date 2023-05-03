<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
  private $cus;
  public function __construct()
  {
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $quard = 'cus'): Response
  {
    if (!Auth::guard($quard)->check()) {
      return redirect()->route('home.login')->with('error', 'Bạn cần phải đăng nhập');
    } 
    // elseif (Auth::guard('cus')->user()->status == 0) {
    //   return redirect()->route('login')->with('error');
    // }
    return $next($request);
  }
}
