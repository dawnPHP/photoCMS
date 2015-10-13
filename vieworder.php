<?php
//include_once("checksession.php");
include_once("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>订单列表</title>

        <link href="./css/mine.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
    
        <style>
            .tr_color{background-color: #9F88FF;}
        </style>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                <tr><td>订单详情</td></tr>
                <tr style="font-weight: bold;">
                        <td>TID</td>
                        <td>总价格</td>
                        <td>支付状态</td>
                        <td>MID</td>
                        <td>ip</td>
                        <td>支付时间</td>
                    </tr>
                   
                       <?php
$id = $_GET["tid"];

$query = "select * from orders where tid =$id";
//echo $query.'<br>';

$res = mysql_db_query($DataBase, $query);
$rows=mysql_fetch_assoc($res);
$sql = "select * from orders_zuopin where oid =$id";
$result = mysql_db_query($DataBase, $sql);
$row=mysql_fetch_assoc($result);
$zuopinID = $row["zid"];
?>

 
    <tr id="product1">
    <td><?php echo $rows["tid"]; ?> </td> 
    <td><?php echo $rows["amount"]; ?> </td>
    <td><?php  switch ($rows["payment_status"]) {
        case '1':
            echo "以支付";
            break;
        case '0':
            echo "没支付";
            break;
    } ?></td>
    <td><?php echo $rows["mid"]; ?></td> 
    <td>
      <?php echo $rows["ip"]; ?>
    </td>
    <td>
      <?php echo $rows["dtime"]; ?>
    </td>
    </tr> 
    </table>
      <table class="table_a" border="1" width="100%">
       <tr ><td>订单作品详情</td></tr>
        <tr style="font-weight: bold;">
                        <td>名称</td>
                        <td>作者</td>
                        <td>摄影时间</td>
                        <td>作品展示</td>
                        <td>获奖情况</td>
                        <td>价格</td>
                          <td style="width:300px">作品说明</td>
                        <td>上传时间</td>
                        <td>支付状态</td>
                    </tr>
        <?php
        $sql = "select * from orders_zuopin where oid ='$id'";
    $re = mysql_db_query($DataBase, $sql);
                    while($ro2=mysql_fetch_array($re))
                    {
					
	        $sql = "select * from  zuopin where tid ='$ro2[zid]'";
    $re2 = mysql_db_query($DataBase, $sql);
                   $ro=mysql_fetch_array($re2);			
					
                    ?>
                    <tr id="product1">
    <td><?php echo $ro["biaoti"]; ?></td>
    <td><?php echo $ro["writer"]; ?></td>
    <td><?php echo $ro["ptime"]; ?></td>
    <td><?php 
	$imgFileName=$ro['tid'] . $ro['filename1'] ;
	//if($ro['filename1']!='') { echo "<a href=../zuopin_image/$ro[filename1] target=_blank><img src=../zuopin_image/$ro[filename1] width=50 border=0></a>"; }else{echo "no image";}
	
	if($ro['filename1']!='') { echo "<a href=../zuopin_image/$imgFileName target=_blank><img src=../zuopin_image/$imgFileName width=50 border=0></a>"; }else{echo "no image";}
	
	?>  </td>
        <td>
        <?php 
            switch($ro['status']){
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
                echo "送展中";
                break;
            case 5:
                echo "已获奖";
                break;
        } ?>
    </td>
    <td><?php echo $ro["amount"]; ?></td>
    <td><?php echo $ro["info"]; ?></td>
    <td><?php echo $ro["dtime"]; ?></td>
                    <?php } ?>
    <td><?php  switch ($rows["payment_status"]) {
        case '1':
            echo "以支付";
            break;
        case '0':
            echo "没支付";
            break;
    } ?></td>

                    
                </tbody>
            </table>
        </div>
    </body>
</html>