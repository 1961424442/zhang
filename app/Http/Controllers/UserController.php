<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;
class UserController extends Controller
{

//添加展示页面
public function create()
{
    $redis =new \Redis;
    $redis->connect('127.0.0.1','6379');
    $num =$redis->get('num');
    echo $num."<br/>";
    return view('user/create');
}

//添加处理页面
public function save(Request $request)
{
    $data =$request->except(['_token']);
    $res =DB::table('user')->insert($data);
    // dd($res);
    if($res){
        return redirect('user/index');
    }else{
        return error('添加失败','user/create');
    }
}

//列表展示页面
public function index()
{
    $query =request()->all();
    $where =[];
    if($query['name']??''){
        $where[] =['name','like',"%$query[name]%"];
    }
    if($query['sex']??''){
        $where['sex'] =$query['sex'];
    }
    $pageSize =config('app.pageSize');
    $data =DB::table('user')->where($where)->paginate($pageSize);
    return view('/user/index',['data'=>$data,'query'=>$query]);
}

//删除处理页面
public function del($id)
{
    $res =DB::table('user')->where('id','=',$id)->delete();
    if($res){
        return redirect('/user/index');
    }
}

//修改页面
public function edit($id)
{
    $data =DB::table('user')->where(['id'=>$id])->first();
    return view('user.edit',compact('data'));
}

//修改处理页面
public function update(Request $request)
{
    $data =$request->except(['_token']);
    $id =$request->id;
    $res =DB::table('user')->where(['id'=>$id])->update($data);
    if($res){
        return redirect('/user/index');
    }
}

}
