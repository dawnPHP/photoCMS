<?php
include 'checkcookie.php';

$query = "select * from orders where mid='$_SESSION[memberid]'  order by tid desc limit 1  ";
$result = mysql_db_query($DataBase, $query); 
$r2=mysql_fetch_array($result);

$one=$r2[tid];





$query = "select * from orders where mid='$_SESSION[memberid]' and tid<'$one'  order by tid desc limit 1  ";
$result = mysql_db_query($DataBase, $query); 
$r3=mysql_fetch_array($result);

$two=$r3[tid];
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
        <a href="index.php" class="online_logo"></a>
        <!--内容start-->
        <div class="online_main">
            <div class="online_title">一般组：</div>
            <ul class="online_list">
                	
			
		        <?php
        $sql = "select * from orders_zuopin where oid ='$one'";
    $re = mysql_db_query($DataBase, $sql);
                    while($ro2=mysql_fetch_array($re))
                    {
					
	        $sql = "select * from  zuopin where tid ='$ro2[zid]'";
    $re2 = mysql_db_query($DataBase, $sql);
                   $ro=mysql_fetch_array($re2);			
					
                    ?>
                <li>
                    <div class="pic">
                        <b>1</b>
                        <img src="zuopin_image/<?php echo $ro[filename1] ; ?>" />
                        <i class="close"></i>
                    </div>
                    <span><?php echo $ro[biaoti] ; ?></span>
                </li>
				
				
				 <?php } ?>
				
				
            </ul>
            <div class="online_title">我去过的地方（2015年专题组）：</div>
            <ul class="online_list">
               
			
		        <?php
        $sql = "select * from orders_zuopin where oid ='$two'";
    $re = mysql_db_query($DataBase, $sql);
                    while($ro2=mysql_fetch_array($re))
                    {
					
	        $sql = "select * from  zuopin where tid ='$ro2[zid]'";
    $re2 = mysql_db_query($DataBase, $sql);
                   $ro=mysql_fetch_array($re2);			
					
                    ?>
                <li>
                    <div class="pic">
                        <b>1</b>
                        <img src="zuopin_image/<?php echo $ro[filename1] ; ?>" />
                        <i class="close"></i>
                    </div>
                    <span><?php echo $ro[biaoti] ; ?></span>
                </li>
				
				
				 <?php } ?>
				
				
            </ul>
            <div class="pay_total">报名费：400元  -  个人账户：0元   =   实际支付400元</div>
            <div class="pay_set"><span id="z_pay"><img src="images/z_icon.png" /></span><span id="w_pay"><img src="images/w_icon.png" /></span></div>
            <div class="pay_btn"><a href="online_04.php?tid=<?php echo $one;?>" class="btn07">确认支付</a></div>
        </div>
        <!--内容end-->
    </div>
    <div class="header online_header">
        <b class="header_title">报名费支付</b>
         <div class="login_tips">
		<?php
			if($login==0)
			{
		?> 
		 <span class="login_icon" onclick="loginShow();">登录</span>								
		<?php
			}else
			if($login==1)
			{
		?>
				<a href="member.php"><span class="login_icon"  >会员中心</span></a>
				
				| <a href="logout.php"><span class="login_icon"  >退出</span></a>
		 <?php
			 }
	         ?>	
	</div>
    </div>
    <div class="login_box">
        <div class="form_box">
            <table cellpadding="0" cellspacing="0" class="form_table">
                <tr><td>账号：</td><td><input id="name" type="text" class="text" placeholder="手机号码/电子邮箱地址" /></td></tr>
                <tr><td>密码：</td><td><input id="password" type="password" class="text" /></td></tr>
                <tr><td colspan="2"><a href="#" class="fr forget_a">忘记密码？</a><span class="span_check"><input id="Checkbox1" type="checkbox" /><b>自动登录</b></span></td></tr>
                <tr><th colspan="2"><input id="btn1" type="button" value="登录" class="btn" onclick="loginHide();" /><p><a href="register.php">没有账号?</a></p></th></tr>
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
