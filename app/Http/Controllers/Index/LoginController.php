<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

//前台登录页面
public function login()
{
    return view('/index/login/login');
}

//前台注册页面
public function loginAdd()
{
    return view('/index/login/loginAdd');
}
}
