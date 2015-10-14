<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include_once("db.php");
mysql_select_db($DataBase) or die('error');
$query = "select * from member  where  ( mobile='$_POST[username]' or email='$_POST[username]'  ) and password='$_POST[password]'   " ;
$result = mysql_query($query);
if($r = mysql_fetch_array($result))
{
/*
$y2k = time()+3600*24; 
setcookie("memberusername", md5($r[password]),$y2k); 
setcookie("memberid", $r[tid],$y2k);
*/
/*
$nowtime=time();
$sql = "update product_member    set  logintime='$nowtime'     where tid='$r[tid]' ";
$rr = mysql_db_query($DataBase, $sql);
*/


$_SESSION['memberid']=$r['tid'];
$_SESSION['membername']=$r['name'];
//echo $_SESSION[memberid] ;
//echo "aaaa";
//exit;
echo"login success！";
$uu="$_SERVER[HTTP_REFERER]"; 
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=index.php'>";

}else
{
echo"<script>alert('login error！');history.go(-1);</script>";
}
?>































