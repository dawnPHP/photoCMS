<?php
include_once("db.php");
mysql_select_db($DataBase) or die('error');

$id = $_GET["tid"];

$query = "select * from orders_zuopin where oid =$id";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
        //print_r($row);
	$zid[]=$row['zid'];
}
//得到文件名的数组
for($i=0;$i<count($zid);$i++){
	$sql = "select * from zuopin where tid =$zid[$i]";
	$result = mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	$fn[] = $row["filename1"];//文件名
	$bt[] = $row["biaoti"];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>摄影网站</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="imgbox" style="background-image: url(images/temp/online_02_bg.jpg);" onclick="loginHide();">
        <a href="index.html" class="online_logo"></a>
        <!--内容start-->
        <div class="online_main">
            <div class="online_title">一般组：</div>
            <ul class="online_list">
                <li>
                    <div class="pic">
                        <b>1</b>
                    <?php 
			if(!empty($fn[0])){
				echo '<img src="zuopin_image/'.$fn[0].'" />';
			}
		   ?>
                        <i class="close"></i>
                    </div>
                    <span><?php echo $bt[0];?></span>
                </li>
                <li>
                    <div class="pic">
		    <b>2</b>
                    <?php 
			if(!empty($fn[1])){
				echo '<img src="zuopin_image/'.$fn[1].'" />';
			}
		   ?>

                    </div>
                    <span><?php echo $bt[1];?></span>
                </li>
                <li>
                    <div class="pic">
			<b>3</b>
                    <?php 
			if(!empty($fn[2])){
				echo '<img src="zuopin_image/'.$fn[2].'" />';
			}  
		   ?>
                    </div>
                    <span><?php echo $bt[2];?></span>
                </li>
                <li>
                    <div class="pic">
			<b>4</b>
                    <?php 
			if(!empty($fn[3])){
				echo '<img src="zuopin_image/'.$fn[3].'" />';
			}
		   ?>
                    </div>
                    <span><?php echo $bt[3];?></span>
                </li>
            </ul>
            <div class="online_title">我去过的地方（2015年专题组）：</div>
            <ul class="online_list">
                <li>
                    <div class="pic">
                        <b>1</b>
                    </div>
                    <span>作品名</span>
                </li>
                <li>
                    <div class="pic">
                        <b>2</b>
                    </div>
                    <span>作品名</span>
                </li>
                <li>
                    <div class="pic">
                        <b>3</b>
                    </div>
                    <span>作品名</span>
                </li>
                <li>
                    <div class="pic">
                        <b>4</b>
                    </div>
                    <span>作品名</span>
                </li>
            </ul>
            <div class="pay_total">报名费：400元  -  个人账户：0元   =   实际支付400元</div>
            <div class="pay_set"><span id="z_pay"><img src="images/z_icon.png" /></span><span id="w_pay"><img src="images/w_icon.png" /></span></div>
            <div class="pay_btn"><a href="Online_04.html" class="btn07">确认支付</a></div>
        </div>
        <!--内容end-->
    </div>
    <div class="header online_header">
        <b class="header_title">报名费支付</b>
        <div class="login_tips"><span class="login_icon" onclick="loginShow();">登录</span></div>
    </div>
    <div class="login_box">
        <div class="form_box">
            <table cellpadding="0" cellspacing="0" class="form_table">
                <tr><td>账号：</td><td><input id="name" type="text" class="text" placeholder="手机号码/电子邮箱地址" /></td></tr>
                <tr><td>密码：</td><td><input id="password" type="password" class="text" /></td></tr>
                <tr><td colspan="2"><a href="#" class="fr forget_a">忘记密码？</a><span class="span_check"><input id="Checkbox1" type="checkbox" /><b>自动登录</b></span></td></tr>
                <tr><th colspan="2"><input id="btn1" type="button" value="登录" class="btn" onclick="loginHide();" /><p><a href="register.html">没有账号?</a></p></th></tr>
            </table>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(".imgbox").height($(window).height());
    $(".pay_set span").click(function () {
        $(".pay_set span").removeClass("aon");
        $(this).addClass("aon");
    });
    function loginShow() {
        $(".login_box").animate({ right: "0" }, 500);
    }
    function loginHide() {
        $(".login_box").animate({ right: "-250px" }, 500);
    }
</script>
