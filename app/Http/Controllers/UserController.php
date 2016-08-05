<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use DB;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function home(Request $request)
    {
        $user = $request->user();
        echo $user['name'].'登录成功！';
    }

}