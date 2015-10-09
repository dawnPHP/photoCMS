<?php
include_once("checksession.php");
include_once("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="./css/mine.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
    
        <style>
            .tr_color{background-color: #9F88FF;}
        </style>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>ID</td>
                        <td>赛事名称</td>
                        <td>赛事地点</td>
                        <td>赛事简介</td>
                        <td>图片</td>
                        <td>操作</td>
                        
                    </tr>
                    
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
 
    <tr id="product1">
    <td><?php echo $rows["tid"]; ?> </td> 
    <td><?php echo $rows["biaoti"]; ?> </td>
    <td><?php echo $rows["address"]; ?></td>
    <td><?php echo $rows["info"]; ?></td> 
    <td>
        <?php if($rows['filename1']!='') { echo "<a href=../saishi_image/$rows[filename1] target=_blank><img src=../saishi_image/$rows[filename1] width=50 border=0></a>"; }else{echo "no image";}?>  
    </td>
    <td><a href=<?php echo "editsaishi.php"."?tid=".$rows["tid"] ?>>修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onClick="if(confirm('您确定删除吗？')){return true;}else{return false;}"  href=<?php echo "dodelsaishi.php"."?tid=".$rows["tid"] ?>>删除</a></td>
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
                    
                </tbody>
            </table>
        </div>
    </body>
</html>