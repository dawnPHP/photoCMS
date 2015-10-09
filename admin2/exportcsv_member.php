<?php
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=export_data.xls");

?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<style id="Classeur1_16681_Styles"></style>
</head>
  <body>
    <div id="Classeur1_16681" align=center x:publishsource="Excel">
    <table x:str border=1 cellpadding=1 cellspacing=1 width=100% style="border-collapse: collapse">
		<tr>
			<td>会员ID</td>
			<td>username</td>
			<td>password</td>
			<td>email</td>
			<td>注册ip</td>
			<td>注册时间</td>
			<td>手机</td>
			<td>会员状态(封锁/解封)</td>

		</tr>
<?php
include_once("../db.php");
mysql_select_db($DataBase);
$query = "select * from member";
$result = mysql_query($query);
//$r = mysql_fetch_assoc($result);

while ( $r = mysql_fetch_assoc($result)) {
	echo "<tr>
			<td>$r[tid]</td>
			<td>$r[username]</td>
			<td>$r[password]</td>
			<td>$r[email]</td>
			<td>$r[ip]</td>
			<td>$r[dtime]</td>
			<td>$r[mobile]</td>
			<td>$r[blockstatus]</td>
		</tr>";
 }


?>
</table>
</div>
</body>
</html>