<?php 
include_once("checksession.php");
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
            .tr_color{background-color: #9F88FF}
        </style>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>ID</td>
                        <td>用户名</td>
                        <td>属性</td>
                        <td>手机号</td>
                        <td>单位名称</td>
                        <td>操作</td>
                        <td>管理员状态(解封/封锁)</td>
                    </tr>

					<?php
					include_once("../db.php");

					$query = "select * from beian_manage     ";
					$result = mysql_db_query($DataBase, $query); 

					$amount=mysql_num_rows($result);

					$page_size=10;

					$pagecount=($amount/$page_size);


					$pagecount=intval($pagecount)+1;
					if($_GET[page]==0)
					{$_GET[page]=1;}
					$page=$_GET[page];

					$a=($_GET[page]-1)*$page_size;

					$query = "select * from beian_manage order by tid    limit $a,$page_size ";
					$result = mysql_db_query($DataBase, $query);



					while ($r=mysql_fetch_array($result)) {
					?>

                    <tr id="product1">
                        <td><?php echo $r[tid]; ?></td>
<td><?php echo $r[username]; ?></td>

<td><?php  if($r[states]==1){echo"超级管理员";} else if($r[states]==2 ){echo"<font color=red>副超级管理员</font>";} else if($r[states]==3 ){echo"<font color=red>单位管理员</font>";} ?></td>
<td><?php  echo $r[mobile]; ?></td>
<td>
	<?php
		//echo $r[danwei_id];
		$querydw = "SELECT * FROM `danwei` WHERE `tid` = $r[danwei_id]";
		$resultdw = mysql_db_query($DataBase, $querydw);
		$dw = mysql_fetch_array($resultdw);
		echo $dw[name];
	?>
</td>
<td>
<a href=updateadmin.php?tid=<?php echo $r[tid]; ?>>编辑审核</a>
<a onClick="if(confirm('您确定删除吗?')) {return true;}else {return false;}"  href="deladmin.php?tid=<?php echo $r[tid];?>" class="button"  >删除</a>
</td>
<?php 
if($r[lock_status]==0){echo "<td>解封状态";?>
&nbsp;&nbsp;&nbsp;&nbsp;
<a onClick="if(confirm('您确定封锁该管理员吗？')){return true;} else{return false;}" href="hideadmin.php?lock_status=<?php echo $r[lock_status]?>&tid=<?php echo $r[tid];?>">点击封锁该管理员</a>
<?php }?>
<?php
if($r[lock_status]==1){echo "<td>封锁状态";?>
&nbsp;&nbsp;&nbsp;&nbsp;
<a onClick="if(confirm('您确定解封该管理员吗？')){return true;} else{return false;}" href="hideadmin.php?lock_status=<?php echo $r[lock_status]?>&tid=<?php echo $r[tid];?>">点击解封该管理员</a>
<?php }?>
</td>
                    </tr>
                    <?php


}

mysql_free_result($result)




?>
                    
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-weight:bold;">
  
    <tr><td style="height:28px;width:100%;"><font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;
    共有<font id="red"><?php echo $amount; ?></font>条&nbsp;&nbsp;共有<font id="red"><?php echo $pagecount; ?></font>页&nbsp;&nbsp;<font id="red"><?php echo $page;?></font>/<?php echo $pagecount;?> </font>
    &nbsp;&nbsp;  <a href="?page=1" class="backs">[首页]</a>&nbsp;&nbsp;<?php $i=$_GET[page]-4;$j=$_GET[page]+4;if($i<1){$i=1;}if($j>$pagecount){$j=$pagecount;}for($u=$i;$u<=$j;$u++){echo "&nbsp;<a href=?page=$u>$u</a>";} ?>
    &nbsp;&nbsp;  <a href="?page=<?php echo $pagecount;?>" class="backs">[尾页]</a></td></tr>
   
   
</table>
        </div>
    </body>
</html>