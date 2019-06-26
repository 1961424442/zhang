<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GoodsController extends Controller
{

//商品添加页面
public function create()
{
    $redis = new \Redis();
    $redis -> connect('127.0.0.1','6379');
    $num = $redis -> get('num');
    echo $num."<br/>";
    return view('goods/create');
}

//商品添加处理页面
public function save(Request $request)
{
    $data = $request->except(['_token']);
    $data['goods_time']=time();
    //上传图片
    if($request->hasFile('goods_img')){
        $res = $this->upload($request,'goods_img');
        if($res['code']){
            $data['goods_img']=$res['imgurl']; 
        }
    }
     $res=DB::table('goods')->insert($data);
    if($res){
        return redirect('/goods/index');
    }else{
         return error('添加失败','/goods/create');
    }
}

//图片处理页面
public function upload(Request $request,$file)
{
    if($request->file($file)->isValid()){
        $photo = $request->file($file);
        $store_result = $photo->store(date('Ymd'));  
        return ['code'=>1,'imgurl'=>$store_result];
    }else{
        return ['code'=>0,'message'=>'上传过程出错'];
    }
}

//列表展示页面
public function index()
{
    $redis = new \Redis();
    $redis -> connect('127.0.0.1','6379');
    $redis -> incr('num');
    $query = \request()->all();
    $query =request()->all();
    $where =[];
    if($query['goods_name']??''){
        $where[] =['goods_name','like',"%$query[goods_name]%"];
    }
    if($query['goods_price']??''){
        $where['goods_price'] =$query['goods_price'];
    }
    $pageSize =config('app.pageSize');
    $data =Db::table('goods')->where($where)->paginate($pageSize);
    return view('/goods/index',['data'=>$data,'query'=>$query]);
}

//商品删除页面
public function del($goods_id)
{
    $data =DB::table('goods')->where('goods_id','=',$goods_id)->delete();
    if ($data) {
        return redirect('/goods/index');
    }
}

//修改展示页面
public function edit($goods_id)
{
    $data =DB::table('goods')->where(['goods_id'=>$goods_id])->first();
    return view('goods.edit',compact('data'));
}

//修改处理也缪按
public function update(Request $request)
{
    $data =$request->except(['_token']);
    $goods_id =$request->goods_id;
    $res =DB::table('goods')->where(['goods_id'=>$goods_id])->update($data);
    if($res){
        return redirect('/goods/index');
    }
}

}
