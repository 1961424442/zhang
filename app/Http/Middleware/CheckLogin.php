<?php


namespace App\Http\Middleware;


use Closure;


class CheckLogin
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
        // dd($request->session()->get('uid'));
       //  if(!$request->session()->get('pid')){
       //  return redirect('/');
       // }
       $time=date('H');
        if ($time<9 || $time>22) {
            // 拒绝进入
            return \redirect('/goods/index');
        }
        return $next($request);
    }
}
