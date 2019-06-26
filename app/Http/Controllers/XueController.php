<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class XueController extends Controller
{

//添加
public function create()
{
    return view('xue/create');
}

//添加处理
public function save(Request $request)
{
    $data =$request->except(['_token']);
    $res =DB::table('xue')->insert($data);
    if ($res) {
        return redirect('xue/index');
    }else{
        return error('添加失败','xue/create');
    }
}

//展示
public function index()
{
    $query =request()->all();
    $where =[];
    if($query['xue_name']??''){
        $where[] =['xue_name','like',"%$query[xue_name]%"];
    }
    $pageSize =config('app.pageSize');
    $data =DB::table('xue')->where($where)->paginate($pageSize);
    return view('/xue/index',['data'=>$data,'query'=>$query]);
}

//删除
public function del($xue_id)
{
    $data =DB::table('xue')->where('xue_id','=',$xue_id)->delete();
    if ($data){
        return redirect('/xue/index');
    }
}

//修改页面
public function edit($xue_id)
{
    $data =DB::table('xue')->where(['xue_id'=>$xue_id])->first();
    return view('xue.edit',compact('data'));
}

//修改处理页面
public function update(Request $request)
{
    $data =$request->except(['_token']);
    $xue id =$request->xue_id;
    $res =DB::table('xue')->where(['xue_id'=>$xue_id])->update($data);
    if($res){
        return redirect('/xue/index');
    }
}
}
