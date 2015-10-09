<?php
include_once("checksession.php");
include_once("../db.php");

$id = $_POST["id"];
$amount = $_POST["amount"];
$payment_status = $_POST["payment_status"];

$sql = "update orders set amount =' $amount',payment_status = '$payment_status' where tid = $id";
$result = mysql_db_query($DataBase, $sql);
if($result){
	echo"修改订单成功！";		
	echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=listorder.php'>";
}
?>
