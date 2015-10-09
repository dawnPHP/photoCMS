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
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_search">
            <span>
                 <a href="exportcsv_member.php?day1=<?php echo $_GET[day1]; ?>&month1=<?php echo $_GET[month1];?>&year1=<?php echo $_GET[year1];?>&hour1=<?php echo $_GET[hour1];?>&minutes1=<?php echo $_GET[minutes1];?>&second1=<?php echo $_GET[second1];?>&day2=<?php echo $_GET[day2];?>&month2=<?php echo $_GET[month2];?>&year2=<?php echo $_GET[year2];?>&hour2=<?php echo $_GET[hour2];?>&minutes2=<?php echo $_GET[minutes2];?>&second2=<?php echo $_GET[second2];?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page+1);?>&billno=<?php echo $_GET[billno];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&customer_email=<?php echo $_GET[customer_email];?>&tuikuan_status=<?php echo $_GET[tuikuan_status];?>&username=<?php echo $_GET[username];?>&status=<?php echo $_GET[status];?>&pay_status=<?php echo $_GET[pay_status];?>&hand_status=<?php echo $_GET[hand_status];?>&card_type=<?php echo $_GET[card_type];?>" target="_blank"  class="button">导出Excel </a> 
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">

<?php
$t="1";
$query = "select * from  member     where $t    ";
$result = mysql_db_query($DataBase, $query); 

$amount=mysql_num_rows($result);

$page_size=20;

$pagecount=($amount/$page_size);


$pagecount=intval($pagecount)+1;
if($_GET[page]==0)
{$_GET[page]=1;}
if($_GET[page]>$pagecount)
{$_GET[page]=$pagecount;}
$page=$_GET[page];

$a=($_GET[page]-1)*$page_size;
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-weight:bold;">
  
    <tr><td style="height:28px;width:100%;"><font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;
    共有<font id="red"><?php echo $amount; ?></font>条&nbsp;&nbsp;共有<font id="red"><?php echo $pagecount; ?></font>页&nbsp;&nbsp;<font id="red"><?php echo $page;?></font>/<?php echo $pagecount;?> </font>
    &nbsp;&nbsp;  <a href="?tid=<?php echo $_GET[tid]; ?>&page=1&operation=<?php echo $_GET[operation];?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" class="backs">[首页]</a>&nbsp;&nbsp;<?php $i=$_GET[page]-8;$j=$_GET[page]+15;if($i<1){$i=1;}if($j>$pagecount){$j=$pagecount;}for($u=$i;$u<=$j;$u++){echo "&nbsp;<a href=?tid=$_GET[tid]&page=$u&operation=$_GET[operation]&invoice=$_GET[invoice]&startdate=$_GET[startdate]&enddate=$_GET[enddate]&customer_name=$_GET[customer_name]&shipping_id=$_GET[shipping_id]&payment_gross=$_GET[payment_gross]&username=$_GET[username]&jufu_status=$_GET[jufu_status]>$u</a>";} ?>
    &nbsp;&nbsp;  <a href="?tid=<?php echo $_GET[tid]; ?>&page=<?php echo $pagecount;?>&operation=<?php echo $_GET[operation];?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" class="backs">[尾页]</a> <a href="?tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page-1);?>&&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" >上一页</a>   <a href="?tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page+1);?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>">下一页</a></td></tr>
   
   
</table>
<form name=form1  method=post action=exportcsv.php>

            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td width="3%"><span class="STYLE1"> 会员ID </span></td>
                        <td width="6%"><span class="STYLE1"> username </span></td>
						<td width="12%"><span class="STYLE1"> logo </span></td>
                        <td width="8%"><span class="STYLE1"> password </span></td>
                        <td width="9%"><span class="STYLE1"> email </span></td>
                        <td width="7%"><span class="STYLE1"> 注册ip </span></td>
                        <td width="10%"><span class="STYLE1">注册时间 </span></td>
                        <td width="7%"><span class="STYLE1">mobile</span></td>
                        <td width="5%"><span class="STYLE1">推荐人</span></td> 
                        <td width="7%"><span class="STYLE1">操作</span></td>
                        <td width="17%"><span class="STYLE1">会员状态(封锁/解封)</span></td>
                    </tr>
                    <?php
$query = "select * from  member     where $t     order by tid desc  limit $a,$page_size ";
$result = mysql_db_query($DataBase, $query);
while ($r=mysql_fetch_array($result)) {
    ?>
                    <tr id="product1">
                        <td ><?php echo  $r[tid] ; ?></td>
                        <td > <?php echo $r[username]; ?> </td>
			<td ><?php if($r['logo']!='') { echo "<a href=../player_image/$r[logo] target=_blank><img src=../player_image/$r[logo] width=50 border=0></a>"; }else{echo "no image";}?></td>
                        <td > <?php echo $r[password]; ?> </td>
                        <td > <?php echo $r[email]; ?> </td>
                        <td ><?php echo  $r[ip] ; ?> </td>
                        <td ><?php echo  $r[dtime] ; ?></td>
                        <td><?php echo  $r[mobile] ; ?></td>
			<td><?php echo  $r[tuijian] ; ?></td>
                        <td><a href="editmember.php?tid=<?php echo $r[tid];?>" class="button"    > 修改会员</a></td>
						
						 <td>
                        <?php 
                        if($r['blockstatus']==0){echo "解封状态";?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a onClick="if(confirm('您确定封锁该管理员吗？')){return true;} else{return false;}" href="hidemember.php?lock_status=<?php echo $r['blockstatus']?>&tid=<?php echo $r[tid];?>">点击封锁该管理员</a>
                        <?php }?>
                        <?php
                        if($r['blockstatus']==1){echo "封锁状态";?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a onClick="if(confirm('您确定解封该管理员吗？')){return true;} else{return false;}" href="hidemember.php?lock_status=<?php echo $r['blockstatus']?>&tid=<?php echo $r[tid];?>">点击解封该管理员</a>
                        <?php }?>
						
						</td>
                    </tr>
                    <?php
}
mysql_free_result($result);
?>
</table>
</form>
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-weight:bold;">
  
    <tr><td style="height:28px;width:100%;"><font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;
    共有<font id="red"><?php echo $amount; ?></font>条&nbsp;&nbsp;共有<font id="red"><?php echo $pagecount; ?></font>页&nbsp;&nbsp;<font id="red"><?php echo $page;?></font>/<?php echo $pagecount;?> </font>
    &nbsp;&nbsp;  <a href="?tid=<?php echo $_GET[tid]; ?>&page=1&operation=<?php echo $_GET[operation];?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" class="backs">[首页]</a>&nbsp;&nbsp;<?php $i=$_GET[page]-8;$j=$_GET[page]+15;if($i<1){$i=1;}if($j>$pagecount){$j=$pagecount;}for($u=$i;$u<=$j;$u++){echo "&nbsp;<a href=?tid=$_GET[tid]&page=$u&operation=$_GET[operation]&invoice=$_GET[invoice]&startdate=$_GET[startdate]&enddate=$_GET[enddate]&customer_name=$_GET[customer_name]&shipping_id=$_GET[shipping_id]&payment_gross=$_GET[payment_gross]&username=$_GET[username]&jufu_status=$_GET[jufu_status]>$u</a>";} ?>
    &nbsp;&nbsp;  <a href="?tid=<?php echo $_GET[tid]; ?>&page=<?php echo $pagecount;?>&operation=<?php echo $_GET[operation];?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" class="backs">[尾页]</a> <a href="?tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page-1);?>&&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>" >上一页</a>   <a href="?tid=<?php echo $_GET[tid]; ?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page+1);?>&invoice=<?php echo $_GET[invoice];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&shipping_id=<?php echo $_GET[shipping_id];?>&payment_gross=<?php echo $_GET[payment_gross];?>&username=<?php echo $_GET[username];?>&jufu_status=<?php echo $_GET[jufu_status];?>">下一页</a></td></tr>
   
   
</table>

                </tbody>
            </table>
        </div>
    </body>
</html>