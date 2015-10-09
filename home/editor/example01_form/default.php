<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	<style>
		body{font:11px verdana,arial,sans-serif;}
		a{color:#cc0000;font-size:xx-small;}
	</style>
	
	<!-- STEP 1: Include the Editor js file -->
	<script language=JavaScript src='../scripts/innovaeditor.js'></script>
	
</head>
<body>
<?php
echo $_POST[txtContent];
echo"<br>";
?>
<h4>Using in a HTML Form (PHP example) - <a href="../default.htm">Back</a></h4>

<form method="post" action="default.php" id="Form1">

	<textarea id="txtContent" name="txtContent" rows=4 cols=30>
		</textarea>

	<script> //STEP 2: Replace the textarea (txtContent)
		var oEdit1 = new InnovaEditor("oEdit1");
		oEdit1.REPLACE("txtContent");//Specify the id of the textarea here
	</script>

	<input type="submit" value="Submit">
</form>


</body>
</html>