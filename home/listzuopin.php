<?php
//include_once("checksession.php");
include_once("../db.php");
?>
<?php 


$t ='1';

 
if($_GET[group_id]!='')
{
$t=$t."  and zuopin.group_id='$_GET[group_id]' ";
}



if($_GET[biaoti]!='')
{
$t=$t."  and zuopin.biaoti like '%$_GET[biaoti]%' ";
}



    $sql = "select * from zuopin  where $t ";
    $result = mysql_db_query($DataBase, $sql); 
    $amount = mysql_num_rows($result);

 ?>
<?php
$page_size=10;
$pagecount=($amount/$page_size);
$pagecount=intval($pagecount)+1;
if($_GET[page]==0)
{$_GET[page]=1;}
$page=$_GET[page];

$a=($_GET[page]-1)*$page_size;

/*
$t
*/

$orderBy = '  ';
switch ($_GET['sorting']) {
    case 'tid':
    case 'biaoti':
    case 'writer':
    case 'ptime':
    case 'saiahi_id':
    case 'group_id':
        $orderBy .= $_GET['sorting'];
        if ($_GET['desc'] >= 1)$orderBy .= ' DESC';
        break;
    default:
        $orderBy = 'tid';
        break;
}
$query = "select zuopin.tid , zuopin.saishi_id , saishi.biaoti as competition , zuopin.group_id , gqh_group.name as group_name , zuopin.biaoti , zuopin.writer , zuopin.ptime , zuopin.payment_status , zuopin.filename1 , zuopin.status , zuopin.dtime from gqh_group , saishi , zuopin where $t and gqh_group.tid=zuopin.group_id and saishi.tid=zuopin.saishi_id order by tid desc  limit $a,$page_size";
$result = mysql_db_query($DataBase, $query);

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
        <div></div>
        <div class="div_search">
            <span>
                <form action="listzuopin.php" method="get" accept-charset="utf-8">
        <tr class=> 
          <td width="20%" >搜索: 关键词：<input type="text" name="biaoti"> 
          
          组：
            <SELECT   name="group_id">
            <option value="">不限</option>
            <?php
            $sql = "select * from  gqh_group";
            $res = mysql_db_query($DataBase, $sql);
            while ($re2 = mysql_fetch_assoc($res)){
                echo"<option value=$re2[tid] >$re2[name]</option>";
            }
            ?> 
            </SELECT>
           <input type="submit" name="" value="搜索">  <a href="exportcsv.php?day1=<?php echo $_GET[day1]; ?>&month1=<?php echo $_GET[month1];?>&year1=<?php echo $_GET[year1];?>&hour1=<?php echo $_GET[hour1];?>&minutes1=<?php echo $_GET[minutes1];?>&second1=<?php echo $_GET[second1];?>&day2=<?php echo $_GET[day2];?>&month2=<?php echo $_GET[month2];?>&year2=<?php echo $_GET[year2];?>&hour2=<?php echo $_GET[hour2];?>&minutes2=<?php echo $_GET[minutes2];?>&second2=<?php echo $_GET[second2];?>&operation=<?php echo $_GET[operation]; ?>&page=<?php echo($page+1);?>&billno=<?php echo $_GET[billno];?>&startdate=<?php echo $_GET[startdate];?>&enddate=<?php echo $_GET[enddate];?>&customer_name=<?php echo $_GET[customer_name];?>&customer_email=<?php echo $_GET[customer_email];?>&tuikuan_status=<?php echo $_GET[tuikuan_status];?>&username=<?php echo $_GET[username];?>&status=<?php echo $_GET[status];?>&pay_status=<?php echo $_GET[pay_status];?>&hand_status=<?php echo $_GET[hand_status];?>&card_type=<?php echo $_GET[card_type];?>" target="_blank"  class="button">导出Excel </a></td>
        </tr>
    </form> 
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>ID</td>
						<td>赛事ID</td>
						<td>赛事名</td>
						<td>组ID</td>
						<td>组名</td>
                        <td>名称</td>
                        <td>作者</td>
                        <td>摄影时间</td>
                        <td>状态</td>
                        <td>作品展示</td>
                        <td>获奖情况</td>
                        <td>上传时间</td>
                        <td >编辑</td>
                        <td >删除</td>
                    </tr>
                    <?php
                    while($row=mysql_fetch_array($result))
                    {
                    ?>
                    <tr id="product1">
                        <td><?php echo $row["tid"]; ?></td>
	<td><?php echo $row["saishi_id"]; ?></td>
	<td><?php echo $row["competition"]; ?></td>
	<td><?php echo $row["group_id"]; ?></td>
	<td><?php echo $row["group_name"]; ?></td>
    <td><?php echo $row["biaoti"]; ?></td>
    <td><?php echo $row["writer"]; ?></td>
    <td><?php echo $row["ptime"]; ?></td>
    <td><?php $num = $row["payment_status"]; if($num == 0){echo "没有成功支付";}else{echo "已成功支付";}; ?></td>
    <td><?php if($row['filename1']!='') { echo "<a href=../zuopin_image/$row[filename1] target=_blank><img src=../zuopin_image/$row[filename1] width=50 border=0></a>"; }else{echo "no image";}?>  </td>
        <td>
        <?php 
            switch($row['status']){
            case 1:
                echo "审核中";
                break;
            case 2:
                echo "已送展";
                break;
            case 3:
                echo "未获奖";
                break;
            case 4:
                echo "已获奖";
                break;
        } ?>
    </td>
    <td><?php echo $row["dtime"]; ?></td>
    <td><a href="editzuopin.php?tid=<?php echo $row[tid]; ?>">编辑</a></td>
    <td>
        <a onClick="if(confirm('您确定删除吗？')){return true;}else{return false;}" href="del_zuopin.php?tid=<?php echo $row["tid"];?>" class="button" >删除</a>
    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-weight:bold;">
  
 <tr>
 <td style="height:28px;width:60%;">
    <font style="font-weight:bold;">&nbsp;&nbsp;&nbsp;
    共有
    <font id="red"><?php echo $amount; ?></font>
    条&nbsp;&nbsp;
    共有
    <font id="red"><?php echo $pagecount; ?></font>
    页&nbsp;&nbsp;
    <font id="red"><?php echo $page;?></font>/
    <?php echo $pagecount;?> </font>
    &nbsp;&nbsp;  
    <a href="?page=1" class="backs">[首页]</a>
    &nbsp;&nbsp;
    <?php 
        $i=$_GET[page]-4;
        $j=$_GET[page]+4;
        if($i<1){
            $i=1;
            }
        if($j>$pagecount){
            $j=$pagecount;
            }
        for($u=$i;$u<=$j;$u++){
            echo "&nbsp;<a href=?page=$u>$u</a>";
            }
        
        ?>
    &nbsp;&nbsp;  
    <a href="?page=<?php echo $pagecount;?>" class="backs">[尾页]</a>
    <a href="?sorting=<?php echo $orderBy ?>&desc=<?php echo $desc ?>&page=<?php echo($page-1);?>">上一页</a>
    <a href="?sorting=<?php echo $orderBy ?>&desc=<?php echo $desc ?>&page=<?php echo($page+1);?>">下一页</a>
    </td>
    <td style="height:28px;width:60%;">
    当前作品共有<?php echo $amount;?>条结果</td></tr>
</table>

        </div>
    </body>
</html>