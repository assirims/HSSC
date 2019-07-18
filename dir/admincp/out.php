<?php
if(isset($_COOKIE['userid']) AND isset($_COOKIE['pass'])){

setcookie("userid","",time()-864000);
setcookie("pass","",time()-864000);

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html dir='rtl' xmlns='http://www.w3.org/1999/xhtml' xml:lang='ar' lang='ar'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256' />
<META HTTP-EQUIV='refresh' CONTENT='3; URL=index.php' />
<link rel='stylesheet' href='style.css' type='text/css' />
<title>لوحة التحكم</title>
</head>
<body>
<div id='wrap'>
<br /> <br /> <br />
<div align='center'>تم تسجيل الخروج بنجاح ...</div>
<br /> <br /> <br />
</div>
</body>
</html>";
}else{
include('index.php');
}
?>