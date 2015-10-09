<?php
include_once("checksession.php");
if(empty($_POST[name])){exit;}
if(empty($_POST[username])){exit;}
if($_POST[password]!=$_POST[password2] ){echo"密码不一致"; exit;}
include_once("../db.php");
if($_POST[username]!='')
{
$query = "select * from member where username='$_POST[username]' ";
$result = mysql_db_query($DataBase, $query); 
if($r2=mysql_fetch_array($result))
{
echo"<script>alert('该会员已经存在！');history.go(-1);</script>";
exit;
}
}

$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);
/*
if($r8[states] > 2 )
{
echo"不是超级管理员，不能操作";
exit;
}
*/


?>

<?php

/*上传照片*/
$actual_name = $_FILES['upload_file1']['name'];
if($actual_name!="") 
{
$ee=explode(".",$actual_name);
$cc=count($ee)-1;
$type=strtolower($ee[$cc]);
if($type!='jpg' and $type!='gif' and $type!='jpeg')
{
echo"只能上传jpg或jpge或gif文件";
exit;
}

$size=$_FILES['upload_file1']['size']; 

if($size>2097152)
{
echo"<script>alert('附件大小不能大于2M，请重新输入！');history.go(-1);</script>";
exit;
}
}// if one

$dir="../player_image/";

if($actual_name!="") 
{

$bb=rand(100000,999999);
$filename1=$tid."_one_".$bb.".".$type;

$tmp_name=$_FILES['upload_file1']['tmp_name'];
$dirname=$dir.$filename1;
move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里
}//one

/*结束*/



$ip = $_SERVER["REMOTE_ADDR"];
//date_default_timezone_set('PRC');
$dtime=date("Y-m-d H:i:s");

$manage_id = $r8[tid];

$query = "INSERT INTO member (username,name,password,mobile,email,address,ip,dtime,logo,tuijian) VALUES ('$_POST[username]','$_POST[name]','$_POST[password]','$_POST[mobile]','$_POST[email]','$_POST[address]','$ip','$dtime','$filename1','$_POST[tuijian]')";
//echo $query;exit;
$result = mysql_db_query($DataBase, $query);
if($result){
echo"会员添加成功！";
			
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listmember.php'>";
}else{
	
	//echo mysql_error();
}
?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>