<?php 
include_once("checksession.php");
include_once("../db.php");
if(empty($_POST["biaoti"])){exit;}
if(empty($_POST["address"])){exit;}
if(empty($_POST["info"])){exit;}
$tid = $_POST["tid"];
$biaoti = $_POST['biaoti'];
$address = $_POST["address"];
$info = $_POST["info"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$guizhe = $_POST["guizhe"];
$jiangxiang = $_POST["jiangxiang"];
$zhuyi = $_POST["zhuyi"];

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
$dir="../saishi_image/";
 
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file1']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里


/*结束*/

$sql="update saishi set biaoti='$biaoti',address='$address',info='$info',start_time='$start_time',end_time = '$end_time',guizhe='$guizhe',jiangxiang='$jiangxiang',zhuyi='$zhuyi',filename1='$filename1' where tid = $tid";



//echo $sql;
}else
{

$sql="update saishi set biaoti='$biaoti',address='$address',info='$info',start_time='$start_time',end_time = '$end_time',guizhe='$guizhe',jiangxiang='$jiangxiang',zhuyi='$zhuyi' where tid = $tid";



}
/*$sql = "update saishi set biaoti='$biaoti',address='$address',info='$info',start_time='$start_time',end_time = '$end_time',guizhe='$guizhe',jiangxiang='$jiangxiang',zhuyi='$zhuyi',filename1='$filename1' where tid = $tid";*/

$res=mysql_db_query($DataBase,$sql);
if ($res>0) 
{
	header("location:listsaishi.php");
}else{
	echo "未能成功添加";
}
 ?>