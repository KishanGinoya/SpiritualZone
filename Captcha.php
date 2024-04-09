<?php
		
		session_start();
		header('Content-type:image/jpeg');
		$md5=md5(rand(0,999));
		$pass=substr($md5,0,6); //substr(string, start,length)
		$_SESSION['captcha']=$pass;
		//$width = 100;
		//$height = 20;
		$image=imagecreate(90,25);
		$pink=imagecolorallocate($image,255,128,128);
		$black=imagecolorallocate($image,0,0,0);
		imagefill($image,0,0,$pink);
		imagestring($image,3,24,6,$pass,$black);
		imagerectangle($image,0,0,89,24,$black);
		imagejpeg($image);
		imagedestroy($image);
?> 