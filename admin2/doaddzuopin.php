<?php
include("header.html");
include_once("checksession.php");


include_once("../db.php");

$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
//$result = mysql_db_query($DataBase, $query); 
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);
$r8 = mysql_fetch_array($result);
$tid = $r8['tid'];

/*
//echo $_SESSION[adminusername2];
//print_r($r8);

if($r8[states]!=1)
{
echo"不是超级管理员，不能操作";
exit;
}
*/

$biaoti=$_POST["biaoti"];
$writer = $_POST["writer"];
$ptime = $_POST["ptime"];
$saishi_id = $_POST["saishi_id"];
$group_id = $_POST["group_id"];
$dtime = date('Y-m-d H:i:s');
$ip= $_SERVER["REMOTE_ADDR"];
$amount = $_POST['amount'];
$payment_status = $_POST['payment_status'];
$info = $_POST["info"];


$file_name = $_FILES['upload_file1']['name'];
if($file_name!=""){
$ee=explode(".",$file_name);
$cc=count($ee)-1;
$type=strtolower($ee[$cc]);
}
if($type!='jpg' and $type!='gif' and $type!='jpeg' and $type!='png'){
echo "只能上传jpg或jpge或gif文件";
exit;
}
$size = $FILES['upload_file1']['size'];
if($size > 2097152){
	echo "<script>alert('附件大小不能大于2M，请重新输入！');history.go(-1);</script>";
	exit;
}
$dir="../zuopin_image/";
if($file_name!="") 
{
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file1']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里
}//one


$query="insert into zuopin (biaoti,writer,ptime,saishi_id,group_id,filename1,dtime,ip,amount,payment_status,info) values ('$biaoti','$writer','$ptime','$saishi_id','$group_id','$filename1','$dtime','$ip','$amount','$payment_status','$info')";
//echo $query;
//echo $group_id;
//$result = mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);
if($result){
	echo"添加作品成功！";			
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listzuopin.php'>";
}
?>
<?php include("bottom.html"); ?>