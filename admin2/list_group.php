<?php
include_once("checksession.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>赛事组列表</title>

        <link href="./css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div style="font-size: 13px; margin: 10px 5px;">
<?php
include_once("../db.php");

$danwei_id  =   $_SESSION[adminDanwei];
$t  =   '1';
if(!empty($danwei_id)){
    $t  .=  " and danwei_id= '$danwei_id' ";
}

$page_size=10;

$pagecount=($amount/$page_size);

$pagecount=intval($pagecount)+1;
if($_GET[page]==0)
{$_GET[page]=1;}
$page=$_GET[page];

$a=($_GET[page]-1)*$page_size;

$query = "select * from gqh_group WHERE $t order by tid    limit $a,$page_size ";
$result = mysql_db_query($DataBase, $query);

?>

            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>ID</td>
                        <td>群组名称</td>
                        <td>所属赛事</td>
                        <td>编辑</td>
                        <td>删除</td>
                        
                    </tr>
                    <?php


while($row=mysql_fetch_array($result))
{
?>
                    <tr id="product1">
                        <td><?php echo $row[tid]; ?></td>
    <td><?php echo $row[name]; ?></td>
    <td><?php
		 
	
$query = "select * from saishi  where tid='$row[tid]'   ";

		$result2 = mysql_db_query($DataBase, $query);


$r3=mysql_fetch_array($result2);
	
	 echo $r3[biaoti]; ?></td>
    <td><a href="edit_group.php?tid=<?php echo $row[tid]; ?>">编辑</a></td>
    <td>
        <a onClick="if(confirm('您确定删除吗？')){return true;}else{return false;}" href="del_group.php?tid=<?php echo $row["tid"];?>" class="button" >删除</a>
    </td>
</tr>
<?php   
}
?>
    <?php
    

    $query = "select * from gqh_group WHERE $t";
    $result = mysql_db_query($DataBase, $query); 

    $amount=mysql_num_rows($result);

?>
                    
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


    当前通讯录群组共有<?php echo $amount;?>条结果</td></tr>
   
   
</table>
        </div>
    </body>
</html>