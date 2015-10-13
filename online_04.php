<?php
include 'checkcookie.php';
include 'db.php';
mysql_select_db($DataBase);
//传入orders_zuipin的oid(orders表的tid)，修改orders和zuopin表的payment_status，改为1
$tid=$_GET['tid'];
$sql="select * from orders_zuopin where oid=$tid";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)){
	$zid[]=$row['zid'];
}

//事务处理begin,rollback,commit
mysql_query('begin');
//更新orders表
$sql1="update orders set payment_status=1 where tid=$tid";
$result=1;
$re1=mysql_query($sql1);
if(!$re1){
	mysql_query('rollback');
	$result=0;
	//echo '错误一：'.$result;
}else{
	//更新zuopin表
	for($i=0;$i<count($zid);$i++){
	$sql2="update zuopin set payment_status=1 where tid=$zid[$i]";
		if(!mysql_query($sql2)){
			mysql_query('rollback');
			$result=0;
			//echo '错误二：'.$result;
		}
	}
	mysql_query('commit');
	//echo $result;
}
//事务处理结束
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
    <div class="wrap_pay" onclick="loginHide();">
        <a href="index.html" class="online_logo"></a>
        <!--内容start-->
        <div class="pay_tips_box">
            <div  class="pay_tips">
	    <p><?php 
		if($result==1){
			echo '恭喜您，报名成功！';
		}else{
			echo '未知错误，报名失败';
		} ?></p>
            </div>
            <div class="pay_op"><a href="index.php" class="btn08">确认</a></div>
        </div>
        <!--内容end-->
    </div>

    <div class="header">
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
                <tr><th colspan="2"><input id="btn1" type="button" value="登录" class="btn" onclick="loginHide();" /><p><a href="register.html">没有账号?</a></p></th></tr>
            </table>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(".wrap_pay").height($(window).height());
    function loginShow() {
        $(".login_box").animate({ right: "0" }, 500);
    }
    function loginHide() {
        $(".login_box").animate({ right: "-250px" }, 500);
    }
</script>
