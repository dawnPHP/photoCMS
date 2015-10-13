<?php
//赛事id=4  摄影大赛二
//赛事组id=4
include 'checkcookie.php';
//include 'dologin.php';











$query = "select * from orders where mid='$_SESSION[memberid]'  order by tid desc limit 1  ";
$result = mysql_db_query($DataBase, $query); 
$r2=mysql_fetch_array($result);

$one=$r2[tid];


/*=======================================================
//下一行的逻辑有问题！
//tid<'$one'
//相当于认为最近的2次的订单就是报名的订单？
//没支付算吗？先报的第二组算吗？仅报名一组算吗？
=======================================================*/
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
    <div class="imgbox" style="background-image: url(images/temp/online_01_bg.jpg);" onclick="loginHide();">
        <a href="index.php" class="online_logo"></a>
        <!--内容start-->
        <div class="online_main">
            <div  class="online_upload">
                <span class="upload_icon" onclick="$('#Online_Groups').show();"></span>
                <p>
                    参赛文件格式要求：<br />
                    JPEG格式，文件尺寸最大为4096x2160像素
                </p>
            </div>
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
            <div class="online_operate">
                <p>以上是您的上传作品，点击“确认支付”后将转入付款环节</p>
                <div class="online_btn"><span class="btn05 fr">让我再想想</span><span class="btn05" onclick="$('#Online_pay').show();">确认支付</span></div>
            </div>
        </div>
        <!--内容end-->
    </div>
    <div class="header online_header">
	<b class="header_title">在线报名</b>
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
    <!--报名选组start-->
    <div class="online_alert" id="Online_Groups">
	<span class="close" onclick="$('#Online_Groups').hide();"></span>
        <form name="form1" action="online_02.php" method="post" >
        <h2>请选择要报名的组别</h2>
        <ul class="alert_list">
            <li><p onclick="javascript:document.getElementById('group_id').value='4'"><span>一般组</span></p></li>
            <li><p onclick="javascript:document.getElementById('group_id').value='3'"><b>我去过的地方<br />2015年专题组</b></p></li>
	</ul>
        <!--用隐藏表单传赛事组id和赛事id，此页面只能选择组，赛事id为默认-->
	<input type='hidden' id="group_id" name="group_id" value=""/>
        <input type='hidden' id="saishi_id" name="saishi_id" value="4"/>
	<!-- <div class="alert_btn"><input type="submit"  class="btn06" value="下一步" /></div> -->
        <div class="alert_btn"><a href="javascript:document.form1.submit()" class="btn06">下一步</a></div>
        </form>
    </div>
    <!--报名选组end-->
    <!--确认支付弹窗start-->
    <div class="online_alert" id="Online_pay">
        <span class="close" onclick="$('#Online_pay').hide();"></span>
        <div class="online_pay_tips">
            温馨提示：<br />
            请确认您已经完成了所有参赛照片的上传，支付完毕后将无法修改。
        </div>
        <div class="alert_btn"><a href="Online_03.php" class="btn06">确认</a><span class="inlineBlock pl65"><a href="javascript:void(0);" class="btn06" onclick="$('#Online_pay').hide();">再想想</a></span></div>
    </div>
    <!--确认支付弹窗End-->
</body>
</html>
<script type="text/javascript">
    $(".imgbox").height($(window).height());
    $(".alert_list li p").click(function () {
        $(".alert_list li p").removeClass("aon");
        $(this).addClass("aon");
    });
    function loginShow() {
        $(".login_box").animate({ right: "0" }, 500);
    }
    function loginHide() {
        $(".login_box").animate({ right: "-250px" }, 500);
    }
</script>
