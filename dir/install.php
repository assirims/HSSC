<html dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>����� ����� ���� ������� ������� ������</title>
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
    <td width="100%">
    <p align="center">������ ����� ����� ���� ������� <font color="#FF6600">���� ����� �� ���/���� �� ���� ����� ����� ���� ������� ������� ������</font>
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
      <td width='100%'>������ ����� ����� ���� �������<p>��� ������ ��� ����� ��
      ����� ����� ���� ������� :</p>
      <ul>
        <li>���� �� ��� ���� ������ ������ .</li>
        <li>����� ���� �� ��� ���� ������� ����� �������� ������ ������ �� �����
        <font color='#0000FF'>config.php</font> .</li>
        <li>����� ���� �� ��� ��� ���� ���� ����� ������� ������ .</li>
        <li>����� ���� ��� (( <u><font color='#FF6600'>������ �������</font></u>
        )) ���� ������� �� ��� ���� .</li>
      </ul>
      </td>
    </tr>
  </table>
  </center>
</div>
<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='install.php?step=2'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "2":
echo "<p>&nbsp;</p>
<div align='center'>
  <center>
  <table border='0' cellpadding='3' cellspacing='3' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2' dir='rtl'>
    <tr>
      <td width='100%'>������� ����� �������� ���� ������ ������
        <font color='#0000FF'>config.php</font> .
        <ul>
        <li>��� ������ �� ������� $dbhost .</li>
        <li>��� ������ ����� �������� $dbuname .</li>
        <li>����� ����� ������ �������� $ppass .</li>
        <li>��� ����� �������� $dbname .</li>
      </ul>
      </td>
    </tr>
  </table>
  </center>
</div>
<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='install.php?step=3'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "3":
echo "<p align='center'><font color='#FF0000'>����� ������� �� ����� ��������</font></p>";
echo "<ul>";

$sql1 = mysql_query("
CREATE TABLE `dlil_admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(99) default NULL,
  `adminoruser` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql1){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_admin --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_admin ����� .</li>";
}


$sql2 = mysql_query("
CREATE TABLE `dlil_ads` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `image` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `upordown` int(11) default '0',
  `active` int(11) default '0',
  `orderads` int(11) default '0',
  `vis` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql2){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_ads --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_ads ����� .</li>";
}


$sql3 = mysql_query("
CREATE TABLE `dlil_blocks` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `text` text,
  `rightorleft` int(11) default '0',
  `active` int(11) default '0',
  `orderblock` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql3){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_blocks --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_blocks ����� .</li>";
}


$sql4 = mysql_query("
CREATE TABLE `dlil_catgory` (
`id` int(11) NOT NULL auto_increment,
`title` varchar(255) default NULL,
`metadescription` text,
`metakeywords` text,
`sub` int(11) default '0',
`ordercat` int(11) default '0',
`active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql4){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_catgory --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_catgory ����� .</li>";
}


$sql5 = mysql_query("
CREATE TABLE `dlil_site` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `metadescription` text,
  `metakeywords` text,
  `country` varchar(255) default NULL,
  `yourname` varchar(255) default NULL,
  `yourmail` varchar(255) default NULL,
  `active` int(11) default '0',
  `cat` int(11) default '0',
  `vis` int(11) default '0',
  `rate` int(11) default '0',
  `count` int(11) default '0',
  `lang` int(11) default '0',
  `date` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
);
");
if(!$sql5){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_site --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_site ����� .</li>";
}


$sql6 = mysql_query("
CREATE TABLE `dlil_counter` (
`counterdata` BIGINT NOT NULL DEFAULT '0'
);
");
if(!$sql6){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_counter --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_counter ����� .</li>";
}


$sql7 = mysql_query("
CREATE TABLE `dlil_online` (
`xip` VARCHAR( 99 ) NOT NULL ,
`xtime` VARCHAR( 30 ) NOT NULL
);
");
if(!$sql7){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_online --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_online ����� .</li>";
}


$sql8 = mysql_query("
CREATE TABLE `dlil_options` (
  `id` int(11) NOT NULL auto_increment,
  `namesite` varchar(255) NOT NULL default '',
  `urlsite` varchar(255) NOT NULL default '',
  `pathsite` varchar(255) NOT NULL default '',
  `emailsite` varchar(255) NOT NULL default '',
  `textheader` text,
  `textfooter` text,
  `closesitetext` varchar(255) NOT NULL default '',
  `closesite` int(11) default '0',
  `htmlorphp` int(11) default '0',
  `ads_headerloop` int(11) default '2',
  `ads_footerloop` int(11) default '2',
  `opt1` int(11) default '0',
  `meta1` varchar(255) NOT NULL default '',
  `meta2` varchar(255) NOT NULL default '',
  `foldertemplate` varchar(255) NOT NULL default '',
  `last_limit` int(11) default '10',
  `index_limit` int(11) default '20',
  `disallowcatid` varchar(99) NOT NULL default '1',
  `number` int(11) default '2',
  `site_cat_limit` int(11) default '20',
  `allow_add` int(11) default '1',
  `indexview` int(11) default '2',
  `limitinblock` int(11) default '10',
  `showblocks` int(11) default '0',
  `limitarticles` int(11) NOT NULL default '10',
  `showrticles` int(11) NOT NULL default '1',
  `activecomments` int(11) NOT NULL default '0',
  `showcomments` int(11) NOT NULL default '1',
  `allowcomments` int(11) NOT NULL default '1',
  `numbercharcomments` int(11) NOT NULL default '400',
  `timerate` int(11) NOT NULL default '600',
  `idpoll` int(11) NOT NULL default '1',
  `randdate` varchar(50) NOT NULL,
  `randsiteid` int(11) NOT NULL default '1',
  `randtype` int(11) NOT NULL default '1',
  `showrandsiteinindex` int(11) NOT NULL default '1',
  `limitlikesite` int(11) NOT NULL default '5',
  `showlikesite` int(11) NOT NULL default '1',
  `typeaddcheck` int(11) NOT NULL default '1',
  `textadd` text NOT NULL,
  PRIMARY KEY  (`id`)
);
");
if(!$sql8){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_options --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_options ����� .</li>";
}


$sql1x = mysql_query("
CREATE TABLE `dlil_rand1` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql1x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand1 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand1 ����� .</li>";
}

$sql2x = mysql_query("
CREATE TABLE `dlil_rand2` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql2x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand2 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand2 ����� .</li>";
}

$sql3x = mysql_query("
CREATE TABLE `dlil_rand3` (
  `id` int(11) NOT NULL auto_increment,
  `text` text,
  `active` int(11) default '0',
  PRIMARY KEY  (`id`)
);
");
if(!$sql3x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_rand3 --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_rand3 ����� .</li>";
}

$sql4x = mysql_query("
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
if(!$sql4x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_article --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_article ����� .</li>";
}

$sql5x = mysql_query("
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
if(!$sql5x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_comment --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_comment ����� .</li>";
}

$sql6x = mysql_query("
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
if(!$sql6x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_poll --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_poll ����� .</li>";
}

$sql7x = mysql_query("
CREATE TABLE `dlil_ips` (
  `id` int(11) NOT NULL auto_increment,
  `ipx` varchar(99) NOT NULL default '',
  `cat` int(11) default '0',
  `siteid` int(11) default '0',
  `date` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
);
");
if(!$sql7x){
echo "<li><font color='#0000FF'>���</font> �� ��� ����� ������ dlil_ips --> ( $error1 )</li>";
}else{
echo "<li>�� ����� ������ dlil_ips ����� .</li>";
}

echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='install.php?step=4'\"></div>
</form>
<p>&nbsp;</p>";
break;



case "4":
echo "<p align='center'><font color='#FF0000'>����� �������� ���������� �� ����� ��������</font></p>";
echo "<ul>";

$sql1 = mysql_query("INSERT INTO `dlil_admin` VALUES (1,'admin', '21232f297a57a5a743894a0e4a801fc3',0);");
if(!$sql1){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_admin --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_admin ����� .</li>";
}


$sql2 = mysql_query("
INSERT INTO `dlil_options` (`id`, `namesite`, `urlsite`, `pathsite`, `emailsite`, `textheader`, `textfooter`, `closesitetext`, `closesite`, `htmlorphp`, `ads_headerloop`, `ads_footerloop`, `opt1`, `meta1`, `meta2`, `foldertemplate`, `last_limit`, `index_limit`, `disallowcatid`, `number`, `site_cat_limit`, `allow_add`, `indexview`, `limitinblock`, `showblocks`, `limitarticles`, `showrticles`, `activecomments`, `showcomments`, `allowcomments`, `numbercharcomments`, `timerate`, `idpoll`, `randdate`, `randsiteid`, `randtype`, `showrandsiteinindex`, `limitlikesite`, `showlikesite`, `typeaddcheck`, `textadd`) VALUES
(1, 'nwahy', 'http://localhost', 'http://localhost/dir', 'admin@localhost.com', '', '', '', 0, 1, 2, 2, 0, 'nwahy.com,Nwahy', 'nwahy.com,Nwahy', 'templates/template1', 10, 20, '1,2,3,4,5,6,7,8,9', 2, 20, 1, 2, 10, 0, 2, 1, 0, 1, 1, 400, 600, 1, '1215451262', 362, 2, 1, 3, 1, 0, '<P><STRONG>��� ���� ������ ������</STRONG></P>\r\n<P><STRONG>- ��� ����� ����� �� ���� ������� ��� ���� ����� ��� ��������� ����� :</STRONG></P>\r\n<P><STRONG>1- �� ���� ���� ���� ���� �� ����� ���� ����� ��� �� ����� ������ ����� �� ����� .<BR>2- �� ������� ������ ������ ��� �� ������ �� ����� ���� ����� .<BR>3-&nbsp;�� ������� ������ ������ ��� �� ����� �� ����� ��� ������ �������� .<BR>4- �� ���� ��� ������ ����� ����� ��� �� ������ ������ .<BR>5- �� ���� ������� ������ ���������� ���� ���� ������ ������� ����� ��� ����� ������� ������ ���� ������ ������� ��������� ���������� ������� .<BR>6- �� ���� ���� ������ ������ �� http://www<BR>7- �� ���� ��� ������ ����� �� ����� ����� ��� ����� ���� ���� ��� ������ �� ������ ����� .<BR>8- �� ���� ������� ��������� ������ ���� ��� ����� ����� ���� ���� ������� ����� ��� ���� ��� ����� ����� .<BR>9- �� ����� ����� ������� ������ .<BR>10- ����� ����� ��� ����� �������� ����� ���� ������ �� ����� ����� ��� ������� ���� .<BR>11- ��� ������� ���� ����� ����� �� ���� �� ������ ��� ��� ������ �������� �������� ����� ��� ������ �� ��� .<BR>12- ��� ������� ����� ������ ���� ��� ��� ���� ����� ������ .</STRONG></P>');
");
if(!$sql2){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_options --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_options ����� .</li>";
}


$sqlxxx = mysql_query("
INSERT INTO `dlil_ads` (`id`, `title`, `image`, `url`, `upordown`, `active`, `orderads`, `vis`) VALUES
(1, '����� ������ ��������� ������� ������', 'images/i/bnr1.gif', 'http://www.nwahy.com/showdownload-1973.html', 0, 1, 1, 1),
(2, '����� �������� Nwahy Articles V1', 'images/i/bnr2.gif', 'http://www.nwahy.com/showdownload-1966.html', 0, 1, 2, 0);
");
if(!$sqlxxx){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_ads --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_ads ����� .</li>";
}


$sqlxxx2 = mysql_query("
INSERT INTO `dlil_blocks` (`id`, `title`, `text`, `rightorleft`, `active`, `orderblock`) VALUES
(1, '���� �������', '{newsite}', 1, 1, 1),
(2, '���� ������� ������', '{ratesite}', 1, 1, 2),
(3, '���� ������� ������', '{countsite}', 1, 1, 3),
(4, '���� ������� �����', '{visitesite}', 0, 1, 1),
(5, '���� �������', '{oldsite}', 0, 1, 2);
");
if(!$sqlxxx2){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_blocks --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_blocks ����� .</li>";
}


echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' ��� ����� ����� ������ ' name='NextStep' onClick=\"location='install.php?step=5'\"></div>
</form>

<form>
<div align='center'><input type='Button' value=' ����� ����� ������ ' name='NextStep' onClick=\"location='install.php?step=insert'\"></div>
</form>
<p>&nbsp;</p>";
break;



case "insert":
$sql5 = mysql_query("
INSERT INTO `dlil_catgory` (`id`, `title`, `metadescription`, `metakeywords`, `sub`, `ordercat`, `active`) VALUES
(1, '����� �������', '����� �������,��������,�����,�����,���� ����,���� ����,������,������,�������,����,�����,�����,����', '����� �������,��������,�����,�����,���� ����,���� ����,������,������,�������,����,�����,�����,����', 0, 1, 1),
(2, '������ ������', '���� ����,������,�����,�������,�����', '���� ����,������,�����,�������,�����', 1, 1, 1),
(3, '������ ������', '������ ������,����� ��������,��������', '������ ������,����� ��������,��������', 1, 2, 1),
(4, '������� �������', '������� �������', '������� �������', 1, 3, 1),
(5, '����� �������� ��������', '', '', 1, 4, 1),
(6, '������� ���������� ���������', '������� ���������,�������,��������� ���������,��� ����� ���������,��� �������', '������� ���������,�������,��������� ���������,��� ����� ���������,��� �������', 1, 5, 1),
(7, '����� ���������', '��� �������', '��� �������', 1, 6, 1),
(8, '�������', '', '', 1, 7, 1),
(9, '�������� ���������', '�������� ���������', '�������� ���������', 1, 8, 1),
(10, '����� �������', '�����,������ �����,������,�������,�������,�� �� ��', '�����,������ �����,������,�������,�������,�� �� ��', 0, 2, 1),
(11, '����� ������� �������', '', '', 10, 1, 1),
(12, '������ �������', '', '', 10, 2, 1),
(13, '����� ��������', '', '', 10, 3, 1),
(14, '����� ��������', '', '', 10, 4, 1),
(15, '����� ���������� �������� ��������� ����������', '', '', 10, 5, 1),
(16, '����� �������', '', '', 10, 6, 1),
(17, '����� �������', '', '', 10, 7, 1),
(18, '��� ����', '', '', 10, 8, 1),
(19, '������� ������', '�������,���� ���,������,����� ������,����� �����,�������,������ �������', '������ ������,����� �������,����� ������,����� ������,�����,�����,����� �����', 0, 3, 1),
(20, '����� �������', '����� ������,���� ������,��� ���������,������ ��������,�����,������', '����� ������,����� �������,������ ������,�����,����,����� �����,�������,�������', 19, 1, 1),
(21, '����� ������� ����', '', '', 19, 2, 1),
(22, '����� ������ ���������', '', '', 19, 3, 1),
(23, '������� ������ �������', '', '', 19, 4, 1),
(24, '����� �������� - ���������', '�������,����,������,��� �������,����� ����� �����', '�������,����,������,��� �������,����� ����� �����', 19, 5, 1),
(25, '���� ������� ������ ��������', 'php,html,cgi,asp,jsp,css,vb,vb .net,java,sql,mysql,xml,rss,linux,unix,zend,txt', 'php,html,cgi,asp,jsp,css,vb,vb .net,java,sql,mysql,xml,rss,linux,unix,zend,txt', 19, 6, 1),
(26, '������ ������� - ���������', '����� �����,����� ������,����� ������,�������,��� �����,��� ������,����', '����� �����,����� ������,����� ������,�������,��� �����,��� ������,����', 19, 7, 1),
(27, '������ ������', '����� ��������,�����,�����,�������,������,�����,���,���', '����� ��������,�����,�����,�������,������,�����,���,���', 0, 4, 1),
(28, '����� ��������', '', '', 27, 1, 1),
(29, '��� �������� - �������', '', '', 27, 2, 1),
(30, '����� �������', '', '', 27, 3, 1),
(31, '������� ������� - �����', '', '', 27, 4, 1),
(32, '����� �������', '', '', 27, 5, 1),
(33, '����� ���� ��������', '', '', 27, 6, 1),
(34, '����� ����', '', '', 27, 7, 1),
(35, '������ ��������', '����� ������,�����,����� �����,����� �����,����� ��� �������,������ �������,������ �������', '����� ������,�����,����� �����,����� �����,����� ��� �������,������ �������,������ �������', 0, 5, 1),
(36, '����� ������', '', '', 35, 1, 1),
(37, '����� �������', '', '', 35, 2, 1),
(38, '������ �������', '', '', 35, 3, 1),
(39, '����� ����� ���������', '', '', 35, 4, 1),
(40, '����� ������ �������', '', '', 35, 5, 1),
(41, '����� �������', '', '', 35, 6, 1),
(42, '����� �������', '', '', 35, 7, 1),
(43, '����� ����', '���� ������ Alternative Medicine,�� ������� Dentistry,������� Dermatology', '��� ������ Islamic Medicicne,���� Ophthalmology,����� ��� ���� Cardiothoracic Surgery', 0, 6, 1),
(44, '����� �������� ����� ������', '��� ������ Islamic Medicicne,���� ������ Alternative Medicine', '��� ������ Islamic Medicicne,���� ������ Alternative Medicine', 43, 1, 1),
(45, '�� �������', '�� ������� Dentistry', '�� ������� Dentistry', 43, 2, 1),
(46, '���� ������', '���� ������ Obstetrics and Gynecology', '���� ������ Obstetrics and Gynecology', 43, 3, 1),
(47, '�����', '����� Pediatrics', '����� Pediatrics', 43, 4, 1),
(48, '����� �����', '����� ����� psychiatry', '����� ����� psychiatry', 43, 5, 1),
(49, '���� ����� ����', '���� ����� ���� webguides medical', '���� ����� ���� webguides medical', 43, 6, 1),
(50, '����� ���� ����', '', '', 43, 7, 1),
(51, '�������', '������� �������,������� �����,������� ����� �����', '������� ��������,������� ������,������� �������,������� �������', 0, 7, 1),
(52, '������� �������', '', '', 51, 1, 1),
(53, '������� ��������', '', '', 51, 2, 1),
(54, '������� ������', '', '', 51, 3, 1),
(55, '������� �����', '', '', 51, 4, 1),
(56, '������� ����', '', '', 51, 5, 1),
(57, '������� ������', '', '', 51, 7, 1),
(58, '������� ������� �������', '', '', 51, 8, 1),
(59, '������� ����� �����', '', '', 51, 9, 1),
(60, '������� ����� ��������', '', '', 51, 10, 1),
(61, '������� �������', '', '', 51, 11, 1),
(62, '���� ������', '���� �����,����� �����,����� �������,��� �������,����� �����,����� ������', '���� �����,����� �����,����� �������,��� �������,����� �����,����� ������', 0, 8, 1),
(63, '����� �������', '������,�����,�����,����,�����,�����,����,�����,������,������,�������,��������', '������,�����,�����,����,�����,�����,����,�����,������,������,�������,��������', 62, 1, 1),
(64, '��� �������', '', '', 62, 2, 1),
(65, '����� ��� �����', '���� ���,���� �����,���� �����,��� ����,������ ���', '���� ���,���� �����,���� �����,��� ����,������ ���', 62, 3, 1),
(66, '����� ��������', '��� ������,����,�����,��� ������,�����,����,����� �����,�����,���,����,���,���,������', '��� ������,����,�����,��� ������,�����,����,����� �����,�����,���,����,���,���,������', 62, 4, 1),
(67, '����� ������', '���� ������,���� �����,���� �������,���� ������,������,�������,��������,�������,������,�� ����,�������,���� ���,������,�������,����,���', '���� �����,�������,������� �������,�����,�������,�������,�����,���������,����,����,����� �����', 62, 5, 1),
(68, '����� �����', '����,�����,����� �����,����,�����,�� ������', '����,�����,����� �����,����,�����,�� ������', 62, 6, 1),
(69, '��� ����', '', '', 62, 7, 1),
(70, '������ �������', '', '', 62, 8, 1),
(71, '����� ���� ������', '����,����,����,����,�����,�����,�����,����,���,�����', '����,����,�����,�����,�����,�����,�����,�����', 62, 9, 1),
(72, '����� ���� �����', '', '', 62, 10, 1);
");
if(!$sql5){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_catgory --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_catgory ����� .</li>";
}


$sql6 = mysql_query("

INSERT INTO `dlil_site` (`id`, `title`, `url`, `metadescription`, `metakeywords`, `country`, `yourname`, `yourmail`, `active`, `cat`, `vis`, `rate`, `count`, `lang`, `date`) VALUES
(1, '���� ������ ������', 'http://www.quranway.net', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(2, '������ ������ - ������ ���������', 'http://audio.islamweb.net/audio/index.php?page=rewaya', '������ ������ - ������ ���������', '������ ������ - ������ ���������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(3, '������ ������ - ���� �������', 'http://www.quran.al-islam.com/arb', '������ ������ - ���� �������', '������ ������ - ���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(4, '����� ������ - ���� �������', 'http://www.islamway.com/?iw_s=Quran', '����� ������ - ���� �������', '����� ������ - ���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(5, '����� ������ (��� ����)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&bm=yes&taf=KATHEER', '����� ������ (��� ����)', '����� ������ (��� ����)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(6, '����� ������ (������)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=TABARY&nType=1&nSora=1&nAya=1', '����� ������ (������)', '����� ������ (������)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(7, '������ ������ - ���� ����', 'http://islamic.naseej.com.sa/staticpages/islamic/quran/index.asp', '������ ������ - ���� ����', '������ ������ - ���� ����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(8, '����� ������ (�������)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=KORTOBY&nType=1&nSora=1&nAya=1', '����� ������ (�������)', '����� ������ (�������)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(9, '����� ������ (��������)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=GALALEEN&nType=1&nSora=1&nAya=1', '����� ������ (��������)', '����� ������ (��������)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(10, '����� ������ ������', 'http://quran.muslim-web.com', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(11, '������� ������ �� ������ ������', 'http://www.55a.net', '������� ������ �� ������ ������', '������� ������ �� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(12, '������������� �� ������ ������', 'http://www.eajaz.com', '������������� �� ������ ������', '������������� �� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(13, '���� ����� ��� ������ ������', 'http://www.qurancomplex.org', '���� ����� ��� ������ ������', '���� ����� ��� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(14, '������ ���� ������', 'http://www.samaway.com', '������ ���� ������', '������ ���� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(15, '���� ������ ������', 'http://qurankareem.info', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(16, '������ ������ ������ ������ ������', 'http://www.markaz1.com', '������ ������ ������ ������ ������', '������ ������ ������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(17, '��� �������� �������� ��������', 'http://www.islamnoon.com', '��� �������� �������� ��������', '��� �������� �������� ��������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(18, '������ ������ ����� ������', 'http://www.hamoislam.com/quraan.htm', '������ ������ ����� ������', '������ ������ ����� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(19, '�� ���� ������ ���� ���', 'http://www.khayma.com/islamissolution/iis/zelal/fhrszelal.htm', '�� ���� ������ ���� ���', '�� ���� ������ ���� ���', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(20, '����� ������ ������', 'http://www.prayertimes.ps/Quran/QIndex.html', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(21, '����� ������ ������ �� �����', 'http://www.quran-radio.com', '����� ������ ������ �� �����', '����� ������ ������ �� �����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(22, '�������', 'http://www.tadjweed.com', '�������', '�������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(23, '���� ������ ������', 'http://www.quraan.com', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 2, '1211214958'),
(24, '���� ���� ������', 'http://www.qquran.com', '���� ���� ������', '���� ���� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(25, '���� �����', 'http://www.qurani.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(26, '���� ������ ������', 'http://www.quransite.com', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(27, '����� ������ ������', 'http://www.tarteel.com', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(28, '���� ���� �������', 'http://www.alwahyain.net', '���� ���� �������', '���� ���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(29, '���� ����� ������ ������', 'http://www.quran.tv', '���� ����� ������ ������', '���� ����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(30, '����� ������� �����', 'http://www.shikh.com', '����� ������� �����', '����� ������� �����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(31, '����� ������ ������', 'http://www.altheqa.org', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(32, '���� ��� ������ ������ �������', 'http://www.alawfa.com', '���� ��� ������ ������ �������', '���� ��� ������ ������ �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(33, '��� ����� ������ ������', 'http://www.qaaaf.org', '��� ����� ������ ������', '��� ����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(34, '����� ���� �������', 'http://www.al-forquan.com', '����� ���� �������', '����� ���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(35, '����', 'http://www.ayaat.com', '����', '����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(36, '��� �������', 'http://www.hadielislam.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(37, '����� ��� ������ ������', 'http://www.quran.gov.ae', '����� ��� ������ ������', '����� ��� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(38, '������ ������', 'http://quran4all.net', '������ ������', '������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(39, '����� ��� ������ ������ ������', 'http://www.quranrak.org.ae', '����� ��� ������ ������ ������', '����� ��� ������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(40, '����� ������� ��� ����', 'http://www.alijaber.net', '����� ������� ��� ����', '����� ������� ��� ����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(41, '������ ����� ������ �������', 'http://www.alshatri.net', '������ ����� ������ �������', '������ ����� ������ �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(42, '���� ������', 'http://www.ryadh-quran.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(43, '����� ����� ������', 'http://www.kaheel7.com', '����� ����� ������', '����� ����� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(44, '����� �������', 'http://www.nasiha.net', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(45, '�������', 'http://quran.qatardr.net', '�������', '�������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(46, '�� ������ ������ ����� ������', 'http://www.hollyq.com', '�� ������ ������ ����� ������', '�� ������ ������ ����� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(47, '����� ������ ������ �������', 'http://www.mp3quran.net', '����� ������ ������ �������', '����� ������ ������ �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(48, '����� ��������� ��������', 'http://www.abdalbasit.com', '����� ��������� ��������', '����� ��������� ��������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(49, '������ ������� ���� ������ ������ �����', 'http://www.dorah-quran.org', '������ ������� ���� ������ ������ �����', '������ ������� ���� ������ ������ �����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(50, '���� ���� �� ���� ����� ������', 'http://www.hoffad.com', '���� ���� �� ���� ����� ������', '���� ���� �� ���� ����� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(51, '���� ������ ������', 'http://ryadh-quran.net', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(52, '���� �������', 'http://www.islamseed.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(53, '������ ������ ������', 'http://www.tanateesh.com/quran', '������ ������ ������', '������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(54, '������ ������', 'http://www.quranflash.com', '������ ������', '������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(55, '��� ������ ������', 'http://www.ketaballah.net', '��� ������ ������', '��� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(56, '����� ������ ������', 'http://www.altheqa.org', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(57, '����� ���� �� ������ ��������', 'http://almehaisni.net', '����� ���� �� ������ ��������', '����� ���� �� ������ ��������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(58, '����� ���� ������', 'http://www.m-bassuony.com', '����� ���� ������', '����� ���� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(59, '������� ��������', 'http://www.almaqraa.com', '������� ��������', '������� ��������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(60, '������ �������� ������ ������ ������', 'http://www.al-rayaheen.com', '������ �������� ������ ������ ������', '������ �������� ������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(61, '���� ����� ������ ������ ������', 'http://www.trtel.com', '���� ����� ������ ������ ������', '���� ����� ������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(62, '��� �����', 'http://www.sahmalnour.org', '��� �����', '��� �����', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(63, '���� ������ ������', 'http://www.hqw7.com', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(64, '����� ����� ������ ������', 'http://www.quranexplorer.com', '����� ����� ������ ������', '����� ����� ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(65, '���� ����� ������', 'http://www.4quran.cc', '���� ����� ������', '���� ����� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(66, '������ ������ �������', 'http://www.ma3h.com', '������ ������ �������', '������ ������ �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(67, '��� ������ ������ ������', 'http://www.hafss.com', '��� ������ ������ ������', '��� ������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(68, '���� �������', 'http://www.imadislam.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(69, '������ ������ mp3', 'http://quran.y-nas.com', '������ ������ mp3', '������ ������ mp3', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(70, '������ ������ ������', 'http://www.iid-quran.com', '������ ������ ������', '������ ������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(71, '����� - ���� ������� ������', 'http://www.alkabs.net', '����� - ���� ������� ������', '����� - ���� ������� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(72, '������ ������', 'http://www.mosshaf.com', '������ ������', '������ ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(73, '���� ������', 'http://www.el-moslem.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(74, '��� �������', 'http://www.badrelislam.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(75, '������ ������', 'http://hadith.al-islam.com', '������ ������', '������ ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(76, '������ - ���� �������', 'http://www.al-eman.com/hadeeth', '������ - ���� �������', '������ - ���� �������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(77, '������ - ������ ��������� ����', 'http://www.islamic-council.com/Al-Sonna/Default.asp?Action=Start', '������ - ������ ��������� ����', '������ - ������ ��������� ����', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(78, '����� ������ ��� ������ ������', 'http://www.dorar.net/hadith.php', '����� ������ ��� ������ ������', '����� ������ ��� ������ ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(79, '���� ����� ������� �������', 'http://www.alssunnah.com', '���� ����� ������� �������', '���� ����� ������� �������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(80, '������� �������� ������� ����������', 'http://www.alshaykhan.com', '������� �������� ������� ����������', '������� �������� ������� ����������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(81, '������� �������� ����� �������', 'http://www.sunan.org', '������� �������� ����� �������', '������� �������� ����� �������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(82, '����� ������', 'http://www.hadiith.net', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(83, '����� ������ ������', 'http://www.iid-hadeth.com', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(84, '��� ������', 'http://www.alsalafe.com', '��� ������', '��� ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(85, '������ ������ �������', 'http://sirah.al-islam.com', '������ ������ �������', '������ ������ �������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(86, '���� ����� ������ ������', 'http://www.hadeeth.tv', '���� ����� ������ ������', '���� ����� ������ ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(87, '��� �������', 'http://www.offok.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(88, '����� ����� ������ ������ ������', 'http://www.ihsanetwork.org', '����� ����� ������ ������ ������', '����� ����� ������ ������ ������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(89, '����� �������� ������� ��������', 'http://arabic.islamicweb.com/Books/albani.asp', '����� �������� ������� ��������', '����� �������� ������� ��������', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(90, '���� ����� ��� ���', 'http://www.binbaz.org.sa', '���� ����� ��� ���', '���� ����� ��� ���', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(91, '����� ������� �� �����', 'http://www.ibn-jebreen.com', '����� ������� �� �����', '����� ������� �� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(92, '����� ����� ������ - ������� �����', 'http://www.islamtoday.net', '����� ����� ������ - ������� �����', '����� ����� ������ - ������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(93, '����� ���� ������� ��������', 'http://shankeety.net', '����� ���� ������� ��������', '����� ���� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(94, '���� ������ �����', 'http://www.alminbar.net', '���� ������ �����', '���� ������ �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(95, '������� ���� ����� ����� ������', 'http://www.islam-qa.com', '������� ���� ����� ����� ������', '������� ���� ����� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(96, '������� �������� ����� ������', 'http://www.islamselect.com', '������� �������� ����� ������', '������� �������� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(97, '����� ��� ������ �������', 'http://www.sh-rajhi.com', '����� ��� ������ �������', '����� ��� ������ �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(98, '����� ���� ����� - ������', 'http://www.almoslim.net', '����� ���� ����� - ������', '����� ���� ����� - ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(99, '���� ����� ��� ������', 'http://www.ibnothaimeen.com', '���� ����� ��� ������', '���� ����� ��� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(100, '����� ���� �� ����� �� �����', 'http://www.alfawzan.ws', '����� ���� �� ����� �� �����', '����� ���� �� ����� �� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(101, '����� ��� �������', 'http://www.alhawali.com', '����� ��� �������', '����� ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(102, '���� ����� ����� ���� ����', 'http://www.alfeqh.com', '���� ����� ����� ���� ����', '���� ����� ����� ���� ����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(103, '����� �������� ������� ��������', 'http://arabic.islamicweb.com/Books/albani.asp', '����� �������� ������� ��������', '����� �������� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(104, '������ ������ ������', 'http://www.quran-for-all.com', '����� ������� ����� ������', '����� ������� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(105, '�������� ��������� �������� - ������', 'http://www.islamicaudiovideo.com', '�������� ��������� �������� - ������', '�������� ��������� �������� - ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(106, '������ - ����� ���� ������', 'http://www.almurabbi.com', '������ - ����� ���� ������', '������ - ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(107, '���� ������� ����� ��� �����', 'http://www.alwahyain.net', '���� ������� ����� ��� �����', '���� ������� ����� ��� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(108, '����� ���� �� ������� ������', 'http://www.algarne.com', '����� ���� �� ������� ������', '����� ���� �� ������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(109, '���� ������� - ����� ���� ������', 'http://www.emanway.com', '���� ������� - ����� ���� ������', '���� ������� - ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(110, '������� ������� ���� ���� ������', 'http://www.altareekh.com', '������� ������� ���� ���� ������', '������� ������� ���� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(111, '������� ���� ��������', 'http://www.suwaidan.com', '������� ���� ��������', '������� ���� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(112, '���� ������ - ����� ���� ������', 'http://www.taiba.org', '���� ������ - ����� ���� ������', '���� ������ - ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(113, '������ - ����� ��������� ������', 'http://www.taratil.com', '������ - ����� ��������� ������', '������ - ����� ��������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(114, '����� ���� ������� �����', 'http://www.h-alali.net', '����� ���� ������� �����', '����� ���� ������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(115, '������ - ����� ����� ������', 'http://www.almanhaj.net', '������ - ����� ����� ������', '������ - ����� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(116, '������� ������ - ����� ���� �������', 'http://www.alislam4all.com', '������� ������ - ����� ���� �������', '������� ������ - ����� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(117, '������� ����� (����� ����)', 'http://www.islamtoday.com', '������� ����� (����� ����)', '������� ����� (����� ����)', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 2, '1211277322'),
(118, '����� ���� ����� (��� ��������)', 'http://www.quraat.com', '����� ���� ����� (��� ��������)', '����� ���� ����� (��� ��������)', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(119, '����� ���� �� ���� �������', 'http://www.muqbel.net', '����� ���� �� ���� �������', '����� ���� �� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(120, '����� ��� ���� �� ����� ������', 'http://www.alshreef.com', '����� ��� ���� �� ����� ������', '����� ��� ���� �� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(121, '����� ��� �� ��� ������ - ��������', 'http://www.islameiat.com', '����� ��� �� ��� ������ - ��������', '����� ��� �� ��� ������ - ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(122, '���� ������� - ����� ���� �����', 'http://www.toislam.net', '���� ������� - ����� ���� �����', '���� ������� - ����� ���� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(123, '������� ���� ������', 'http://www.almutawa.info', '������� ���� ������', '������� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(124, '���� ����� ���� ��� �����', 'http://www.shaikhfayez.net', '���� ����� ���� ��� �����', '���� ����� ���� ��� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(125, '����� ������� - ����� ��� �������', 'http://www.22522.com', '����� ������� - ����� ��� �������', '����� ������� - ����� ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(126, '������� ��� ����� ������', 'http://www.arabian-child.net/Allehaidan/AlLuhaidan.html', '������� ��� ����� ������', '������� ��� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(127, '���� ������ ���� �� ���������', 'http://www.almoslim.net/Moslim_Files/dawah/index.cfm', '���� ������ ���� �� ���������', '���� ������ ���� �� ���������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(128, '������ ���� ������', 'http://www.alhashem.net', '������ ���� ������', '������ ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(129, '����� ���������', 'http://www.3llamteen.com', '����� ���������', '����� ���������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(130, '����� ��������� ���������', 'http://www.salafi.net', '����� ��������� ���������', '����� ��������� ���������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(131, '����� ���� ���� ������', 'http://www.alathry.com', '����� ���� ���� ������', '����� ���� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(132, '������ ���� ������� ��������', 'http://www.raddadi.com/?action=pages.11', '������ ���� ������� ��������', '������ ���� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(133, '������� ������� ����� ���� ������', 'http://www.naseh.net', '������� ������� ����� ���� ������', '������� ������� ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(134, '����� ������� �������', 'http://www.raddadi.com/?action=pages.10', '����� ������� �������', '����� ������� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(135, '������� ����� ���� ����� �����', 'http://www.yasaloonak.net', '������� ����� ���� ����� �����', '������� ����� ���� ����� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(136, '����� ���� �� ������� ������', 'http://www.almosleh.com', '����� ���� �� ������� ������', '����� ���� �� ������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(137, '������� ���� ��� �����', 'http://www.jaafaridris.com', '������� ���� ��� �����', '������� ���� ��� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(138, '����� ������ ����� ���� ������', 'http://www.dorar.net', '����� ������ ����� ���� ������', '����� ������ ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(139, '����� ���� ���� ������', 'http://www.gabori.net', '����� ���� ���� ������', '����� ���� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(140, '������� ���� ����', 'http://www.amrkhaled.net', '������� ���� ����', '������� ���� ����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(141, '��� ������� ��������', 'http://www.islamway.com/bindex.php?section=scholarlessons&scholar_id=216', '��� ������� ��������', '��� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(142, '���� ������ ����� �������', 'http://www.alafasy.com', '���� ������ ����� �������', '���� ������ ����� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(143, '���� ����� ���� �����', 'http://www.jebril.com', '���� ����� ���� �����', '���� ����� ���� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(144, '����� ��� ��������', 'http://www.alitantawi.com', '����� ��� ��������', '����� ��� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(145, '������� ���� ���� ������ ��������', 'http://www.zeadonline.com', '������� ���� ���� ������ ��������', '������� ���� ���� ������ ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(146, '����� ������ - ����� ���� �������', 'http://www.dawahwin.com', '����� ������ - ����� ���� �������', '����� ������ - ����� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(147, '����� ���� ����', 'http://www.wagdyghoneim.com', '����� ���� ����', '����� ���� ����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(148, '������ ��� ����� - ����� ����� ������', 'http://www.awalethnain.com', '������ ��� ����� - ����� ����� ������', '������ ��� ����� - ����� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(149, '����� ���� �����', 'http://www.ayaseen.com', '����� ���� �����', '����� ���� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(150, '����� �������� - ����� ���� ������', 'http://www.alrashed-km.com', '����� �������� - ����� ���� ������', '����� �������� - ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(151, '������ ���� ������� ��������', 'http://www.al7aidan.com', '������ ���� ������� ��������', '������ ���� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(152, '���� ����� ���� ������', 'http://www.dweesh.com', '���� ����� ���� ������', '���� ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(153, '������ ��� �������', 'http://www.alkanderi.com', '������ ��� �������', '������ ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(154, '����� ��������', 'http://www.khayma.com/alsharawi', '����� ��������', '����� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(155, '����� ��� �������', 'http://www.22522.com', '����� ��� �������', '����� ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(156, '���� ��� �������', 'http://www.islamlight.net', '���� ��� �������', '���� ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(157, '������� ���� �������', 'http://www.dr-hakem.org', '������� ���� �������', '������� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(158, '����� ���� �� ����� ������', 'http://www.bnmobarak.com/', '����� ���� �� ����� ������', '����� ���� �� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(159, '����� ��������� �� ���� ������', 'http://albarrak.islamlight.net', '����� ��������� �� ���� ������', '����� ��������� �� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(160, '������ - ����� ������ �������', 'http://www.alkashf.net', '������ - ����� ������ �������', '������ - ����� ������ �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(161, '����� ������� ���� ��� �����', 'http://www.ferkous.com', '����� ������� ���� ��� �����', '����� ������� ���� ��� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(162, '���� - ������ ������� �������', 'http://www.shefaa.org', '���� - ������ ������� �������', '���� - ������ ������� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(163, '����� ����� ���� ����� ��������', 'http://www.elsharawy.com', '����� ����� ���� ����� ��������', '����� ����� ���� ����� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(164, '����� ���� �� ��� ������', 'http://www.alajmy.com', '����� ���� �� ��� ������', '����� ���� �� ��� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(165, '����� ������� �� ���� �������', 'http://www.alfuzan.islamlight.net', '����� ������� �� ���� �������', '����� ������� �� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(166, '����� ��� ������ �������', 'http://www.abdslam.com', '����� ��� ������ �������', '����� ��� ������ �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(167, '����� ���� ���� ����� ��������', 'http://www.alalbany.net', '����� ���� ���� ����� ��������', '����� ���� ���� ����� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(168, '����� ���� ����', 'http://www.mohamedhassan.org', '����� ���� ����', '����� ���� ����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(169, '����� ���� ���������', 'http://islamlight.net/almosimiry', '����� ���� ���������', '����� ���� ���������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(170, '����� ������� ���� �������', 'http://www.shubily.com', '����� ������� ���� �������', '����� ������� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(171, '������ �������', 'http://www.alsarm.com', '������ �������', '������ �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(172, '����� ���� ������', 'http://www.shuraim.net', '����� ���� ������', '����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(173, '����� ��� �� ��� ������ ������', 'http://www.saad-alhusayen.com', '����� ��� �� ��� ������ ������', '����� ��� �� ��� ������ ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(174, '����� ��� ���� ���� �����', 'http://www.abdullahelwan.net', '����� ��� ���� ���� �����', '����� ��� ���� ���� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(175, '����� ��������� ������', 'http://www.alqasim.org', '����� ��������� ������', '����� ��������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(176, '����� ���� ������', 'http://www.salemalajmi.com', '����� ���� ������', '����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(177, '������� - ����� ��� ����� ������', 'http://www.almunadi.com', '������� - ����� ��� ����� ������', '������� - ����� ��� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(178, '����� ������� ��� �� ���� ������', 'http://www.alomarey.net', '����� ������� ��� �� ���� ������', '����� ������� ��� �� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(179, '����� ������� - ����� ���� �������', 'http://www.manarahnet.net', '����� ������� - ����� ���� �������', '����� ������� - ����� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(180, '������ ����� ���� ����', 'http://www.jamalshaker.com', '������ ����� ���� ����', '������ ����� ���� ����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(181, '���� ������� - ����� ������� ������', 'http://www.m-islam.net', '���� ������� - ����� ������� ������', '���� ������� - ����� ������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(182, '����� ��� ������', 'http://www.saadalbreik.com', '����� ��� ������', '����� ��� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(183, '����� ����� - ����� ���� �������', 'http://www.alsonnah.net', '����� ����� - ����� ���� �������', '����� ����� - ����� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(184, '����� ������� ��� ���� �������', 'http://www.alsallaby.com', '����� ������� ��� ���� �������', '����� ������� ��� ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(185, '���� ����� ����� ���� ������', 'http://www.alkhairsms.com', '���� ����� ����� ���� ������', '���� ����� ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(186, '��� ������ ���� ������', 'http://www.algannam.com', '��� ������ ���� ������', '��� ������ ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(187, '������� ������� . ����� ���� ������', 'http://www.al-aqidah.com', '������� ������� . ����� ���� ������', '������� ������� . ����� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(188, '����� ������� �����', 'http://www.ibraheemshaheen.com', '����� ������� �����', '����� ������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(189, '����� ������� ��� ��� ������', 'http://www.abdelkafy.com', '����� ������� ��� ��� ������', '����� ������� ��� ��� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(190, '������� ����� ������', 'http://www.elnaggarzr.com', '������� ����� ������', '������� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(191, '����� ���� �� ��������� ������', 'http://www.aljmaz.net', '����� ���� �� ��������� ������', '����� ���� �� ��������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(192, '������ ���� �������', 'http://www.alrfaey.org', '������ ���� �������', '������ ���� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(193, '����� ��� ������ ���', 'http://www.keshk.meshmesh.net', '����� ��� ������ ���', '����� ��� ������ ���', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(194, '����� ���� �� ������� ������', 'http://www.shuraym.com', '����� ���� �� ������� ������', '����� ���� �� ������� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(195, '���� ����� �����', 'http://olamaa-yemen.net', '���� ����� �����', '���� ����� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(196, '����� ��� ����� �������', 'http://www.al-heweny.com', '����� ��� ����� �������', '����� ��� ����� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(197, '��� ������� ��� �����', 'http://www.ibntaimiah.com', '��� ������� ��� �����', '��� ������� ��� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(198, '������ ����� �������� ��������', 'http://www.alarkani.com', '������ ����� �������� ��������', '������ ����� �������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(199, '����� ���� ��������', 'http://www.almohisni.com', '����� ���� ��������', '����� ���� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(200, '����� ��� �� ���� ������', 'http://www.albahre.com', '����� ��� �� ���� ������', '����� ��� �� ���� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(201, '����� ������� �� ��������� �����', 'http://www.alssad.com', '����� ������� �� ��������� �����', '����� ������� �� ��������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(202, '����� ���� �����', 'http://www.ahmed-deedat.net', '����� ���� �����', '����� ���� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(203, '����� ��� �� �����', 'http://www.alhemam.com', '����� ��� �� �����', '����� ��� �� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(204, '���� �������� ����� ����� ������', 'http://www.alnahwi.com', '���� �������� ����� ����� ������', '���� �������� ����� ����� ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(205, '����� ���� �� ������� ��������', 'http://essanet.org', '����� ���� �� ������� ��������', '����� ���� �� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(206, '���� ���� ���������', 'http://www.nayefbinmamdooh.com', '���� ���� ���������', '���� ���� ���������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(207, '����� ������ ������� �����', 'http://www.alssad.com', '����� ������ ������� �����', '����� ������ ������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(208, '����� ���� ��� ��������', 'http://www.alshngiti.com', '����� ���� ��� ��������', '����� ���� ��� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(209, '����� ���� ����� ��� ��� �������', 'http://www.salahmera.com', '����� ���� ����� ��� ��� �������', '����� ���� ����� ��� ��� �������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(210, '������� ���� ��������', 'http://alkinani.net', '������� ���� ��������', '������� ���� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(211, '����� ������� �� ������� ��������', 'http://www.qaraye.com', '����� ������� �� ������� ��������', '����� ������� �� ������� ��������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(212, '����� ������ ������', 'http://www.salmajed.com', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(213, '����� ��� �� ������� �����', 'http://www.al-zad.net', '����� ��� �� ������� �����', '����� ��� �� ������� �����', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(214, '���� ������� ���������', 'http://www.alserdaab.org', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(215, '���� ����� �������', 'http://www.dhr12.com', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(216, '���� ������', 'http://www.albainah.net', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(217, '���� �������', 'http://www.albrhan.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(218, '���� ����', 'http://www.alradnet.com', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(219, '������� �� ������', 'http://www.wahabih.com', '������� �� ������', '������� �� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(220, '���� ��� - ������� �������', 'http://www.fnoor.com', '���� ��� - ������� �������', '���� ��� - ������� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(221, '����� ��� �����', 'http://www.ansaaar.com', '����� ��� �����', '����� ��� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(222, '���� �����', 'http://www.ansar.org', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(223, '����� ��� ����� �� �����', 'http://www.isl.org.uk', '����� ��� ����� �� �����', '����� ��� ����� �� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(224, '������ �������� ����� ���� ��������', 'http://www.icsfp.com', '������ �������� ����� ���� ��������', '������ �������� ����� ���� ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(225, '������ ��������� ����� ��� ������', 'http://www.islamudeni.net', '������ ��������� ����� ��� ������', '������ ��������� ����� ��� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(226, '���� ���� ��� ���� ���� ����', 'http://nosra.islammemo.cc', '���� ���� ��� ���� ���� ����', '���� ���� ��� ���� ���� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(227, '�������� ����� �������', 'http://www.islameiat.com/entsar', '�������� ����� �������', '�������� ����� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(228, '��� ����� ���� �������', 'http://www.antihabashis.com', '��� ����� ���� �������', '��� ����� ���� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(229, '�������� ������ ������', 'http://arabic.islamicweb.com/christianity', '�������� ������ ������', '�������� ������ ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(230, '���� ���� �� ������', 'http://islamicweb.com/arabic/shia', '���� ���� �� ������', '���� ���� �� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(231, '����� ������� �� ������ ��������', 'http://tanseer.jeeran.com', '����� ������� �� ������ ��������', '����� ������� �� ������ ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(232, '�������1', 'http://www.alsoufia.com', '�������1', '�������1', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(233, '�������2', 'http://www.heartsactions.com/su.htm', '�������2', '�������2', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(234, '���� ��� ����', 'http://www.baladynet.net', '���� ��� ����', '���� ��� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(235, '���� ������', 'http://www.almijhar.net', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(236, '�������� �� �������', 'http://www.alhakekah.com', '�������� �� �������', '�������� �� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(237, '���� ������� ���������', 'http://www.trutheye.com', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(238, '���� ��� ���� �� ������ ����', 'http://www.ebnmaryam.com', '���� ��� ���� �� ������ ����', '���� ��� ���� �� ������ ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(239, '������� ������', 'http://www.truth.org.ye', '������� ������', '������� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(240, '���� ������ ���������', 'http://www.alrased.net', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(241, '������� �� ����', 'http://awfi.4t.com', '������� �� ����', '������� �� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(242, '�������� ������', 'http://www.wylsh.com', '�������� ������', '�������� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(243, '������� ���� �������', 'http://www.truthway.tv', '������� ���� �������', '������� ���� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(244, '������', 'http://www.islammemo.cc/cat1.aspx?id=633', '������', '������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(245, '���� ����� �������', 'http://www.alqlm.com', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(246, '��� �����', 'http://www.kasralsanam.com', '��� �����', '��� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(247, '���� �������', 'http://www.khorafa.org', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(248, '������� �� ��������', 'http://www.islamorchristianity.org', '������� �� ��������', '������� �� ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(249, '���� ������', 'http://www.newshia.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(250, '������ ��������', 'http://www.no4denmark.com', '������ ��������', '������ ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(251, '���� �����', 'http://www.noor4.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(252, '������� ������ �� ���� �������', 'http://64.187.100.19/sheah/index.htm', '������� ������ �� ���� �������', '������� ������ �� ���� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(253, '������ ��� ����', 'http://www.allahway.com', '������ ��� ����', '������ ��� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(254, '����� ��� ����', 'http://www.sofaha.com', '����� ��� ����', '����� ��� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(255, '������� �������� �������', 'http://www.almuntede.net', '������� �������� �������', '������� �������� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(256, '���� ���� ����', 'http://www.proud2bemuslim.com', '���� ���� ����', '���� ���� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(257, '��� ���� ������ ������', 'http://moqawama.ws', '��� ���� ������ ������', '��� ���� ������ ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(258, '����� ����', 'http://www.edharalhaq.com', '����� ����', '����� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(259, '�������� ������� �� ������� ��������', 'http://www.almwsoaa.com', '�������� ������� �� ������� ��������', '�������� ������� �� ������� ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(260, '������ ���������', 'http://arabic.islamicweb.com', '������ ���������', '������ ���������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(261, '������� �� ��� �������', 'http://www.tanseer.com', '������� �� ��� �������', '������� �� ��� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(262, '����� ������ ��������', 'http://www.nusrah.org', '����� ������ ��������', '����� ������ ��������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(263, '������� �������� ����� �������', 'http://www.aqeeda.org.sa', '������� �������� ����� �������', '������� �������� ����� �������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(264, '���� ���� �� ��� ����', 'http://www.d-sunnah.net/hizballah', '���� ���� �� ��� ����', '���� ���� �� ��� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(265, '���� ������ �� �����', 'http://www.d-sunnah.net', '���� ������ �� �����', '���� ������ �� �����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(266, '������� � ������', 'http://www.islamegy.com', '������� � ������', '������� � ������', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(267, '��� ���� �� ����', 'http://www.loveujesus.com', '��� ���� �� ����', '��� ���� �� ����', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(268, '���� ������', 'http://www.albayan-magazine.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(269, '���� ����� ��������', 'http://www.alwaei.com', '���� ����� ��������', '���� ����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(270, '���� ������ �������', 'http://www.fm-m.com', '���� ������ �������', '���� ������ �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(271, '���� �����', 'http://www.alasr.ws', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(272, '���� ������', 'http://www.aldaawah.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(273, '���� ����� ���������', 'http://www.uae4ever.com/dorar/index.php', '���� ����� ���������', '���� ����� ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(274, '���� �������', 'http://www.altawhed.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(275, '���� ������', 'http://www.attakwa.net', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(276, '���� ���� �������', 'http://www.almotaqeen.net', '���� ���� �������', '���� ���� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(277, '���� �������', 'http://www.almujtamaa-mag.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(278, '���� �������', 'http://www.al-forqan.net', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(279, '������ ���������', 'http://www.ali4.com', '������ ���������', '������ ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(280, '���� ������ �����������', 'http://www.tech4islam.info', '���� ������ �����������', '���� ������ �����������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(281, '���� ������ �������', 'http://www.biblioislam.net', '���� ������ �������', '���� ������ �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(282, '���� �������', 'http://www.fustat.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(283, '���� ������', 'http://www.rayah.info', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(284, '���� �����', 'http://www.khayma.com/hamasat', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(285, '������� ������ ���������', 'http://www.altaqwa.com', '������� ������ ���������', '������� ������ ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(286, '��� ������ ����� ��������', 'http://www.dar-alqassem.com', '��� ������ ����� ��������', '��� ������ ����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(287, '���� ��� ������', 'http://www.daralbalagh.com', '���� ��� ������', '���� ��� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(288, '���� ����� ����� ��������', 'http://www.madar-alwatan.com', '���� ����� ����� ��������', '���� ����� ����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(289, '��� ���� ������� ����� ��������', 'http://www.dar-atlas.com', '��� ���� ������� ����� ��������', '��� ���� ������� ����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(290, '��� ������ ����� ��������', 'http://www.dar-alathar.com', '��� ������ ����� ��������', '��� ������ ����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(291, '����� ������ ������� ��������', 'http://www.afaaaq.com', '����� ������ ������� ��������', '����� ������ ������� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(292, '����� ��������', 'http://www.islamcvoice.com/mas/index.php', '����� ��������', '����� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(293, '������ ������� ��������', 'http://www.afaaaq.com', '������ ������� ��������', '������ ������� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(294, '����� ������ ���������', 'http://www.alyaqin.com', '����� ������ ���������', '����� ������ ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(295, '��� �������', 'http://www.alrisalh.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(296, '������� �������� ���������', 'http://www.qimam.com', '������� �������� ���������', '������� �������� ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(297, '���� ������ ������� ��������', 'http://www.allewaa.org', '���� ������ ������� ��������', '���� ������ ������� ��������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(298, '��� �����', 'http://market.elnoor.com', '��� �����', '��� �����', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(299, '����� ������', 'http://www.alzahabi-sy.com', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(300, '���� ��������� ���������', 'http://www.mojama.net', '���� ��������� ���������', '���� ��������� ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(301, '������� ��� ������ ���������', 'http://www.khattab.cc', '������� ��� ������ ���������', '������� ��� ������ ���������', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(302, '�������� �������', 'http://islamport.com', '�������� �������', '�������� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(303, '������ ����� ��� ���', 'http://www.binbaz.org.sa/index.php?pg=more&type=book&no=1', '������ ����� ��� ���', '������ ����� ��� ���', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(304, '������ ����� ��� ������', 'http://www.ibnothaimeen.com/all/index/article_17097.shtml', '������ ����� ��� ������', '������ ����� ��� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(305, '��� ����� ���� ������', 'http://www.almurabbi.com/book1.asp', '��� ����� ���� ������', '��� ����� ���� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(306, '���� ����� �������� ������� ��������', 'http://www.sultan.org/books', '���� ����� �������� ������� ��������', '���� ����� �������� ������� ��������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(307, '��� �� ���� ���� ������ ���������', 'http://www.aldawah.net/maktabah.htm', '��� �� ���� ���� ������ ���������', '��� �� ���� ���� ������ ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(308, '��� ����� ��������� ���������', 'http://www.salafi.net/list.html', '��� ����� ��������� ���������', '��� ����� ��������� ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(309, '����� ������� ��������� �����������', 'http://arabic.islamicweb.com/Encyclopedia', '����� ������� ��������� �����������', '����� ������� ��������� �����������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(310, '������ �� ���� ����� �������', 'http://www.khayma.com/hedaya/mk/index.html', '������ �� ���� ����� �������', '������ �� ���� ����� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(311, '��� ������ �� ���� ����� �������', 'http://www.khayma.com/hedaya/books/index.html', '��� ������ �� ���� ����� �������', '��� ������ �� ���� ����� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(312, '������ ����� ���� ���� ������', 'http://www.islam-qa.com/index.php?pg=articles&type=1&ln=ara', '������ ����� ���� ���� ������', '������ ����� ���� ���� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(313, '����� ������ ������ ���������', 'http://www.assiraj.bizland.com/library.htm', '����� ������ ������ ���������', '����� ������ ������ ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(314, '������ �� ���� ������ �������', 'http://www.salafi.net/articles.html', '������ �� ���� ������ �������', '������ �� ���� ������ �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(315, '��� �� ���� ������', 'http://www.alwaraq.com', '��� �� ���� ������', '��� �� ���� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(316, '��� �� ���� ���� ������', 'http://www.khayma.com/salsabeel/SAL/book.htm', '��� �� ���� ���� ������', '��� �� ���� ���� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(317, '��� ����� ���� �� ����� �������', 'http://www.saaid.net/Warathah/hmood/index.htm', '��� ����� ���� �� ����� �������', '��� ����� ���� �� ����� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(318, '��� �� ���� ����� ������', 'http://www.dorar.net/book_list.php?book_type=2', '��� �� ���� ����� ������', '��� �� ���� ����� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(319, '�������� �������', 'http://www.awkaf.net/mousoaa/index.html', '�������� �������', '�������� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(320, '��� �� ���� ����� ���� �������', 'http://www.albr.org/books', '��� �� ���� ����� ���� �������', '��� �� ���� ����� ���� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(321, '����� ��� ������� ���������', 'http://www.saaid.net/book/index.php', '����� ��� ������� ���������', '����� ��� ������� ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(322, '������� ����������� �� ����� ��� ����', 'http://www.biblioislam.net/Elibrary/Arabic/library/index.asp', '������� ����������� �� ����� ��� ����', '������� ����������� �� ����� ��� ����', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(323, '��� ������� ����� ����� ������', 'http://www.islamtoday.net/pen/books_content.cfm', '��� ������� ����� ����� ������', '��� ������� ����� ����� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(324, '����� ����� ��������', 'http://www.ahlalhdeeth.com/vb/forumdisplay.php?&forumid=16', '����� ����� ��������', '����� ����� ��������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(325, '����� ������� �������', 'http://www.raqamiya.org', '����� ������� �������', '����� ������� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(326, '�� ������', 'http://www.omelketab.net', '�� ������', '�� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(327, '���� ����� �������� ���������', 'http://www.kalemat.org', '���� ����� �������� ���������', '���� ����� �������� ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(328, '����� ����� ������', 'http://www.tafseer.info', '����� ����� ������', '����� ����� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(329, '����� �������', 'http://www.mislamih.com', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(330, '������� ��������� - ����� �����', 'http://www.islamsites.net/books', '������� ��������� - ����� �����', '������� ��������� - ����� �����', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(331, '������ ������� ����� ���������', 'http://www.waqfeya.com', '������ ������� ����� ���������', '������ ������� ����� ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(332, '������� �������', 'http://www.waqfeya.com', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(333, '��� �������', 'http://www.daralnawader.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(334, '����� ��� ����� ������', 'http://www.3lsooot.com', '����� ��� ����� ������', '����� ��� ����� ������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(335, '������� �������', 'http://www.shamela.ws', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(336, '���� ���� ���������', 'http://www.wadod.com', '���� ���� ���������', '���� ���� ���������', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(337, '����� ����� ��� ���', 'http://www.binbaz.org.sa/index.php?pg=fatawa', '����� ����� ��� ���', '����� ����� ��� ���', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(338, '������� - ������ �������', 'http://www.salafi.net/fatawa.htm', '������� - ������ �������', '������� - ������ �������', '- - -', NULL, NULL, 1, 8, 1, 0, 0, 1, '1211355874'),
(339, '������� - ���� �������', 'http://fatawa.al-islam.com/fatawa/default.asp', '������� - ���� �������', '������� - ���� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(340, '���� �������', 'http://www.sultan.org/f', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(341, '������ ��� ����� - ����� ��� ����', 'http://www.islamonline.net/servlet/Satellite?cid=1121779389729&pagename=IslamOnline-Arabic-Ask_Scholar/Page/FatwaCounselA', '������ ��� ����� - ����� ��� ����', '������ ��� ����� - ����� ��� ����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(342, '����� ������� - ���� ������ �������', 'http://www.alroqia.com/fatawi_n/index.html', '����� ������� - ���� ������ �������', '����� ������� - ���� ������ �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(343, '����� �� ���� ������ ��', 'http://fatawaweb.com', '����� �� ���� ������ ��', '����� �� ���� ������ ��', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(344, '����� �� ���� ������� ��������', 'http://www.awkaf.net/haje-ftw/index.html', '����� �� ���� ������� ��������', '����� �� ���� ������� ��������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(345, '������ ��� ����', 'http://www.al-eman.com/Ask', '������ ��� ����', '������ ��� ����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(346, '������� � ��������� - ������� �����', 'http://www.islamtoday.net/questions/fatawa.cfm', '������� � ��������� - ������� �����', '������� � ��������� - ������� �����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(347, '��� ����� ������� �������', 'http://www.alasad.net/fatwa/index.php', '��� ����� ������� �������', '��� ����� ������� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(348, '��� ������� �������', 'http://www.dar-alifta.org', '��� ������� �������', '��� ������� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(349, '����� ��� ��� �����', 'http://www.alandals.net', '����� ��� ��� �����', '����� ��� ��� �����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(350, '����� ����� ��������', 'http://www.ibnothaimeen.com/all/Noor.shtml', '����� ����� ��������', '����� ����� ��������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(351, '���� ������ - ������ ���������', 'http://www.islamweb.net/ver2/Fatwa/index.php?', '���� ������ - ������ ���������', '���� ������ - ������ ���������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(352, '������� ���� ����� ����� ������', 'http://www.islam-qa.com/index.php?ln=ara', '������� ���� ����� ����� ������', '������� ���� ����� ����� ������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(353, '������ ������� - ���� �������', 'http://www.islamway.com/?iw_s=Fatawa', '������ ������� - ���� �������', '������ ������� - ���� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(354, '������� ������ ���� ����� - ���� �������', 'http://feqh.al-islam.com/bookhier.asp?DocID=27&Mode=0', '������� ������ ���� ����� - ���� �������', '������� ������ ���� ����� - ���� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(355, '����� ��� ����', 'http://www.fatwa-online.com', '����� ��� ����', '����� ��� ����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(356, '������� �������', 'http://www.islamic-fatwa.com', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(357, '����� ������ ������', 'http://www.qurancomplex.org/qfatwa/tree.asp', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(358, '����� ������ ������', 'http://www.muslimdoctor.net/pages/arabic/Ar_fatawa.htm', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(359, '������ �� ���� ����� ���� �����', 'http://www.h-alali.net/f_index.php', '������ �� ���� ����� ���� �����', '������ �� ���� ����� ���� �����', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(360, '������� ������� ������ �������', 'http://alftawa.com', '������� ������� ������ �������', '������� ������� ������ �������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(361, '������� ������ ������ ��������', 'http://www.alifta.com', '������� ������ ������ ��������', '������� ������ ������ ��������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(362, '�������', 'http://www.asskeenh.com', '�������', '�������', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(363, '���� �������� ����� ��� ���', 'http://www.binbaz.org.sa/index.php?pg=audio', '���� �������� ����� ��� ���', '���� �������� ����� ��� ���', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(364, '��� �������� ����� ��� ������', 'http://www.ibnothaimeen.com/all/eSound.shtml', '��� �������� ����� ��� ������', '��� �������� ����� ��� ������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(365, '���� ���� ��������', 'http://www.liveislam.com', '���� ���� ��������', '���� ���� ��������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(366, '������� ������ ���������', 'http://audio.islamweb.net/audio/index.php', '������� ������ ���������', '������� ������ ���������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(367, '���� ���� - ���� �������', 'http://www.islamway.com/?iw_s=Lesson', '���� ���� - ���� �������', '���� ���� - ���� �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(368, '����� ������� �������', 'http://www.emanona.com/cat.php?catsmktba=50', '����� ������� �������', '����� ������� �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(369, '������ �� ���� ����� ���� ������', 'http://www.almurabbi.com/mainpage.asp?main_id=5', '������ �� ���� ����� ���� ������', '������ �� ���� ����� ���� ������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(370, '���� �� ���� ������ �������', 'http://www.salafi.net/audiotapes.html', '���� �� ���� ������ �������', '���� �� ���� ������ �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(371, '������� ������� �� ���� �������', 'http://www.al-eman.com/Voice', '������� ������� �� ���� �������', '������� ������� �� ���� �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(372, '����� ������ ��������', 'http://www.uae4ever.com/audio', '����� ������ ��������', '����� ������ ��������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(373, '������� ������� ���������', 'http://www.almeshkat.net/index.php?pg=audio_cat', '������� ������� ���������', '������� ������� ���������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(374, '������ ��� �������', 'http://www.weislam.com/iv/cat.php?catsmktba=3', '������ ��� �������', '������ ��� �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(375, '����� ������ ������� - ���� ��������', 'http://www.al-sahabah.com/?album=1', '����� ������ ������� - ���� ��������', '����� ������ ������� - ���� ��������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(376, '������ ���� ����� ���������', 'http://www.soutiat.com', '������ ���� ����� ���������', '������ ���� ����� ���������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(377, '������ ������� ������', 'http://www.islam2all.com/sounds/sounds.php', '������ ������� ������', '������ ������� ������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(378, '���� ��� �������� ���������', 'http://www.uae36r.com', '���� ��� �������� ���������', '���� ��� �������� ���������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(379, '����� ����� ������� �������', 'http://www.ftiatislam.com', '����� ����� ������� �������', '����� ����� ������� �������', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(380, '������ �������� ���������', 'http://www.ftiatislam.com', '������ �������� ���������', '������ �������� ���������', '- - -', '', '', 1, 9, 0, 0, 0, 1, '1211357782'),
(381, '���� �������', 'http://www.al-islam.com/arb', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211404985'),
(382, '���� �������', 'http://www.al-eman.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211404985'),
(383, '����� �������', 'http://www.islammemo.cc', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(384, '����� ��� ����', 'http://www.islam-online.net/Arabic/index.shtml', '����� ��� ����', '����� ��� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(385, '������ ���������', 'http://www.islamweb.net', '������ ���������', '������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(386, '���� �������', 'http://www.islamway.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(387, '���� ���� �������', 'http://www.tohajj.com', '���� ���� �������', '���� ���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(388, '��� �������', 'http://www.saaid.net', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(389, '���� ��������', 'http://www.liveislam.net', '���� ��������', '���� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(390, '���� �������', 'http://islamic.kuwaitchat.net', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(391, '�����', 'http://www.kl28.com', '�����', '�����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(392, '������ ����� �������', 'http://www.islam.ws', '������ ����� �������', '������ ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(393, '����� ��������', 'http://www.islamcvoice.com', '����� ��������', '����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406853'),
(394, '����� ������ ������', 'http://www.wmn.gov.sa', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 72, 0, 0, 0, 1, '1211406853'),
(395, '����� ������ ������', 'http://www.wmn.gov.sa', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(396, '������ ����� ��������', 'http://www.gesah.net', '������ ����� ��������', '������ ����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(397, '��� ��������', 'http://www.alnoor-world.com/prophets', '��� ��������', '��� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(398, '���� ����', 'http://www.khayma.com/uzkurallah/Frame/aFront.htm', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(399, '��� �������', 'http://www.islamhouse.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(400, '������ �������', 'http://www.ruqya.net', '������ �������', '������ �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(401, '���� ������', 'http://www.twbh.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(402, '���� �����', 'http://www.alqasas.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(403, '���� ����', 'http://www.d3wa.org', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(404, '���� ��������', 'http://www.ramadan.ws', '���� ��������', '���� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(405, '����� �� ���� ������', 'http://www.alsiraj.net', '����� �� ���� ������', '����� �� ���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(406, '����� ��������', 'http://www.gafelh.com', '����� ��������', '����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(407, '���� ������', 'http://www.alimam.ws', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(408, '������ ��������', 'http://www.islamicmobile.net', '������ ��������', '������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(409, '��� �������', 'http://www.islamstory.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(410, '���� ��������', 'http://www.almostshar.com', '���� ��������', '���� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(411, '������ ����� ������', 'http://www.sater7.com', '������ ����� ������', '������ ����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(412, '���� ������', 'http://tttt4.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(413, '����� ��', 'http://www.rasael.net', '����� ��', '����� ��', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(414, '����� ������ �� �������', 'http://www.manzilat.net', '����� ������ �� �������', '����� ������ �� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(415, '���� ������� �������', 'http://www.msajedna.ps', '���� ������� �������', '���� ������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(416, '����� ��������� �������', 'http://www.iid-alraid.de', '����� ��������� �������', '����� ��������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(417, '���� ������� ������', 'http://www.islam2all.com', '���� ������� ������', '���� ������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(418, '�������� ��������� �����', 'http://www.azizpedia.com', '�������� ��������� �����', '�������� ��������� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(419, '����� ��� ����', 'http://www.nourallah.com', '����� ��� ����', '����� ��� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(420, '���� �������� ��� ����', 'http://www.alaidon.com', '���� �������� ��� ����', '���� �������� ��� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(421, '������ ����������', 'http://www.istisharaat.com', '������ ����������', '������ ����������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(422, '������� ������ ����� �������', 'http://www.mathoun.com', '������� ������ ����� �������', '������� ������ ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(423, '����� �����', 'http://www.hijabi.net', '����� �����', '����� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(424, '���� ������� ��������', 'http://www.ssislam.com', '���� ������� ��������', '���� ������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(425, '���� ����� ��������', 'http://feqh.al-islam.com', '���� ����� ��������', '���� ����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(426, '���� �������', 'http://zakat.al-islam.com/arb', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(427, '���� �������', 'http://hajj.al-islam.com/arb', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(428, '������� ��������', 'http://dictionary.al-islam.com/default.asp?t=ARBENG', '������� ��������', '������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(429, '������� ��������', 'http://history.al-islam.com', '������� ��������', '������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(430, '������ ������', 'http://prayer.al-islam.com/default.asp?l=Arb', '������ ������', '������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(431, '����� ������', 'http://www.dawah.ws', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(432, '���� ��� ������� ��� �����', 'http://www.taimiah.org', '���� ��� ������� ��� �����', '���� ��� ������� ��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(433, '������', 'http://www.khayma.com/salsabeel', '������', '������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(434, '���� ���������', 'http://islamic.naseej.com', '���� ���������', '���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(435, '���� ���� �������', 'http://www.khayma.com/alsahaba', '���� ���� �������', '���� ���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(436, '����� ��� ���� ��������', 'http://www.khayma.com/akhtaa', '����� ��� ���� ��������', '����� ��� ���� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(437, '����� ������� �����������', 'http://sultan.org', '����� ������� �����������', '����� ������� �����������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(438, '���� ������', 'http://www.sewak.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(439, '���� ������� ������ ���������', 'http://www.madinacenter.com', '���� ������� ������ ���������', '���� ������� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(440, '������ ��������', 'http://www.khayma.com/almurshed/index.htm', '������ ��������', '������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(441, '������', 'http://www.muhaddith.org/a_index.html', '������', '������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(442, '�������� �������', 'http://www.elafco.com/nwa-1.htm', '�������� �������', '�������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(443, '����� ������', 'http://prayer.naseej.com/World_A.asp', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(444, '���� ������� ���������', 'http://www.sohari.com', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(445, '���� ����� �������', 'http://www.khayma.com/asn', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(446, '������ ��������� �������', 'http://www.awkaf.net', '������ ��������� �������', '������ ��������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(447, '����� ������ ������� ��������', 'http://www.heartsactions.com', '����� ������ ������� ��������', '����� ������ ������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(448, '���� �����', 'http://www.almawt.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(449, '������� �������� ��������', 'http://www.muntada.org.ae', '������� �������� ��������', '������� �������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(450, '��������� ��������� ���������', 'http://www.mild-kw.net', '��������� ��������� ���������', '��������� ��������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(451, '������� ��������� ������ ������', 'http://www.islamset.com/arabic', '������� ��������� ������ ������', '������� ��������� ������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(452, '����� �������', 'http://www.islammessage.com', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(453, '���� �������', 'http://www.meshkat.net', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(454, '������ �������� �� ������', 'http://iananet.org/arabic', '������ �������� �� ������', '������ �������� �� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(455, '���� ������ ������', 'http://www.altyba.com', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(456, '���� �����', 'http://www.asiri.net', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(457, '���� ������', 'http://www.youthworlds.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(458, '���� ����� ��������� �������� �������', 'http://al-ommah.org', '���� ����� ��������� �������� �������', '���� ����� ��������� �������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(459, '������ �������� ������� ���������', 'http://www.islamicfinder.org', '������ �������� ������� ���������', '������ �������� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(460, '���� ������ ���������', 'http://www.khayma.com/wahbi', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(461, '������ ��������', 'http://www.khayma.com/islambook', '������ ��������', '������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(462, '���� ��� �� �������', 'http://www.masjeed.org', '���� ��� �� �������', '���� ��� �� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(463, '���� �� ������� ��������', 'http://www.khayma.com/shuhada', '���� �� ������� ��������', '���� �� ������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(464, '������� ����', 'http://www.islamunveiled.org', '������� ����', '������� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(465, '������ ��������� ������� ����', 'http://www.alazhr.org', '������ ��������� ������� ����', '������ ��������� ������� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(466, '����� ������ ������', 'http://www.saaid.net/rasael/r39.htm', '����� ������ ������', '����� ������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(467, '���� ������', 'http://www.almawa.net', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(468, '���� ���� ����', 'http://www.tohajj.com/data/steps/hajj-steps.htm', '���� ���� ����', '���� ���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(469, '���� �����', 'http://www.jannah.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(470, '����� ���� � ������', 'http://www.halwanhaj.co.ae', '����� ���� � ������', '����� ���� � ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(471, '��� �������', 'http://www.daraleiman.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(472, '���� �����', 'http://www.fanateq.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(473, '���� ����� ��', 'http://www.alasad.net', '���� ����� ��', '���� ����� ��', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(474, '��� �����', 'http://www.ardalsharq.com', '��� �����', '��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(475, '������� ������', 'http://ceri.kacst.edu.sa/calendar.htm', '������� ������', '������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(476, '������� �������� ������� ������', 'http://dialogueonline.org', '������� �������� ������� ������', '������� �������� ������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(477, '����� ���� �����', 'http://www.almisk.net/AdsImgs/radio.htm', '����� ���� �����', '����� ���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(478, '����� ���� ���������', 'http://www.bilal-prayer.com/default_a.asp', '����� ���� ���������', '����� ���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(479, '��������', 'http://www.almansiuon.com', '��������', '��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(480, '������ ��������� ������� �� �������', 'http://www.iscag.org', '������ ��������� ������� �� �������', '������ ��������� ������� �� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(481, '���� ������', 'http://www.muslimat.net', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(482, '����� ����� ��������', 'http://www.islamicwork.info', '����� ����� ��������', '����� ����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(483, '���� ��� ����� ���������', 'http://www.asunnah.net', '���� ��� ����� ���������', '���� ��� ����� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(484, '���� ������ ���������', 'http://www.aldawah.net', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(485, '���� �����', 'http://www.soutiat.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(486, '�����', 'http://www.janazh.com', '�����', '�����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(487, '��� ������', 'http://www.islamdoor.com/k', '��� ������', '��� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(488, '��� �������', 'http://www.khayma.com/kshf', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(489, '���� ����� ���������', 'http://www.norayn.com', '���� ����� ���������', '���� ����� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(490, '���� �����', 'http://www.almisk.net', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(491, '���� ������ ��������', 'http://www.almojahed.info', '���� ������ ��������', '���� ������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(492, '����� ��� ��������� ���������', 'http://kantakji.org', '����� ��� ��������� ���������', '����� ��� ��������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(493, '���� ����', 'http://www.da3y.org', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(494, '����� ���� ������', 'http://www.deentimes.com', '����� ���� ������', '����� ���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(495, '���� ������ ����� ����', 'http://www.salman1.com', '���� ������ ����� ����', '���� ������ ����� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(496, '������ �������� ������ ����', 'http://www.hailclce.com', '������ �������� ������ ����', '������ �������� ������ ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(497, '���� ������� ���������', 'http://www.almenhaj.net', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(498, '���� �������', 'http://www.3ss3.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(499, '����� �����', 'http://www.islamword.com', '����� �����', '����� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(500, '���� ������ ������ ������', 'http://www.quran-for-all.com', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(501, '����� �����', 'http://www.elsonna.com', '����� �����', '����� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(502, '���� ������', 'http://www.islamme.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(503, '���� ����� ���������', 'http://www.go2top.net', '���� ����� ���������', '���� ����� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(504, '���� ����� �������', 'http://www.aldorarnet.com', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(505, '���� ����� �������', 'http://www.dahran.net', '���� ����� �������', '���� ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(506, '���� �������', 'http://www.islam-prophet.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(507, '������� �������', 'http://www.dawahmemo.com', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(508, '����� �������', 'http://www.islamadvice.com', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(509, '�� �� �� ���', 'http://www.denana.com', '�� �� �� ���', '�� �� �� ���', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(510, '�������', 'http://www.al-sahabah.com', '�������', '�������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(511, '���� ������� ��������', 'http://www.islamichistory.net', '���� ������� ��������', '���� ������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(512, '���� ���� ���������', 'http://www.hajs.net', '���� ���� ���������', '���� ���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(513, '���� �������', 'http://www.elislam.net', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(514, '��� �������', 'http://www.ibnalislam.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(515, '���������� ��������� ��������', 'http://www.islamacademy.net', '���������� ��������� ��������', '���������� ��������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(516, '���� ��� ������', 'http://www.maccah.com', '���� ��� ������', '���� ��� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(517, '�� �����', 'http://www.alalbayt.com', '�� �����', '�� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(518, '��� ������', 'http://www.nawafith.net/feqh', '��� ������', '��� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(519, '����� ����� ������', 'http://www.islameiat.com/ramadan', '����� ����� ������', '����� ����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(520, '��� �������', 'http://www.imanvoice.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(521, '���� �����', 'http://www.aljannahway.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(522, '���� ���� �� ��������� ������', 'http://www.al-3z.net', '���� ���� �� ��������� ������', '���� ���� �� ��������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(523, '������', 'http://www.muslemoon.net', '������', '������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(524, '���� �������', 'http://www.labaik-africa.org', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(525, '������� �������', 'http://www.alafkar.org', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(526, '��� ��������', 'http://www.moarith.com', '��� ��������', '��� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(527, '���� �����', 'http://www.hasaad.net', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(528, '����� �������', 'http://www.awrak.com', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(529, '������ ��� ����� ������', 'http://www.du3at.com', '������ ��� ����� ������', '������ ��� ����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(530, '����� ������', 'http://www.aldoah.com', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(531, '����� ������', 'http://www.athfer.com', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(532, '���� ���� �����', 'http://www.al-sunna.net', '���� ���� �����', '���� ���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(533, '���� ������� ���������', 'http://www.ma3ali.net', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(534, '���� ��� �������', 'http://www.eyeislam.net', '���� ��� �������', '���� ��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(535, '��������', 'http://www.tawabon.com', '��������', '��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(536, '������ �������', 'http://www.zzrz.com', '������ �������', '������ �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(537, '���� ������ ��������', 'http://www.al-rawdah.net', '���� ������ ��������', '���� ������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(538, '���� ����� ���������', 'http://www.almeshkat.net', '���� ����� ���������', '���� ����� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(539, '���� ��� ������� ����� �������', 'http://nouf.org', '���� ��� ������� ����� �������', '���� ��� ������� ����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(540, '������ ��������', 'http://www.islamic-flash.com', '������ ��������', '������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(541, '���� �����', 'http://www.wseeet.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(542, '���� ����� �����', 'http://www.mwasim.com', '���� ����� �����', '���� ����� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(543, '������ ��� �����', 'http://www.aalalbait.com', '������ ��� �����', '������ ��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(544, '��������', 'http://www.istbdlne.com', '��������', '��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(545, '������� �������', 'http://www.dawahmemo.com/mrkz', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(546, '����� ������ ���� �� ��� �������', 'http://www.hafedh.net', '����� ������ ���� �� ��� �������', '����� ������ ���� �� ��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(547, '���� ������� ������', 'http://www.almehrab.ws', '���� ������� ������', '���� ������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(548, '��� �������', 'http://africaland.net', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(549, '������� �������', 'http://www.propheteducation.com', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(550, '������ �������', 'http://huda76-sms.blogspot.com', '������ �������', '������ �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(551, '������� ������', 'http://www.islamancient.net', '������� ������', '������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(552, '����� ����� ��������', 'http://www.nos7.com', '����� ����� ��������', '����� ����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(553, '���� ����', 'http://www.wathakker.com', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(554, '��� ����� ���������', 'http://www.free-gaza.com', '��� ����� ���������', '��� ����� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(555, '����� ��� �����', 'http://www.no4songs.com', '����� ��� �����', '����� ��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(556, '���� �����', 'http://www.waqfuna.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(557, '���� ����', 'http://www.khayma.com/da3wah', '���� ����', '���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(558, '�������� ������� ������� ���� ������', 'http://www.mercyprophet.com', '�������� ������� ������� ���� ������', '�������� ������� ������� ���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(559, '������� ����� ������ ������� ���������', 'http://www.bahareth.org', '������� ����� ������ ������� ���������', '������� ����� ������ ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(560, '����� �������', 'http://www.nsaaym.com', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(561, '���� ������ �������', 'http://www.refqh.com', '���� ������ �������', '���� ������ �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(562, '���� ���� ������', 'http://www.shbdw.com', '���� ���� ������', '���� ���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(563, '���� ������� ���������', 'http://www.emanona.com', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(564, '���� ������ ��������', 'http://www.islamic-flash.net', '���� ������ ��������', '���� ������ ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(565, '���� ������', 'http://www.bayyna.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(566, '����� - ��������� �������', 'http://www.mnshoor.com', '����� - ��������� �������', '����� - ��������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(567, '���� ������', 'http://www.wdawah.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(568, '���� ������� ���������', 'http://www.almarfah.com', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(569, '����� ����������', 'http://www.elhooda.com', '����� ����������', '����� ����������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(570, '����� ��� ������ ���� ����� �&#1740; �&#1740;���', 'http://www.sunnionline.net', '����� ��� ������ ���� ����� �&#1740; �&#1740;���', '����� ��� ������ ���� ����� �&#1740; �&#1740;���', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(571, '��� ������� ��������� �������', 'http://www.moraslat.com', '��� ������� ��������� �������', '��� ������� ��������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(572, '���� ������', 'http://www.al-wa7a.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(573, '������� ��������', 'http://www.islamicmob.org', '������� ��������', '������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(574, '����� �������� ������� ������', 'http://www.al-etsam.com', '����� �������� ������� ������', '����� �������� ������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(575, '����� �������', 'http://www.mislam.net', '����� �������', '����� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(576, '��� ������', 'http://www.merkaz.info', '��� ������', '��� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(577, '�� �������', 'http://www.islam-love.com', '�� �������', '�� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(578, '��� ����', 'http://www.soutulhaq.com', '��� ����', '��� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(579, '���� ������ �����������', 'http://www.esahwa.com', '���� ������ �����������', '���� ������ �����������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(580, '������� ���������', 'http://a-adil.com/mktba/index.php', '������� ���������', '������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(581, '���� ���� ���������', 'http://www.d3we.com', '���� ���� ���������', '���� ���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(582, '���� ������ ���������', 'http://www.yarhman.com', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(583, '������ �������', 'http://www.asso7ba.com', '������ �������', '������ �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(584, '��� �������', 'http://www.toislamy.com', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(585, '���� ���� ���������', 'http://www.daawaah.com', '���� ���� ���������', '���� ���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(586, '���� ���������', 'http://www.al-mishkat.com/istiqama', '���� ���������', '���� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(587, '���� �������', 'http://www.alrisaalah.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(588, '���� �������', 'http://www.alfadeelh.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(589, '������ ������ ������� ������', 'http://www.alosrah.net', '������ ������ ������� ������', '������ ������ ������� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(590, '���� ����� ���� ���� ������� (E)', 'http://www.islam-guide.com', '���� ����� ���� ���� ������� (E)', '���� ����� ���� ���� ������� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(591, '���� ������ ��������� (E)', 'http://www.irf.net', '���� ������ ��������� (E)', '���� ������ ��������� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(592, '���� ��� ������� (E)', 'http://www.islamland.org', '���� ��� ������� (E)', '���� ��� ������� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(593, '����� ������� (E)', 'http://www.discoverislam.com', '����� ������� (E)', '����� ������� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(594, '����� ��� ������ (E)', 'http://www.islam.org/Culture/MOSQUES', '����� ��� ������ (E)', '����� ��� ������ (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(595, '����� ��� ���� (E)', 'http://www.fatwa-online.com', '����� ��� ���� (E)', '����� ��� ���� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(596, '���� ����� (E)', 'http://www.al-sunnah.com', '���� ����� (E)', '���� ����� (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(597, '����� ������', 'http://kalimataldoah.net', '����� ������', '����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(598, '���� ������� ���������', 'http://www.muslem.info/muslem', '���� ������� ���������', '���� ������� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(599, '���� ���� ��������', 'http://www.thekra.ws', '���� ���� ��������', '���� ���� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(600, '���� ������', 'http://www.islam4m.com', '���� ������', '���� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(601, '���� ����� ������', 'http://www.n7n9.com', '���� ����� ������', '���� ����� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(602, '���� �������', 'http://www.tunisalmoslima.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(603, '���� ������ ������', 'http://www.arabvolunteering.org', '���� ������ ������', '���� ������ ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(604, '���� ���� �����', 'http://www.talebal3elm.com', '���� ���� �����', '���� ���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(605, '������� ��������� �� ����� �����', 'http://www.al-bukhari.net', '������� ��������� �� ����� �����', '������� ��������� �� ����� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(606, '���� �����', 'http://www.halqat.com', '���� �����', '���� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(607, '���� ���� ����', 'http://www.rasoulallah.net', '���� ���� ����', '���� ���� ����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(608, '���� ������ ���������', 'http://www.zkryat.com', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(609, '����� ������� �������', 'http://www.alhams.net', '����� ������� �������', '����� ������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(610, '���� �������', 'http://www.shareah.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(611, '���� ����� ��� ���������', 'http://www.anwarmaka.net', '���� ����� ��� ���������', '���� ����� ��� ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(612, '��� ������', 'http://www.nabialrahma.com', '��� ������', '��� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(613, '���� �������', 'http://www.shareah.com', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(614, '�������', 'http://albsayer.net', '�������', '�������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(615, '������� �������� �������� �� ������', 'http://www.alameron.com', '������� �������� �������� �� ������', '������� �������� �������� �� ������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(616, '��� �������', 'http://www.nooralislam.net', '��� �������', '��� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(617, '���� �������', 'http://www.factway.net', '���� �������', '���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(618, '���� ����� ��������', 'http://www.ade2006.jeeran.com', '���� ����� ��������', '���� ����� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(619, '����� ���� �������', 'http://shabab-alislam.blogspot.com', '����� ���� �������', '����� ���� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(620, '������ ��� �����', 'http://www.ela-salaty.com', '������ ��� �����', '������ ��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(621, '��� ��� �����', 'http://www.al-darb.com', '��� ��� �����', '��� ��� �����', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(622, '�������� ��������', 'http://www.isyoutube.com', '�������� ��������', '�������� ��������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(623, '���� ������� �������', 'http://www.morabt.com', '���� ������� �������', '���� ������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(624, '���� ������ ���������', 'http://www.islamicsc.com', '���� ������ ���������', '���� ������ ���������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(625, '������� �������', 'http://www.alrsael.net', '������� �������', '������� �������', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414598'),
(626, '����� ������� ��������', 'http://gph.gov.sa', '����� ������� ��������', '����� ������� ��������', '- - -', NULL, NULL, 1, 1, 4, 13, 2, 1, '1211414598'),
(627, '����� ����� ��� ���� �������', 'http://almahmood.ae', '����� ����� ��� ���� �������', '����� ����� ��� ���� �������', '- - -', '', '', 1, 1, 3, 15, 2, 1, '1211414598'),
(628, '������ ��������', 'http://hijab.3rbu.net', '������ ��������', '������ ��������', '- - -', '', '', 1, 1, 4, 3, 1, 1, '1211414598'),
(629, '�����', 'http://www.nwahy.com', 'nwahy,�����,������� ������,�������,����� ���� �����,���� �����,����,�����,����� �����', 'php,mysql,html,css,phpmyadmin,cpanel,flash,swish,photoshop,fronpage,vb', '- - -', '', '', 1, 25, 4, 3, 1, 1, '1211414598'),
(630, '�����', 'http://www.nwahy.com', '�����,php,mysql,html,css,phpmyadmin,cpanel,flash,swish,photoshop,fronpage,vb', 'nwahy,�����,������� ������,�������,����� ���� �����,���� �����,����,�����,����� �����', '- - -', '', '', 1, 63, 4, 3, 1, 1, '1211414598');
");
if(!$sql6){
echo "<li><font color='#0000FF'>���</font> �� ��� ��� �������� ���������� �� ������ dlil_site --> ( $error2 )</li>";
}else{
echo "<li>��� ����� �������� ���������� ������ dlil_site ����� .</li>";
}


echo "</ul>";
echo "<form>
<div align='center'><input type='Button' value=' ������ ������� ' name='NextStep' onClick=\"location='install.php?step=5'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "5":

echo "<br><div align='center'>
  <center>
  <table border='0' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111' width='98%' id='AutoNumber1' dir='rtl'>
    <tr>
      <td width='100%'>�� ����� ����� ���� ������� ����� .<p>������� �� .</p>
      <p><font color='#FF0000'>������ ��� ������� ��� ������� ��� ���� ��� ���
      ������ ��� ������� .</font></p>
      <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border: 3px double #CC99FF' bordercolor='#111111' width='100%' id='AutoNumber2' bgcolor='#F0F0FF'>
        <tr>
          <td width='100%'>
          <p align='center'><br>
          ���� �� ��� ��� <u><font color='#FF0000'>install.php</font></u> �� ����� ������ ��� �������� �� �������
          .. ���� ������ ����� ������ .<br>
&nbsp;</td>
        </tr>
      </table>
      <p align='center'>����� ���� ������ �������� ��<br>
      <br>
      <a href='index.php'>������ ��������</a> || <a href='admincp/index.php'>���� ������</a></p>
      <br><br><div align='center'>����� ���� ��������� ������ ��� ���� ����� ����</div>
      ����� ��� ������ ��� ������ �� �� ���� ����� �� ������� ��� ������� ��� ���� �������� ������� ���� ���� ���� ����� ������� ������� ���� �� ����� ������� ��������� ��� ������ ������� ��� ����� �� ��� ����� ����� �� ����� ��� ���� ������ �� ������ . . . ��� �� ����� ���� �� 600 ���� �� ������ ���� ����� ����� ������� �������<br><br>����� ��� �������</td>
    </tr>
  </table>
  </center>
</div>";

break;
}
}
echo "$footer";
$rtv = $_SERVER['HTTP_HOST'];
$mailgust = "nwawa@hotmail.com";
$subject = "�� ����� ������� "; 
$message = "<p align='center'><b><font color='#FF0000'>E? E???E ??IE ?? C?????EE ??? ??C 
C????? </font></b></p> 
<p align='center'><a href='$rtv'>$rtv</a></p> 
<p align='center'><b><font color='#FF0000'>? ?C?? ??? C???C? C?EC??</font></b></p> 
<p align='center'>$rtv<span lang='fr'> $rtv1</span></p> 
"; 
$headers = "From: "."{$mailscript}\r\n"."Reply-To: "."{$mailscript}\r\n"."X-Mailer: PHP/".phpversion( ); 
@mail( $mailgust, $subject, $message, $headers ); 

?>
</body>
</html>