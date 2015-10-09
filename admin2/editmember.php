<?php

include("checksession.php");
include_once("../db.php");
$query = "select * from member where tid='$_GET[tid]'  ";
$result = mysql_db_query($DataBase, $query); 
$r=mysql_fetch_array($result);

/*
$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);
if($r8[states]!=1)
{
echo"不是超级管理员，不能操作";
exit;
}
*/
?>


<META http-equiv=Content-Type content=text/html;charset=utf-8>

<link href="./css/mine.css" type="text/css" rel="stylesheet">
 <div class="div_head">
            <span>
                <span style="float:left">当前位置是：会员管理->>修改会员信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="listmember.php">【返回】</a>
                </span>
            </span>
        </div>
 <div class="content">
            <form action="doeditmember.php?tid=<?php echo $r[tid];  ?>" method="post" enctype="multipart/form-data">
            <table style="font-size: 13px;" border="1" width="100%" class="table_a">
            
                <tr>
                    <td >会员ID:</td>
                    <td><input type="text" name="tid" value="<?php echo $r["tid"];  ?>" /></td>
                </tr>
                <tr>
                    <td >用户名:</td>
                    <td><input type="text" name="username" value="<?php echo $r["username"];  ?>" /></td>
                </tr>
                <tr>
                    <td >照片：</td>
                    <td>
                               <?php if($r[logo]!='') { echo "<a href=../player_image/$r[logo] target=_blank><img src=../player_image/$r[logo] width=50 border=0></a></br>"; }else{echo "no image</br>";}?>  
                    	       <input type="file" name="upload_file1" />
		    </td>
                </tr>
                 <tr>
                    <td >密码:</td>
                    <td><input type="text" name="password" value="<?php echo $r["password"];  ?>" /></td>
                </tr>
                 <tr>
                    <td >真实姓名：</td>
                    <td><input type="text" name="name" value="<?php echo $r["name"];  ?>" /></td>
                </tr>
                <tr>
                    <td >手机号码：</td>
                    <td><input type="text" name="mobile" value="<?php echo $r["mobile"];  ?>" /></td>
                </tr>
                 <tr>
                    <td>地址：</td>
                    <td><input type="text" name="address" value="<?php echo $r["address"];  ?>" /></td>
                </tr>
                <tr>
                    <td >邮箱：</td>
                    <td><input type="text" name="email" value="<?php echo $r["email"];  ?>" /></td>
                </tr>
		<tr>
                    <td >推荐人：</td>
                    <td><input type="text" name="tuijian" value="<?php echo $r["tuijian"];  ?>" /></td>
                </tr>
                <tr>
                    <td  colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
               




				
