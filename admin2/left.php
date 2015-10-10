<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="css/admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table height="100%" cellspacing=0 cellpadding=0 width=170 
               background='./img/menu_bg.jpg' border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>
                 
             
                 
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(3) 
                                    href="javascript:void(0);">赛事管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="listsaishi.php" 
                                   target=right>赛事列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="addsaishi.php" 
                                   target=right>赛事增加</a></td></tr>
                      
					  
					  
                        
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(4) 
                                    href="javascript:void(0);">赛事组管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child4 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="list_group.php" 
                                   target=right>赛事组列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="add_group.php" 
                                   target=right>赛事组增加</a></td></tr>
                   
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(5) 
                                    href="javascript:void(0);">作品</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child5 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="listzuopin.php" 
                                   target=right>作品列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="addzuopin.php" 
                                   target=right>添加作品</a></td></tr>
								   
								    <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="listorder.php" 
                                   target=right>订单列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="addorder.php" 
                                   target=right>添加订单</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>

  


                  
				  
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(0) 
                                    href="javascript:void(0);">个人管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                            

                    <table id=child0 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                   
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   onclick="if (confirm('确定要退出吗？')) return true; else return false;" 
                                   href="logout.php" 
                                   target=_top>退出系统</a></td></tr></table>
                                <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(9) 
                                    href="javascript:void(0);">管理员管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                            

                    <table id=child9 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="listadmin.php" 
                                   target=right>管理员列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   
                                   href="addadmin.php" 
                                   target=right>增加管理员</a></td></tr></table>
                                         <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background='./img/menu_bt.jpg'><a 
                                    class=menuparent onclick=expand(10) 
                                    href="javascript:void(0);">会员管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                            

                    <table id=child10 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="listmember.php" 
                                   target=right>会员列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./img/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   
                                   href="addmember.php" 
                                   target=right>增加会员</a></td></tr></table>
                                   </td>

                <td width=1 bgcolor=#d1e6f7></td>

            </tr>
        </table>
    </body>
</html>