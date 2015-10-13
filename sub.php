<html>
<head><title>上传结果</title>
<meta charset="utf-8" />
</head>
<body>
<?php

include_once("db.php");
include('class/Dir.class.php');

session_start();
$writer=$_SESSION['membername'];
$memberid=$_SESSION['memberid'];
$group_id=$_POST['group_id'];
$saishi_id=$_POST['saishi_id'];
$biaoti=$_POST["biaoti"];
$dtime = date('Y-m-d H:i:s');
$ip= $_SERVER["REMOTE_ADDR"];
$info = $_POST["info"];
$file_name = $_FILES['pic']['name'];//可能是数组或变量

//存在文件就上传

for($i=0,$a=0,$b=0;$i<count($file_name);$i++){

	if(!empty($file_name[$i])){
		$b++;
		if(checkPic($i)){
			$a++;
		}
	}
       if(($i+1)==count($file_name)&$a==$b&$a!=0){
		upload();
       }
 /*      else{
	       echo '请选择图片'.$i;
	       echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=online_02.php'>";
       }
  */
}
//不存在文件
//echo '请选择图片';


//删除临时文件夹
$userID=5;
if(file_exists("images/usrTemp/$userID/")){
	Dir::delDirAndFiles("images/usrTemp/$userID/");
}

echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=online_03.php?tid=$new_orderid'>";

function checkPic($i){

	global $file_name;

	//检查图片类型
	if($file_name[$i]!=""){
	$ee=explode(".",$file_name[$i]);
	$cc=count($ee)-1;
	$type=strtolower($ee[$cc]);
	}else{
		echo '没有图片';
	}
	if($type!='jpg' and $type!='gif' and $type!='jpeg' and $type!='png'){
	//	echo "type:".$type;
		echo "只能上传jpg或jpge或gif文件";
		echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=online_02.php'>";
	exit;
	}
	//检查图片大小
	$size = $_FILES['pic']['size'][$i];

	if($size > 2097152){
		echo "<script>alert('附件大小不能大于2M，请重新输入！'+".$size.");history.go(-1);</script>";
		echo $size;
		exit;
	}
        return true;
 
}
function upload(){
	global $memberid;
	global $writer;
	global $group_id;
	global $saishi_id;
	global $biaoti;
        global $dtime;
        global $ip;
        global $info;
	global $file_name;
	global $DataBase;
        global $new_orderid;
	mysql_select_db($DataBase) or die('error');

        //向orders 插入一条数据
	//总价格
	//$amount_total=$_POST['amount'] + $_POST['amount2']  + $_POST['amount3'] + $_POST['amount4'];
	//mid不变//$dtime支付时间
	$mid=2;	
	$query3="insert into orders (mid,dtime,ip) values ('$mid','$dtime','$ip')";	
	$result3 = mysql_query($query3);
	$new_orderid=mysql_insert_id();//得到订单id
 	
	for($i=0;$i<count($file_name);$i++){
		//设置上传路径并上传
		$dir="zuopin_image/";
	//	echo $file_name[$i];
		if($file_name[$i]!="") 
		{
			//更新数据库
			$query="insert into zuopin (biaoti,filename1,info,ip,dtime,group_id,saishi_id,writer,mid,ptime) values ('$biaoti[$i]','$file_name[$i]','$info[$i]','$ip','$dtime','$group_id','$saishi_id','$writer','$memberid','0')";	
			$result = mysql_query($query);
			if($result){
				echo"添加作品成功！<br>";	
		                echo 	"<META HTTP-EQUIV=REFRESH CONTENT='1;URL=online_03.php?tid={$new_orderid}'>";		
			
			}
			$id=mysql_insert_id();//作品id

                        //向订单作品插入数据 关联订单id 和作品 id
                        //orders_zuopin表有tid，oid，zid三个字段，将作品id与订单id关联，订单id只有一个，作品id有1~4个
			$query1="insert into orders_zuopin (oid,zid) values ('$new_orderid','$id')";
			mysql_query($query1);
 
			//echo $id;
                        //上传图片
			$ee=explode(".",$file_name[$i]);
                  	$cc=count($ee)-1;
			$type=strtolower($ee[$cc]);

			$bb=rand(100000,999999);
			$filename[$i]=$id."_one_".$bb.".".$type;
			$tmp_name[$i]=$_FILES['pic']['tmp_name'][$i];
			$dirname[$i]=$dir.$filename[$i];

			move_uploaded_file($tmp_name[$i],$dirname[$i]); //把上传的照片存到 upload folder 里
                     	echo '标题：'.$biaoti[$i].'<br>';
                        
			$query2="update zuopin  set filename1='$filename[$i]' where tid='$id'";
			mysql_query($query2);
			
	     	}
	}
}
?>
</body>
</html>
