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
			
    		oEdit1.EditorWidth=570
    		oEdit1.EditorHeight=450
    		

			'***************************************************
			'	ADDING CUSTOM BUTTONS
			'***************************************************
		
			oEdit1.CustomButtons = New String(,){ _
					{"CustomName1","alert('Command 1 here.')","Caption 1 here","btnCustom1.gif"}, _
					{"CustomName2","alert(\""Command '2' here.\"")","Caption 2 here","btnCustom2.gif"}, _
					{"CustomName3","alert('Command \""3\"" here.')","Caption 3 here","btnCustom3.gif"}}

			'***************************************************
			'	RECONFIGURE TOOLBAR BUTTONS
			'***************************************************
		
			oEdit1.ButtonFeatures = New String() { _
				"Save","FullScreen","Preview","Print", _
				"Search","SpellCheck","|", _
				"Superscript","Subscript","|","LTR","RTL","|", _
				"Table","Guidelines","Absolute","|", _
				"Flash","Media","|","InternalLink","CustomObject","|", _
				"Form","Characters","ClearAll","XHTMLFullSource","XHTMLSource","BRK", _		
				"Cut","Copy","Paste","PasteWord","PasteText","|", _
				"Undo","Redo","|","Hyperlink","Bookmark","Image","|", _
				"JustifyLeft","JustifyCenter","JustifyRight","JustifyFull","|", _
				"Numbering","Bullets","|","Indent","Outdent","|", _
				"Line","RemoveFormat","BRK", _
				"StyleAndFormatting","TextFormatting","ListFormatting", _
				"BoxFormatting","ParagraphFormatting","CssText","Styles","|", _
				"CustomTag","Paragraph","FontName","FontSize","|", _
				"Bold","Italic","Underline","Strikethrough","|", _
				"ForeColor","BackColor","|", _
				"CustomName1","CustomName2","CustomName3"} ' => Custom Button Placement

			'***************************************************
			'	OTHER SETTINGS
			'***************************************************
			oEdit1.onSave="document.forms.Form1.elements.btnSubmit.click();"
			
			oEdit1.Css="style/test.css" 'Specify external css file here
			
			'oEdit1.StyleList = New String(,){ _
			'		{"BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"}, _
			'		{".ScreenText",true,"Screen Text","font-family:Tahoma;"}, _
			'		{".ImportantWords",true,"Important Words","font-weight:bold;"}, _
			'		{".Highlight",true,"Highlight","font-family:Arial;color:red;"}}
					
			oEdit1.AssetManagerWidth = 640
			oEdit1.AssetManagerHeight = 465
			oEdit1.AssetManager = "/Editor/assetmanager/assetmanager.asp" 

			oEdit1.InternalLinkWidth = 365
			oEdit1.InternalLinkHeight = 270
			oEdit1.InternalLink = "links.htm"

			oEdit1.CustomObjectWidth = 365
			oEdit1.CustomObjectHeight = 270
			oEdit1.CustomObject = "objects.htm"

			oEdit1.CustomTagList = New String(,){ _
					{"First Name","{%first_name%}"}, _
					{"Last Name","{%last_name%}"}, _
					{"Email","{%email%}"}}

			oEdit1.CustomColors = New String() {"#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"}

			oEdit1.EditMode = "XHTMLBody"

		End Sub

		Sub Button1_Click(Source As System.Object, E As System.EventArgs)
	        Label1.Text = oEdit1.Text
		End Sub
	</script>
</head>
<body>


	
<form id="Form1" method="post" runat="server">

	<h4>Full Features - Toolbar reconfigured & Custom Buttons (ASP.NET example) - <a href="../default.htm">Back</a></h4>
	
	<editor:wysiwygeditor 
		Runat="server"
		scriptPath="../scripts/"
		ID="oEdit1" />
		
	<asp:button runat="server" onclick="Button1_Click" Text="SUBMIT" ID="btnSubmit" />

	<asp:label id="Label1" runat="server"/>
</form>

</body>
</html>