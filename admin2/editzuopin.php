<?php
include_once("checksession.php");
include("header.html");
include_once("../db.php");
?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/mine.css">
<?php

if(!$_GET["tid"])
{
	echo "传入id错误<p>";
	echo "点击<a href=listzuopin.php>这里</a>查看群组";
}
$tid=$_GET["tid"];
$query="SELECT * FROM zuopin WHERE tid=$tid";
//$result= mysql_db_query($DataBase, $query);
mysql_select_db($DataBase) or die('error');
$result = mysql_query($query);
$row=mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>addSaiShi</title>
		<script src="editor/scripts/innovaeditor.js"></script>
	</head>
	<body>

	<div style="font-size: 13px;margin: 10px 5px">
            <form action="doeditzuopin.php?tid=<?php echo $tid?>" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>作品名称</td>
                    <td><input type="text" name="biaoti" value="<?php echo $row['biaoti'] ?>" /></td>
                </tr>
          	<tr>
                    <td>作者:</td>
                    <td><input type="text" name="writer" value="<?php echo $row['writer'] ?>" /></td>
             </tr>
             <tr>
                    <td>摄影时间:</td>
                    <td><input type="text" name="ptime" value="<?php echo $row['ptime'] ?>" /></td>
             </tr>
                <tr>
                    <td >所属赛事:</td>
                    <td>
		<SELECT   name="saishi_id">
		<?php
		$query = "select * from  saishi";
		$result = mysql_db_query($DataBase, $query);
		while ($r2 = mysql_fetch_array($result)) 
		{
		echo"<option value=$r2[tid]  selected=\"selected\">$r2[biaoti]</option>";
		}
		?> 
		</SELECT>
            			</td>
             </tr>
             <tr>
                    <td>所属组:</td>
                    <td>
                    	<SELECT   name="group_id">
		<?php
		$sql = "select * from  gqh_group";
		$res = mysql_db_query($DataBase, $sql);
		while ($re2 = mysql_fetch_array($res)) 
		{
		echo"<option value=$re2[tid]  selected=\"selected\">$re2[name]</option>";
		}
		?> 
		 </SELECT>
		</td>
             </tr>
             <tr>
                      <td >照片:</td>
		<td ><input type="file" name="upload_file1"   size="40">
		<?php if($row['filename1']!='') { echo "<a href=../zuopin_image/$row[filename1] target=_blank><img src=../zuopin_image/$row[filename1] width=50 border=0></a>"; }else{echo "no image";}?>  
		</td>
             </tr>
             <tr>
                    <td >作品状态:</td>
		<td >
		<SELECT   name="status">
			<?php
			$sql = "select * from  zuopin";
			$res = mysql_db_query($DataBase, $sql);
			$re2 = mysql_fetch_array($res);
			
			switch($re2['status']){
		            case 1: 		
		                echo "<option value='1'>审核中</option>";
		                break;
		            case 2:
		             echo "<option value='2'>已送展</option>";
		               
		                break;
		            case 3:
		            echo "<option value='3'>未获奖</option>";
		               
		                break;
		            case 4:
		            echo "<option value='4'>送展中</option>";
		               
		                break;
		            case 5:
		             echo "<option value='5'>已获奖</option>";
		               
		                break;}

		         
		          		
		                echo "<option value='1'>审核中</option>";
		               
		             echo "<option value='2'>已送展</option>";
		               
		               
		            echo "<option value='3'>未获奖</option>";
		               
		               
		            echo "<option value='4'>送展中</option>";
		               
		              
		             echo "<option value='5'>已获奖</option>";
		               
		             


				?> 
		</SELECT>
		</td>
             </tr>
             <tr >
		<td >订单支付状态:</td>
		<td >
		<SELECT   name="payment_status">
			<option value="0">没成功支付</option>
			<option value="1">成功支付</option>
		</SELECT>
		</td>
	</tr>
	<tr >
		<td >作品说明</td>
		<td >
			<textarea id="txtContent" name="info"  style="width:300px;hieght:500px;">
				<?php echo $row['info']   ?>
			</textarea>
			<script> 
				//STEP 2: Replace the textarea (txtContent)
				var oEdit1 = new InnovaEditor("oEdit1");
				oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
			</script>
		</td>
	</tr>			
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="确认修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
		