<?php
session_start();
if(empty($_SESSION['memberid']))
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=index.php'>";
	exit;
}
include_once("db.php");
mysql_select_db($DataBase) or die('error');
$query = "select * from member  where tid='$_SESSION[memberid]' " ;
$result = mysql_query($query);
$r = mysql_fetch_array($result);





$login=1;
?>
