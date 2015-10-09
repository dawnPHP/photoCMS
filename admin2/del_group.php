<?php
include_once("checksession.php");
include("header.html");
?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>

<?php

if(!$_GET["tid"])
{
	echo "没有传入删除组ID，<p>";
	echo "<a href='list_group.php'>查看群组</>";
}
else
{
	include_once("../db.php");
	$tid=$_GET["tid"];
	$query="DELETE FROM gqh_group WHERE `tid`=$tid";
	$result=mysql_db_query($DataBase, $query);
	if($result)
	{
		echo"赛事组删除成功！";
		echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=list_group.php'>";
	}
}
?>
<?php include("bottom.html"); ?>