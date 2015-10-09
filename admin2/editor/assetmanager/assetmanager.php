<base target="_self">
<html>
<head>
<title>Asset Manager</title>
<meta http-equiv="Content-Type" content="text-html; charset=Windows-1252">
<link href="style.css" rel="stylesheet" type="text/css">
<script>
  var sLang="english";
  document.write("<scr"+"ipt src='language/"+sLang+"/asset.js'></scr"+"ipt>");
</script>
<script>writeTitle()</script>
<script>
var bReturnAbsolute=false;
var activeModalWin;

function getAction()
  {
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //Clean previous ffilter=...
  sQueryString=window.location.search.substring(1)
  sQueryString=sQueryString.replace(/ffilter=media/,"")
  sQueryString=sQueryString.replace(/ffilter=image/,"")
  sQueryString=sQueryString.replace(/ffilter=flash/,"")
  sQueryString=sQueryString.replace(/ffilter=/,"")
  if(sQueryString.substring(sQueryString.length-1)=="&")
    sQueryString=sQueryString.substring(0,sQueryString.length-1)

  if(sQueryString.indexOf("=")==-1)
    {//no querystring
    sAction="assetmanager.php?ffilter="+document.getElementById("selFilter").value;
    }
  else
    {
    sAction="assetmanager.php?"+sQueryString+"&ffilter="+document.getElementById("selFilter").value
    }
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  return sAction;
  }

function applyFilter()//ffilter
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction()
  Form1.submit()
  }
function refreshAfterDelete(sDestination)
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=sDestination;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction()
  Form1.submit();
  }
function changeFolder()
  {
  var Form1 = document.forms.Form1;

  Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
  Form1.elements.inpFileToDelete.value="";

  Form1.action=getAction();
  Form1.submit();
  }

function upload()
  {
  var Form2 = document.forms.Form2;

  if(Form2.elements.File1.value == "")return;

  var sFile=Form2.elements.File1.value.substring(Form2.elements.File1.value.lastIndexOf("\\")+1);
  for(var i=0;i<document.getElementById("inpNumOfFiles").value;i++)
    {
    if(sFile==document.getElementById("idFile"+(i*1+1)).innerHTML)
      {
      if(confirm(getTxt("File already exists. Do you want to replace it?"))!=true)return;
      }
    }

  Form2.elements.inpCurrFolder2.value=document.getElementById("selCurrFolder").value;
  document.getElementById("idUploadStatus").innerHTML=getTxt("Uploading...")

  Form2.action=getAction()
  Form2.submit();
  }
function modalDialogShow(url,width,height)//moz
    {
    var left = screen.availWidth/2 - width/2;
    var top = screen.availHeight/2 - height/2;
    activeModalWin = window.open(url, "", "width="+width+"px,height="+height+",left="+left+",top="+top);
    window.onfocus = function(){if (activeModalWin.closed == false){activeModalWin.focus();};};
    }
function newFolder()
  {
  if(navigator.appName.indexOf('Microsoft')!=-1)
    window.showModalDialog("foldernew.php",window,"dialogWidth:250px;dialogHeight:192px;edge:Raised;center:Yes;help:No;resizable:No;");
  else
    modalDialogShow("foldernew.php", 250, 150);
  }
function deleteFolder()
  {
  var selCurrFolder = document.getElementById("selCurrFolder");

  if(selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder0").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder1").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder2").value.toLowerCase() ||
  selCurrFolder.value.toLowerCase()==document.getElementById("inpAssetBaseFolder3").value.toLowerCase())
    {
    alert(getTxt("Cannot delete Asset Base Folder."));
    return;
    }

  if(navigator.appName.indexOf('Microsoft')!=-1)
    window.showModalDialog("folderdel.php",window,"dialogWidth:250px;dialogHeight:192px;edge:Raised;center:Yes;help:No;resizable:No;");
  else
    modalDialogShow("folderdel.php", 250, 150);
  }
function downloadFile(index)
  {
  sFile_RelativePath = document.getElementById("inpFile"+index).value;
  window.open(sFile_RelativePath)
  }
function selectFile(index)
  {
  sFile_RelativePath = document.getElementById("inpFile"+index).value;

  //This will make an Absolute Path
  if(bReturnAbsolute)
    {
    sFile_RelativePath = window.location.protocol + "//" + window.location.host.replace(/:80/,"") + sFile_RelativePath
    //Ini input dr yg pernah pake port:
    //sFile_RelativePath = window.location.protocol + "//" + window.location.host.replace(/:80/,"") + "/" + sFile_RelativePath.replace(/\.\.\//g,"")
    }

  document.getElementById("inpSource").value=sFile_RelativePath;

  var arrTmp = sFile_RelativePath.split(".");
  var sFile_Extension = arrTmp[arrTmp.length-1]
  var sHTML="";

  //Image
  if(sFile_Extension.toUpperCase()=="GIF" || sFile_Extension.toUpperCase()=="JPG" || sFile_Extension.toUpperCase()=="PNG")
    {
    sHTML = "<img src=\"" + sFile_RelativePath + "\" >"
    }
  //SWF
  else if(sFile_Extension.toUpperCase()=="SWF")
    {
    sHTML = "<object "+
      "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' " +
      "width='100%' "+
      "height='100%' " +
      "codebase='http://active.macromedia.com/flash6/cabs/swflash.cab#version=6.0.0.0'>"+
      " <param name=movie value='"+sFile_RelativePath+"'>" +
      " <param name=quality value='high'>" +
      " <embed src='"+sFile_RelativePath+"' " +
      "   width='100%' " +
      "   height='100%' " +
      "   quality='high' " +
      "   pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash'>" +
      " </embed>"+
      "</object>";
    }
  //Video
  else if(sFile_Extension.toUpperCase()=="WMV"||sFile_Extension.toUpperCase()=="AVI"||sFile_Extension.toUpperCase()=="MPG")
    {
    sHTML = "<embed src='"+sFile_RelativePath+"' hidden=false autostart='true' type='video/avi' loop='true'></embed>";
    }
  //Sound
  else if(sFile_Extension.toUpperCase()=="WMA"||sFile_Extension.toUpperCase()=="WAV"||sFile_Extension.toUpperCase()=="MID")
    {
    sHTML = "<embed src='"+sFile_RelativePath+"' hidden=false autostart='true' type='audio/wav' loop='true'></embed>";
    }
  //Files (Hyperlinks)
  else
    {
    sHTML = "<br><br><br><br><br><br>Not Available"
    }

  document.getElementById("idPreview").innerHTML = sHTML;
  }
function deleteFile(index)
  {
  if (confirm(getTxt("Delete this file ?")) == true)
    {
    sFile_RelativePath = document.getElementById("inpFile"+index).value;

    var Form1 = document.getElementById("Form1");
    Form1.elements.inpCurrFolder.value=document.getElementById("selCurrFolder").value;
    Form1.elements.inpFileToDelete.value=sFile_RelativePath;

    Form1.action=getAction()
    Form1.submit();
    }
  }
bOk=false;
function doOk()
  {
  if(navigator.appName.indexOf('Microsoft')!=-1)
    window.returnValue=inpSource.value;
  else
    window.opener.setAssetValue(document.getElementById("inpSource").value);
  bOk=true;
  self.close();
  }
function doUnload()
  {
  if(navigator.appName.indexOf('Microsoft')!=-1)
    if(!bOk)window.returnValue="";
  else
    if(!bOk)window.opener.setAssetValue("");
  }
</script>
</head>
<body onunload="doUnload()" onload="loadTxt();this.focus();if(document.getElementById('inpUploadedFile').value!='')selectFile(document.getElementById('inpUploadedFile').value);" style="overflow:hidden;margin:0px;">

<input type="hidden" name="inpAssetBaseFolder0" id="inpAssetBaseFolder0" value="c:/inetpub/wwwroot/Editor/assets">
<input type="hidden" name="inpAssetBaseFolder1" id="inpAssetBaseFolder1" value="">
<input type="hidden" name="inpAssetBaseFolder2" id="inpAssetBaseFolder2" value="">
<input type="hidden" name="inpAssetBaseFolder3" id="inpAssetBaseFolder3" value="">

<table width="100%" height="100%" align=center style="" cellpadding=0 cellspacing=0 border=0 >
<tr>
<td valign=top style="background:url('bg.gif') no-repeat right bottom;padding-top:5px;padding-left:5px;padding-right:5px;padding-bottom:0px;">
    <!--ffilter-->
    <form method=post name="Form1" id="Form1">
        <input type="hidden" name="inpFileToDelete">
        <input type="hidden" name="inpCurrFolder">
    </form>

    <table width=100% border="0">
    <tr>
    <td>
        <table cellpadding="2" cellspacing="2" border="0">
        <tr>
        <td valign=center nowrap><select name='selCurrFolder' id='selCurrFolder' onchange='changeFolder()' class='inpSel'><option value='c:/inetpub/wwwroot/Editor/assets' selected>Assets</option><br />
<b>Warning</b>:  opendir(c:/inetpub/wwwroot/Editor/assets) [<a href='function.opendir'>function.opendir</a>]: failed to open dir: No such file or directory in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>141</b><br />
<br />
<b>Warning</b>:  readdir(): supplied argument is not a valid Directory resource in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>142</b><br />
<br />
<b>Warning</b>:  closedir(): supplied argument is not a valid Directory resource in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>169</b><br />
</select>&nbsp;</td>
        <td nowrap>
          <span onclick="newFolder()" style="cursor:pointer;"><u><span name="txtLang" id="txtLang" >New&nbsp;Folder</span></u></span>&nbsp;
          <span onclick="deleteFolder()" style="cursor:pointer;"><u><span name="txtLang" id="txtLang" >Del&nbsp;Folder</span></u></span>
        </td>
        <td  width=100% align="right">

        <select name=selFilter id=selFilter onchange='applyFilter()' class='inpSel'> <option name=optLang id=optLang value='' selected></option> <option name=optLang id=optLang value='media' ></option> <option name=optLang id=optLang value='image' ></option> <option name=optLang id=optLang value='flash' ></option></select>
        </td>
        </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td valign=top align="center">

        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
        <td>
          <div id="idPreview" style="text-align:center;overflow:auto;width:297;height:245;border:#d7d7d7 5px solid;border-bottom:#d7d7d7 3px solid;background:#ffffff;margin-right:2;"></div>
          <div align=center><input type="text" id="inpSource" name="inpSource" style="border:#cfcfcf 1px solid;width:295" class="inpTxt"></div>
        </td>
        <td valign=top width=100%>
          <div style='overflow:auto;height:222px;width:100%;margin-top:3px;margin-bottom:2px;'><table border=0 cellpadding=2 cellspacing=0 width=100% height=100% ><br />
<b>Warning</b>:  opendir(c:/inetpub/wwwroot/Editor/assets) [<a href='function.opendir'>function.opendir</a>]: failed to open dir: No such file or directory in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>207</b><br />
<br />
<b>Warning</b>:  readdir(): supplied argument is not a valid Directory resource in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>208</b><br />
<br />
<b>Warning</b>:  sort() expects parameter 1 to be array, null given in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>212</b><br />
<tr><td colspan=4 height=100% align=center><script>document.write(getTxt('Empty...'))</script></td></tr></table></div><input type=hidden name=inpUploadedFile id=inpUploadedFile value=''><input type=hidden name=inpNumOfFiles id=inpNumOfFiles value='0'><br />
<b>Warning</b>:  closedir(): supplied argument is not a valid Directory resource in <b>/var/www/www.adventuresinwebdesign.net/Editor/assetmanager/assetmanager.php</b> on line <b>340</b><br />
        </td>
        </tr>
        </table>

    </td>
    </tr>
    <tr>
    <td>
        <div >
        <div style="height:12">
        <font color=red></font>
        <span style="font-weight:bold" id=idUploadStatus></span>
        </div>


        <form enctype="multipart/form-data" method="post" runat="server" name="Form2" id="Form2">
        <input type="hidden" name="inpCurrFolder2" ID="inpCurrFolder2">
        <!--ffilter-->
        <input type="hidden" name="inpFilter" ID="inpFilter" value="">
        <span name="txtLang" id="txtLang">Upload File</span>: <input type="file" id="File1" name="File1" class="inpTxt">&nbsp;
        <input name="btnUpload" id="btnUpload" type="button" value="upload" onclick="upload()" class="inpBtn" onmouseover="this.className='inpBtnOver';" onmouseout="this.className='inpBtnOut'">
        </form>
        </div>
    </td>
    </tr>
    </table>

</td>
</tr>
<tr>
<td class="dialogFooter" style="height:40px;padding-right:15px;" align=right valign=middle>
  <table cellpadding=0 cellspacing=0 ID="Table2">
  <tr>
  <td>
  <input name="btnOk" id="btnOk" type="button" value=" ok " onclick="doOk()" class="inpBtn" onmouseover="this.className='inpBtnOver';" onmouseout="this.className='inpBtnOut'">
  </td>
  </tr>
  </table>
</td>
</tr>
</table>

</body>
</html>