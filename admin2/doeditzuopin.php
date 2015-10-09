<?php

include_once("checksession.php");


include_once("../db.php");
/*
$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);

//echo $_SESSION[adminusername2];
//print_r($r8);

if($r8[states]!=1)
{
echo"不是超级管理员，不能操作";
exit;
}
*/
$tid = $_GET["tid"];
$biaoti=$_POST["biaoti"];
$writer = $_POST["writer"];
$ptime = $_POST["ptime"];
$saishi_id = $_POST["saishi_id"];
$group_id = $_POST["group_id"];
$status = $_POST["status"];

$payment_status = $_POST["payment_status"];
$info = $_POST["info"];

/*上传照片*/
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
$dir="../zuopin_image/";
 
	$bb=rand(100000,999999);
	$filename1="_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file1']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里


/*结束*/

$query="update zuopin set biaoti='$biaoti',writer='$writer',ptime='$ptime',saishi_id='$saishi_id',group_id='$group_id',filename1 = '$filename1',status='$status',payment_status='$payment_status',info='$info' where tid='$tid'";

}else
{

$query="update zuopin set biaoti='$biaoti',writer='$writer',ptime='$ptime',saishi_id='$saishi_id',group_id='$group_id',status='$status',payment_status='$payment_status',info='$info' where tid='$tid'";



}
//echo $query;
$result = mysql_db_query($DataBase, $query);
if($result){
echo"修改作品成功！";
			
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listzuopin.php'>";
}
?>
<?php include("bottom.html"); ?>