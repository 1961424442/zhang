<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src='/js/jquery-3.3.1.js'></script>
</head>
<body>
    <form>
        <table border="1">
            <tr>
                <td>用户名称</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>用户密码</td>
                <td><input type="password" name="pwd" id="pwd"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button id="sub">【登录】</button>
                    <a href="/login/create">【注册】</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#sub").click(function(){
            var name=$("#name").val();
            var pwd =$("#pwd").val();
            $.post(
                "{{ route('address') }}",
                {name:name,pwd:pwd},
                function(data){
                    if (data.code==1) {
                        alert('登录成功');
                        location.href ="/login/create"
                    }else{
                        alert('登录失败');
                    }
                },
            );
            return false;
        });
    });
</script>