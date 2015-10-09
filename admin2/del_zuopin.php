<?php
include_once("checksession.php");
include("header.html");
?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>

<?php

if(!$_GET["tid"])
{
	echo "没有传入删除群组ID，<p>";
	echo "<a href='list_group.php'>查看群组</>";
}
else
{
	include_once("../db.php");
	$tid=$_GET["tid"];
	echo $tid;
	$query="DELETE FROM zuopin WHERE tid='$tid'";
	$result=mysql_db_query($DataBase, $query);
	if($result)
	{
		echo"删除成功！";
		echo header("location:listzuopin.php");
	}
}
?>
<?php include("bottom.html"); ?>