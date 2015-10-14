<?php //doDeleteSingleImg.php
//引入数据库
include("db.php");
mysql_select_db($DataBase) or die('error');

$msgArr=array(0,'err');
//接受数据
$tid=isset($_POST['tid'])?$_POST['tid']:'';
$tid=substr($tid,2);
if($tid!=''){
	//1.获取图片名称
	$sql="select biaoti,filename1 from zuopin where tid='$tid'";
	$rows=mysql_query($sql) or die('Delete zuopin Erro: '.mysql_error());
	$row=mysql_fetch_assoc($rows);
	$biaoti=$row['biaoti'];
	$filename1=$row['filename1'];
	
	//2.同时从orders_zuopin和zuopin中删除该记录，
	$sql="delete from zuopin where tid='$tid'";
	mysql_query($sql) or die('Delete zuopin Erro: '.mysql_error());
	
	$sql2="delete from orders_zuopin where zid='$tid'";
	mysql_query($sql2) or die('Delete zuopin Erro: '.mysql_error());

	//3.从文件夹中删除图片，
	$file_name='zuopin_image/'.$filename1;
	//如果文件存在，则删除
	if(file_exists($file_name)){
		unlink($file_name);
	}else{
		$msgArr=array(0,"file($biaoti,$file_name) does not exist!");
	}
	
	//4.定义返回值
	$msgArr=array(1,"img($biaoti,$filename1) is deleted.");
}else{
	$msgArr=array(0,'$tid needed!');
}

echo json_encode($msgArr);