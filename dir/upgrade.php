<html dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>��� ������� ����� �������</title>
</head>
<style>
body      { font-family: tahoma; font-size: 10pt }
td        { font-family: tahoma; font-size: 10pt }
A         { COLOR: #0099FF; TEXT-DECORATION: none }
A:visited { COLOR: #0099FF; TEXT-DECORATION: none }
A:hover   { COLOR: #33CCFF; TEXT-DECORATION: underline }

</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="1" cellpadding="2" style="border-collapse: collapse; border-style: double; border-width: 3" bordercolor="#111111" width="100%" id="AutoNumber1" dir="rtl">
  <tr>
    <td width="100%" alegn="center">
������� �� ������� ����� ��� ������� ������
    </td>
  </tr>
</table>
<?php
include("config.php");
$footer = "<p align='center'>����� ���� ������� ������� ������<br>����� ������ <a target='_blank' href='http://www.nwahy.com'>www.nwahy.com</a>";
$error1 = "��� �� ������ ����� ���� ������ �������� �� �� ��� ������� ������ ��������";
$error2 = "��� �� ���� ������ ��� ����� ������ �������� �� �� ����� �������� �����";

$step = $_GET["step"];
if(!isset($step)) $step = 1;
if(isset($step))
{
switch ($step)
{
case "1":
echo "<p>&nbsp;</p>
<div align='center'>
  <center>
  <table border='0' cellpadding='3' cellspacing='3' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2' dir='rtl'>
    <tr>
      <td width='100%' align='center'>
��� ������ ��� ����� �������� ���� �� ��� ���� ���� �������� ������ ������ ���� ������ ����� ��� ���
      </td>
    </tr>
  </table>
  </center>
</div>
<form>
<div align='center'><input type='Button' value=' ���� ������� ' name='NextStep' onClick=\"location='upgrade.php?step=2'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "2":

echo "<p align='center'><font color='#FF0000'>����� ������� �� ����� ��������</font></p>";

echo "<ul>";

$sql1 = mysql_query("
CREATE TABLE `dlil_rand1` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql1){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand1 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand1 ����� .</li>";
}

$sql2 = mysql_query("
CREATE TABLE `dlil_rand2` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql2){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand2 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand2 ����� .</li>";
}

$sql3 = mysql_query("
CREATE TABLE `dlil_rand3` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql3){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand3 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand3 ����� .</li>";
}

$sql4 = mysql_query("
CREATE TABLE `dlil_article` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `metadescription` varchar(255) NOT NULL default '',
  `metakeywords` varchar(255) NOT NULL default '',
  `text` text,
  `active` int(11) default '0',
  `vis` int(11) default '0',
  `date` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
);
");
if(!$sql4){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_article --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_article ����� .</li>";
}

$sql5 = mysql_query("
CREATE TABLE `dlil_comment` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `emails` varchar(255) NOT NULL default '',
  `text` text,
  `active` int(11) default '0',
  `articleid` int(11) default '0',
  `date` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
);
");
if(!$sql5){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_comment --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_comment ����� .</li>";
}

$sql6 = mysql_query("
CREATE TABLE `dlil_poll` (
  `id` int(11) NOT NULL auto_increment,
  `qus` varchar(255) NOT NULL default '',
  `ans1` varchar(255) NOT NULL default '',
  `ans2` varchar(255) NOT NULL default '',
  `ans3` varchar(255) NOT NULL default '',
  `vote1` int(11) default '0',
  `vote2` int(11) default '0',
  `vote3` int(11) default '0',
  `active` int(11) default '0',
  `date` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
);
");
if(!$sql6){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_poll --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_poll ����� .</li>";
}

$sql7 = mysql_query("
CREATE TABLE `dlil_ips` (
  `id` int(11) NOT NULL auto_increment,
  `ipx` varchar(99) NOT NULL default '',
  `cat` int(11) default '0',
  `siteid` int(11) default '0',
  `date` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
);
");
if(!$sql7){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_ips --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_ips ����� .</li>";
}

echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='upgrade.php?step=3'\"></div>
</form>
<p>&nbsp;</p>";
break;











case "3":
echo "<p align='center'><font color='#FF0000'>����� ���� ������ ����� ��������</font></p>";
echo "<ul>";

$sql1 = mysql_query("
ALTER TABLE `dlil_options` ADD `limitarticles` INT NOT NULL DEFAULT '10',
ADD `showrticles` INT NOT NULL DEFAULT '1',
ADD `activecomments` INT NOT NULL DEFAULT '0',
ADD `showcomments` INT NOT NULL DEFAULT '1',
ADD `allowcomments` INT NOT NULL DEFAULT '1',
ADD `numbercharcomments` INT NOT NULL DEFAULT '400',
ADD `timerate` INT NOT NULL DEFAULT '600',
ADD `idpoll` INT NOT NULL DEFAULT '1',
ADD `randdate` VARCHAR( 50 ) NOT NULL ,
ADD `randsiteid` INT NOT NULL DEFAULT '1',
ADD `randtype` INT NOT NULL DEFAULT '1',
ADD `showrandsiteinindex` INT NOT NULL DEFAULT '1',
ADD `limitlikesite` INT NOT NULL DEFAULT '5',
ADD `showlikesite` INT NOT NULL DEFAULT '1',
ADD `typeaddcheck` INT NOT NULL DEFAULT '1',
ADD `textadd` TEXT NOT NULL ;
");
if(!$sql1){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ �� ������ dlil_options --> ( $error1 )</li>";
}else{
echo "<li>��� ����� ������ �� ������ dlil_options ����� .</li>";
}

echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='upgrade.php?step=4'\"></div>
</form>
<p>&nbsp;</p>";

case "4":

echo "<br><div align='center'>
  <center>
  <table border='0' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111' width='98%' id='AutoNumber1' dir='rtl'>
    <tr>
      <td width='100%' align='center'>
���� �������� ���� ������ ������� ������ �� ����� �������� ���� �����<br><br><br>

���� ��� ��� ������� upgrade.php ��� �������� �� ������� ���� ������� ������� �������<br><br>

���� ���� ��� ���� ������ ������ ������� ������ �� �������<br><br>

����� ���� ���� ����
      </td>
    </tr>
  </table>
  </center>
</div>";

break;
}
}
echo "$footer";
?>
</body>
</html>