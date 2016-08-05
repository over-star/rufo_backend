<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use DB;

class LogController extends Controller
{
    public function logs1(Request $request)
    {
        return view('logs.log1');
    }
    public function logs2(Request $request)
    {
        return view('logs.log2');
    }

}