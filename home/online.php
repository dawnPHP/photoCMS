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
        <a href="index.html" class="online_logo"></a>
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
                <li>
                    <div class="pic">
                        <b>1</b>
                        <img src="images/temp/pic1.jpg" />
                        <i class="close"></i>
                    </div>
                    <span>冰川</span>
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
            <div class="online_operate">
                <p>以上是您的上传作品，点击“确认支付”后将转入付款环节</p>
                <div class="online_btn"><span class="btn05 fr">让我再想想</span><span class="btn05" onclick="$('#Online_pay').show();">确认支付</span></div>
            </div>
        </div>
        <!--内容end-->
    </div>
    <div class="header online_header">
        <b class="header_title">在线报名</b>
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
    <!--报名选组start-->
    <div class="online_alert" id="Online_Groups">
        <span class="close" onclick="$('#Online_Groups').hide();"></span>
        <h2>请选择要报名的组别</h2>
        <ul class="alert_list">
            <li><p><span>一般组</span></p></li>
            <li><p><b>我去过的地方<br />2015年专题组</b></p></li>
        </ul>
        <div class="alert_btn"><a href="online_02.php" class="btn06">下一步</a></div>
    </div>
    <!--报名选组end-->
    <!--确认支付弹窗start-->
    <div class="online_alert" id="Online_pay">
        <span class="close" onclick="$('#Online_pay').hide();"></span>
        <div class="online_pay_tips">
            温馨提示：<br />
            请确认您已经完成了所有参赛照片的上传，支付完毕后将无法修改。
        </div>
        <div class="alert_btn"><a href="Online_03.html" class="btn06">确认</a><span class="inlineBlock pl65"><a href="javascript:void(0);" class="btn06" onclick="$('#Online_pay').hide();">再想想</a></span></div>
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
