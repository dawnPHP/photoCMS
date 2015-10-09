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

<h4>Full Features (ASP example) - <a href="../default.htm">Back</a></h4>

<form method="post" action="default_result.asp" id="Form1">

	<textarea id="txtContent" name="txtContent" rows=4 cols=30></textarea>

	<script>
		var oEdit1 = new InnovaEditor("oEdit1");
		
		/***************************************************
			SETTING EDITOR DIMENSION (WIDTH x HEIGHT)
		***************************************************/

		oEdit1.width=775;//You can also use %, for example: oEdit1.width="100%"
		oEdit1.height=350;

		/***************************************************
			SHOWING DISABLED BUTTONS
		***************************************************/

		oEdit1.btnPrint=true;
		oEdit1.btnPasteText=true;
		oEdit1.btnFlash=true;
		oEdit1.btnMedia=true;
		oEdit1.btnLTR=true;
		oEdit1.btnRTL=true;
		oEdit1.btnSpellCheck=true;
		oEdit1.btnStrikethrough=true;
		oEdit1.btnSuperscript=true;
		oEdit1.btnSubscript=true;
		oEdit1.btnClearAll=true;
		oEdit1.btnSave=true;
		oEdit1.btnStyles=true; //Show "Styles/Style Selection" button

		/***************************************************
			APPLYING STYLESHEET 
			(Using external css file)
		***************************************************/
		
		oEdit1.css="style/test.css"; //Specify external css file here

		/***************************************************
			APPLYING STYLESHEET 
			(Using predefined style rules)
		***************************************************/
		/*
		oEdit1.arrStyle = [["BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"],
					[".ScreenText",true,"Screen Text","font-family:Tahoma;"],
					[".ImportantWords",true,"Important Words","font-weight:bold;"],
					[".Highlight",true,"Highlight","font-family:Arial;color:red;"]];
		
		If you'd like to set the default writing to "Right to Left", you can use:
		
		oEdit1.arrStyle = [["BODY",false,"","direction:rtl;unicode-bidi:bidi-override;"]];
		*/


		/***************************************************
			ENABLE ASSET MANAGER ADD-ON
		***************************************************/

		oEdit1.cmdAssetManager = "modalDialogShow('/Editor/assetmanager/assetmanager.asp',640,465)"; //Command to open the Asset Manager add-on.
		//Use relative to root path (starts with "/")

		/***************************************************
			ADDING YOUR CUSTOM LINK LOOKUP
		***************************************************/

		oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.

		/***************************************************
			ADDING YOUR CUSTOM CONTENT LOOKUP
		***************************************************/

		oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

		/***************************************************
			USING CUSTOM TAG INSERTION FEATURE
		***************************************************/
		
		oEdit1.arrCustomTag=[["First Name","{%first_name%}"],
				["Last Name","{%last_name%}"],
				["Email","{%email%}"]];//Define custom tag selection

		/***************************************************
			SETTING COLOR PICKER's CUSTOM COLOR SELECTION
		***************************************************/

		oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

		/***************************************************
			SETTING EDITING MODE
			
			Possible values: 
				- "HTMLBody" (default) 
				- "XHTMLBody" 
				- "HTML" 
				- "XHTML"
		***************************************************/
		
		oEdit1.mode="XHTMLBody";
		
		
		oEdit1.REPLACE("txtContent");
	</script>

	<input type="submit" value="Submit" id="btnSubmit">
	
</form>

</body>
</html>