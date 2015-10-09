<?php
include_once("checksession.php");
include("header.html");
?>
<META http-equiv="Content-Type content=text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/mine.css">
<?php

if(!$_GET["tid"])
{
	echo "传入id错误<p>";
	echo "点击<a href=listgroup.php>这里</a>查看群组";
}
else
{
	

	include_once("../db.php");
	$tid=$_GET["tid"];
	$query="SELECT * FROM gqh_group WHERE tid=$tid";
	$result= mysql_db_query($DataBase, $query);
	$row=mysql_fetch_array($result);
	?>
<script language=javascript>
	function check()
	{
		obj=document.f.name;
		if(obj.value=="")
		{
			alert("群组名称不能为空！");
			obj.focus();
			return false;
		}
		else return true;
	}
</script>

<div style="font-size: 13px;margin: 10px 5px">
            <form action=doedit_group.php?tid=<?php echo $tid?> method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>新的群组名称：</td>
                    <td><input type="text" name="name" value="<?php echo $row["name"]?>" /></td>
                </tr>
                 <tr>
                    <td>新的价格：</td>
                    <td><input type="text" name="price" value="<?php echo $row["price"]?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="确认修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>

<?php } ?>