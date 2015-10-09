<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
    body{font:11px verdana,arial,sans-serif;}
    a{color:#cc0000;font-size:xx-small;}
  </style>

  <!-- STEP 1: Editor Localization: Include language file -->
  <%
  sLanguage=Request("selLanguage")
  if sLanguage<>"" then Response.Write "<script language=JavaScript src='../scripts/language/" & sLanguage & "/editor_lang.js'></script>"
  %>
  <!--
  Or you can specify certain language directly using (for example) :
  <script language=JavaScript src='../scripts/language/german/editor_lang.js'></script>
  -->

  <script language=JavaScript src='../scripts/innovaeditor.js'></script>
</head>
<body>

<h4>Localization (ASP example) - <a href="../default.htm">Back</a></h4>

<form method="post" action="default.asp" id="Form1">

  Select Language:
  <select ID="selLanguage" NAME="selLanguage" onchange="document.getElementById('btnSubmit').click()">
    <option value=""    <%if sLanguage="" then response.Write "selected"%> >English</option>
    <option value="danish"  <%if sLanguage="danish" then response.Write "selected"%> >Danish</option>
    <option value="dutch" <%if sLanguage="dutch" then response.Write "selected"%> >Dutch</option>
    <option value="finnish" <%if sLanguage="finnish" then response.Write "selected"%> >Finnish</option>
    <option value="french"  <%if sLanguage="french" then response.Write "selected"%> >French</option>
    <option value="german"  <%if sLanguage="german" then response.Write "selected"%> >German</option>
    <option value="schi"  <%if sLanguage="schi" then response.Write "selected"%> >Chinese Simplified</option>
    <option value="tchi"  <%if sLanguage="tchi" then response.Write "selected"%> >Chinese Traditional</option>
    <option value="norwegian" <%if sLanguage="norwegian" then response.Write "selected"%> >Norwegian</option>
    <option value="spanish" <%if sLanguage="spanish" then response.Write "selected"%> >Spanish</option>
    <option value="swedish" <%if sLanguage="swedish" then response.Write "selected"%> >Swedish</option>
    <option value="italian" <%if sLanguage="italian" then response.Write "selected"%> >Italian</option>
  </select>

  <br><br>

  <textarea id="txtContent" name="txtContent" rows=4 cols=30>
  <%
  function encodeHTML(sHTML)
    sHTML=replace(sHTML,"&","&amp;")
    sHTML=replace(sHTML,"<","&lt;")
    sHTML=replace(sHTML,">","&gt;")
    encodeHTML=sHTML
  end function

  Response.Write encodeHTML(Request("txtContent"))
  %>
  </textarea>

  <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    //STEP 2: Asset Manager Localization: Add querystring lang=english/danish/dutch...
    oEdit1.cmdAssetManager="modalDialogShow('/Editor/assetmanager/assetmanager.asp?lang=<%=sLanguage%>',640,465)";
    /*
    Or you can specify certain language directly using (for example) :
    oEdit1.cmdAssetManager="modalDialogShow('/Editor/assetmanager/assetmanager.asp?lang=german',640,465)";
    */

    oEdit1.REPLACE("txtContent");
  </script>

  <input type="submit" value="Submit" id="btnSubmit">
</form>

































<!-- SPECIAL THANKS -->

<hr>
<ul>
<li>
  <b>Dansk Version</b>:<br>
  Special thanks to: <br>
  Lars Hansen / <a href="http://www.knappekragh.dk">www.knappekragh.dk</a><br><br>
</li>
<li>
  <b>Dutch Version</b>:<br>
  Special thanks to: <br>
  Mike van den Berg<br><br>
</li>
<li>
  <b>Finnish Version</b>:<br>
  Special thanks to: <br>
  Mika Nieminen / <a href="http://www.itvision.org">www.itvision.org</a><br><br>
</li>
<li>
  <b>French Version</b>:<br>
  Special thanks to: <br>
  Roland GALZY / <a href="http://www.mediadoo.com">www.mediadoo.com</a><br><br>
</li>
<li>
  <b>German Version</b>:<br>
  Special thanks to: <br>
  Philipp Alexander Starkl / <a href="http://www.ddesign.at">www.ddesign.at</a><br><br>
</li>
<li>
  <b>Chinese Version</b>:<br>
  Special thanks to: <br>
  Jimsun<br>
  Agog Digital Marketing Strategy<br>
  Provides quality search engine optimization and web development service.<br>
  <a href="http://www.agogdigital.com">www.agogdigital.com</a><br><br>
</li>
<li>
  <b>Norwegian Version</b>:<br>
  Special thanks to: <br>
  Per Willy Buffelen<br><br>
</li>
<li>
  <b>Spanish Version</b>:<br>
  Special thanks to: <br>
  Fredi Vinyals<br><br>
</li>
<li>
  <b>Swedish Version</b>:<br>
  Special thanks to: <br>
  Tomas Wikers / <a href="http://www.wikers.com">www.wikers.com</a><br><br>
</li>
<li>
  <b>Italian Version</b>:<br>
  Special thanks to: <br>
  Sam Morgan / <a href="http://www.wiredeyes.com">WIREDEYES - Internet Consultancy</a><br><br>
</li>
</ul>


</body>
</html>