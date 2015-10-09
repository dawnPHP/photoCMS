<?php
include_once("checksession.php");
include_once("../db.php");
$query = "SELECT tid, biaoti FROM saishi";
$result = mysql_db_query($DataBase, $query);
while($row=mysql_fetch_assoc($result)){
    $info[] = $row;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="doadd_group.php" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                     <td class=head colspan=7><b>添加通讯录群组：</b></td>
                </tr>
                <tr>
                    <td>群组名称:</td>
                    <td><input type=text name="name" size=50></td>
                </tr>
                <tr>
                    <td>赛事:</td>
                    <td>
                        <select name="saishiId"  >
                            <?php 
                                foreach ($info as $key => $val) {
                                    echo "<option value=$val[tid]>$val[biaoti]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>输入价格:</td>
                    <td>
                        <input type=text name="price" size=50>
                    </td>
                </tr>
            
                
                <tr>
                    <td colspan="2" align="center">
                        <input type='submit' value='提交'>
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>