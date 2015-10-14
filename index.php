<?php
session_start();

include_once("db.php");
mysql_select_db($DataBase) or die('error');
$query = "select * from member  where tid='$_SESSION[memberid]'   " ;
//echo $query;
$result = mysql_query( $query);

$login=0;//0为未登陆，1为登陆成功



if($r = mysql_fetch_array($result))

{

$login=1;

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
    <div class="imgbox" style="background-image: url(images/temp/home_bg.jpg);" onclick="loginHide();">
        <div class="Home_main">
            <a href="#" class="prev_btn"></a>
            <a href="#" class="next_btn"></a>
            <div class="H_box1"><img src="images/h_pic1.png" /></div>
            <div class="H_box2"><a href="online.php">在线报名</a></div>
            <div class="Hbox3"><span>地点：卡塔尔<b>截稿日期：2015年10月30日</b></span></div>
        </div>
    </div>
    <div class="header">
        <a href="index.php" class="logo"></a>
        <div class="login_tips"><a href="about_01.php">团队介绍</a>|
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
    <div class="footer">
        <p>阿尔塔尼国际摄影大奖赛由卡塔尔摄影学会主办，奥地利超级摄影学会承办，每年举办一次，由两个组别<br />组成。本展览经国际影艺联盟（FIAP）和美国摄影学会（PSA）认可。由于主办国宗教信仰的原因，人体<br />摄影作品在本比赛中不被接受。</p>
        <a href="online.php" class="btn01">在线报名</a>
    </div>
    <div class="login_box">
        <div class="form_box">
		<form id="mainForm" method="post" action="dologin.php" name="form1">
            <table cellpadding="0" cellspacing="0" class="form_table">
                <tr><td>账号：</td><td><input id="name" type="text" class="text" placeholder="手机号码/电子邮箱地址" name="username" /></td></tr>
                <tr><td>密码：</td><td><input id="password" type="password" class="text" name="password" /></td></tr>
                <tr><td colspan="2"><a href="#" class="fr forget_a">忘记密码？</a><span class="span_check"><input id="Checkbox1" type="checkbox" /><b>自动登录</b></span></td></tr>
                <tr><th colspan="2"><input id="btn1" type="submit" value="登录" class="btn" onclick="loginHide();" /><p><a href="register.php">没有账号?</a></p></th></tr>
            </table>
			</form>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(".imgbox").height($(window).height());
    function loginShow() {
        $(".login_box").animate({ right: "0" }, 500);
    }
    function loginHide() {
        $(".login_box").animate({ right: "-250px" }, 500);
    }

</script>
