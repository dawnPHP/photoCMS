<?php


include("checksession.php");
include("header.html");
?>


<META http-equiv=Content-Type content=text/html;charset=utf-8>

<?php

include_once("../db.php");
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

$sql = "SELECT * FROM member WHERE tid = '$_GET[tid]';";
$result = mysql_db_query($DataBase, $sql);
$r2=mysql_fetch_array($result);
$oldPassword = $r2['password'];




 
//include("bottom.html"); 

$file_name = $_FILES['upload_file1']['name'];

if($file_name!=""){
$ee=explode(".",$file_name);
$cc=count($ee)-1;
$type=strtolower($ee[$cc]);
 
if($type!='jpg' and $type!='gif' and $type!='jpeg' and $type!='png'){
echo "只能上传jpg或jpge或gif文件";
exit;
}
$size = $FILES['upload_file1']['size'];
if($size > 2097152){
	echo "<script>alert('附件大小不能大于2M，请重新输入！');history.go(-1);</script>";
	exit;
}
$dir="../player_image/";
 
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file1']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里


/*结束*/

$sql= "update member set username='$_POST[username]',password='$_POST[password]',name='$_POST[name]',mobile='$_POST[mobile]',email='$_POST[email]',address='$_POST[address]',logo='$filename1',tuijian='$_POST[tuijian]' where tid='$_GET[tid]' ";

}else
{

$sql= "update member set username='$_POST[username]',password='$_POST[password]',name='$_POST[name]',mobile='$_POST[mobile]',email='$_POST[email]',address='$_POST[address]',tuijian='$_POST[tuijian]' where tid='$_GET[tid]' ";



}
/*$sql = "update saishi set biaoti='$biaoti',address='$address',info='$info',start_time='$start_time',end_time = '$end_time',guizhe='$guizhe',jiangxiang='$jiangxiang',zhuyi='$zhuyi',filename1='$filename1',tuijian='$_POST[tuijian]'  where tid = $tid";*/

$res=mysql_db_query($DataBase,$sql);
if ($res>0) 
{
	header("location:listmember.php");
}else{
	echo "未能成功添加";
}
 ?>
