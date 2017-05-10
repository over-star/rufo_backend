<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Models\User;
use Auth;
class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }
        //判断有没有view-backend权限
        if($this->auth->user()->id!=1){
            $id=Auth::user();
            $user = User::where('id', '=', $id->id)->first();
            $is_ok=$user->can('view-backend');
            if(!$is_ok){
                Auth::logout();
                return redirect()->guest('auth/login')->withErrors('你好像没有登陆权限');//跳转到登陆界面
            }
            //判断当前url是否有权限保护
            $uri=$request->path();
            $can_view=Permission::where('name',$uri)->first();
            if($can_view){
                $ok=$user->can($uri);
                if(!$ok){
                    Auth::logout();
                    return redirect('auth/login')->withErrors('你没有权限');//跳转到登陆界面
                }
            }
        }
        return $next($request);
    }
}
