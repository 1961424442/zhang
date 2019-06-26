<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
    <title>Document</title>
</head>
<body>
<h2>商品展示</h2>
<form action="">
    <input type="text" name="goods_name" value="{{$query['goods_name']??''}}">
    <input type="text" name="goods_price" value="{{$query['goods_price']??''}}">
    <button>搜索</button>
</form>


    <form action="">
        <table border="1">
            <tr>
                <td>ID</td>
                <td>商品名称</td>
                <td>商品图片</td>
                <td>商品库存</td>
                <td>添加时间</td>
                <td>操作</td>
            </tr>
            @if($data)
            @foreach($data as $v)
            <tr>
               <td>{{$v->goods_id}}</td>
               <td>{{$v->goods_name}}</td>
               <td>
                    <img src="{{config('app.img_url')}}{{$v->goods_img}}" width="30">
               </td>
               <td>{{$v->goods_price}}</td>
               <td>{{date('Y-m-d H:i:s',$v->goods_time)}}</td>
               <td>
                    <a href="del\{{$v->goods_id}}">【删除】</a>
                    <a href="{{url('/goods/edit',['goods_id'=>$v->goods_id])}}">【修改】</a>
               </td>
            </tr>
            @endforeach
            @endif
        </table>
        {{$data->appends($query)->links()}}
    </form>
</body>
</html>