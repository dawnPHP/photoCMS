<?php
include("checksession.php");
include("header.html"); 
include_once("../db.php");


$query = "select * from beian_manage where tid='$_GET[tid]'  ";
$result = mysql_db_query($DataBase, $query); 
$r=mysql_fetch_array($result);

$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";

$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);

if($r8[states]!=1){
  echo"不是超级管理员，不能操作";
  exit;
}
?>


<META http-equiv=Content-Type content=text/html;charset=utf-8>
<link href="./css/mine.css" type="text/css" rel="stylesheet">

  
 <div style="font-size: 13px;margin: 10px 5px">
            <form action="doupdateadmin.php?tid=<?php echo $r[tid];  ?>" method="post" enctype="multipart/form-data">
            <table style="font-size: 13px" border="1" width="100%" class="table_a">
                <tr>
                    <td>管理员用户名:</td>
                    <td><input type="text" name="username"  value="<?php echo $r["username"];  ?>"/></td>
                </tr>
                <tr>
                    <td>登录密码:</td>
                    <td><input type="password" name="password" value="<?php echo $r["password"];  ?>" /></td>
                </tr>
                <tr>
                    <td>确认密码:</td>
                    <td><input type="password" name="password2" value="<?php echo $r["password"];  ?>" /></td>
                </tr>
                <tr>
                    <td>手机号:</td>
                    <td><input type="password" name="mobile" value="<?php echo $r["password"];  ?>" /></td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>


	
								
