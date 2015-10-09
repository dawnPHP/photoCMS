<?php
//include("header.html");
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
if($_POST["biaoti"]!='')
{
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


}
$query="insert into zuopin (biaoti,writer,ptime,saishi_id,group_id,filename1,dtime,ip,amount,payment_status,info) values ('$biaoti','$writer','$ptime','$saishi_id','$group_id','$filename1','$dtime','$ip','$amount','$payment_status','$info')";
//echo $query;
//echo $group_id;
//$result = mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);

$new_id=mysql_insert_id();







$amount_total=$_POST['amount'];


}


















if($_POST["biaoti2"]!='')
{
$biaoti=$_POST["biaoti2"];
$writer = $_POST["writer2"];
$ptime = $_POST["ptime2"];
$saishi_id = $_POST["saishi_id2"];
$group_id = $_POST["group_id2"];
$dtime = date('Y-m-d H:i:s');
$ip= $_SERVER["REMOTE_ADDR"];
$amount = $_POST['amount2'];
$payment_status = $_POST['payment_status'];
$info = $_POST["info2"];


$file_name = $_FILES['upload_file2']['name'];
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
if($file_name!="") 
{
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file2']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里
}//one

}
$query="insert into zuopin (biaoti,writer,ptime,saishi_id,group_id,filename1,dtime,ip,amount,payment_status,info) values ('$biaoti','$writer','$ptime','$saishi_id','$group_id','$filename1','$dtime','$ip','$amount','$payment_status','$info')";
//echo $query;
//echo $group_id;
//$result = mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);

$new_id2=mysql_insert_id();



}





if($_POST["biaoti3"]!='')
{
$biaoti=$_POST["biaoti3"];
$writer = $_POST["writer3"];
$ptime = $_POST["ptime3"];
$saishi_id = $_POST["saishi_id3"];
$group_id = $_POST["group_id3"];
$dtime = date('Y-m-d H:i:s');
$ip= $_SERVER["REMOTE_ADDR"];
$amount = $_POST['amount3'];
$payment_status = $_POST['payment_status'];
$info = $_POST["info3"];


$file_name = $_FILES['upload_file3']['name'];
if($file_name!=""){
$ee=explode(".",$file_name);
$cc=count($ee)-1;
$type=strtolower($ee[$cc]);

if($type!='jpg' and $type!='gif' and $type!='jpeg' and $type!='png'){
echo "只能上传jpg或jpge或gif文件";
exit;
}
$size = $FILES['upload_file3']['size'];
if($size > 2097152){
	echo "<script>alert('附件大小不能大于2M，请重新输入！');history.go(-1);</script>";
	exit;
}
$dir="../zuopin_image/";
if($file_name!="") 
{
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file3']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里
}//one

}
$query="insert into zuopin (biaoti,writer,ptime,saishi_id,group_id,filename1,dtime,ip,amount,payment_status,info) values ('$biaoti','$writer','$ptime','$saishi_id','$group_id','$filename1','$dtime','$ip','$amount','$payment_status','$info')";
//echo $query;
//echo $group_id;
//$result = mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);

$new_id3=mysql_insert_id();



}






if($_POST["biaoti4"]!='')
{
$biaoti=$_POST["biaoti4"];
$writer = $_POST["writer4"];
$ptime = $_POST["ptime4"];
$saishi_id = $_POST["saishi_id4"];
$group_id = $_POST["group_id4"];
$dtime = date('Y-m-d H:i:s');
$ip= $_SERVER["REMOTE_ADDR"];
$amount = $_POST['amount4'];
$payment_status = $_POST['payment_status'];
$info = $_POST["info4"];


$file_name = $_FILES['upload_file4']['name'];
if($file_name!=""){
$ee=explode(".",$file_name);
$cc=count($ee)-1;
$type=strtolower($ee[$cc]);

if($type!='jpg' and $type!='gif' and $type!='jpeg' and $type!='png'){
echo "只能上传jpg或jpge或gif文件";
exit;
}
$size = $FILES['upload_file4']['size'];
if($size > 2097152){
	echo "<script>alert('附件大小不能大于2M，请重新输入！');history.go(-1);</script>";
	exit;
}
$dir="../zuopin_image/";
if($file_name!="") 
{
	$bb=rand(100000,999999);
	$filename1=$tid."_one_".$bb.".".$type;
	$tmp_name=$_FILES['upload_file3']['tmp_name'];
	$dirname=$dir.$filename1;
	move_uploaded_file($tmp_name,$dirname); //把上传的照片存到 upload folder 里
}//one

}
$query="insert into zuopin (biaoti,writer,ptime,saishi_id,group_id,filename1,dtime,ip,amount,payment_status,info) values ('$biaoti','$writer','$ptime','$saishi_id','$group_id','$filename1','$dtime','$ip','$amount','$payment_status','$info')";
//echo $query;
//echo $group_id;
//$result = mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);

$new_id3=mysql_insert_id();//执行sql语句就返回id值



}



//向orders 插入一条数据
if($_POST["biaoti"]!=''  or $_POST["biaoti2"]!='' or $_POST["biaoti3"]!=''  or $_POST["biaoti4"]!='' )
{

$amount_total=$_POST['amount'] + $_POST['amount2']  + $_POST['amount3'] + $_POST['amount4'];
$mid=2;

$query="insert into orders (amount,mid,dtime,ip) values ('$amount_total','$mid','$dtime','$ip')";
 
$result = mysql_query($query);

$new_orderid=mysql_insert_id();

}



//向订单作品插入数据 关联订单id 和作品 id
if($_POST["biaoti"]!='')
{
$query="insert into orders_zuopin (oid,zid) values ('$new_orderid','$new_id')";
 
$result = mysql_query($query);
}

if($_POST["biaoti2"]!='')
{
$query="insert into orders_zuopin (oid,zid) values ('$new_orderid','$new_id2')";
 
$result = mysql_query($query);
}
if($_POST["biaoti3"]!='')
{
$query="insert into orders_zuopin (oid,zid) values ('$new_orderid','$new_id3')";
 
$result = mysql_query($query);
}
if($_POST["biaoti4"]!='')
{
$query="insert into orders_zuopin (oid,zid) values ('$new_orderid','$new_id4')";
 
$result = mysql_query($query);
}







if($result){
	echo"添加订单成功！";			
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listorder.php'>";
}
?>
<?php include("bottom.html"); ?>