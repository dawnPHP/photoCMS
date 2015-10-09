<%@ Page Language="vb" ValidateRequest="false" Debug="true" %>
<%@ Register TagPrefix="editor" Assembly="WYSIWYGEditor" namespace="InnovaStudio" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
		body{font:11px verdana,arial,sans-serif;}
		a{color:#cc0000;font-size:xx-small;}
	</style>
	<script language="VB" runat="server">
		Sub Page_Load(Source As Object, E As EventArgs)
		
			If Not Page.IsPostBack Then
	            oEdit1.Text = "<h3>Hello World!</h3>"
			End If
				
			'***************************************************
			'	SETTING EDITOR DIMENSION (WIDTH x HEIGHT)
			'***************************************************

    		oEdit1.EditorWidth=775 'You can also use %, for example: oEdit1.EditorWidth = "100%"
    		oEdit1.EditorHeight=350

			'***************************************************
			'	SHOWING DISABLED BUTTONS
			'***************************************************

			oEdit1.btnPrint=true
			oEdit1.btnPasteText=true
			oEdit1.btnFlash=true
			oEdit1.btnMedia=true
			oEdit1.btnLTR=true
			oEdit1.btnRTL=true
			oEdit1.btnSpellCheck=true
			oEdit1.btnStrikethrough=true
			oEdit1.btnSuperscript=true
			oEdit1.btnSubscript=true
			oEdit1.btnClearAll=true
			oEdit1.btnStyles=true 'Show "Styles/Style Selection" button

			'***************************************************
			'	SPECIFY onSave EVENT COMMAND
			'***************************************************

			oEdit1.onSave="document.forms.Form1.elements.btnSubmit.click();"
			
			'***************************************************
			'	APPLYING STYLESHEET 
			'	(Using external css file)
			'***************************************************
	
			oEdit1.Css="style/test.css" 'Specify external css file here

			'***************************************************
			'	APPLYING STYLESHEET 
			'	(Using predefined style rules)
			'***************************************************

			'oEdit1.StyleList = New String(,){ _
			'		{"BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"}, _
			'		{".ScreenText",true,"Screen Text","font-family:Tahoma;"}, _
			'		{".ImportantWords",true,"Important Words","font-weight:bold;"}, _
			'		{".Highlight",true,"Highlight","font-family:Arial;color:red;"}}
			
			'If you'd like to set the default writing to "Right to Left", use:
	
			'oEdit1.StyleList = New String(,){{"BODY",false,"","direction:rtl;unicode-bidi:bidi-override;"}}


			'***************************************************
			'	ENABLE ASSET MANAGER ADD-ON
			'***************************************************
			
			oEdit1.AssetManagerWidth = 640
			oEdit1.AssetManagerHeight = 465
			oEdit1.AssetManager = "/Editor/assetmanager/assetmanager.asp"
			'Use relative to root path (starts with "/")

			'***************************************************
			'	ADDING YOUR CUSTOM LINK LOOKUP
			'***************************************************
			
			oEdit1.InternalLinkWidth = 365
			oEdit1.InternalLinkHeight = 270
			oEdit1.InternalLink = "links.htm"
			
			'***************************************************
			'	ADDING YOUR CUSTOM CONTENT LOOKUP
			'***************************************************
			
			oEdit1.CustomObjectWidth = 365
			oEdit1.CustomObjectHeight = 270
			oEdit1.CustomObject = "objects.htm"
			
			'***************************************************
			'	USING CUSTOM TAG INSERTION FEATURE
			'***************************************************

			oEdit1.CustomTagList = New String(,){ _
					{"First Name","{%first_name%}"}, _
					{"Last Name","{%last_name%}"}, _
					{"Email","{%email%}"}}
				
			'***************************************************
			'	SETTING COLOR PICKER's CUSTOM COLOR SELECTION
			'***************************************************
			oEdit1.CustomColors = New String() {"#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"}

			'***************************************************
			'	SETTING EDITING MODE
			'	
			'	Possible values: 
			'		- "HTMLBody" (default) 
			'		- "XHTMLBody" 
			'		- "HTML" 
			'		- "XHTML"
			'***************************************************
	
			oEdit1.EditMode = "XHTMLBody"
			
		End Sub

		Sub Button1_Click(Source As System.Object, E As System.EventArgs)
	        Label1.Text = oEdit1.Text
		End Sub
	</script>
</head>
<body>

<form id="Form1" method="post" runat="server">

	<h4>Full Features (ASP.NET example) - <a href="../default.htm">Back</a></h4>
	
	<editor:wysiwygeditor 
		Runat="server"
		scriptPath="../scripts/"
		ID="oEdit1" />
	
	<asp:button runat="server" onclick="Button1_Click" Text="SUBMIT" ID="btnSubmit" />
	
	<asp:label id="Label1" runat="server"/>
</form>

</body>
</html>