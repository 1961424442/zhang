<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CateController extends Controller
{

//添加页面
public function create()
{
    return view('cate/create');
}
}
