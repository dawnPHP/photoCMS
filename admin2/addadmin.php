<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="doaddadmin.php" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>管理员用户名:</td>
                    <td><input type=text name='username' size=50></td>
                </tr>
                <tr>
                    <td>登录密码:</td>
                    <td>
                       <input type=text name=password size=50>
                    </td>
                </tr>
                <tr>
                    <td>密码确认:</td>
                    <td>
                        <input type=text name=password2 size=50>
                    </td>
                </tr>
                <tr>
                    <td>手机号:</td>
                    <td><input type=text name=mobile size=50></td>
                </tr>
                <tr>
                    <td>所属单位(单位管理员才需要选择此项):</td>
                    <td><SELECT   name=danwei_id>
                    <?php
                      $query = "select * from  danwei    order by tid desc ";
                      $result = mysql_db_query($DataBase, $query); 
                                
                      while ($r2 = mysql_fetch_array($result)) 
                      {
                        if($r2[tid]==$_GET[tid])
                        {
                          echo"<option value=$r2[tid]  selected=\"selected\">".$r2[name]."</option>";
                        }else
                        {
                          echo"<option value='$r2[tid]' >".$r2[name]."</option>";
                        }
                      }
                                           
                    ?> 
                </SELECT></td>
                </tr>
                <tr>
                    <td>选择权限:</td>
                    <td>
                        <INPUT type=radio  value=1 
                  name=states>超级管理员
                  <INPUT type=radio CHECKED value=2 
                  name=states>  副超级管理员
          
                  <INPUT type=radio CHECKED value=3 
                  name=states>  单位管理员         
                  <br />
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