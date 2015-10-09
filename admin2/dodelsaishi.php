<?php
include_once("checksession.php");
include_once("../db.php");

?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>

<?php



if(!$_GET["tid"])
{
	echo "没有传入删除赛事ID，<p>";
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listsaishi.php'>";
	exit();
}
$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);
if($r8[states] > 2 ){
echo"不是超级管理员，不能操作";
exit;
}else{
$query="DELETE FROM saishi WHERE `tid`=$_GET[tid]";
$res = mysql_db_query($DataBase, $query);




if($res){ 
	echo"赛事删除成功！";
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listsaishi.php'>";
}
}
?>
<?php include("bottom.html"); ?>