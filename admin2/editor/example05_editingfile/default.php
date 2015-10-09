<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
		body{font:11px verdana,arial,sans-serif;}
		a{color:#cc0000;font-size:xx-small;}
	</style>
		
	<script language=JavaScript src='../scripts/innovaeditor.js'></script>
</head>
<body>

<h4>Editing a File (PHP example) - <a href="../default.htm">Back</a></h4>

<form method="post" action="default.php" id="Form1">

	<textarea id="txtContent" name="txtContent" rows=4 cols=30>
	&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"&gt;&lt;HTML&gt;&lt;HEAD&gt;&lt;TITLE&gt;Title Here&lt;/TITLE&gt;
&lt;STYLE&gt;BODY {
	BACKGROUND: #f7f7f7
}
.HeadlineGray {font-family:Verdana,Arial,Helvetica;font-size:25px;color:#777777;margin:1px;margin-top:5px;font-weight:bold;}
&lt;/STYLE&gt;
&lt;META http-equiv=Content-Type content="text/html; charset=utf-8"&gt;&lt;/META&gt;&lt;/HEAD&gt;
&lt;BODY&gt;
&lt;H1&gt;Hello World!&lt;/H1&gt;&lt;A href="a.asp?a=1&amp;amp;b=2"&gt;test1 &amp;amp; test2 &amp;amp; test3&lt;/A&gt; &lt;/BODY&gt;&lt;/HTML&gt;
	</textarea>
	
	<script>
		var oEdit1 = new InnovaEditor("oEdit1");

        oEdit1.btnStyles=true;
		oEdit1.mode="HTML";
		oEdit1.REPLACE("txtContent");
	</script>

	<input type="submit" value="Save">
	<input type="button" value="view file" onclick="window.open('content.htm')">
</form>

</body>
</html>
