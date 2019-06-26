<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品添加</title>

</head>
<body>
<h2>商品添加</h2>
<form action="{{url('goods/save')}}" method="post" enctype="multipart/form-data">
    @csrf
   <table border="1">
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name"></td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td> 
                <input type="file" name="goods_img" id="">
                <input type="submit" value="提交">
            </td>
        </tr>
        <tr>
            <td>库存</td>
            <td><input type="text" name="goods_price"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="添加"></td>
        </tr>
   </table>
</form>
</body>
</html>