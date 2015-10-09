<?php
//include("header.html");
include_once("checksession.php");


include_once("../db.php");
?>
<?php



if(!$_GET["tid"])
{
	echo "没有传入删除赛事ID，<p>";
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listorder.php'>";
	exit();
}
$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);
if($r8[states] > 2 ){
echo"不是超级管理员，不能操作";
exit;
}else{
$query="DELETE FROM orders WHERE `tid`=$_GET[tid]";
$sql = "delete from orders_zuopin where oid= $_GET[tid]";
$res = mysql_db_query($DataBase, $query);
$re = mysql_db_query($DataBase, $sql);



if($res&&$re){ 
	echo"订单删除成功！";
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listorder.php'>";
}
}
?>