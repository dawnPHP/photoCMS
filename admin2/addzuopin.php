<?php
include_once("checksession.php");
include("header.html");
include_once("../db.php");
?>
<?php
$query="select * from zuopin";
$result=mysql_db_query($DataBase,$query);
$num=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>addSaiShi</title>
		<link rel="stylesheet" type="text/css" href="css/mine.css">
		<script src="editor/scripts/innovaeditor.js"></script>
	</head>
	<body>

	<div style="font-size: 13px;margin: 10px 5px">
            <form action="doaddzuopin.php" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <?php 
		$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
		$res = mysql_db_query($DataBase, $query); 
		$r8=mysql_fetch_array($res);
		if($r8[states] > 2 ){
			echo"不是超级管理员，不能操作";
			exit;
		}else{?>
 	
	
	<tr >
		<td >作品名称:</td>
		<td >
		<input type="text" name="biaoti" size="30"></td>
	</tr>
	<tr >
		<td >作者:</td>
		<td >
		<input type="text" name="writer" size="30"></td>
	</tr>
	<tr >
		<td >摄影时间:</td>
		<td >
		<input type="text" name="ptime" size="30"></td>
	</tr>
	<tr >
		<td >所属赛事:</td>
		<td >
			<SELECT   name="saishi_id">
			<?php
			$query = "select * from  saishi";
			$result = mysql_db_query($DataBase, $query);
			while ($r2 = mysql_fetch_array($result)) 
			{
			echo"<option value=$r2[tid]  >$r2[biaoti]</option>";
			}
			?> 
			 	</SELECT>
		 	</td>
		 </tr>
				  <tr >
		<td >所属组:</td>
		<td colspan="3" class=b>
			<SELECT   name="group_id">
			<?php
			$sql = "select * from  gqh_group";
			$res = mysql_db_query($DataBase, $sql);
			while ($re2 = mysql_fetch_array($res)) 
			{
			echo"<option value=$re2[tid]  >$re2[name]</option>";
			}
			?> 
			 	</SELECT>
		 	</td>
		 </tr>
				 <?php } ?>		
		<tr >
		<td >上传图片:</td>
		<td >
		<input type="file" name="upload_file1" size="30"></td>
	</tr>		
	<tr >
		<td >金额:</td>
		<td >
		<input type="text" name="amount" size="30"></td>
	</tr>
	<tr >
		<td >支付状态:</td>
		<td >
		<!-- <input type="text" name="payment_status" size="30"> -->
		<select name="payment_status" >
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
		</td>
	</tr>
	<tr >
		<td >作品说明</td>
		<td >
			<textarea id="txtContent" name="info" style="width:300px;hieght:500px;">
				
			</textarea>
			<script> 
				//STEP 2: Replace the textarea (txtContent)
				var oEdit1 = new InnovaEditor("oEdit1");
				oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
			</script>
		</td>
	</tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="添加作品">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
		