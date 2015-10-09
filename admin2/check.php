<?php
session_start();
/*
if(empty($_SESSION[verifycode3]))
{
echo"验证码为空";
exit;
}
if($_SESSION[verifycode3]!=$_POST[inputcode])
{
echo"验证码不正确";
exit;
}
*/
include_once("../db.php");
$query = "select * from beian_manage where username='$_POST[username]' and password='$_POST[password]'  ";
$result = mysql_db_query($DataBase, $query); 
if($r= mysql_fetch_array($result))
{

 /*
if($r[states]!=2){

$result2 = mysql_query("select * from taobao_ip  where ip='".$_SERVER['REMOTE_ADDR']."' ");

if($r2=mysql_fetch_array($result2))
   {
   
   }else
   {
   echo"ip error";
   exit;
   }



}
*/



$_SESSION[adminusername2]=$r[username];
//$_SESSION[adminpassword]=$r[password];
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=main.php'>";
}else
{
echo"LOGIN ERROR";
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=index.php'>";
}
//unset($_SESSION[verifycode3]);
?>