<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品添加</title>

</head>
<body>
<h2>商品修改</h2>
<form action="{{url('goods/update')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="goods_id" value="{{$data->goods_id}}">
    @csrf
   <table border="1">
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name" value="{{$data->goods_name}}"></td>
        </tr>
       
        <tr>
            <td>库存</td>
            <td><input type="text" name="goods_price" value="{{$data->goods_price}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="添加"></td>
        </tr>
   </table>
</form>
</body>
</html>