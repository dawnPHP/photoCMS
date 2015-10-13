<?php
//from http://www.cnblogs.com/Zjmainstay/archive/2012/08/09/jQuery_upload_image.html
    //header('content-type:text/html charset:utf-8');  /* 这句要删除，否则可能会导致IE下回传HTML变成下载 */
	$index=$_POST['index'];
	include('class/Dir.class.php');
	include('class/UploadFile.class.php');
	include('class/MyDebug.class.php');
	
	//从session获取用户id号，当用户退出时删除该临时文件夹。
	$userId='5';
	$dir='images/usrTemp/'.$userId.'/';
	
	//如果不存在该文件夹，就新建
	if(!file_exists($dir)) mkdir($dir,'0777');
	
	//重写file数组
	$files=UploadFile::rearrange_files_array($_FILES);
	$files=$files['pic'];	
	$file=$files[0];
	
	//替换文件名中的空格为下划线
	$afterReplace = str_replace(' ', '_', $file['name']);
	$dst = $dir . iconv('utf-8','gbk',$afterReplace);//为文件系统转码
	move_uploaded_file($file['tmp_name'], $dst );

	//为前台显示拼接图片url
	$dst =$dir . $afterReplace;
	echo '<script>parent.showPreview('.$index.', "'. $dst. '");</script>';
//End_php