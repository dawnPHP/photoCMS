<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="doaddmember.php" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>用户名（昵称）:</td>
                    <td><input type=text name=username size=50></td>
                </tr>
                <tr>
                    <td>真实姓名:</td>
                    <td>
                        <input type=text name=name size=50>
                    </td>
                </tr>
                <tr>
                    <td>照片:</td>
                    <td>
                        <input type="file" name="upload_file1" size="40">
                    </td>
                </tr>
                <tr>
                    <td>密码:</td>
                    <td><input type=password name=password size=50></td>
                </tr>
                <tr>
                    <td>确认密码:</td>
                    <td><input type=password name=password2 size=50></td>
                </tr>
                <tr>
                    <td>手机号码:</td>
                    <td>
                        <input type=text name=mobile size=50>
                    </td>   
                </tr>
                <tr>
                    <td>地址:</td>
                    <td>
                        <input type=text name=address size=50>
                    </td>
                </tr>
                <tr>
                    <td>邮箱:</td>
                    <td>
                        <input type=text name=email size=50>
                    </td>
                </tr>
                <tr>
                    <td>推荐人:</td>
                    <td>
                        <input type=text name=tuijian size=50>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type='submit' value='提交'>
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>