<?php
include_once("checksession.php");
include_once("../db.php");


?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/table.css">

<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
<tr>
  <td class=head colspan=12><b>赛事列表修改管理</b></td>
</tr>
<tr align="center" class="head_1">
<td width="20%">
	<div align="center">
	<b>ID<br>
	
	</b>
	</div>
</td>
<td width="20%">
	<div align="center">
	<b>赛事名称<br>
	
	</b>
	</div>
</td>
</td>
<td width="20%">
	<div align="center">
	<b>赛事地点<br>
	
	</b>
	</div>
</td>
<td width="30%">
	<div align="center">
	<b>赛事简介<br>
	
	</b>
	</div>
</td>	
 
<td width="10%">
<div align="center">
<b>删除赛事</b>
</div>
</td>
 
<?php

$query = "select id from saishi";

//echo $query;

$result = mysql_db_query($DataBase, $query); 

$amount=mysql_num_rows($result);

$page_size=10;

$pagecount=($amount/$page_size);

$pagecount=intval($pagecount)+1;
if($_GET[page]==0)
{$_GET[page]=1;}
if($_GET[page]>$pagecount)
{$_GET[page]=$pagecount;}
$page=$_GET[page];

$a=($_GET[page]-1)*$page_size;


$query = "select * from saishi  order by tid desc limit $a,$page_size";
//echo $query.'<br>';

$res = mysql_db_query($DataBase, $query);

?>

 <?php 
 
	while ($rows=mysql_fetch_assoc($res)) {
	?>
 
	<tr align=center class=b>
	<td><?php echo $rows["tid"]; ?> </td> 
	<td><?php echo $rows["biaoti"]; ?> </td>
	<td><?php echo $rows["address"]; ?></td>
	<td><?php echo $rows["info"]; ?></td> 
	<td><a href=<?php echo "dodelsaishi.php"."?tid=".$rows["tid"] ?>>删除</a></td>
	</tr> 
	<?php } ?>
 
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-weight:bold;">
  
    <tr><td style="height:28px;width:100%;"><font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;
    共有<font id="red"><?php echo $amount; ?></font>条&nbsp;&nbsp;共有<font id="red"><?php echo $pagecount; ?></font>页&nbsp;&nbsp;<font id="red"><?php echo $page;?></font>/<?php echo $pagecount;?> </font>
    &nbsp;&nbsp;  <a href="?sorting=<?php echo $_GET[sorting]; ?>&desc=<?php echo $_GET[desc]; ?>&page=1" class="backs">[首页]</a>&nbsp;&nbsp;<?php $i=$_GET[page]-4;$j=$_GET[page]+4;if($i<1){$i=1;}if($j>$pagecount){$j=$pagecount;}for($u=$i;$u<=$j;$u++){echo "&nbsp;<a href=?page=$u&sorting=$_GET[sorting]&desc=$_GET[desc]>$u</a>";} ?>
    &nbsp;&nbsp;  <a href="?sorting=<?php echo $_GET[sorting]; ?>&desc=<?php echo $_GET[desc]; ?>&page=<?php echo $pagecount;?>" class="backs">[尾页]</a>
	<a href="?sorting=<?php echo $_GET[sorting]; ?>&desc=<?php echo $_GET[desc]; ?>&tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page-1);?>&&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&keywords=<?php echo $_GET[keywords];?>&jufu_status=<?php echo $_GET[jufu_status];?>" >上一页</a>   <a href="?sorting=<?php echo $_GET[sorting]; ?>&desc=<?php echo $_GET[desc]; ?>&tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page+1);?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&keywords=<?php echo $_GET[keywords];?>&jufu_status=<?php echo $_GET[jufu_status];?>">下一页</a>
    </td></tr>
   
</table>
<?php 


include("bottom.html"); 

?>