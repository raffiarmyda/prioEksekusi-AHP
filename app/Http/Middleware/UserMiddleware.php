<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() != 1){
            return redirect('/login');
        }
        $role = Auth::user()->role;
        if($role == 'Paket Admin Support IT & Service'){
            if($request->is('*datek*') || $request->is('*eksekusi*') || $request->is('*laporan*') || $request->is('*respondence*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }
        }else if($role == 'Paket Staff Support IT & Service'){
            if($request->is('*user*') || $request->is('*order*') || $request->is('*laporan*') || $request->is('*respondence*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }

        }
        else if($role == 'Paket Manager'){
            if($request->is('*user*') || $request->is('*order*') || $request->is('*datek*') || $request->is('*respondence*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }
        }
        else if($role == 'Expertise'){
            if($request->is('*user*') || $request->is('*order*') || $request->is('*datek*') || $request->is('*laporan*') || $request->is('*eksekusi*')){
                return redirect('/home')->with('danger', 'Anda Tidak Memiliki akses');
            }
        }
        else if($role == 'admin') {

        }

        return $next($request);
    }
}
