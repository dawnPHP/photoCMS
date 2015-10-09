<?php
include_once("checksession.php");
include("header.html");
include_once("../db.php");
?>
<META http-equiv=Content-Type content=text/html;charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/mine.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>addSaiShi</title>
		<script src="editor/scripts/innovaeditor.js"></script>
	</head>
	<body>

	<div style="font-size: 13px;margin: 10px 5px">
            <form action="doaddorder.php" method="post" enctype="multipart/form-data">
			
			<p>作品一 </p>	
            <table style="font-size: 13px;" border="1" width="100%" class="table_a">
                <?php 
		$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
		$res = mysql_db_query($DataBase, $query); 
		$r8=mysql_fetch_array($res);
		if($r8[states] > 2 ){
			echo"不是超级管理员，不能操作";
			exit;
		}else{?>
 	
	
	<tr >
		<td >作品名称:</td>
		<td >
		<input type="text" name="biaoti" size="30"></td>
	</tr>


	<tr >
		<td >摄影时间:</td>
		<td >
		<input type="text" name="ptime" size="30"></td>
	</tr>
	<tr >
		<td >所属赛事:</td>
		<td >
			<SELECT   name="saishi_id">
			<?php
			$query = "select * from  saishi";
			$result = mysql_db_query($DataBase, $query);
			while ($r2 = mysql_fetch_array($result)) 
			{
			echo"<option value=$r2[tid]  >$r2[biaoti]</option>";
			}
			?> 
	 	  </SELECT>
	 	</td>
		 </tr>
				  <tr >
		<td >所属组:</td>
		<td colspan="3" class=b>
			<SELECT   name="group_id">
			<?php
			$sql = "select * from  gqh_group";
			$res = mysql_db_query($DataBase, $sql);
			while ($re2 = mysql_fetch_array($res)) 
			{
			echo"<option value=$re2[tid]  >$re2[name]</option>";
			}
			?> 
	 	  </SELECT>
		 	</td>
		 </tr>
				 <?php } ?>		
		<tr >
		<td >上传图片:</td>
		<td >
		<input type="file" name="upload_file1" size="30"></td>
	</tr>		
		<tr >
		<td >金额:</td>
		<td >
		<input type="text" name="amount" size="30"></td>
	</tr>
	<tr >
		<td >作品说明</td>
		<td >
			<textarea id="txtContent" name="info" style="width:300px;hieght:500px;">
				
			</textarea>
			<script> 
				//STEP 2: Replace the textarea (txtContent)
				var oEdit1 = new InnovaEditor("oEdit1");
				oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
			</script>
		</td>
	</tr>
                <tr>
                    <td colspan="3" align="center">
                         
                    </td>
                </tr>  
            </table>
			
			
			
			
			
			
			
			
			
			
	<p>作品二 </p>		
			
			
			
			            <table style="font-size: 13px;" border="1" width="100%" class="table_a">
                <?php 
		$query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
		$res = mysql_db_query($DataBase, $query); 
		$r8=mysql_fetch_array($res);
		if($r8[states] > 2 ){
			echo"不是超级管理员，不能操作";
			exit;
		}else{?>
 	
	
	<tr >
		<td >作品名称:</td>
		<td >
		<input type="text" name="biaoti2" size="30"></td>
	</tr>
	<tr >
		<td >作者:</td>
		<td >
		<input type="text" name="writer2" size="30"></td>
	</tr>
	<tr >
		<td >所属赛事:</td>
		<td >
			<SELECT   name="saishi_id2">
			<?php
			$query = "select * from  saishi";
			$result = mysql_db_query($DataBase, $query);
			while ($r2 = mysql_fetch_array($result)) 
			{
			echo"<option value=$r2[tid]  >$r2[biaoti]</option>";
			}
			?> 
			 	</SELECT>		 	</td>
		 </tr>
				  <tr >
		<td >所属组:</td>
		<td colspan="3" class=b>
			<SELECT   name="group_id2">
			<?php
			$sql = "select * from  gqh_group";
			$res = mysql_db_query($DataBase, $sql);
			while ($re2 = mysql_fetch_array($res)) 
			{
			echo"<option value=$re2[tid]  >$re2[name]</option>";
			}
			?> 
			 	</SELECT>		 	</td>
		 </tr>
				 <?php } ?>		
		<tr >
		<td >上传图片:</td>
		<td >
		<input type="file" name="upload_file2" size="30"></td>
	</tr>
		<tr >
		<td >金额:</td>
		<td >
		<input type="text" name="amount2" size="30"></td>
	</tr>
	<tr >
		<td >作品说明</td>
		<td >
			<textarea id="txtContent2" name="info2" style="width:300px;hieght:500px;">
				
			</textarea>
			<script> 
				//STEP 2: Replace the textarea (txtContent)
				var oEdit2 = new InnovaEditor("oEdit2");
				oEdit2.REPLACE("txtContent2");//Specify the id of the textarea here
			</script>		</td>
	</tr>
                
            </table>


            <p>作品三 </p>     
            
            
            
                        <table style="font-size: 13px;" border="1" width="100%" class="table_a">
                <?php 
        $query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
        $res = mysql_db_query($DataBase, $query); 
        $r8=mysql_fetch_array($res);
        if($r8[states] > 2 ){
            echo"不是超级管理员，不能操作";
            exit;
        }else{?>
    
    
    <tr >
        <td >作品名称:</td>
        <td >
        <input type="text" name="biaoti3" size="30"></td>
    </tr>
    <tr >
        <td >作者:</td>
        <td >
        <input type="text" name="writer3" size="30"></td>
    </tr>
    <tr >
        <td >所属赛事:</td>
        <td >
            <SELECT   name="saishi_id3">
            <?php
            $query = "select * from  saishi";
            $result = mysql_db_query($DataBase, $query);
            while ($r2 = mysql_fetch_array($result)) 
            {
            echo"<option value=$r2[tid]  >$r2[biaoti]</option>";
            }
            ?> 
                </SELECT>           </td>
         </tr>
                  <tr >
        <td >所属组:</td>
        <td colspan="3" class=b>
            <SELECT   name="group_id3">
            <?php
            $sql = "select * from  gqh_group";
            $res = mysql_db_query($DataBase, $sql);
            while ($re2 = mysql_fetch_array($res)) 
            {
            echo"<option value=$re2[tid]  >$re2[name]</option>";
            }
            ?> 
                </SELECT>           </td>
         </tr>
                 <?php } ?>     
        <tr >
        <td >上传图片:</td>
        <td >
        <input type="file" name="upload_file3" size="30"></td>
    </tr>
        <tr >
        <td >金额:</td>
        <td >
        <input type="text" name="amount3" size="30"></td>
    </tr>
    <tr >
        <td >作品说明</td>
        <td >
            <textarea id="txtContent2" name="info3" style="width:300px;hieght:500px;">
                
            </textarea>
            <script> 
                //STEP 2: Replace the textarea (txtContent)
                var oEdit2 = new InnovaEditor("oEdit2");
                oEdit2.REPLACE("txtContent2");//Specify the id of the textarea here
            </script>       </td>
    </tr>
</table>
    <p>作品四 </p>     
            
            
            
                        <table style="font-size: 13px;" border="1" width="100%" class="table_a">
                <?php 
        $query = "select * from beian_manage where username='$_SESSION[adminusername2]' ";
        $res = mysql_db_query($DataBase, $query); 
        $r8=mysql_fetch_array($res);
        if($r8[states] > 2 ){
            echo"不是超级管理员，不能操作";
            exit;
        }else{?>
    
    
    <tr >
        <td >作品名称:</td>
        <td >
        <input type="text" name="biaoti4" size="30"></td>
    </tr>
    <tr >
        <td >作者:</td>
        <td >
        <input type="text" name="writer4" size="30"></td>
    </tr>
    <tr >
        <td >所属赛事:</td>
        <td >
            <SELECT   name="saishi_id4">
            <?php
            $query = "select * from  saishi";
            $result = mysql_db_query($DataBase, $query);
            while ($r2 = mysql_fetch_array($result)) 
            {
            echo"<option value=$r2[tid]  >$r2[biaoti]</option>";
            }
            ?> 
                </SELECT>           </td>
         </tr>
                  <tr >
        <td >所属组:</td>
        <td colspan="3" class=b>
            <SELECT   name="group_id4">
            <?php
            $sql = "select * from  gqh_group";
            $res = mysql_db_query($DataBase, $sql);
            while ($re2 = mysql_fetch_array($res)) 
            {
            echo"<option value=$re2[tid]  >$re2[name]</option>";
            }
            ?> 
                </SELECT>           </td>
         </tr>
                 <?php } ?>     
        <tr >
        <td >上传图片:</td>
        <td >
        <input type="file" name="upload_file4" size="30"></td>
    </tr>
        <tr >
        <td >金额:</td>
        <td >
        <input type="text" name="amount4" size="30"></td>
    </tr>
    <tr >
        <td >作品说明</td>
        <td >
            <textarea id="txtContent4" name="info" style="width:300px;hieght:500px;">
                
            </textarea>
            <script> 
                //STEP 2: Replace the textarea (txtContent)
                var oEdit2 = new InnovaEditor("oEdit2");
                oEdit2.REPLACE("txtContent2");//Specify the id of the textarea here
            </script>       </td>
    </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="添加订单">                    </td>
                </tr>  
            </table>
            </form>
        </div>
		