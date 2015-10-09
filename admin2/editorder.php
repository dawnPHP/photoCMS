<?php
//include("header.html");
include_once("checksession.php");


include_once("../db.php");
?>
<?php



if(!$_GET["tid"])
{
	echo "没有传入删除赛事ID，<p>";
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listorder.php'>";
	exit();
}
$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
$result = mysql_db_query($DataBase, $query); 
$r8=mysql_fetch_array($result);
if($r8[states] > 2 ){
echo"不是超级管理员，不能操作";
exit;
}else{
	$id = $_GET["tid"];
	$sql = "select * from orders where tid =$id";
	$res = mysql_db_query($DataBase, $sql);
	$row = mysql_fetch_assoc($res);
	//print_r($row);
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href="./css/mine.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<form action="doeditorder.php" method="post" accept-charset="utf-8">
		

		   <table style="font-size: 13px;" class="table_a" border="1" width="100%">
            			<input type="hidden" name="id" value=<?php echo $id ?>>
	                        <tr>
				<td>总价格</td>
	                        		<td><input type="text" name="amount" value=<?php echo $row["amount"] ?>></td>
	                        </tr>
	                         <tr>
	                         		<td>支付状态</td>
	                        		<td>
	                        			<select name="payment_status"  >
	                        				<?php 
	                        					$num = $row["payment_status"];
	                        					switch ($num) {
	                        						case 1:
		                        						echo "<option value = '1'>以支付</option>";
		                        						echo "<option value = '0'>未支付</option>";
	                        						break;
	                        						case 0:
	                        							echo "<option value = '0'>未支付</option>";
	                        							echo "<option value = '1'>以支付</option>";
	                        						break;
	                        					}
	                        				 ?>
	                        			</select>
	                        		</td>
	                        </tr>
	                        <tr>
	                        		<td>
	                        			<input type="submit"  value="确认修改">
	                        		</td>
	                        </tr>
	                 </table>
		</form>

	</body>
</html>
<?php } ?>
