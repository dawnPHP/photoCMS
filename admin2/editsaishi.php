<?php
include_once("checksession.php");
include("header.html");
include_once("../db.php");
?>
<?php
$getId = $_GET["tid"];
$query="select * from saishi where tid = $getId";
$result=mysql_db_query($DataBase,$query);
$rows=mysql_fetch_assoc($result);
$tid = $rows["tid"];

$biaoti = $rows["biaoti"];
$address = $rows["address"];
$info = $rows["info"];


print_r($rows);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>addSaiShi</title>
		<link rel="stylesheet" type="text/css" href="css/mine.css">
		<script src="editor/scripts/innovaeditor.js"></script>
	</head>
	<body>

<div style="font-size: 13px;margin: 10px 5px">
            <form action="doeditsaishi.php" method="post" enctype="multipart/form-data">
              <input type="hidden"name= tid value="<?php echo $tid ?>" >
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>赛事名称:</td>
                    <td><input type="text" name="biaoti" value=<?php echo $biaoti ?> /></td>
                </tr>
                <tr>
                    <td>赛事地点:</td>
                    <td><input type="text" name="address" value=<?php echo $address ?> /></td>
                </tr>
                <tr>
                    <td>赛事简介：</td>
                    <td>
                        <textarea cols="80" rows="10" name="info" id="txtContent" ><?php echo $info; ?></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit1 = new InnovaEditor("oEdit1");
			oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                <tr>
                    <td>赛事开始时间：</td>
                    <td>
                        <input name="start_time" value=<?php echo $rows["start_time"]  ?> ></input>
                    </td>
                </tr>
                <tr>
                    <td>赛事结束时间：</td>
                    <td>
                        <input name="end_time" value=<?php echo $rows["end_time"]  ?>></input>
                    </td>
                </tr>
                <tr>
                    <td>赛事规则：</td>
                    <td>
                        <textarea cols="80" rows="10" name="guizhe" id="txtContent2" ><?php echo $rows["guizhe"]; ?></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit2 = new InnovaEditor("oEdit2");
			oEdit2.REPLACE("txtContent2");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                <tr>
                    <td>赛事奖项：</td>
                    <td>
                        <textarea cols="80" rows="10" name="jiangxiang" id="txtContent3" ><?php echo $rows["jiangxiang"]; ?></textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit3 = new InnovaEditor("oEdit3");
			oEdit3.REPLACE("txtContent3");//Specify the id of the textarea here
		</script>
                    </td>
                </tr>
                 <tr>
                    <td>注意事项</td>
                    <td>
			<textarea cols="80" rows="10" name="zhuyi" id="txtContent4"><?php echo $rows["zhuyi"]; ?>
			</textarea>
                       <script> 
		//STEP 2: Replace the textarea (txtContent)
			var oEdit4 = new InnovaEditor("oEdit4");
			oEdit4.REPLACE("txtContent4");//Specify the id of the textarea here
		</script>
		    </td>
                </tr>
                 <tr>
                    <td>图片</td>
                    <td><input type="file" name="upload_file1"  />
        <?php if($rows['filename1']!='') { echo "<a href=../saishi_image/$rows[filename1] target=_blank><img src=../saishi_image/$rows[filename1] width=50 border=0></a>"; }else{echo "no image";}?>  
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
        </div>


		