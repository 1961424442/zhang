<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{

//注册页面
public function create()
{
    return view('login/create');
}

//注册处理页面
public function save(Request $request)
{
    $data =request()->except(['_token']);
    $res =DB::table('login')->insert($data);
    if ($res) {
        return redirect('login/add');
    }else{
        return error('注册失败','login/create');
    }
}

//登录展示页面
public function add()
{
    return view('login/add');
}

//登录处理页面
public function addres()
{
    $name =request()->name;
    // dd($name);
    $pwd =request()->pwd;
    $res =DB::table('login')->where('name',$name)->where('pwd',$pwd)->first();
    if ($res) {
        session(['id'=>$res->id]);
        return(['code'=>1]);
    }else{
        return(['code'=>2]);
    }
}
}
