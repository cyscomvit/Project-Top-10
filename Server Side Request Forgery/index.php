<!DOCTYPE html>
<!-- saved from url=(0027)https://owaspvit.org/locker -->
<html lang="en" class="mdl-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="shortcut icon" type="image/jpg" href="./OWASP VITCC _ Certificates_files/cyscom_logo.jpg">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
OWASP TOP 10 SSRF
</title>
<link rel="shortcut icon" type="image/jpg" href="./OWASP VITCC _ Certificates_files/cyscom_logo.jpg">
<script src="./OWASP VITCC _ Certificates_files/firebase-ui-auth.js.download"></script>
<link type="text/css" rel="stylesheet" href="./OWASP VITCC _ Certificates_files/firebase-ui-auth.css">
<script src="./OWASP VITCC _ Certificates_files/firebase-app.js.download"></script>
<script src="./OWASP VITCC _ Certificates_files/firebase-storage.js.download"></script>
<link rel="stylesheet" href="./OWASP VITCC _ Certificates_files/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="./OWASP VITCC _ Certificates_files/style.css">
<link href="./OWASP VITCC _ Certificates_files/css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="./OWASP VITCC _ Certificates_files/jquery.particleground.js.download"></script>
<script type="text/javascript" src="./OWASP VITCC _ Certificates_files/demo.js.download"></script>
<link rel="stylesheet" href="./OWASP VITCC _ Certificates_files/style.css">
</head>
<body>
<div id="particles"><canvas class="pg-canvas" style="display: block;" width="1920" height="929"></canvas><canvas class="pg-canvas" style="display: block;" width="1920" height="929"></canvas>
<div id="intro" style="margin-top: 0px;">
<h1 class="header"><span aria-hidden="hidden">Certificates</span><span aria-hidden="hidden">Certificates</span><span aria-hidden="hidden">Certificates</span><span aria-hidden="hidden">Certificates</span><span aria-hidden="hidden">Certificates</span>Certificates<span aria-hidden="hidden">Certificates</span></h1>
<img src="./OWASP VITCC _ Certificates_files/cyscom_logo.jpg" class="logo">

<?php 
	
	
	echo '
	<form method=post>Specify the file name: <input type=text name=file ><br><br><input type=submit name=download value="load file"></form>';


	function file_download($download)
	{
		if(file_exists($download))
					{
						header("Content-Description: File Transfer"); 
						
						header('Content-Transfer-Encoding: binary');
						header('Expires: 0');
						header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
						header('Pragma: public');
						header('Accept-Ranges: bytes');
						header('Content-Disposition: attachment; filename="'.basename($download).'"'); 
						header('Content-Length: ' . filesize($download));
						header('Content-Type: application/octet-stream'); 
						ob_clean();
						flush();
						readfile ($download);
					}
					else
					{
					echo "<script>alert('file not found');</script>";	
					}
		
	}

if(isset($_POST['download']))
{

$file=trim($_POST['file']);

file_download($file);

} 


?>