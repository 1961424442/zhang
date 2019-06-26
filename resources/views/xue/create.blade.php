<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>学生添加</h2>
    <form action="/xue/save" method="post">
    @csrf
        <table border="1">
            <tr>
                <td>姓名</td>
                <td><input type="text" name="xue_name"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <input type="radio" name="xue_sex" value="男">男
                    <input type="radio" name="xue_sex" value="女">女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="xue_age"></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="submit" value="提交"></td>
            </tr>
        
        </table>
    </form>
</body>
</html>