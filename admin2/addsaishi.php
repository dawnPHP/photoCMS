
<?php
include_once("checksession.php");
include_once("../db.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
        <script src="editor/scripts/innovaeditor.js"></script>
    </head>

    <body>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="doaddsaishi.php" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <?php 
                    $query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
                    $result = mysql_db_query($DataBase, $query); 
                    $r8=mysql_fetch_array($result);
                    if($r8[states] > 2 ){
                        echo"不是超级管理员，不能操作";
                        exit;
                    }else{
                ?>
                <tr>
                    <td class="head" colspan="7"><b>添加赛事</b></td>
                </tr>
                <tr>
                    <td>赛事名称:</td>
                    <td><input type="text" name="biaoti" size="30"></td>
                </tr>
                <tr>
                    <td>赛事地点:</td>
                    <td>
                        <input type="text" name="address" size="30">
                    </td>
                </tr>
                <tr>
                    <td>赛事简介:</td>
                    <td>
                           <textarea cols="80" rows="10" name="info" id="txtContent" ></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit1 = new InnovaEditor("oEdit1");
			oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                <tr>
                    <td>赛事开始时间:</td>
                    <td><input type="text" name="start_time" size="30"></td>
                </tr>
                <tr>
                    <td>赛事结束时间:</td>
                    <td><input type="text" name="end_time" size="30"></td>
                </tr>
                <tr>
                    <td>赛事规则:</td>
                    <td>
                      
                        
						
						    <textarea cols="80" rows="10" name="guizhe" id="txtContent2" ></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit2 = new InnovaEditor("oEdit2");
			oEdit2.REPLACE("txtContent2");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                <tr>
                    <td>赛事奖项:</td>
                    <td>
                        
                         
						
						  <textarea cols="80" rows="10" name="jiangxiang" id="txtContent3" ></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit3 = new InnovaEditor("oEdit3");
			oEdit3.REPLACE("txtContent3");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                <tr>
                    <td>注意事项:</td>
                    <td>
                      
                        
						
						  <textarea cols="80" rows="10" name="zhuyi" id="txtContent4" ></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit4 = new InnovaEditor("oEdit4");
			oEdit4.REPLACE("txtContent4");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
              
                <tr>
                    <td>图片:</td>
                    <td>
                        <input type="file" name="upload_file1" size="30">
                    </td>
                </tr>
                 <?php } ?>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="提交">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
	
    </body>
</html>
