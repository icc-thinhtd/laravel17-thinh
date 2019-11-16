<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function set()
    {
        Cookie::queue(Cookie::make('name', 'tran duc thinh', 1));
        Cookie::queue(Cookie::make('email', 'admin@gmail.com', 1));

        return response('hello')->cookie('giohang','123456',10);
    }
    public function get(Request $request)
    {
//        $val = $request->cookie('giohang');
//        $val1 = $request->cookie('name');
//        $val2 = $request->cookie('email');

        $val = Cookie::get('giohang');
        $val1 = Cookie::get('name');
        $val2 = Cookie::get('email');
        echo $val.' - '.$val1.' - '.$val2;
    }
}
