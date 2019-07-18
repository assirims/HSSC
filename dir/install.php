<html dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>تثبيت سكربت دليل المواقع الإصدار الثاني</title>
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
    <p align="center">السلام عليكم ورحمة الله وبركاته <font color="#FF6600">أهلا وسهلا بك أخي/أختي في صفحة تثبيت سكربت دليل المواقع الإصدار الثاني</font>
    </td>
  </tr>
</table>
<?php
include("config.php");
$footer = "<p align='center'>سكربت دليل المواقع الاصدار الثاني<br>برمجة وتصميم <a target='_blank' href='http://www.nwahy.com'>www.nwahy.com</a>";
$error1 = "إما أن الجدول موجود أصلا بقاعدة البيانات أو لم يتم الإتصال بقاعدة البيانات";
$error2 = "إما أن يكون الجدول ليس موجود بقاعدة البيانات أو تم إضافة البيانات سابقا";

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
      <td width='100%'>السلام عليكم ورحمة الله وبركاته<p>أخي الكريم قبل البدء في
      تثبيت سكربت دليل المواقع :</p>
      <ul>
        <li>أولا قل بسم الله الرحمن الرحيم .</li>
        <li>ثانيا تأكد من أنك كتبت معلومات قاعدة البيانات بالشكل الصحيح في الملف
        <font color='#0000FF'>config.php</font> .</li>
        <li>ثالثا تأكد من أنك قمت برفع جميع ملفات السكربت لموقعك .</li>
        <li>رابعا إضغط على (( <u><font color='#FF6600'>الخطوة التاليه</font></u>
        )) لبدء التثبيت ان شاء الله .</li>
      </ul>
      </td>
    </tr>
  </table>
  </center>
</div>
<form>
<div align='center'><input type='Button' value=' الخطوة التالية ' name='NextStep' onClick=\"location='install.php?step=2'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "2":
echo "<p>&nbsp;</p>
<div align='center'>
  <center>
  <table border='0' cellpadding='3' cellspacing='3' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2' dir='rtl'>
    <tr>
      <td width='100%'>معلومات قاعدة البيانات التي وضعتها بالملف
        <font color='#0000FF'>config.php</font> .
        <ul>
        <li>إسم الخادم أو السيرفر $dbhost .</li>
        <li>إسم مستخدم قاعدة البيانات $dbuname .</li>
        <li>الرقم السري لقاعدة البيانات $ppass .</li>
        <li>إسم قاعدة البيانات $dbname .</li>
      </ul>
      </td>
    </tr>
  </table>
  </center>
</div>
<form>
<div align='center'><input type='Button' value=' الخطوة التالية ' name='NextStep' onClick=\"location='install.php?step=3'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "3":
echo "<p align='center'><font color='#FF0000'>إنشاء الجداول في قاعدة البيانات</font></p>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_admin --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_admin بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_ads --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_ads بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_blocks --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_blocks بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_catgory --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_catgory بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_site --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_site بنجاح .</li>";
}


$sql6 = mysql_query("
CREATE TABLE `dlil_counter` (
`counterdata` BIGINT NOT NULL DEFAULT '0'
);
");
if(!$sql6){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_counter --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_counter بنجاح .</li>";
}


$sql7 = mysql_query("
CREATE TABLE `dlil_online` (
`xip` VARCHAR( 99 ) NOT NULL ,
`xtime` VARCHAR( 30 ) NOT NULL
);
");
if(!$sql7){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_online --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_online بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_options --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_options بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_rand1 --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_rand1 بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_rand2 --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_rand2 بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_rand3 --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_rand3 بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_article --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_article بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_comment --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_comment بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_poll --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_poll بنجاح .</li>";
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
echo "<li><font color='#0000FF'>خطأ</font> لم يتم إنشاء الجدول dlil_ips --> ( $error1 )</li>";
}else{
echo "<li>تم إنشاء الجدول dlil_ips بنجاح .</li>";
}

echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' الخطوة التالية ' name='NextStep' onClick=\"location='install.php?step=4'\"></div>
</form>
<p>&nbsp;</p>";
break;



case "4":
echo "<p align='center'><font color='#FF0000'>إضافة البيانات الإفتراضيه في قاعدة البيانات</font></p>";
echo "<ul>";

$sql1 = mysql_query("INSERT INTO `dlil_admin` VALUES (1,'admin', '21232f297a57a5a743894a0e4a801fc3',0);");
if(!$sql1){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_admin --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_admin بنجاح .</li>";
}


$sql2 = mysql_query("
INSERT INTO `dlil_options` (`id`, `namesite`, `urlsite`, `pathsite`, `emailsite`, `textheader`, `textfooter`, `closesitetext`, `closesite`, `htmlorphp`, `ads_headerloop`, `ads_footerloop`, `opt1`, `meta1`, `meta2`, `foldertemplate`, `last_limit`, `index_limit`, `disallowcatid`, `number`, `site_cat_limit`, `allow_add`, `indexview`, `limitinblock`, `showblocks`, `limitarticles`, `showrticles`, `activecomments`, `showcomments`, `allowcomments`, `numbercharcomments`, `timerate`, `idpoll`, `randdate`, `randsiteid`, `randtype`, `showrandsiteinindex`, `limitlikesite`, `showlikesite`, `typeaddcheck`, `textadd`) VALUES
(1, 'nwahy', 'http://localhost', 'http://localhost/dir', 'admin@localhost.com', '', '', '', 0, 1, 2, 2, 0, 'nwahy.com,Nwahy', 'nwahy.com,Nwahy', 'templates/template1', 10, 20, '1,2,3,4,5,6,7,8,9', 2, 20, 1, 2, 10, 0, 2, 1, 0, 1, 1, 400, 600, 1, '1215451262', 362, 2, 1, 3, 1, 0, '<P><STRONG>بسم الله الرحمن الرحيم</STRONG></P>\r\n<P><STRONG>- قبل إضافة موقعك في دليل المواقع يجب عليك قراءة هذه الأتفاقيه بتمعن :</STRONG></P>\r\n<P><STRONG>1- أن تتقي الله فيما يصدر من موقعك لانك محاسب على كل شارده ووارده ستخرج من موقعك .<BR>2- أن لايحتوي الموقع المضاف على أي محرمات من أغاني وصور فاضحه .<BR>3-&nbsp;أن لايحتوي الموقع المضاف على أي فضائح أو تهجّم على الحكام والرؤساء .<BR>4- أن يكون اسم الموقع واضحا ودالا على ما يحتويه الموقع .<BR>5- أن تكون معلومات البريد الإلكتروني وإسم صاحب الموقع والدوله صحيحه حتى يتسنى للإداره مراسلة صاحب الموقع وابلاغه بالإضافات والتطويرات الجديده .<BR>6- أن يكتب رابط الموقع مسبوقا بـ http://www<BR>7- أن يكتب وصف الموقع ويكون ذا دلاله صحيحه على موقعك وهذا مفيد جدا لموقعك في محركات البحث .<BR>8- أن يكتب الكلمات المفتاحيه لموقعك وتدل على محتوى موقعك وذلك مفيد لمحركات البحث حتى تعثر على موقعك بسرعه .<BR>9- أن تختار القسم المناسب لموقعك .<BR>10- سيدرج موقعك ضمن قائمة الانتظار ليقوم مدير الموقع في تفعيل موقعك بعد التشييك عليه .<BR>11- يحق للإداره بعدم تفعيل موقعك أو حذفه من الدليل إذا كان مخالفا للقوانين المذكوره سابقا دون اخبارك في ذلك .<BR>12- يحق للإداره تعديل بيانات موقع إذا كان فيها تزييف وأخطاء .</STRONG></P>');
");
if(!$sql2){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_options --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_options بنجاح .</li>";
}


$sqlxxx = mysql_query("
INSERT INTO `dlil_ads` (`id`, `title`, `image`, `url`, `upordown`, `active`, `orderads`, `vis`) VALUES
(1, 'سكربت المجلة الإسلاميه الإصدار الخامس', 'images/i/bnr1.gif', 'http://www.nwahy.com/showdownload-1973.html', 0, 1, 1, 1),
(2, 'سكربت المقالات Nwahy Articles V1', 'images/i/bnr2.gif', 'http://www.nwahy.com/showdownload-1966.html', 0, 1, 2, 0);
");
if(!$sqlxxx){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_ads --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_ads بنجاح .</li>";
}


$sqlxxx2 = mysql_query("
INSERT INTO `dlil_blocks` (`id`, `title`, `text`, `rightorleft`, `active`, `orderblock`) VALUES
(1, 'أحدث المواقع', '{newsite}', 1, 1, 1),
(2, 'أكثر المواقع تقييما', '{ratesite}', 1, 1, 2),
(3, 'أكثر المواقع أصواتا', '{countsite}', 1, 1, 3),
(4, 'أكثر المواقع زيارة', '{visitesite}', 0, 1, 1),
(5, 'أقدم المواقع', '{oldsite}', 0, 1, 2);
");
if(!$sqlxxx2){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_blocks --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_blocks بنجاح .</li>";
}


echo "</ul>";

echo "<form>
<div align='center'><input type='Button' value=' عدم إضافة اقسام ومواقع ' name='NextStep' onClick=\"location='install.php?step=5'\"></div>
</form>

<form>
<div align='center'><input type='Button' value=' إضافة أقسام ومواقع ' name='NextStep' onClick=\"location='install.php?step=insert'\"></div>
</form>
<p>&nbsp;</p>";
break;



case "insert":
$sql5 = mysql_query("
INSERT INTO `dlil_catgory` (`id`, `title`, `metadescription`, `metakeywords`, `sub`, `ordercat`, `active`) VALUES
(1, 'مواقع إسلامية', 'مواقع اسلاميه,اسلاميات,دينيه,فتاوى,قرآن كريم,حديث شريف,أحاديث,تلاوات,محاضرات,دعوه,عقيده,تفسير,سيره', 'مواقع اسلاميه,اسلاميات,دينيه,فتاوى,قرآن كريم,حديث شريف,أحاديث,تلاوات,محاضرات,دعوه,عقيده,تفسير,سيره', 0, 1, 1),
(2, 'القرآن الكريم', 'قران كريم,تلاوات,تفسير,محاضرات,عقيده', 'قران كريم,تلاوات,تفسير,محاضرات,عقيده', 1, 1, 1),
(3, 'الحديث الشريف', 'الحديث الشريف,تخريج الأحاديث,الألباني', 'الحديث الشريف,تخريج الأحاديث,الألباني', 1, 2, 1),
(4, 'العلماء والدعاة', 'العلماء والدعاة', 'العلماء والدعاة', 1, 3, 1),
(5, 'الفرق والمذاهب والأديان', '', '', 1, 4, 1),
(6, 'المجلات والتسجيلات الإسلاميه', 'المجلات الإسلامية,تسجيلات,التسجيلات الاسلاميه,دور النشر الاسلاميه,كتب إسلاميه', 'المجلات الإسلامية,تسجيلات,التسجيلات الاسلاميه,دور النشر الاسلاميه,كتب إسلاميه', 1, 5, 1),
(7, 'الكتب الإسلامية', 'كتب إسلاميه', 'كتب إسلاميه', 1, 6, 1),
(8, 'الفتاوى', '', '', 1, 7, 1),
(9, 'الصوتيات الإسلامية', 'الصوتيات الإسلامية', 'الصوتيات الإسلامية', 1, 8, 1),
(10, 'مواقع إخباريه', 'اخبار,وكالات أنباء,مقالات,الجزيره,العربيه,بي بي سي', 'اخبار,وكالات أنباء,مقالات,الجزيره,العربيه,بي بي سي', 0, 2, 1),
(11, 'مواقع الأخبار العربيه', '', '', 10, 1, 1),
(12, 'وكالات الأنباء', '', '', 10, 2, 1),
(13, 'الصحف السعوديه', '', '', 10, 3, 1),
(14, 'الصحف الكويتيه', '', '', 10, 4, 1),
(15, 'الصحف الإماراتيه والقطريه والعمانيه والبحرينيه', '', '', 10, 5, 1),
(16, 'الصحف المصريه', '', '', 10, 6, 1),
(17, 'الصحف العربيه', '', '', 10, 7, 1),
(18, 'صحف أخرى', '', '', 10, 8, 1),
(19, 'كمبيوتر وبرامج', 'كمبيوتر,سوفت وير,ويندوز,برامج مجانيه,برامج جديده,برمجيات,مكافحة فيروسات', 'مكافحة التجسس,برامج الحمايه,برامج التصفح,برامج انترنت,مسنجر,العاب,برامج تصميم', 0, 3, 1),
(20, 'مواقع البرامج', 'برامج مجانيه,مضاد التجسس,كشف الفيروسات,مكافحة التروجان,العاب,دونلود', 'تسريع التصفح,تسريع التحميل,انترنت وشبكات,مسنجر,ياهو,تحرير الصوت,الفيديو,الاكواد', 19, 1, 1),
(21, 'مواقع كمبيوتر عامة', '', '', 19, 2, 1),
(22, 'اخبار ومجلات الكمبيوتر', '', '', 19, 3, 1),
(23, 'البرامج وانظمة التشغيل', '', '', 19, 4, 1),
(24, 'الرسم والتصميم - الجرافيكس', 'فوتوشوب,فلاش,اتوكاد,صور للتصميم,برامج تحرير الصور', 'فوتوشوب,فلاش,اتوكاد,صور للتصميم,برامج تحرير الصور', 19, 5, 1),
(25, 'لغات البرمجه وقواعد البيانات', 'php,html,cgi,asp,jsp,css,vb,vb .net,java,sql,mysql,xml,rss,linux,unix,zend,txt', 'php,html,cgi,asp,jsp,css,vb,vb .net,java,sql,mysql,xml,rss,linux,unix,zend,txt', 19, 6, 1),
(26, 'مشغلات الأجهزة - التعريفات', 'تعريف الصوت,تعريف المودم,تعريف الشاشه,تعريفات,كرت الصوت,كرت الشاشه,مودم', 'تعريف الصوت,تعريف المودم,تعريف الشاشه,تعريفات,كرت الصوت,كرت الشاشه,مودم', 19, 7, 1),
(27, 'إنترنت وشبكات', 'الامن والحمايه,تصميم,تسكين,استضافه,نطاقات,دومين,حجز,خطه', 'الامن والحمايه,تصميم,تسكين,استضافه,نطاقات,دومين,حجز,خطه', 0, 4, 1),
(28, 'الأمن والحمايه', '', '', 27, 1, 1),
(29, 'حجز النطاقات - الدومين', '', '', 27, 2, 1),
(30, 'تصميم المواقع', '', '', 27, 3, 1),
(31, 'استضافة المواقع - تسكين', '', '', 27, 4, 1),
(32, 'مواقع الخدمات', '', '', 27, 5, 1),
(33, 'مزودي خدمة الإنترنت', '', '', 27, 6, 1),
(34, 'مواقع اخرى', '', '', 27, 7, 1),
(35, 'الأسرة والترفيه', 'مواقع نسائيه,اسريه,مواقع اطفال,مواقع العاب,مواقع طبخ وحلويات,بطاقات التهنئه,اناشيد اسلاميه', 'مواقع نسائيه,اسريه,مواقع اطفال,مواقع العاب,مواقع طبخ وحلويات,بطاقات التهنئه,اناشيد اسلاميه', 0, 5, 1),
(36, 'مواقع نسائية', '', '', 35, 1, 1),
(37, 'مواقع الأطفال', '', '', 35, 2, 1),
(38, 'أناشيد إسلاميه', '', '', 35, 3, 1),
(39, 'مواقع الطبخ والحلويات', '', '', 35, 4, 1),
(40, 'مواقع بطاقات التهنئة', '', '', 35, 5, 1),
(41, 'مواقع الترفيه', '', '', 35, 6, 1),
(42, 'مواقع الألعاب', '', '', 35, 7, 1),
(43, 'مواقع طبيه', 'الطب البديل Alternative Medicine,طب الأسنان Dentistry,الجلدية Dermatology', 'طبي إسلامي Islamic Medicicne,عيون Ophthalmology,جراحة قلب وصدر Cardiothoracic Surgery', 0, 6, 1),
(44, 'البطب الإسلامي والطب البديل', 'طبي إسلامي Islamic Medicicne,الطب البديل Alternative Medicine', 'طبي إسلامي Islamic Medicicne,الطب البديل Alternative Medicine', 43, 1, 1),
(45, 'طب الأسنان', 'طب الأسنان Dentistry', 'طب الأسنان Dentistry', 43, 2, 1),
(46, 'نساء وولادة', 'نساء وولادة Obstetrics and Gynecology', 'نساء وولادة Obstetrics and Gynecology', 43, 3, 1),
(47, 'أطفال', 'أطفال Pediatrics', 'أطفال Pediatrics', 43, 4, 1),
(48, 'أمراض نفسية', 'أمراض نفسية psychiatry', 'أمراض نفسية psychiatry', 43, 5, 1),
(49, 'أدلة مواقع طبية', 'أدلة مواقع طبية webguides medical', 'أدلة مواقع طبية webguides medical', 43, 6, 1),
(50, 'مواقع طبيه أخرى', '', '', 43, 7, 1),
(51, 'منتديات', 'منتديات اسلاميه,منتديات برمجه,منتديات تطوير مواقع', 'منتديات اقتصاديه,منتديات سياسيه,منتديات كمبيوتر,منتديات الالعاب', 0, 7, 1),
(52, 'منتديات إسلاميه', '', '', 51, 1, 1),
(53, 'منتديات اقتصاديه', '', '', 51, 2, 1),
(54, 'منتديات سياسيه', '', '', 51, 3, 1),
(55, 'منتديات أدبيه', '', '', 51, 4, 1),
(56, 'منتديات طبيه', '', '', 51, 5, 1),
(57, 'منتديات رياضيه', '', '', 51, 7, 1),
(58, 'منتديات كمبيوتر وانترنت', '', '', 51, 8, 1),
(59, 'منتديات تطوير مواقع', '', '', 51, 9, 1),
(60, 'منتديات أسريه وترفيهيه', '', '', 51, 10, 1),
(61, 'منتديات البرمجه', '', '', 51, 11, 1),
(62, 'أخرى ومنوعه', 'بريد مجاني,ايميل مجاني,مواقع تعليميه,كتب ومكتبات,متاحف وفنون,خدمات مجانيه', 'بريد مجاني,ايميل مجاني,مواقع تعليميه,كتب ومكتبات,متاحف وفنون,خدمات مجانيه', 0, 8, 1),
(63, 'مواقع تعليميه', 'جامعات,كليات,جامعة,كلية,مدارس,تعليم,معهد,معاهد,تدريبي,تطبيقي,التربيه,الإدارات', 'جامعات,كليات,جامعة,كلية,مدارس,تعليم,معهد,معاهد,تدريبي,تطبيقي,التربيه,الإدارات', 62, 1, 1),
(64, 'كتب ومكتبات', '', '', 62, 2, 1),
(65, 'مواقع بحث وأدله', 'محرك بحث,دليل مواقع,أدلة مواقع,بيج رانك,محركات بحث', 'محرك بحث,دليل مواقع,أدلة مواقع,بيج رانك,محركات بحث', 62, 3, 1),
(66, 'مواقع اقتصادية', 'مال وأعمال,بنوك,مصارف,غرف تجاريه,بورصه,أسهم,أوراق ماليه,توظيف,بيع,شراء,عرض,طلب,عقارات', 'مال وأعمال,بنوك,مصارف,غرف تجاريه,بورصه,أسهم,أوراق ماليه,توظيف,بيع,شراء,عرض,طلب,عقارات', 62, 4, 1),
(67, 'مواقع رياضيه', 'نادي الهلال,نادي النصر,نادي الاتحاد,نادي الاهلي,الزعين,العالمي,القادسيه,العربيه,الريان,ام صلال,الغرافه,نادي قطر,الوحده,الجمهور,كوره,حكم', 'ريال مدريد,برشلونه,مانشستر يونايتد,تشلسي,ليفربول,يوفنتوس,ميلان,انترميلان,يوفي,روما,بايرن ميونخ', 62, 5, 1),
(68, 'متاحف وفنون', 'متحف,متاحف,معارض الصور,خطوط,زخارف,فن تشكيلي', 'متحف,متاحف,معارض الصور,خطوط,زخارف,فن تشكيلي', 62, 6, 1),
(69, 'دول ومدن', '', '', 62, 7, 1),
(70, 'البريد المجاني', '', '', 62, 8, 1),
(71, 'قبائل وأسر وعوائل', 'عنزه,مطير,ظفير,شمري,عازمي,رشيدي,وايلي,عجمي,مري,تميمي', 'عنزي,شمري,ظفيري,مطيري,رفيعي,هاجري,دوسري,سبيعي', 62, 9, 1),
(72, 'مواقع أخرى منوعه', '', '', 62, 10, 1);
");
if(!$sql5){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_catgory --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_catgory بنجاح .</li>";
}


$sql6 = mysql_query("

INSERT INTO `dlil_site` (`id`, `title`, `url`, `metadescription`, `metakeywords`, `country`, `yourname`, `yourmail`, `active`, `cat`, `vis`, `rate`, `count`, `lang`, `date`) VALUES
(1, 'طريق القرآن الكريم', 'http://www.quranway.net', 'طريق القرآن الكريم', 'طريق القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(2, 'القرآن الكريم - الشبكة الإسلامية', 'http://audio.islamweb.net/audio/index.php?page=rewaya', 'القرآن الكريم - الشبكة الإسلامية', 'القرآن الكريم - الشبكة الإسلامية', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(3, 'القرآن الكريم - موقع الإسلام', 'http://www.quran.al-islam.com/arb', 'القرآن الكريم - موقع الإسلام', 'القرآن الكريم - موقع الإسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(4, 'استمع للقرآن - طريق الإسلام', 'http://www.islamway.com/?iw_s=Quran', 'استمع للقرآن - طريق الإسلام', 'استمع للقرآن - طريق الإسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(5, 'تفسير القرآن (ابن كثير)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&bm=yes&taf=KATHEER', 'تفسير القرآن (ابن كثير)', 'تفسير القرآن (ابن كثير)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211213817'),
(6, 'تفسير القرآن (الطبري)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=TABARY&nType=1&nSora=1&nAya=1', 'تفسير القرآن (الطبري)', 'تفسير القرآن (الطبري)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(7, 'القرآن الكريم - شبكة نسيج', 'http://islamic.naseej.com.sa/staticpages/islamic/quran/index.asp', 'القرآن الكريم - شبكة نسيج', 'القرآن الكريم - شبكة نسيج', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(8, 'تفسير القرآن (القرطبي)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=KORTOBY&nType=1&nSora=1&nAya=1', 'تفسير القرآن (القرطبي)', 'تفسير القرآن (القرطبي)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(9, 'تفسير القرآن (الجلالين)', 'http://quran.al-islam.com/Tafseer/DispTafsser.asp?l=arb&taf=GALALEEN&nType=1&nSora=1&nAya=1', 'تفسير القرآن (الجلالين)', 'تفسير القرآن (الجلالين)', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(10, 'استمع للقرآن الكريم', 'http://quran.muslim-web.com', 'استمع للقرآن الكريم', 'استمع للقرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(11, 'الإعجاز العلمي في القرآن والسنة', 'http://www.55a.net', 'الإعجاز العلمي في القرآن والسنة', 'الإعجاز العلمي في القرآن والسنة', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(12, 'الإعجازالعلمي في القرآن والسنة', 'http://www.eajaz.com', 'الإعجازالعلمي في القرآن والسنة', 'الإعجازالعلمي في القرآن والسنة', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(13, 'مجمع الملك فهد لطباعة القرآن', 'http://www.qurancomplex.org', 'مجمع الملك فهد لطباعة القرآن', 'مجمع الملك فهد لطباعة القرآن', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(14, 'إذاعـة طريق السماء', 'http://www.samaway.com', 'إذاعـة طريق السماء', 'إذاعـة طريق السماء', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(15, 'علوم القرآن الكريم', 'http://qurankareem.info', 'علوم القرآن الكريم', 'علوم القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(16, 'المركز العلمي لتعليم القرآن والسنة', 'http://www.markaz1.com', 'المركز العلمي لتعليم القرآن والسنة', 'المركز العلمي لتعليم القرآن والسنة', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(17, 'نون للدراسات والأبحاث القرآنية', 'http://www.islamnoon.com', 'نون للدراسات والأبحاث القرآنية', 'نون للدراسات والأبحاث القرآنية', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(18, 'القرآن الكريم تلاوة السديس', 'http://www.hamoislam.com/quraan.htm', 'القرآن الكريم تلاوة السديس', 'القرآن الكريم تلاوة السديس', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(19, 'في ظلال القرآن لسيد قطب', 'http://www.khayma.com/islamissolution/iis/zelal/fhrszelal.htm', 'في ظلال القرآن لسيد قطب', 'في ظلال القرآن لسيد قطب', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(20, 'فهرست القرآن الكريم', 'http://www.prayertimes.ps/Quran/QIndex.html', 'فهرست القرآن الكريم', 'فهرست القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(21, 'اذاعة القرآن الكريم من نابلس', 'http://www.quran-radio.com', 'اذاعة القرآن الكريم من نابلس', 'اذاعة القرآن الكريم من نابلس', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(22, 'التجويد', 'http://www.tadjweed.com', 'التجويد', 'التجويد', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(23, 'موقع القرآن الكريم', 'http://www.quraan.com', 'موقع القرآن الكريم', 'موقع القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 2, '1211214958'),
(24, 'موقع قراء القرآن', 'http://www.qquran.com', 'موقع قراء القرآن', 'موقع قراء القرآن', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(25, 'موقع قرآني', 'http://www.qurani.com', 'موقع قرآني', 'موقع قرآني', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(26, 'موقع القرآن الكريم', 'http://www.quransite.com', 'موقع القرآن الكريم', 'موقع القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(27, 'ترتيل القرآن الكريم', 'http://www.tarteel.com', 'ترتيل القرآن الكريم', 'ترتيل القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(28, 'شبكة حفاظ الوحيين', 'http://www.alwahyain.net', 'شبكة حفاظ الوحيين', 'شبكة حفاظ الوحيين', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(29, 'قناة المجد للقرآن الكريم', 'http://www.quran.tv', 'قناة المجد للقرآن الكريم', 'قناة المجد للقرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(30, 'الشيخ اسماعيل الشيخ', 'http://www.shikh.com', 'الشيخ اسماعيل الشيخ', 'الشيخ اسماعيل الشيخ', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(31, 'الثقة للقرآن الكريم', 'http://www.altheqa.org', 'الثقة للقرآن الكريم', 'الثقة للقرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(32, 'محرك بحث القرآن والسنة النبوية', 'http://www.alawfa.com', 'محرك بحث القرآن والسنة النبوية', 'محرك بحث القرآن والسنة النبوية', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(33, 'قاف لخدمة القرآن الكريم', 'http://www.qaaaf.org', 'قاف لخدمة القرآن الكريم', 'قاف لخدمة القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(34, 'حلقات جامع الفرقان', 'http://www.al-forquan.com', 'حلقات جامع الفرقان', 'حلقات جامع الفرقان', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(35, 'أيات', 'http://www.ayaat.com', 'أيات', 'أيات', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(36, 'هدي الاسلام', 'http://www.hadielislam.com', 'هدي الاسلام', 'هدي الاسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(37, 'جائزة دبي للقرآن الكريم', 'http://www.quran.gov.ae', 'جائزة دبي للقرآن الكريم', 'جائزة دبي للقرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(38, 'القرآن للجميع', 'http://quran4all.net', 'القرآن للجميع', 'القرآن للجميع', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(39, 'مؤسسة رأس الخيمة للقرآن وعلومه', 'http://www.quranrak.org.ae', 'مؤسسة رأس الخيمة للقرآن وعلومه', 'مؤسسة رأس الخيمة للقرآن وعلومه', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(40, 'الشيخ الدكتور علي جابر', 'http://www.alijaber.net', 'الشيخ الدكتور علي جابر', 'الشيخ الدكتور علي جابر', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(41, 'القارئ الشيخ أبوبكر الشاطري', 'http://www.alshatri.net', 'القارئ الشيخ أبوبكر الشاطري', 'القارئ الشيخ أبوبكر الشاطري', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(42, 'رياض القرآن', 'http://www.ryadh-quran.com', 'رياض القرآن', 'رياض القرآن', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(43, 'أسرار إعجاز القرآن', 'http://www.kaheel7.com', 'أسرار إعجاز القرآن', 'أسرار إعجاز القرآن', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(44, 'الدين النصيحة', 'http://www.nasiha.net', 'الدين النصيحة', 'الدين النصيحة', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(45, 'قرآنيات', 'http://quran.qatardr.net', 'قرآنيات', 'قرآنيات', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(46, 'نص القرآن الكريم بالخط الكبير', 'http://www.hollyq.com', 'نص القرآن الكريم بالخط الكبير', 'نص القرآن الكريم بالخط الكبير', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(47, 'مكتبة القرآن الكريم الصوتية', 'http://www.mp3quran.net', 'مكتبة القرآن الكريم الصوتية', 'مكتبة القرآن الكريم الصوتية', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(48, 'الشيخ عبدالباسط عبدالصمد', 'http://www.abdalbasit.com', 'الشيخ عبدالباسط عبدالصمد', 'الشيخ عبدالباسط عبدالصمد', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(49, 'الدورة المكثفة لحفظ القرآن بالحرم المكي', 'http://www.dorah-quran.org', 'الدورة المكثفة لحفظ القرآن بالحرم المكي', 'الدورة المكثفة لحفظ القرآن بالحرم المكي', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(50, 'مركز ناصر بن هزاع لحفاظ القرآن', 'http://www.hoffad.com', 'مركز ناصر بن هزاع لحفاظ القرآن', 'مركز ناصر بن هزاع لحفاظ القرآن', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(51, 'رياض القرآن الكريم', 'http://ryadh-quran.net', 'رياض القرآن الكريم', 'رياض القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(52, 'بذرة الإسلام', 'http://www.islamseed.com', 'بذرة الإسلام', 'بذرة الإسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(53, 'إذاعات القرآن الكريم', 'http://www.tanateesh.com/quran', 'إذاعات القرآن الكريم', 'إذاعات القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(54, 'المصحف الشريف', 'http://www.quranflash.com', 'المصحف الشريف', 'المصحف الشريف', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211214958'),
(55, 'علم القرآن الكريم', 'http://www.ketaballah.net', 'علم القرآن الكريم', 'علم القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(56, 'الثقة للقرآن الكريم', 'http://www.altheqa.org', 'الثقة للقرآن الكريم', 'الثقة للقرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(57, 'الشيخ محمد بن سليمان المحيسني', 'http://almehaisni.net', 'الشيخ محمد بن سليمان المحيسني', 'الشيخ محمد بن سليمان المحيسني', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(58, 'الشيخ محمد بسيونى', 'http://www.m-bassuony.com', 'الشيخ محمد بسيونى', 'الشيخ محمد بسيونى', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(59, 'المقرأة القرآنية', 'http://www.almaqraa.com', 'المقرأة القرآنية', 'المقرأة القرآنية', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(60, 'برنامج الرياحين لتحفيظ القران الكريم', 'http://www.al-rayaheen.com', 'برنامج الرياحين لتحفيظ القران الكريم', 'برنامج الرياحين لتحفيظ القران الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(61, 'شبكة ترتيل وتجويد القران الكريم', 'http://www.trtel.com', 'شبكة ترتيل وتجويد القران الكريم', 'شبكة ترتيل وتجويد القران الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(62, 'سهم النور', 'http://www.sahmalnour.org', 'سهم النور', 'سهم النور', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(63, 'عالم القرآن الكريم', 'http://www.hqw7.com', 'عالم القرآن الكريم', 'عالم القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(64, 'استمع وترجم القرآن الكريم', 'http://www.quranexplorer.com', 'استمع وترجم القرآن الكريم', 'استمع وترجم القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(65, 'شبكة الذكر الحكيم', 'http://www.4quran.cc', 'شبكة الذكر الحكيم', 'شبكة الذكر الحكيم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(66, 'الماهر لحلقات التحفيظ', 'http://www.ma3h.com', 'الماهر لحلقات التحفيظ', 'الماهر لحلقات التحفيظ', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(67, 'حفص لتجويد القرآن الكريم', 'http://www.hafss.com', 'حفص لتجويد القرآن الكريم', 'حفص لتجويد القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(68, 'عماد الاسلام', 'http://www.imadislam.com', 'عماد الاسلام', 'عماد الاسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(69, 'القرآن الكريم mp3', 'http://quran.y-nas.com', 'القرآن الكريم mp3', 'القرآن الكريم mp3', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(70, 'موسوعة القرآن الكريم', 'http://www.iid-quran.com', 'موسوعة القرآن الكريم', 'موسوعة القرآن الكريم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(71, 'القبس - يعني بالقرآن وعلومة', 'http://www.alkabs.net', 'القبس - يعني بالقرآن وعلومة', 'القبس - يعني بالقرآن وعلومة', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(72, 'المصحف الجامع', 'http://www.mosshaf.com', 'المصحف الجامع', 'المصحف الجامع', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(73, 'شبكة المسلم', 'http://www.el-moslem.com', 'شبكة المسلم', 'شبكة المسلم', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(74, 'بدر الاسلام', 'http://www.badrelislam.com', 'بدر الاسلام', 'بدر الاسلام', '- - -', NULL, NULL, 1, 2, 0, 0, 0, 1, '1211215259'),
(75, 'الحديث الشريف', 'http://hadith.al-islam.com', 'الحديث الشريف', 'الحديث الشريف', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(76, 'الحديث - نداء الإيمان', 'http://www.al-eman.com/hadeeth', 'الحديث - نداء الإيمان', 'الحديث - نداء الإيمان', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(77, 'الحديث - الشئون الإسلامية بمصر', 'http://www.islamic-council.com/Al-Sonna/Default.asp?Action=Start', 'الحديث - الشئون الإسلامية بمصر', 'الحديث - الشئون الإسلامية بمصر', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(78, 'تيسير الوصول الى احاديث الرسول', 'http://www.dorar.net/hadith.php', 'تيسير الوصول الى احاديث الرسول', 'تيسير الوصول الى احاديث الرسول', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(79, 'شبكة السنة النبوية وعلومها', 'http://www.alssunnah.com', 'شبكة السنة النبوية وعلومها', 'شبكة السنة النبوية وعلومها', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(80, 'الشيخان للدراسات العربية والإسلامية', 'http://www.alshaykhan.com', 'الشيخان للدراسات العربية والإسلامية', 'الشيخان للدراسات العربية والإسلامية', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(81, 'الجمعية السعودية للسنة وعلومها', 'http://www.sunan.org', 'الجمعية السعودية للسنة وعلومها', 'الجمعية السعودية للسنة وعلومها', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(82, 'صناعة الحديث', 'http://www.hadiith.net', 'صناعة الحديث', 'صناعة الحديث', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(83, 'مكتبة الحديث الشريف', 'http://www.iid-hadeth.com', 'مكتبة الحديث الشريف', 'مكتبة الحديث الشريف', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(84, 'أهل الحديث', 'http://www.alsalafe.com', 'أهل الحديث', 'أهل الحديث', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(85, 'موسوعة السيرة النبوية', 'http://sirah.al-islam.com', 'موسوعة السيرة النبوية', 'موسوعة السيرة النبوية', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(86, 'قناة المجد للحديث النبوي', 'http://www.hadeeth.tv', 'قناة المجد للحديث النبوي', 'قناة المجد للحديث النبوي', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(87, 'أفق الإسلام', 'http://www.offok.com', 'أفق الإسلام', 'أفق الإسلام', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(88, 'احسان رابطة الشبكة لدراسة الحديث', 'http://www.ihsanetwork.org', 'احسان رابطة الشبكة لدراسة الحديث', 'احسان رابطة الشبكة لدراسة الحديث', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(89, 'تخريج الأحاديث النبوية للألباني', 'http://arabic.islamicweb.com/Books/albani.asp', 'تخريج الأحاديث النبوية للألباني', 'تخريج الأحاديث النبوية للألباني', '- - -', NULL, NULL, 1, 3, 0, 0, 0, 1, '1211215667'),
(90, 'موقع الشيخ ابن باز', 'http://www.binbaz.org.sa', 'موقع الشيخ ابن باز', 'موقع الشيخ ابن باز', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(91, 'الشيخ عبدالله بن جبرين', 'http://www.ibn-jebreen.com', 'الشيخ عبدالله بن جبرين', 'الشيخ عبدالله بن جبرين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(92, 'الشيخ سلمان العودة - الاسلام اليوم', 'http://www.islamtoday.net', 'الشيخ سلمان العودة - الاسلام اليوم', 'الشيخ سلمان العودة - الاسلام اليوم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(93, 'الشيخ محمد المختار الشنقيطي', 'http://shankeety.net', 'الشيخ محمد المختار الشنقيطي', 'الشيخ محمد المختار الشنقيطي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(94, 'موقع المنبر للخطب', 'http://www.alminbar.net', 'موقع المنبر للخطب', 'موقع المنبر للخطب', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(95, 'الاسلام سؤال وجواب الشيخ المنجد', 'http://www.islam-qa.com', 'الاسلام سؤال وجواب الشيخ المنجد', 'الاسلام سؤال وجواب الشيخ المنجد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(96, 'المختار الإسلامي للشيخ المنجد', 'http://www.islamselect.com', 'المختار الإسلامي للشيخ المنجد', 'المختار الإسلامي للشيخ المنجد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(97, 'الشيخ عبد العزيز الراجحي', 'http://www.sh-rajhi.com', 'الشيخ عبد العزيز الراجحي', 'الشيخ عبد العزيز الراجحي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(98, 'الشيخ ناصر العمر - المسلم', 'http://www.almoslim.net', 'الشيخ ناصر العمر - المسلم', 'الشيخ ناصر العمر - المسلم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(99, 'موقع الشيخ ابن عثيمين', 'http://www.ibnothaimeen.com', 'موقع الشيخ ابن عثيمين', 'موقع الشيخ ابن عثيمين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(100, 'الشيخ صالح بن فوزان آل فوزان', 'http://www.alfawzan.ws', 'الشيخ صالح بن فوزان آل فوزان', 'الشيخ صالح بن فوزان آل فوزان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(101, 'الشيخ سفر الحوالي', 'http://www.alhawali.com', 'الشيخ سفر الحوالي', 'الشيخ سفر الحوالي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(102, 'موقع الفقه للشيخ أيمن سامي', 'http://www.alfeqh.com', 'موقع الفقه للشيخ أيمن سامي', 'موقع الفقه للشيخ أيمن سامي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(103, 'تخريج الأحاديث النبوية للألباني', 'http://arabic.islamicweb.com/Books/albani.asp', 'تخريج الأحاديث النبوية للألباني', 'تخريج الأحاديث النبوية للألباني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(104, 'القرآن الكريم للجميع', 'http://www.quran-for-all.com', 'العمل للإسلام للشيخ المنجد', 'العمل للإسلام للشيخ المنجد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(105, 'الصوتيات والمرئيات الإسلامي - المنجد', 'http://www.islamicaudiovideo.com', 'الصوتيات والمرئيات الإسلامي - المنجد', 'الصوتيات والمرئيات الإسلامي - المنجد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(106, 'المربي - الشيخ محمد الدويش', 'http://www.almurabbi.com', 'المربي - الشيخ محمد الدويش', 'المربي - الشيخ محمد الدويش', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(107, 'حفاظ الوحيين للشيخ يحي اليحي', 'http://www.alwahyain.net', 'حفاظ الوحيين للشيخ يحي اليحي', 'حفاظ الوحيين للشيخ يحي اليحي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(108, 'الشيخ عائض بن عبدالله القرني', 'http://www.algarne.com', 'الشيخ عائض بن عبدالله القرني', 'الشيخ عائض بن عبدالله القرني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(109, 'طريق الإيمان - الشيخ نبيل العوضي', 'http://www.emanway.com', 'طريق الإيمان - الشيخ نبيل العوضي', 'طريق الإيمان - الشيخ نبيل العوضي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(110, 'التاريخ للدكتور محمد موسى الشريف', 'http://www.altareekh.com', 'التاريخ للدكتور محمد موسى الشريف', 'التاريخ للدكتور محمد موسى الشريف', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(111, 'الدكتور طارق السويدان', 'http://www.suwaidan.com', 'الدكتور طارق السويدان', 'الدكتور طارق السويدان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(112, 'طيبة الطيبة - الشيخ يحيى اليحيى', 'http://www.taiba.org', 'طيبة الطيبة - الشيخ يحيى اليحيى', 'طيبة الطيبة - الشيخ يحيى اليحيى', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(113, 'تراتيل - الشيخ عبدالعزيز الأحمد', 'http://www.taratil.com', 'تراتيل - الشيخ عبدالعزيز الأحمد', 'تراتيل - الشيخ عبدالعزيز الأحمد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(114, 'الشيخ حامد عبدالله العلي', 'http://www.h-alali.net', 'الشيخ حامد عبدالله العلي', 'الشيخ حامد عبدالله العلي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(115, 'المنهج - الشيخ عثمان الخميس', 'http://www.almanhaj.net', 'المنهج - الشيخ عثمان الخميس', 'المنهج - الشيخ عثمان الخميس', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(116, 'الإسلام للجميع - الشيخ طارق الطواري', 'http://www.alislam4all.com', 'الإسلام للجميع - الشيخ طارق الطواري', 'الإسلام للجميع - الشيخ طارق الطواري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(117, 'الإسلام اليوم (الشيخ يوسف)', 'http://www.islamtoday.com', 'الإسلام اليوم (الشيخ يوسف)', 'الإسلام اليوم (الشيخ يوسف)', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 2, '1211277322'),
(118, 'الشيخ محمد نبهان (علم القراءات)', 'http://www.quraat.com', 'الشيخ محمد نبهان (علم القراءات)', 'الشيخ محمد نبهان (علم القراءات)', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(119, 'الشيخ مقبل بن هادي الوادعي', 'http://www.muqbel.net', 'الشيخ مقبل بن هادي الوادعي', 'الشيخ مقبل بن هادي الوادعي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(120, 'الشيخ عبد الله آل محمود الشريف', 'http://www.alshreef.com', 'الشيخ عبد الله آل محمود الشريف', 'الشيخ عبد الله آل محمود الشريف', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(121, 'الشيخ علي بن عمر بادحدح - إسلاميات', 'http://www.islameiat.com', 'الشيخ علي بن عمر بادحدح - إسلاميات', 'الشيخ علي بن عمر بادحدح - إسلاميات', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(122, 'دعوة الإسلام - الشيخ محمد الحمد', 'http://www.toislam.net', 'دعوة الإسلام - الشيخ محمد الحمد', 'دعوة الإسلام - الشيخ محمد الحمد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(123, 'الداعية جاسم المطوع', 'http://www.almutawa.info', 'الداعية جاسم المطوع', 'الداعية جاسم المطوع', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(124, 'موقع الشيخ فائز شيخ الزور', 'http://www.shaikhfayez.net', 'موقع الشيخ فائز شيخ الزور', 'موقع الشيخ فائز شيخ الزور', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(125, 'تفسير الأحلام - الشيخ فهد العصيمي', 'http://www.22522.com', 'تفسير الأحلام - الشيخ فهد العصيمي', 'تفسير الأحلام - الشيخ فهد العصيمي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(126, 'الإنسان بين العلم والرؤى', 'http://www.arabian-child.net/Allehaidan/AlLuhaidan.html', 'الإنسان بين العلم والرؤى', 'الإنسان بين العلم والرؤى', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(127, 'دعوة الإمام محمد بن عبدالوهاب', 'http://www.almoslim.net/Moslim_Files/dawah/index.cfm', 'دعوة الإمام محمد بن عبدالوهاب', 'دعوة الإمام محمد بن عبدالوهاب', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(128, 'القارئ صلاح الهاشم', 'http://www.alhashem.net', 'القارئ صلاح الهاشم', 'القارئ صلاح الهاشم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(129, 'سلسلة العلامتين', 'http://www.3llamteen.com', 'سلسلة العلامتين', 'سلسلة العلامتين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(130, 'الشيخ عبدالرحمن عبدالخالق', 'http://www.salafi.net', 'الشيخ عبدالرحمن عبدالخالق', 'الشيخ عبدالرحمن عبدالخالق', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(131, 'الشيخ محمد حمود النجدي', 'http://www.alathry.com', 'الشيخ محمد حمود النجدي', 'الشيخ محمد حمود النجدي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(132, 'عناوين بريد المشائخ والعلماء', 'http://www.raddadi.com/?action=pages.11', 'عناوين بريد المشائخ والعلماء', 'عناوين بريد المشائخ والعلماء', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(133, 'السعادة الأسرية للشيخ مازن الفريح', 'http://www.naseh.net', 'السعادة الأسرية للشيخ مازن الفريح', 'السعادة الأسرية للشيخ مازن الفريح', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(134, 'هواتف العلماء والدعاة', 'http://www.raddadi.com/?action=pages.10', 'هواتف العلماء والدعاة', 'هواتف العلماء والدعاة', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(135, 'يسألونك للشيخ حسام الدين عفانه', 'http://www.yasaloonak.net', 'يسألونك للشيخ حسام الدين عفانه', 'يسألونك للشيخ حسام الدين عفانه', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(136, 'الشيخ خالد بن عبدالله المصلح', 'http://www.almosleh.com', 'الشيخ خالد بن عبدالله المصلح', 'الشيخ خالد بن عبدالله المصلح', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(137, 'الدكتور جعفر شيخ ادريس', 'http://www.jaafaridris.com', 'الدكتور جعفر شيخ ادريس', 'الدكتور جعفر شيخ ادريس', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(138, 'الدرر السنية للشيخ علوي السقاف', 'http://www.dorar.net', 'الدرر السنية للشيخ علوي السقاف', 'الدرر السنية للشيخ علوي السقاف', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(139, 'الشيخ محمد صالح كابوري', 'http://www.gabori.net', 'الشيخ محمد صالح كابوري', 'الشيخ محمد صالح كابوري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(140, 'الداعية عمرو خالد', 'http://www.amrkhaled.net', 'الداعية عمرو خالد', 'الداعية عمرو خالد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(141, 'خطب الحرمين الشريفين', 'http://www.islamway.com/bindex.php?section=scholarlessons&scholar_id=216', 'خطب الحرمين الشريفين', 'خطب الحرمين الشريفين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(142, 'موقع القارئ مشاري العفاسي', 'http://www.alafasy.com', 'موقع القارئ مشاري العفاسي', 'موقع القارئ مشاري العفاسي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(143, 'موقع الشيخ محمد جبريل', 'http://www.jebril.com', 'موقع الشيخ محمد جبريل', 'موقع الشيخ محمد جبريل', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(144, 'الشيخ علي الطنطاوي', 'http://www.alitantawi.com', 'الشيخ علي الطنطاوي', 'الشيخ علي الطنطاوي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(145, 'الداعية محمد زياد الحسني الجزائري', 'http://www.zeadonline.com', 'الداعية محمد زياد الحسني الجزائري', 'الداعية محمد زياد الحسني الجزائري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(146, 'نوافذ الدعوة - الشيخ أحمد الحمدان', 'http://www.dawahwin.com', 'نوافذ الدعوة - الشيخ أحمد الحمدان', 'نوافذ الدعوة - الشيخ أحمد الحمدان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(147, 'الشيخ وجدي غنيم', 'http://www.wagdyghoneim.com', 'الشيخ وجدي غنيم', 'الشيخ وجدي غنيم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(148, 'برنامج أول اثنين - الشيخ سلمان العودة', 'http://www.awalethnain.com', 'برنامج أول اثنين - الشيخ سلمان العودة', 'برنامج أول اثنين - الشيخ سلمان العودة', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(149, 'الشيخ أحمد ياسين', 'http://www.ayaseen.com', 'الشيخ أحمد ياسين', 'الشيخ أحمد ياسين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277322'),
(150, 'قوافل العائدين - الشيخ خالد الراشد', 'http://www.alrashed-km.com', 'قوافل العائدين - الشيخ خالد الراشد', 'قوافل العائدين - الشيخ خالد الراشد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(151, 'القارئ محمد إبراهيم اللحيدان', 'http://www.al7aidan.com', 'القارئ محمد إبراهيم اللحيدان', 'القارئ محمد إبراهيم اللحيدان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(152, 'موقع الشيخ محمد الدويش', 'http://www.dweesh.com', 'موقع الشيخ محمد الدويش', 'موقع الشيخ محمد الدويش', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(153, 'القارئ فهد الكندري', 'http://www.alkanderi.com', 'القارئ فهد الكندري', 'القارئ فهد الكندري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(154, 'الشيخ الشعراوى', 'http://www.khayma.com/alsharawi', 'الشيخ الشعراوى', 'الشيخ الشعراوى', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(155, 'الشيخ فهد العصيمي', 'http://www.22522.com', 'الشيخ فهد العصيمي', 'الشيخ فهد العصيمي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(156, 'شبكة نور الإسلام', 'http://www.islamlight.net', 'شبكة نور الإسلام', 'شبكة نور الإسلام', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(157, 'الدكتور حاكم المطيري', 'http://www.dr-hakem.org', 'الدكتور حاكم المطيري', 'الدكتور حاكم المطيري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(158, 'الشيخ ثامر بن مبارك العامر', 'http://www.bnmobarak.com/', 'الشيخ ثامر بن مبارك العامر', 'الشيخ ثامر بن مبارك العامر', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(159, 'الشيخ عبدالرحمن بن ناصر البراك', 'http://albarrak.islamlight.net', 'الشيخ عبدالرحمن بن ناصر البراك', 'الشيخ عبدالرحمن بن ناصر البراك', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(160, 'الكاشف - الشيخ سليمان الخراشي', 'http://www.alkashf.net', 'الكاشف - الشيخ سليمان الخراشي', 'الكاشف - الشيخ سليمان الخراشي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(161, 'الشيخ الدكتور محمد علي فركوس', 'http://www.ferkous.com', 'الشيخ الدكتور محمد علي فركوس', 'الشيخ الدكتور محمد علي فركوس', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(162, 'شفاء - العلاج بالرقية الشرعية', 'http://www.shefaa.org', 'شفاء - العلاج بالرقية الشرعية', 'شفاء - العلاج بالرقية الشرعية', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(163, 'خواطر الشيخ محمد متولى الشعراوي', 'http://www.elsharawy.com', 'خواطر الشيخ محمد متولى الشعراوي', 'خواطر الشيخ محمد متولى الشعراوي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(164, 'الشيخ أحمد بن علي العجمي', 'http://www.alajmy.com', 'الشيخ أحمد بن علي العجمي', 'الشيخ أحمد بن علي العجمي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(165, 'الشيخ عبدالله بن صالح الفوزان', 'http://www.alfuzan.islamlight.net', 'الشيخ عبدالله بن صالح الفوزان', 'الشيخ عبدالله بن صالح الفوزان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(166, 'الشيخ عبد السلام العييري', 'http://www.abdslam.com', 'الشيخ عبد السلام العييري', 'الشيخ عبد السلام العييري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(167, 'الشيخ محمد ناصر الدين الألباني', 'http://www.alalbany.net', 'الشيخ محمد ناصر الدين الألباني', 'الشيخ محمد ناصر الدين الألباني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(168, 'الشيخ محمد حسان', 'http://www.mohamedhassan.org', 'الشيخ محمد حسان', 'الشيخ محمد حسان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(169, 'الشيخ رياض المسيميري', 'http://islamlight.net/almosimiry', 'الشيخ رياض المسيميري', 'الشيخ رياض المسيميري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211277660'),
(170, 'الشيخ الدكتور يوسف الشبيلي', 'http://www.shubily.com', 'الشيخ الدكتور يوسف الشبيلي', 'الشيخ الدكتور يوسف الشبيلي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(171, 'الصارم المسلول', 'http://www.alsarm.com', 'الصارم المسلول', 'الصارم المسلول', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(172, 'الشيخ سعود الشريم', 'http://www.shuraim.net', 'الشيخ سعود الشريم', 'الشيخ سعود الشريم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(173, 'الشيخ سعد بن عبد الرحمن الحصين', 'http://www.saad-alhusayen.com', 'الشيخ سعد بن عبد الرحمن الحصين', 'الشيخ سعد بن عبد الرحمن الحصين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(174, 'الشيخ عبد الله ناصح علوان', 'http://www.abdullahelwan.net', 'الشيخ عبد الله ناصح علوان', 'الشيخ عبد الله ناصح علوان', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(175, 'الشيخ عبدالمحسن القاسم', 'http://www.alqasim.org', 'الشيخ عبدالمحسن القاسم', 'الشيخ عبدالمحسن القاسم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(176, 'الشيخ سالم العجمي', 'http://www.salemalajmi.com', 'الشيخ سالم العجمي', 'الشيخ سالم العجمي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(177, 'المنادي - الشيخ عبد الملك القاسم', 'http://www.almunadi.com', 'المنادي - الشيخ عبد الملك القاسم', 'المنادي - الشيخ عبد الملك القاسم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(178, 'الشيخ الدكتور علي بن حمزة العمري', 'http://www.alomarey.net', 'الشيخ الدكتور علي بن حمزة العمري', 'الشيخ الدكتور علي بن حمزة العمري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(179, 'منارة الشريعة - الشيخ صالح الأسمري', 'http://www.manarahnet.net', 'منارة الشريعة - الشيخ صالح الأسمري', 'منارة الشريعة - الشيخ صالح الأسمري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(180, 'القارئ الشيخ جمال شاكر', 'http://www.jamalshaker.com', 'القارئ الشيخ جمال شاكر', 'القارئ الشيخ جمال شاكر', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(181, 'منار الإسلام - الشيخ عبدالله الطيار', 'http://www.m-islam.net', 'منار الإسلام - الشيخ عبدالله الطيار', 'منار الإسلام - الشيخ عبدالله الطيار', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(182, 'الشيخ سعد البريك', 'http://www.saadalbreik.com', 'الشيخ سعد البريك', 'الشيخ سعد البريك', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(183, 'احياء السنة - الشيخ احمد العمودي', 'http://www.alsonnah.net', 'احياء السنة - الشيخ احمد العمودي', 'احياء السنة - الشيخ احمد العمودي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(184, 'الشيخ الدكتور على محمد الصلابي', 'http://www.alsallaby.com', 'الشيخ الدكتور على محمد الصلابي', 'الشيخ الدكتور على محمد الصلابي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(185, 'جوال الخير للشيخ عائض القرني', 'http://www.alkhairsms.com', 'جوال الخير للشيخ عائض القرني', 'جوال الخير للشيخ عائض القرني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(186, 'خطب القنام لوعظ الأنام', 'http://www.algannam.com', 'خطب القنام لوعظ الأنام', 'خطب القنام لوعظ الأنام', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(187, 'العقيدة والحياة . الشيخ أحمد القاضي', 'http://www.al-aqidah.com', 'العقيدة والحياة . الشيخ أحمد القاضي', 'العقيدة والحياة . الشيخ أحمد القاضي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(188, 'الشيخ ابراهيم شاهين', 'http://www.ibraheemshaheen.com', 'الشيخ ابراهيم شاهين', 'الشيخ ابراهيم شاهين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(189, 'الشيخ الدكتور عمر عبد الكافي', 'http://www.abdelkafy.com', 'الشيخ الدكتور عمر عبد الكافي', 'الشيخ الدكتور عمر عبد الكافي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(190, 'الدكتور زغلول النجار', 'http://www.elnaggarzr.com', 'الدكتور زغلول النجار', 'الدكتور زغلول النجار', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(191, 'الشيخ جماز بن عبدالرحمن الجماز', 'http://www.aljmaz.net', 'الشيخ جماز بن عبدالرحمن الجماز', 'الشيخ جماز بن عبدالرحمن الجماز', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(192, 'القارئ هاني الرفاعي', 'http://www.alrfaey.org', 'القارئ هاني الرفاعي', 'القارئ هاني الرفاعي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(193, 'الشيخ عبد الحميد كشك', 'http://www.keshk.meshmesh.net', 'الشيخ عبد الحميد كشك', 'الشيخ عبد الحميد كشك', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(194, 'الشيخ سعود بن ابراهيم الشريم', 'http://www.shuraym.com', 'الشيخ سعود بن ابراهيم الشريم', 'الشيخ سعود بن ابراهيم الشريم', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(195, 'منبر علماء اليمن', 'http://olamaa-yemen.net', 'منبر علماء اليمن', 'منبر علماء اليمن', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(196, 'الشيخ ابو اسحاق الحويني', 'http://www.al-heweny.com', 'الشيخ ابو اسحاق الحويني', 'الشيخ ابو اسحاق الحويني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(197, 'شيخ الاسلام ابن تيمية', 'http://www.ibntaimiah.com', 'شيخ الاسلام ابن تيمية', 'شيخ الاسلام ابن تيمية', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(198, 'القارئ الشيخ عبدالولي الأركاني', 'http://www.alarkani.com', 'القارئ الشيخ عبدالولي الأركاني', 'القارئ الشيخ عبدالولي الأركاني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(199, 'الشيخ محمد المحيسني', 'http://www.almohisni.com', 'الشيخ محمد المحيسني', 'الشيخ محمد المحيسني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(200, 'الشيخ زيد بن مسفر البحري', 'http://www.albahre.com', 'الشيخ زيد بن مسفر البحري', 'الشيخ زيد بن مسفر البحري', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(201, 'الشيخ عبدالله بن عبدالرحمن السعد', 'http://www.alssad.com', 'الشيخ عبدالله بن عبدالرحمن السعد', 'الشيخ عبدالله بن عبدالرحمن السعد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(202, 'الشيخ أحمد ديدات', 'http://www.ahmed-deedat.net', 'الشيخ أحمد ديدات', 'الشيخ أحمد ديدات', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(203, 'الشيخ سعد بن جبرين', 'http://www.alhemam.com', 'الشيخ سعد بن جبرين', 'الشيخ سعد بن جبرين', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(204, 'لقاء المؤمنين وبناء الجيل المؤمن', 'http://www.alnahwi.com', 'لقاء المؤمنين وبناء الجيل المؤمن', 'لقاء المؤمنين وبناء الجيل المؤمن', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(205, 'الشيخ عيسى بن إبراهيم الدريويش', 'http://essanet.org', 'الشيخ عيسى بن إبراهيم الدريويش', 'الشيخ عيسى بن إبراهيم الدريويش', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(206, 'صفحة نايف الإسلامية', 'http://www.nayefbinmamdooh.com', 'صفحة نايف الإسلامية', 'صفحة نايف الإسلامية', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(207, 'الشيخ المحدث عبدالله السعد', 'http://www.alssad.com', 'الشيخ المحدث عبدالله السعد', 'الشيخ المحدث عبدالله السعد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(208, 'الشيخ محمد علي الشنقيطي', 'http://www.alshngiti.com', 'الشيخ محمد علي الشنقيطي', 'الشيخ محمد علي الشنقيطي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(209, 'الشيخ صلاح الدين علي عبد الموجود', 'http://www.salahmera.com', 'الشيخ صلاح الدين علي عبد الموجود', 'الشيخ صلاح الدين علي عبد الموجود', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(210, 'الدكتور أحمد الزهراني', 'http://alkinani.net', 'الدكتور أحمد الزهراني', 'الدكتور أحمد الزهراني', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(211, 'الشيخ عبدالله بن إبراهيم القرعاوي', 'http://www.qaraye.com', 'الشيخ عبدالله بن إبراهيم القرعاوي', 'الشيخ عبدالله بن إبراهيم القرعاوي', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(212, 'الشيخ سليمان الماجد', 'http://www.salmajed.com', 'الشيخ سليمان الماجد', 'الشيخ سليمان الماجد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(213, 'الشبخ حمد بن عبدالله الحمد', 'http://www.al-zad.net', 'الشبخ حمد بن عبدالله الحمد', 'الشبخ حمد بن عبدالله الحمد', '- - -', NULL, NULL, 1, 4, 0, 0, 0, 1, '1211348368'),
(214, 'شبكة السرداب الإسلامية', 'http://www.alserdaab.org', 'شبكة السرداب الإسلامية', 'شبكة السرداب الإسلامية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(215, 'دليل حقائق الرافضه', 'http://www.dhr12.com', 'دليل حقائق الرافضه', 'دليل حقائق الرافضه', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(216, 'موقع البينة', 'http://www.albainah.net', 'موقع البينة', 'موقع البينة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(217, 'موقع البرهان', 'http://www.albrhan.com', 'موقع البرهان', 'موقع البرهان', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(218, 'شبكة الرد', 'http://www.alradnet.com', 'شبكة الرد', 'شبكة الرد', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(219, 'إسلامية لا وهابية', 'http://www.wahabih.com', 'إسلامية لا وهابية', 'إسلامية لا وهابية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(220, 'فيصل نور - الحقائق الغائبة', 'http://www.fnoor.com', 'فيصل نور - الحقائق الغائبة', 'فيصل نور - الحقائق الغائبة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(221, 'أنصار أهل البيت', 'http://www.ansaaar.com', 'أنصار أهل البيت', 'أنصار أهل البيت', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(222, 'شبكة أنصار', 'http://www.ansar.org', 'شبكة أنصار', 'شبكة أنصار', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(223, 'رابطة أهل السنة في إيران', 'http://www.isl.org.uk', 'رابطة أهل السنة في إيران', 'رابطة أهل السنة في إيران', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(224, 'اللجنة العالمية لنصرة خاتم الأنبياء', 'http://www.icsfp.com', 'اللجنة العالمية لنصرة خاتم الأنبياء', 'اللجنة العالمية لنصرة خاتم الأنبياء', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(225, 'اللجنة الأوروبية لنصرة خير البرية', 'http://www.islamudeni.net', 'اللجنة الأوروبية لنصرة خير البرية', 'اللجنة الأوروبية لنصرة خير البرية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(226, 'رسول الله صلى الله عليه وسلم', 'http://nosra.islammemo.cc', 'رسول الله صلى الله عليه وسلم', 'رسول الله صلى الله عليه وسلم', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(227, 'الانتصار للنبي المختار', 'http://www.islameiat.com/entsar', 'الانتصار للنبي المختار', 'الانتصار للنبي المختار', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(228, 'كشف حقيقة فرقة الأحباش', 'http://www.antihabashis.com', 'كشف حقيقة فرقة الأحباش', 'كشف حقيقة فرقة الأحباش', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(229, 'المسيحية بمنظور اسلامي', 'http://arabic.islamicweb.com/christianity', 'المسيحية بمنظور اسلامي', 'المسيحية بمنظور اسلامي', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(230, 'حوار هادئ مع الشيعة', 'http://islamicweb.com/arabic/shia', 'حوار هادئ مع الشيعة', 'حوار هادئ مع الشيعة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(231, 'حركات التنصير في العالم الإسلامي', 'http://tanseer.jeeran.com', 'حركات التنصير في العالم الإسلامي', 'حركات التنصير في العالم الإسلامي', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(232, 'الصوفية1', 'http://www.alsoufia.com', 'الصوفية1', 'الصوفية1', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(233, 'الصوفية2', 'http://www.heartsactions.com/su.htm', 'الصوفية2', 'الصوفية2', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(234, 'شبكة صوت بلدي', 'http://www.baladynet.net', 'شبكة صوت بلدي', 'شبكة صوت بلدي', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(235, 'شبكة المجهر', 'http://www.almijhar.net', 'شبكة المجهر', 'شبكة المجهر', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(236, 'المسيحية في الميزان', 'http://www.alhakekah.com', 'المسيحية في الميزان', 'المسيحية في الميزان', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(237, 'شبكة الحقيقة الاسلامية', 'http://www.trutheye.com', 'شبكة الحقيقة الاسلامية', 'شبكة الحقيقة الاسلامية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(238, 'موقع ابن مريم عن المسيح الحق', 'http://www.ebnmaryam.com', 'موقع ابن مريم عن المسيح الحق', 'موقع ابن مريم عن المسيح الحق', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(239, 'الحقيقة العظمى', 'http://www.truth.org.ye', 'الحقيقة العظمى', 'الحقيقة العظمى', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(240, 'شبكة الراصد الإسلامية', 'http://www.alrased.net', 'شبكة الراصد الإسلامية', 'شبكة الراصد الإسلامية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(241, 'الرافضة في سطور', 'http://awfi.4t.com', 'الرافضة في سطور', 'الرافضة في سطور', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(242, 'المهتدون الشيعة', 'http://www.wylsh.com', 'المهتدون الشيعة', 'المهتدون الشيعة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(243, 'تلفزيون طريق الحقيقة', 'http://www.truthway.tv', 'تلفزيون طريق الحقيقة', 'تلفزيون طريق الحقيقة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(244, 'الحدقة', 'http://www.islammemo.cc/cat1.aspx?id=633', 'الحدقة', 'الحدقة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(245, 'شبكة القلم الفكرية', 'http://www.alqlm.com', 'شبكة القلم الفكرية', 'شبكة القلم الفكرية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(246, 'كسر الصنم', 'http://www.kasralsanam.com', 'كسر الصنم', 'كسر الصنم', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(247, 'موقع الخرافة', 'http://www.khorafa.org', 'موقع الخرافة', 'موقع الخرافة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(248, 'الإسلام أم المسيحية', 'http://www.islamorchristianity.org', 'الإسلام أم المسيحية', 'الإسلام أم المسيحية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(249, 'صحوة الشيعة', 'http://www.newshia.com', 'صحوة الشيعة', 'صحوة الشيعة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(250, 'مقاطعة الدنمارك', 'http://www.no4denmark.com', 'مقاطعة الدنمارك', 'مقاطعة الدنمارك', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(251, 'موقع النور', 'http://www.noor4.com', 'موقع النور', 'موقع النور', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(252, 'الحقائق الخفية في مذهب الرافضة', 'http://64.187.100.19/sheah/index.htm', 'الحقائق الخفية في مذهب الرافضة', 'الحقائق الخفية في مذهب الرافضة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(253, 'الطريق إلى الله', 'http://www.allahway.com', 'الطريق إلى الله', 'الطريق إلى الله', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(254, 'سفهاء بلا حدود', 'http://www.sofaha.com', 'سفهاء بلا حدود', 'سفهاء بلا حدود', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(255, 'المنتدى الإسلامي الأروبي', 'http://www.almuntede.net', 'المنتدى الإسلامي الأروبي', 'المنتدى الإسلامي الأروبي', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(256, 'فخور كونى مسلم', 'http://www.proud2bemuslim.com', 'فخور كونى مسلم', 'فخور كونى مسلم', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(257, 'حزب الله والوعد الكاذب', 'http://moqawama.ws', 'حزب الله والوعد الكاذب', 'حزب الله والوعد الكاذب', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(258, 'إظهار الحق', 'http://www.edharalhaq.com', 'إظهار الحق', 'إظهار الحق', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(259, 'الموسوعة الميسرة فى الاديان والمذاهب', 'http://www.almwsoaa.com', 'الموسوعة الميسرة فى الاديان والمذاهب', 'الموسوعة الميسرة فى الاديان والمذاهب', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(260, 'الشبكة الاسلامية', 'http://arabic.islamicweb.com', 'الشبكة الاسلامية', 'الشبكة الاسلامية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(261, 'التحذير من خطر التنصير', 'http://www.tanseer.com', 'التحذير من خطر التنصير', 'التحذير من خطر التنصير', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(262, 'منظمة النصرة العالمية', 'http://www.nusrah.org', 'منظمة النصرة العالمية', 'منظمة النصرة العالمية', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(263, 'الجمعية السعودية لعلوم العقيدة', 'http://www.aqeeda.org.sa', 'الجمعية السعودية لعلوم العقيدة', 'الجمعية السعودية لعلوم العقيدة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(264, 'ماذا تعرف عن حزب الله', 'http://www.d-sunnah.net/hizballah', 'ماذا تعرف عن حزب الله', 'ماذا تعرف عن حزب الله', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(265, 'شبكة الدفاع عن السنة', 'http://www.d-sunnah.net', 'شبكة الدفاع عن السنة', 'شبكة الدفاع عن السنة', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(266, 'الإسلام و العالم', 'http://www.islamegy.com', 'الإسلام و العالم', 'الإسلام و العالم', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(267, 'نحن نحبك يا مسيح', 'http://www.loveujesus.com', 'نحن نحبك يا مسيح', 'نحن نحبك يا مسيح', '- - -', NULL, NULL, 1, 5, 0, 0, 0, 1, '1211349338'),
(268, 'مجلة البيان', 'http://www.albayan-magazine.com', 'مجلة البيان', 'مجلة البيان', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(269, 'مجلة الوعي الاسلامي', 'http://www.alwaei.com', 'مجلة الوعي الاسلامي', 'مجلة الوعي الاسلامي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(270, 'مجلة فلسطين المسلمة', 'http://www.fm-m.com', 'مجلة فلسطين المسلمة', 'مجلة فلسطين المسلمة', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(271, 'مجلة العصر', 'http://www.alasr.ws', 'مجلة العصر', 'مجلة العصر', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(272, 'مجلة الدعوة', 'http://www.aldaawah.com', 'مجلة الدعوة', 'مجلة الدعوة', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(273, 'مجلة الدرر الإسلامية', 'http://www.uae4ever.com/dorar/index.php', 'مجلة الدرر الإسلامية', 'مجلة الدرر الإسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(274, 'مجلة التوحيد', 'http://www.altawhed.com', 'مجلة التوحيد', 'مجلة التوحيد', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(275, 'مجلة التقوى', 'http://www.attakwa.net', 'مجلة التقوى', 'مجلة التقوى', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(276, 'مجلة رياض المتقين', 'http://www.almotaqeen.net', 'مجلة رياض المتقين', 'مجلة رياض المتقين', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(277, 'مجلة المجتمع', 'http://www.almujtamaa-mag.com', 'مجلة المجتمع', 'مجلة المجتمع', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(278, 'مجلة الفرقان', 'http://www.al-forqan.net', 'مجلة الفرقان', 'مجلة الفرقان', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(279, 'المجلة الإسلامية', 'http://www.ali4.com', 'المجلة الإسلامية', 'المجلة الإسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(280, 'شبكة قسايمة الإلكترونية', 'http://www.tech4islam.info', 'شبكة قسايمة الإلكترونية', 'شبكة قسايمة الإلكترونية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(281, 'مجلة المسلم المعاصر', 'http://www.biblioislam.net', 'مجلة المسلم المعاصر', 'مجلة المسلم المعاصر', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(282, 'مجلة الفسطاط', 'http://www.fustat.com', 'مجلة الفسطاط', 'مجلة الفسطاط', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(283, 'مجلة الراية', 'http://www.rayah.info', 'مجلة الراية', 'مجلة الراية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(284, 'مجلة همسات', 'http://www.khayma.com/hamasat', 'مجلة همسات', 'مجلة همسات', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(285, 'تسجيلات التقوى الاسلامية', 'http://www.altaqwa.com', 'تسجيلات التقوى الاسلامية', 'تسجيلات التقوى الاسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(286, 'دار القاسم للنشر والتوزيع', 'http://www.dar-alqassem.com', 'دار القاسم للنشر والتوزيع', 'دار القاسم للنشر والتوزيع', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(287, 'متجر دار البلاغ', 'http://www.daralbalagh.com', 'متجر دار البلاغ', 'متجر دار البلاغ', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(288, 'مدار الوطن للنشر والتوزيع', 'http://www.madar-alwatan.com', 'مدار الوطن للنشر والتوزيع', 'مدار الوطن للنشر والتوزيع', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(289, 'دار أطلس الخضراء للنشر والتوزيع', 'http://www.dar-atlas.com', 'دار أطلس الخضراء للنشر والتوزيع', 'دار أطلس الخضراء للنشر والتوزيع', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(290, 'دار الآثار للنشر والتوزيع', 'http://www.dar-alathar.com', 'دار الآثار للنشر والتوزيع', 'دار الآثار للنشر والتوزيع', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(291, 'مؤسسة الآفاق للإنتاج الإعلامي', 'http://www.afaaaq.com', 'مؤسسة الآفاق للإنتاج الإعلامي', 'مؤسسة الآفاق للإنتاج الإعلامي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(292, 'الصوت الإسلامي', 'http://www.islamcvoice.com/mas/index.php', 'الصوت الإسلامي', 'الصوت الإسلامي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(293, 'الآفاق للإنتاج الإعلامي', 'http://www.afaaaq.com', 'الآفاق للإنتاج الإعلامي', 'الآفاق للإنتاج الإعلامي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(294, 'مؤسسة اليقين الإسلامية', 'http://www.alyaqin.com', 'مؤسسة اليقين الإسلامية', 'مؤسسة اليقين الإسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(295, 'بيت الرسالة', 'http://www.alrisalh.com', 'بيت الرسالة', 'بيت الرسالة', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(296, 'تسجيلات القادسية الإسلامية', 'http://www.qimam.com', 'تسجيلات القادسية الإسلامية', 'تسجيلات القادسية الإسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(297, 'مركز اللواء للإنتاج الإعلامي', 'http://www.allewaa.org', 'مركز اللواء للإنتاج الإعلامي', 'مركز اللواء للإنتاج الإعلامي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(298, 'سوق النور', 'http://market.elnoor.com', 'سوق النور', 'سوق النور', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(299, 'الصوت الذهبي', 'http://www.alzahabi-sy.com', 'الصوت الذهبي', 'الصوت الذهبي', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(300, 'مجمع التسجيلات الإسلامية', 'http://www.mojama.net', 'مجمع التسجيلات الإسلامية', 'مجمع التسجيلات الإسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(301, 'تسجيلات ابن الخطاب الاسلامية', 'http://www.khattab.cc', 'تسجيلات ابن الخطاب الاسلامية', 'تسجيلات ابن الخطاب الاسلامية', '- - -', NULL, NULL, 1, 6, 0, 0, 0, 1, '1211351211'),
(302, 'الموسوعة الشاملة', 'http://islamport.com', 'الموسوعة الشاملة', 'الموسوعة الشاملة', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(303, 'مؤلفات الشيخ ابن باز', 'http://www.binbaz.org.sa/index.php?pg=more&type=book&no=1', 'مؤلفات الشيخ ابن باز', 'مؤلفات الشيخ ابن باز', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(304, 'مؤلفات الشيخ ابن عثيمين', 'http://www.ibnothaimeen.com/all/index/article_17097.shtml', 'مؤلفات الشيخ ابن عثيمين', 'مؤلفات الشيخ ابن عثيمين', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(305, 'كتب الشيخ محمد الدويش', 'http://www.almurabbi.com/book1.asp', 'كتب الشيخ محمد الدويش', 'كتب الشيخ محمد الدويش', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(306, 'دليل الكتب المجانية باللغات المختلفة', 'http://www.sultan.org/books', 'دليل الكتب المجانية باللغات المختلفة', 'دليل الكتب المجانية باللغات المختلفة', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(307, 'كتب من موقع شبكة الدعوة الاسلامية', 'http://www.aldawah.net/maktabah.htm', 'كتب من موقع شبكة الدعوة الاسلامية', 'كتب من موقع شبكة الدعوة الاسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(308, 'كتب الشيخ عبدالرحمن عبدالخالق', 'http://www.salafi.net/list.html', 'كتب الشيخ عبدالرحمن عبدالخالق', 'كتب الشيخ عبدالرحمن عبدالخالق', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(309, 'مشروع المكتبة الإسلامية الإلكترونية', 'http://arabic.islamicweb.com/Encyclopedia', 'مشروع المكتبة الإسلامية الإلكترونية', 'مشروع المكتبة الإسلامية الإلكترونية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(310, 'مقالات من موقع هداية الحيارى', 'http://www.khayma.com/hedaya/mk/index.html', 'مقالات من موقع هداية الحيارى', 'مقالات من موقع هداية الحيارى', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(311, 'كتب وأبحاث من موقع هداية الحيارى', 'http://www.khayma.com/hedaya/books/index.html', 'كتب وأبحاث من موقع هداية الحيارى', 'كتب وأبحاث من موقع هداية الحيارى', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(312, 'مؤلفات الشيخ محمد صالح المنجد', 'http://www.islam-qa.com/index.php?pg=articles&type=1&ln=ara', 'مؤلفات الشيخ محمد صالح المنجد', 'مؤلفات الشيخ محمد صالح المنجد', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(313, 'مكتبة السراج المنير الإسلامية', 'http://www.assiraj.bizland.com/library.htm', 'مكتبة السراج المنير الإسلامية', 'مكتبة السراج المنير الإسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(314, 'مقالات من موقع الشبكة السلفية', 'http://www.salafi.net/articles.html', 'مقالات من موقع الشبكة السلفية', 'مقالات من موقع الشبكة السلفية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(315, 'كتب من موقع الوراق', 'http://www.alwaraq.com', 'كتب من موقع الوراق', 'كتب من موقع الوراق', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(316, 'كتب من موقع شبكة سلسبيل', 'http://www.khayma.com/salsabeel/SAL/book.htm', 'كتب من موقع شبكة سلسبيل', 'كتب من موقع شبكة سلسبيل', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(317, 'كتب الشيخ حمود بن عقلاء الشعيبي', 'http://www.saaid.net/Warathah/hmood/index.htm', 'كتب الشيخ حمود بن عقلاء الشعيبي', 'كتب الشيخ حمود بن عقلاء الشعيبي', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(318, 'كتب من موقع الدرر السنية', 'http://www.dorar.net/book_list.php?book_type=2', 'كتب من موقع الدرر السنية', 'كتب من موقع الدرر السنية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(319, 'الموسوعة الفقهية', 'http://www.awkaf.net/mousoaa/index.html', 'الموسوعة الفقهية', 'الموسوعة الفقهية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(320, 'كتب من موقع جمعية البر بالرياض', 'http://www.albr.org/books', 'كتب من موقع جمعية البر بالرياض', 'كتب من موقع جمعية البر بالرياض', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(321, 'مكتبة صيد الفوائد الإسلامية', 'http://www.saaid.net/book/index.php', 'مكتبة صيد الفوائد الإسلامية', 'مكتبة صيد الفوائد الإسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(322, 'المكتبة الإلكترونية من اسلام اون لاين', 'http://www.biblioislam.net/Elibrary/Arabic/library/index.asp', 'المكتبة الإلكترونية من اسلام اون لاين', 'المكتبة الإلكترونية من اسلام اون لاين', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(323, 'كتب ومؤلفات الشيخ سلمان العودة', 'http://www.islamtoday.net/pen/books_content.cfm', 'كتب ومؤلفات الشيخ سلمان العودة', 'كتب ومؤلفات الشيخ سلمان العودة', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(324, 'خزانة الكتب والأبحاث', 'http://www.ahlalhdeeth.com/vb/forumdisplay.php?&forumid=16', 'خزانة الكتب والأبحاث', 'خزانة الكتب والأبحاث', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(325, 'مكتبة المدينة الرقمية', 'http://www.raqamiya.org', 'مكتبة المدينة الرقمية', 'مكتبة المدينة الرقمية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(326, 'أم الكتاب', 'http://www.omelketab.net', 'أم الكتاب', 'أم الكتاب', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(327, 'موقع كلمات للمطويات الإسلامية', 'http://www.kalemat.org', 'موقع كلمات للمطويات الإسلامية', 'موقع كلمات للمطويات الإسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(328, 'مشروع العشر الأخير', 'http://www.tafseer.info', 'مشروع العشر الأخير', 'مشروع العشر الأخير', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(329, 'منابع اسلامية', 'http://www.mislamih.com', 'منابع اسلامية', 'منابع اسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(330, 'المكتبة الإسلامية - إسلام سايتز', 'http://www.islamsites.net/books', 'المكتبة الإسلامية - إسلام سايتز', 'المكتبة الإسلامية - إسلام سايتز', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(331, 'الكتبة الوقفية للكتب الإسلامية', 'http://www.waqfeya.com', 'الكتبة الوقفية للكتب الإسلامية', 'الكتبة الوقفية للكتب الإسلامية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(332, 'المكتبة الوقفية', 'http://www.waqfeya.com', 'المكتبة الوقفية', 'المكتبة الوقفية', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(333, 'دار النوادر', 'http://www.daralnawader.com', 'دار النوادر', 'دار النوادر', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(334, 'مؤسسة صوت القلم العربي', 'http://www.3lsooot.com', 'مؤسسة صوت القلم العربي', 'مؤسسة صوت القلم العربي', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(335, 'المكتبة الشاملة', 'http://www.shamela.ws', 'المكتبة الشاملة', 'المكتبة الشاملة', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(336, 'مركز ودود للمخطوطات', 'http://www.wadod.com', 'مركز ودود للمخطوطات', 'مركز ودود للمخطوطات', '- - -', NULL, NULL, 1, 7, 0, 0, 0, 1, '1211354777'),
(337, 'فتاوى الشيخ ابن باز', 'http://www.binbaz.org.sa/index.php?pg=fatawa', 'فتاوى الشيخ ابن باز', 'فتاوى الشيخ ابن باز', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(338, 'الفتاوى - الشبكة السلفية', 'http://www.salafi.net/fatawa.htm', 'الفتاوى - الشبكة السلفية', 'الفتاوى - الشبكة السلفية', '- - -', NULL, NULL, 1, 8, 1, 0, 0, 1, '1211355874'),
(339, 'الفتاوى - موقع الإسلام', 'http://fatawa.al-islam.com/fatawa/default.asp', 'الفتاوى - موقع الإسلام', 'الفتاوى - موقع الإسلام', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(340, 'باحث الفتاوى', 'http://www.sultan.org/f', 'باحث الفتاوى', 'باحث الفتاوى', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(341, 'اسألوا أهل الذكر - إسلام أون لاين', 'http://www.islamonline.net/servlet/Satellite?cid=1121779389729&pagename=IslamOnline-Arabic-Ask_Scholar/Page/FatwaCounselA', 'اسألوا أهل الذكر - إسلام أون لاين', 'اسألوا أهل الذكر - إسلام أون لاين', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(342, 'فتاوى العلماء - موقع الرقية الشرعية', 'http://www.alroqia.com/fatawi_n/index.html', 'فتاوى العلماء - موقع الرقية الشرعية', 'فتاوى العلماء - موقع الرقية الشرعية', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(343, 'فتاوى من موقع الجبيل نت', 'http://fatawaweb.com', 'فتاوى من موقع الجبيل نت', 'فتاوى من موقع الجبيل نت', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(344, 'فتاوى من موقع الأوقاف الكويتيه', 'http://www.awkaf.net/haje-ftw/index.html', 'فتاوى من موقع الأوقاف الكويتيه', 'فتاوى من موقع الأوقاف الكويتيه', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(345, 'الفتوى بين يديك', 'http://www.al-eman.com/Ask', 'الفتوى بين يديك', 'الفتوى بين يديك', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(346, 'الفتاوى و الداراسات - الاسلام اليوم', 'http://www.islamtoday.net/questions/fatawa.cfm', 'الفتاوى و الداراسات - الاسلام اليوم', 'الفتاوى و الداراسات - الاسلام اليوم', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(347, 'ركن الأسد للفتاوى الشرعية', 'http://www.alasad.net/fatwa/index.php', 'ركن الأسد للفتاوى الشرعية', 'ركن الأسد للفتاوى الشرعية', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(348, 'دار الإفتاء المصرية', 'http://www.dar-alifta.org', 'دار الإفتاء المصرية', 'دار الإفتاء المصرية', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(349, 'فتاوى نور على الدرب', 'http://www.alandals.net', 'فتاوى نور على الدرب', 'فتاوى نور على الدرب', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(350, 'فتاوى الشيخ العثيمين', 'http://www.ibnothaimeen.com/all/Noor.shtml', 'فتاوى الشيخ العثيمين', 'فتاوى الشيخ العثيمين', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(351, 'مركز الفتوى - الشبكة الإسلامية', 'http://www.islamweb.net/ver2/Fatwa/index.php?', 'مركز الفتوى - الشبكة الإسلامية', 'مركز الفتوى - الشبكة الإسلامية', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(352, 'الاسلام سؤال وجواب للشيخ المنجد', 'http://www.islam-qa.com/index.php?ln=ara', 'الاسلام سؤال وجواب للشيخ المنجد', 'الاسلام سؤال وجواب للشيخ المنجد', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(353, 'موسوعة الفتاوى - طريق الإسلام', 'http://www.islamway.com/?iw_s=Fatawa', 'موسوعة الفتاوى - طريق الإسلام', 'موسوعة الفتاوى - طريق الإسلام', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(354, 'الفتاوى الكبرى لابن تيمية - موقع الإسلام', 'http://feqh.al-islam.com/bookhier.asp?DocID=27&Mode=0', 'الفتاوى الكبرى لابن تيمية - موقع الإسلام', 'الفتاوى الكبرى لابن تيمية - موقع الإسلام', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(355, 'فتاوى اون لاين', 'http://www.fatwa-online.com', 'فتاوى اون لاين', 'فتاوى اون لاين', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(356, 'الفتاوى الشرعية', 'http://www.islamic-fatwa.com', 'الفتاوى الشرعية', 'الفتاوى الشرعية', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(357, 'فتاوى القرآن الكريم', 'http://www.qurancomplex.org/qfatwa/tree.asp', 'فتاوى القرآن الكريم', 'فتاوى القرآن الكريم', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(358, 'فتاوى الطبيب المسلم', 'http://www.muslimdoctor.net/pages/arabic/Ar_fatawa.htm', 'فتاوى الطبيب المسلم', 'فتاوى الطبيب المسلم', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(359, 'الفتوى من موقع الشيخ حامد العلي', 'http://www.h-alali.net/f_index.php', 'الفتوى من موقع الشيخ حامد العلي', 'الفتوى من موقع الشيخ حامد العلي', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(360, 'الفتاوى الجامعة للمرأة المسلمة', 'http://alftawa.com', 'الفتاوى الجامعة للمرأة المسلمة', 'الفتاوى الجامعة للمرأة المسلمة', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(361, 'الرئاسة العامة للبحوث والافتاء', 'http://www.alifta.com', 'الرئاسة العامة للبحوث والافتاء', 'الرئاسة العامة للبحوث والافتاء', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(362, 'السكينة', 'http://www.asskeenh.com', 'السكينة', 'السكينة', '- - -', NULL, NULL, 1, 8, 0, 0, 0, 1, '1211355874'),
(363, 'دروس ومحاضرات الشيخ ابن باز', 'http://www.binbaz.org.sa/index.php?pg=audio', 'دروس ومحاضرات الشيخ ابن باز', 'دروس ومحاضرات الشيخ ابن باز', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(364, 'دوس ومحاضرات الشيخ ابن عثيمين', 'http://www.ibnothaimeen.com/all/eSound.shtml', 'دوس ومحاضرات الشيخ ابن عثيمين', 'دوس ومحاضرات الشيخ ابن عثيمين', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(365, 'موقع البث الإسلامي', 'http://www.liveislam.com', 'موقع البث الإسلامي', 'موقع البث الإسلامي', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(366, 'تسجيلات الشبكة الإسلامية', 'http://audio.islamweb.net/audio/index.php', 'تسجيلات الشبكة الإسلامية', 'تسجيلات الشبكة الإسلامية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(367, 'دروس وخطب - طريق الاسلام', 'http://www.islamway.com/?iw_s=Lesson', 'دروس وخطب - طريق الاسلام', 'دروس وخطب - طريق الاسلام', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(368, 'مكتبة إيماننا الصوتية', 'http://www.emanona.com/cat.php?catsmktba=50', 'مكتبة إيماننا الصوتية', 'مكتبة إيماننا الصوتية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(369, 'صوتيات من موقع الشيخ محمد الدويش', 'http://www.almurabbi.com/mainpage.asp?main_id=5', 'صوتيات من موقع الشيخ محمد الدويش', 'صوتيات من موقع الشيخ محمد الدويش', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(370, 'دروس من موقع الشبكة السلفية', 'http://www.salafi.net/audiotapes.html', 'دروس من موقع الشبكة السلفية', 'دروس من موقع الشبكة السلفية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(371, 'المكتبة الصوتية من نداء الإيمان', 'http://www.al-eman.com/Voice', 'المكتبة الصوتية من نداء الإيمان', 'المكتبة الصوتية من نداء الإيمان', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(372, 'مكتبة الشريط الإسلامي', 'http://www.uae4ever.com/audio', 'مكتبة الشريط الإسلامي', 'مكتبة الشريط الإسلامي', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(373, 'تسجيلات المشكاة الإسلامية', 'http://www.almeshkat.net/index.php?pg=audio_cat', 'تسجيلات المشكاة الإسلامية', 'تسجيلات المشكاة الإسلامية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(374, 'صوتيات نحن الإسلام', 'http://www.weislam.com/iv/cat.php?catsmktba=3', 'صوتيات نحن الإسلام', 'صوتيات نحن الإسلام', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(375, 'حلقات برنامج الفاروق - قناة المستقلة', 'http://www.al-sahabah.com/?album=1', 'حلقات برنامج الفاروق - قناة المستقلة', 'حلقات برنامج الفاروق - قناة المستقلة', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(376, 'صوتيات واحة المسك الإسلامية', 'http://www.soutiat.com', 'صوتيات واحة المسك الإسلامية', 'صوتيات واحة المسك الإسلامية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(377, 'صوتيات الإسلام للجميع', 'http://www.islam2all.com/sounds/sounds.php', 'صوتيات الإسلام للجميع', 'صوتيات الإسلام للجميع', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(378, 'شبكة عطر الإمارات الإسلامية', 'http://www.uae36r.com', 'شبكة عطر الإمارات الإسلامية', 'شبكة عطر الإمارات الإسلامية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(379, 'مملكة فتيات الإسلام الصوتية', 'http://www.ftiatislam.com', 'مملكة فتيات الإسلام الصوتية', 'مملكة فتيات الإسلام الصوتية', '- - -', NULL, NULL, 1, 9, 0, 0, 0, 1, '1211357782'),
(380, 'صوتيات الصافنات الإسلامية', 'http://www.ftiatislam.com', 'صوتيات الصافنات الإسلامية', 'صوتيات الصافنات الإسلامية', '- - -', '', '', 1, 9, 0, 0, 0, 1, '1211357782'),
(381, 'موقع الاسلام', 'http://www.al-islam.com/arb', 'موقع الاسلام', 'موقع الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211404985'),
(382, 'نداء الإيمان', 'http://www.al-eman.com', 'نداء الإيمان', 'نداء الإيمان', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211404985'),
(383, 'مفكرة الإسلام', 'http://www.islammemo.cc', 'مفكرة الإسلام', 'مفكرة الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(384, 'إسلام أون لاين', 'http://www.islam-online.net/Arabic/index.shtml', 'إسلام أون لاين', 'إسلام أون لاين', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(385, 'الشبكة الاسلامية', 'http://www.islamweb.net', 'الشبكة الاسلامية', 'الشبكة الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(386, 'طريق الاسلام', 'http://www.islamway.com', 'طريق الاسلام', 'طريق الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(387, 'موقع الحج والعمرة', 'http://www.tohajj.com', 'موقع الحج والعمرة', 'موقع الحج والعمرة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(388, 'صيد الفوائد', 'http://www.saaid.net', 'صيد الفوائد', 'صيد الفوائد', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(389, 'البث الإسلامي', 'http://www.liveislam.net', 'البث الإسلامي', 'البث الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(390, 'طريق الإيمان', 'http://islamic.kuwaitchat.net', 'طريق الإيمان', 'طريق الإيمان', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(391, 'كلمات', 'http://www.kl28.com', 'كلمات', 'كلمات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(392, 'مجموعة مواقع الإسلام', 'http://www.islam.ws', 'مجموعة مواقع الإسلام', 'مجموعة مواقع الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406609'),
(393, 'الصوت الإسلامي', 'http://www.islamcvoice.com', 'الصوت الإسلامي', 'الصوت الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211406853'),
(394, 'رئاسة المسجد النبوي', 'http://www.wmn.gov.sa', 'رئاسة المسجد النبوي', 'رئاسة المسجد النبوي', '- - -', NULL, NULL, 1, 72, 0, 0, 0, 1, '1211406853'),
(395, 'رئاسة المسجد النبوي', 'http://www.wmn.gov.sa', 'رئاسة المسجد النبوي', 'رئاسة المسجد النبوي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(396, 'موسوعة القصص الواقعية', 'http://www.gesah.net', 'موسوعة القصص الواقعية', 'موسوعة القصص الواقعية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(397, 'قصص الأنبياء', 'http://www.alnoor-world.com/prophets', 'قصص الأنبياء', 'قصص الأنبياء', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(398, 'اذكر الله', 'http://www.khayma.com/uzkurallah/Frame/aFront.htm', 'اذكر الله', 'اذكر الله', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(399, 'دار الإسلام', 'http://www.islamhouse.com', 'دار الإسلام', 'دار الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(400, 'الرقية الشرعية', 'http://www.ruqya.net', 'الرقية الشرعية', 'الرقية الشرعية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(401, 'طريق التوبة', 'http://www.twbh.com', 'طريق التوبة', 'طريق التوبة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(402, 'موقع القصص', 'http://www.alqasas.com', 'موقع القصص', 'موقع القصص', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(403, 'موقع دعوة', 'http://www.d3wa.org', 'موقع دعوة', 'موقع دعوة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(404, 'موقع رمضانيات', 'http://www.ramadan.ws', 'موقع رمضانيات', 'موقع رمضانيات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(405, 'قبسات من حياة الرسول', 'http://www.alsiraj.net', 'قبسات من حياة الرسول', 'قبسات من حياة الرسول', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(406, 'قافلة الداعيات', 'http://www.gafelh.com', 'قافلة الداعيات', 'قافلة الداعيات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(407, 'إمام المسجد', 'http://www.alimam.ws', 'إمام المسجد', 'إمام المسجد', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(408, 'الجوال الاسلامي', 'http://www.islamicmobile.net', 'الجوال الاسلامي', 'الجوال الاسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(409, 'قصة الاسلام', 'http://www.islamstory.com', 'قصة الاسلام', 'قصة الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(410, 'موقع المستشار', 'http://www.almostshar.com', 'موقع المستشار', 'موقع المستشار', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(411, 'اللباس الطبي الساتر', 'http://www.sater7.com', 'اللباس الطبي الساتر', 'اللباس الطبي الساتر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(412, 'طريق الدعوة', 'http://tttt4.com', 'طريق الدعوة', 'طريق الدعوة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(413, 'رسائل نت', 'http://www.rasael.net', 'رسائل نت', 'رسائل نت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(414, 'منزلة المرأة في الإسلام', 'http://www.manzilat.net', 'منزلة المرأة في الإسلام', 'منزلة المرأة في الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211407737'),
(415, 'شبكة مساجدنا الدعوية', 'http://www.msajedna.ps', 'شبكة مساجدنا الدعوية', 'شبكة مساجدنا الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(416, 'الدار الإسلامية للإعلام', 'http://www.iid-alraid.de', 'الدار الإسلامية للإعلام', 'الدار الإسلامية للإعلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(417, 'شبكة الإسلام للجميع', 'http://www.islam2all.com', 'شبكة الإسلام للجميع', 'شبكة الإسلام للجميع', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(418, 'الموسوعة الإسلامية الحرة', 'http://www.azizpedia.com', 'الموسوعة الإسلامية الحرة', 'الموسوعة الإسلامية الحرة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(419, 'بوابة نور الله', 'http://www.nourallah.com', 'بوابة نور الله', 'بوابة نور الله', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(420, 'موقع العائدون الى الله', 'http://www.alaidon.com', 'موقع العائدون الى الله', 'موقع العائدون الى الله', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(421, 'موسوعة الاستشارات', 'http://www.istisharaat.com', 'موسوعة الاستشارات', 'موسوعة الاستشارات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(422, 'المأذون الشرعي لعقود الأنكحة', 'http://www.mathoun.com', 'المأذون الشرعي لعقود الأنكحة', 'المأذون الشرعي لعقود الأنكحة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(423, 'حجابي نجاتي', 'http://www.hijabi.net', 'حجابي نجاتي', 'حجابي نجاتي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(424, 'موقع الصومعة الاسلامي', 'http://www.ssislam.com', 'موقع الصومعة الاسلامي', 'موقع الصومعة الاسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(425, 'جامع الفقه الاسلامي', 'http://feqh.al-islam.com', 'جامع الفقه الاسلامي', 'جامع الفقه الاسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(426, 'زكاة الأفراد', 'http://zakat.al-islam.com/arb', 'زكاة الأفراد', 'زكاة الأفراد', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(427, 'الحج والعمرة', 'http://hajj.al-islam.com/arb', 'الحج والعمرة', 'الحج والعمرة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(428, 'القاموس الإسلامي', 'http://dictionary.al-islam.com/default.asp?t=ARBENG', 'القاموس الإسلامي', 'القاموس الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(429, 'التاريخ الإسلامي', 'http://history.al-islam.com', 'التاريخ الإسلامي', 'التاريخ الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(430, 'مواقيت الصلاة', 'http://prayer.al-islam.com/default.asp?l=Arb', 'مواقيت الصلاة', 'مواقيت الصلاة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(431, 'منابر الدعوة', 'http://www.dawah.ws', 'منابر الدعوة', 'منابر الدعوة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(432, 'جامع شيخ الاسلام ابن تيمية', 'http://www.taimiah.org', 'جامع شيخ الاسلام ابن تيمية', 'جامع شيخ الاسلام ابن تيمية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(433, 'سلسبيل', 'http://www.khayma.com/salsabeel', 'سلسبيل', 'سلسبيل', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(434, 'نسيج الاسلامية', 'http://islamic.naseej.com', 'نسيج الاسلامية', 'نسيج الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211408228'),
(435, 'موقع سيرة الصحابة', 'http://www.khayma.com/alsahaba', 'موقع سيرة الصحابة', 'موقع سيرة الصحابة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(436, 'اخطاء يقع فيها المسلمين', 'http://www.khayma.com/akhtaa', 'اخطاء يقع فيها المسلمين', 'اخطاء يقع فيها المسلمين', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(437, 'مواقع اسلامية بالإنجليزية', 'http://sultan.org', 'مواقع اسلامية بالإنجليزية', 'مواقع اسلامية بالإنجليزية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(438, 'سواك المسلم', 'http://www.sewak.com', 'سواك المسلم', 'سواك المسلم', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(439, 'مركز المدينة لدرسات الاستشراق', 'http://www.madinacenter.com', 'مركز المدينة لدرسات الاستشراق', 'مركز المدينة لدرسات الاستشراق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(440, 'المرشد الاسلامي', 'http://www.khayma.com/almurshed/index.htm', 'المرشد الاسلامي', 'المرشد الاسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(441, 'المحدث', 'http://www.muhaddith.org/a_index.html', 'المحدث', 'المحدث', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(442, 'الاربعين النووية', 'http://www.elafco.com/nwa-1.htm', 'الاربعين النووية', 'الاربعين النووية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(443, 'اوقات الصلاة', 'http://prayer.naseej.com/World_A.asp', 'اوقات الصلاة', 'اوقات الصلاة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(444, 'شبكة النوادر الإسلامية', 'http://www.sohari.com', 'شبكة النوادر الإسلامية', 'شبكة النوادر الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(445, 'شبكة الشمس العربية', 'http://www.khayma.com/asn', 'شبكة الشمس العربية', 'شبكة الشمس العربية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(446, 'الشئون الاسلامية بالكويت', 'http://www.awkaf.net', 'الشئون الاسلامية بالكويت', 'الشئون الاسلامية بالكويت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(447, 'أعمال القلوب والسلوك والأخلاق', 'http://www.heartsactions.com', 'أعمال القلوب والسلوك والأخلاق', 'أعمال القلوب والسلوك والأخلاق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(448, 'موقع الموت', 'http://www.almawt.com', 'موقع الموت', 'موقع الموت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(449, 'المنتدى الاسلامي بالشارقة', 'http://www.muntada.org.ae', 'المنتدى الاسلامي بالشارقة', 'المنتدى الاسلامي بالشارقة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(450, 'المخطوطات والمكتبات الإسلامية', 'http://www.mild-kw.net', 'المخطوطات والمكتبات الإسلامية', 'المخطوطات والمكتبات الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(451, 'المنظمة الاسلامية للعلوم الطبية', 'http://www.islamset.com/arabic', 'المنظمة الاسلامية للعلوم الطبية', 'المنظمة الاسلامية للعلوم الطبية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(452, 'رسالة الإسلام', 'http://www.islammessage.com', 'رسالة الإسلام', 'رسالة الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(453, 'موقع المشكاة', 'http://www.meshkat.net', 'موقع المشكاة', 'موقع المشكاة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(454, 'التجمع الإسلامي في أمريكا', 'http://iananet.org/arabic', 'التجمع الإسلامي في أمريكا', 'التجمع الإسلامي في أمريكا', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(455, 'موقع الكلمة الطيبة', 'http://www.altyba.com', 'موقع الكلمة الطيبة', 'موقع الكلمة الطيبة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(456, 'حامل المسك', 'http://www.asiri.net', 'حامل المسك', 'حامل المسك', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(457, 'عالم الشباب', 'http://www.youthworlds.com', 'عالم الشباب', 'عالم الشباب', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(458, 'منبر الأمة الإسلامية للدراسات والبحوث', 'http://al-ommah.org', 'منبر الأمة الإسلامية للدراسات والبحوث', 'منبر الأمة الإسلامية للدراسات والبحوث', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(459, 'الباحث الإسلامي للمواقع والمواقيت', 'http://www.islamicfinder.org', 'الباحث الإسلامي للمواقع والمواقيت', 'الباحث الإسلامي للمواقع والمواقيت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(460, 'دليل البحوث الإسلامية', 'http://www.khayma.com/wahbi', 'دليل البحوث الإسلامية', 'دليل البحوث الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(461, 'الكتاب الإسلامي', 'http://www.khayma.com/islambook', 'الكتاب الإسلامي', 'الكتاب الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(462, 'جامع على بن المديني', 'http://www.masjeed.org', 'جامع على بن المديني', 'جامع على بن المديني', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(463, 'موقع حي الشهداء بالمدينة', 'http://www.khayma.com/shuhada', 'موقع حي الشهداء بالمدينة', 'موقع حي الشهداء بالمدينة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(464, 'الإسلام الحق', 'http://www.islamunveiled.org', 'الإسلام الحق', 'الإسلام الحق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211409019'),
(465, 'الأزهر والمؤسسات الدينية بمصر', 'http://www.alazhr.org', 'الأزهر والمؤسسات الدينية بمصر', 'الأزهر والمؤسسات الدينية بمصر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(466, 'الشرح الفقهي المصور', 'http://www.saaid.net/rasael/r39.htm', 'الشرح الفقهي المصور', 'الشرح الفقهي المصور', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(467, 'موقع المأوى', 'http://www.almawa.net', 'موقع المأوى', 'موقع المأوى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(468, 'الحج خطوة خطوة', 'http://www.tohajj.com/data/steps/hajj-steps.htm', 'الحج خطوة خطوة', 'الحج خطوة خطوة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(469, 'موقع الجنة', 'http://www.jannah.com', 'موقع الجنة', 'موقع الجنة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(470, 'حلوان للحج و العمرة', 'http://www.halwanhaj.co.ae', 'حلوان للحج و العمرة', 'حلوان للحج و العمرة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(471, 'دار الإيمان', 'http://www.daraleiman.com', 'دار الإيمان', 'دار الإيمان', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(472, 'موقع فناتق', 'http://www.fanateq.com', 'موقع فناتق', 'موقع فناتق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(473, 'شبكة الأسد نت', 'http://www.alasad.net', 'شبكة الأسد نت', 'شبكة الأسد نت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(474, 'أرض الشرق', 'http://www.ardalsharq.com', 'أرض الشرق', 'أرض الشرق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(475, 'التقويم الهجري', 'http://ceri.kacst.edu.sa/calendar.htm', 'التقويم الهجري', 'التقويم الهجري', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(476, 'المنتدى الاسلامي العالمي للحوار', 'http://dialogueonline.org', 'المنتدى الاسلامي العالمي للحوار', 'المنتدى الاسلامي العالمي للحوار', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(477, 'مباشر رياض المسك', 'http://www.almisk.net/AdsImgs/radio.htm', 'مباشر رياض المسك', 'مباشر رياض المسك', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(478, 'مفكرة بلال الإسلامية', 'http://www.bilal-prayer.com/default_a.asp', 'مفكرة بلال الإسلامية', 'مفكرة بلال الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(479, 'المنسيون', 'http://www.almansiuon.com', 'المنسيون', 'المنسيون', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(480, 'البحوث الإسلامية والدعوة في الفلبين', 'http://www.iscag.org', 'البحوث الإسلامية والدعوة في الفلبين', 'البحوث الإسلامية والدعوة في الفلبين', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(481, 'موقع مسلمات', 'http://www.muslimat.net', 'موقع مسلمات', 'موقع مسلمات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(482, 'مؤتمر العمل الإسلامي', 'http://www.islamicwork.info', 'مؤتمر العمل الإسلامي', 'مؤتمر العمل الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(483, 'شبكة أهل السنة الإسلامية', 'http://www.asunnah.net', 'شبكة أهل السنة الإسلامية', 'شبكة أهل السنة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(484, 'شبكة الدعوة الإسلامية', 'http://www.aldawah.net', 'شبكة الدعوة الإسلامية', 'شبكة الدعوة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(485, 'واحة المسك', 'http://www.soutiat.com', 'واحة المسك', 'واحة المسك', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(486, 'جنازة', 'http://www.janazh.com', 'جنازة', 'جنازة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(487, 'زاد الداعي', 'http://www.islamdoor.com/k', 'زاد الداعي', 'زاد الداعي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(488, 'كشف الشبهات', 'http://www.khayma.com/kshf', 'كشف الشبهات', 'كشف الشبهات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(489, 'شبكة نورين الإسلامية', 'http://www.norayn.com', 'شبكة نورين الإسلامية', 'شبكة نورين الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(490, 'موقع المسك', 'http://www.almisk.net', 'موقع المسك', 'موقع المسك', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(491, 'موقع العودة الإسلامي', 'http://www.almojahed.info', 'موقع العودة الإسلامي', 'موقع العودة الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(492, 'أبحاث فقه المعاملات الإسلامية', 'http://kantakji.org', 'أبحاث فقه المعاملات الإسلامية', 'أبحاث فقه المعاملات الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(493, 'موقع داعي', 'http://www.da3y.org', 'موقع داعي', 'موقع داعي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(494, 'أسماء الله الحسنى', 'http://www.deentimes.com', 'أسماء الله الحسنى', 'أسماء الله الحسنى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211410425'),
(495, 'جامع الأمير سلمان بجدة', 'http://www.salman1.com', 'جامع الأمير سلمان بجدة', 'جامع الأمير سلمان بجدة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(496, 'اللجنة الثقافية بجمعية حائل', 'http://www.hailclce.com', 'اللجنة الثقافية بجمعية حائل', 'اللجنة الثقافية بجمعية حائل', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(497, 'شبكة المنهاج الإسلامية', 'http://www.almenhaj.net', 'شبكة المنهاج الإسلامية', 'شبكة المنهاج الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(498, 'عيون الإسلام', 'http://www.3ss3.com', 'عيون الإسلام', 'عيون الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(499, 'الكلم الطيب', 'http://www.islamword.com', 'الكلم الطيب', 'الكلم الطيب', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(500, 'موقع القرآن الكريم للجميع', 'http://www.quran-for-all.com', 'موقع العمل للإسلام', 'موقع العمل للإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(501, 'أنصار السنة', 'http://www.elsonna.com', 'أنصار السنة', 'أنصار السنة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(502, 'موقع إسلامي', 'http://www.islamme.com', 'موقع إسلامي', 'موقع إسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(503, 'شبكة القمة الاسلامية', 'http://www.go2top.net', 'شبكة القمة الاسلامية', 'شبكة القمة الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(504, 'شبكة الدرر الدعوية', 'http://www.aldorarnet.com', 'شبكة الدرر الدعوية', 'شبكة الدرر الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(505, 'شبكة ظهران الدعوية', 'http://www.dahran.net', 'شبكة ظهران الدعوية', 'شبكة ظهران الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(506, 'رسول الإسلام', 'http://www.islam-prophet.com', 'رسول الإسلام', 'رسول الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(507, 'المفكرة الدعوية', 'http://www.dawahmemo.com', 'المفكرة الدعوية', 'المفكرة الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(508, 'الدين النصيحة', 'http://www.islamadvice.com', 'الدين النصيحة', 'الدين النصيحة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(509, 'يا له من دين', 'http://www.denana.com', 'يا له من دين', 'يا له من دين', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(510, 'الصحابة', 'http://www.al-sahabah.com', 'الصحابة', 'الصحابة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(511, 'موقع التاريخ الاسلامي', 'http://www.islamichistory.net', 'موقع التاريخ الاسلامي', 'موقع التاريخ الاسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(512, 'شبكة هاجس الإسلامية', 'http://www.hajs.net', 'شبكة هاجس الإسلامية', 'شبكة هاجس الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(513, 'شبكة الإسلام', 'http://www.elislam.net', 'شبكة الإسلام', 'شبكة الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(514, 'ابن الإسلام', 'http://www.ibnalislam.com', 'ابن الإسلام', 'ابن الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(515, 'الأكاديمية الإسلامية المفتوحة', 'http://www.islamacademy.net', 'الأكاديمية الإسلامية المفتوحة', 'الأكاديمية الإسلامية المفتوحة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(516, 'موقع مكة الشامل', 'http://www.maccah.com', 'موقع مكة الشامل', 'موقع مكة الشامل', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(517, 'آل البيت', 'http://www.alalbayt.com', 'آل البيت', 'آل البيت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(518, 'فقه الصيام', 'http://www.nawafith.net/feqh', 'فقه الصيام', 'فقه الصيام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(519, 'رمضان مشاعر وشعائر', 'http://www.islameiat.com/ramadan', 'رمضان مشاعر وشعائر', 'رمضان مشاعر وشعائر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(520, 'صوت الايمان', 'http://www.imanvoice.com', 'صوت الايمان', 'صوت الايمان', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(521, 'طريق الجنة', 'http://www.aljannahway.com', 'طريق الجنة', 'طريق الجنة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(522, 'جامع العز بن عبدالسلام بالخرج', 'http://www.al-3z.net', 'جامع العز بن عبدالسلام بالخرج', 'جامع العز بن عبدالسلام بالخرج', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(523, 'مسلمون', 'http://www.muslemoon.net', 'مسلمون', 'مسلمون', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(524, 'لبيك أفريقيا', 'http://www.labaik-africa.org', 'لبيك أفريقيا', 'لبيك أفريقيا', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211411486'),
(525, 'الأفكار الدعوية', 'http://www.alafkar.org', 'الأفكار الدعوية', 'الأفكار الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(526, 'علم المواريث', 'http://www.moarith.com', 'علم المواريث', 'علم المواريث', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(527, 'حصاد القلم', 'http://www.hasaad.net', 'حصاد القلم', 'حصاد القلم', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(528, 'أوراق إيمانية', 'http://www.awrak.com', 'أوراق إيمانية', 'أوراق إيمانية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(529, 'الدعاة إلى العلم النافع', 'http://www.du3at.com', 'الدعاة إلى العلم النافع', 'الدعاة إلى العلم النافع', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(530, 'مفكرة الدعاه', 'http://www.aldoah.com', 'مفكرة الدعاه', 'مفكرة الدعاه', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(531, 'المسك الأذفر', 'http://www.athfer.com', 'المسك الأذفر', 'المسك الأذفر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(532, 'شبكة شباب السنة', 'http://www.al-sunna.net', 'شبكة شباب السنة', 'شبكة شباب السنة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(533, 'شبكة المعالي الإسلامية', 'http://www.ma3ali.net', 'شبكة المعالي الإسلامية', 'شبكة المعالي الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(534, 'شبكة عين الإسلام', 'http://www.eyeislam.net', 'شبكة عين الإسلام', 'شبكة عين الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(535, 'التوابون', 'http://www.tawabon.com', 'التوابون', 'التوابون', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(536, 'الدنيا الفانية', 'http://www.zzrz.com', 'الدنيا الفانية', 'الدنيا الفانية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(537, 'موقع الروضة الإسلامي', 'http://www.al-rawdah.net', 'موقع الروضة الإسلامي', 'موقع الروضة الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(538, 'شبكة مشكاة الإسلامية', 'http://www.almeshkat.net', 'شبكة مشكاة الإسلامية', 'شبكة مشكاة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(539, 'موقع نوف عبدالله لخدمة الإسلام', 'http://nouf.org', 'موقع نوف عبدالله لخدمة الإسلام', 'موقع نوف عبدالله لخدمة الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(540, 'الفلاش الإسلامي', 'http://www.islamic-flash.com', 'الفلاش الإسلامي', 'الفلاش الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(541, 'وسيط الخير', 'http://www.wseeet.com', 'وسيط الخير', 'وسيط الخير', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(542, 'موقع مواسم النور', 'http://www.mwasim.com', 'موقع مواسم النور', 'موقع مواسم النور', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(543, 'الرسول وآل البيت', 'http://www.aalalbait.com', 'الرسول وآل البيت', 'الرسول وآل البيت', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(544, 'استبدلني', 'http://www.istbdlne.com', 'استبدلني', 'استبدلني', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(545, 'المراكز الصيفية', 'http://www.dawahmemo.com/mrkz', 'المراكز الصيفية', 'المراكز الصيفية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(546, 'الشيخ الشاعر حفيظ بن عجب الدوسري', 'http://www.hafedh.net', 'الشيخ الشاعر حفيظ بن عجب الدوسري', 'الشيخ الشاعر حفيظ بن عجب الدوسري', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(547, 'موقع المحراب الدعوي', 'http://www.almehrab.ws', 'موقع المحراب الدعوي', 'موقع المحراب الدعوي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(548, 'أرض افريقيا', 'http://africaland.net', 'أرض افريقيا', 'أرض افريقيا', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(549, 'التربية النبوية', 'http://www.propheteducation.com', 'التربية النبوية', 'التربية النبوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(550, 'رسائلي القصيرة', 'http://huda76-sms.blogspot.com', 'رسائلي القصيرة', 'رسائلي القصيرة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(551, 'الإسلام العتيق', 'http://www.islamancient.net', 'الإسلام العتيق', 'الإسلام العتيق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(552, 'بوابة النصح الإسلامي', 'http://www.nos7.com', 'بوابة النصح الإسلامي', 'بوابة النصح الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(553, 'موقع وذكر', 'http://www.wathakker.com', 'موقع وذكر', 'موقع وذكر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(554, 'غزة الحرة الإسلامية', 'http://www.free-gaza.com', 'غزة الحرة الإسلامية', 'غزة الحرة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412398'),
(555, 'حياتي بلا أغاني', 'http://www.no4songs.com', 'حياتي بلا أغاني', 'حياتي بلا أغاني', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(556, 'موقع وقفنا', 'http://www.waqfuna.com', 'موقع وقفنا', 'موقع وقفنا', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(557, 'موقع دعوة', 'http://www.khayma.com/da3wah', 'موقع دعوة', 'موقع دعوة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(558, 'البرنامج العالمي للتعريف بنبي الرحمة', 'http://www.mercyprophet.com', 'البرنامج العالمي للتعريف بنبي الرحمة', 'البرنامج العالمي للتعريف بنبي الرحمة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(559, 'الدكتور عدنان باحارث للتربية الإسلامية', 'http://www.bahareth.org', 'الدكتور عدنان باحارث للتربية الإسلامية', 'الدكتور عدنان باحارث للتربية الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(560, 'نسايم الإيمان', 'http://www.nsaaym.com', 'نسايم الإيمان', 'نسايم الإيمان', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(561, 'شبكة الرفقة الصالحة', 'http://www.refqh.com', 'شبكة الرفقة الصالحة', 'شبكة الرفقة الصالحة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(562, 'موقع شباب الدعوي', 'http://www.shbdw.com', 'موقع شباب الدعوي', 'موقع شباب الدعوي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(563, 'شبكة إيماننا الإسلامية', 'http://www.emanona.com', 'شبكة إيماننا الإسلامية', 'شبكة إيماننا الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(564, 'شبكة الفلاش الإسلامي', 'http://www.islamic-flash.net', 'شبكة الفلاش الإسلامي', 'شبكة الفلاش الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211412836'),
(565, 'موقع البينة', 'http://www.bayyna.com', 'موقع البينة', 'موقع البينة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(566, 'منشور - للمنشورات الدعوية', 'http://www.mnshoor.com', 'منشور - للمنشورات الدعوية', 'منشور - للمنشورات الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(567, 'موقع دعوتها', 'http://www.wdawah.com', 'موقع دعوتها', 'موقع دعوتها', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(568, 'شبكة المعرفة الإسلامية', 'http://www.almarfah.com', 'شبكة المعرفة الإسلامية', 'شبكة المعرفة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(569, 'الهدى للإسلاميات', 'http://www.elhooda.com', 'الهدى للإسلاميات', 'الهدى للإسلاميات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(570, 'جامعة دار العلوم لاهل السنة ف&#1740; ا&#1740;ران', 'http://www.sunnionline.net', 'جامعة دار العلوم لاهل السنة ف&#1740; ا&#1740;ران', 'جامعة دار العلوم لاهل السنة ف&#1740; ا&#1740;ران', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(571, 'ابن الإسلام للمراسلات الدعوية', 'http://www.moraslat.com', 'ابن الإسلام للمراسلات الدعوية', 'ابن الإسلام للمراسلات الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(572, 'واحة المسلم', 'http://www.al-wa7a.com', 'واحة المسلم', 'واحة المسلم', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(573, 'الموبيل الاسلامى', 'http://www.islamicmob.org', 'الموبيل الاسلامى', 'الموبيل الاسلامى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(574, 'جماعة الاعتصام بالكتاب والسنة', 'http://www.al-etsam.com', 'جماعة الاعتصام بالكتاب والسنة', 'جماعة الاعتصام بالكتاب والسنة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(575, 'مملكة الاسلام', 'http://www.mislam.net', 'مملكة الاسلام', 'مملكة الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(576, 'بيت المسلم', 'http://www.merkaz.info', 'بيت المسلم', 'بيت المسلم', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(577, 'حب الإسلام', 'http://www.islam-love.com', 'حب الإسلام', 'حب الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(578, 'صوت الحق', 'http://www.soutulhaq.com', 'صوت الحق', 'صوت الحق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(579, 'موقع الصحوة الإلكترونية', 'http://www.esahwa.com', 'موقع الصحوة الإلكترونية', 'موقع الصحوة الإلكترونية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(580, 'المكتبة الإسلامية', 'http://a-adil.com/mktba/index.php', 'المكتبة الإسلامية', 'المكتبة الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(581, 'شبكة دعوي الإسلامية', 'http://www.d3we.com', 'شبكة دعوي الإسلامية', 'شبكة دعوي الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(582, 'شبكة يارحمن الاسلامية', 'http://www.yarhman.com', 'شبكة يارحمن الاسلامية', 'شبكة يارحمن الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(583, 'الصحبة الصالحة', 'http://www.asso7ba.com', 'الصحبة الصالحة', 'الصحبة الصالحة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(584, 'إلى الإسلام', 'http://www.toislamy.com', 'إلى الإسلام', 'إلى الإسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211413407'),
(585, 'شبكة دعوة الاسلامية', 'http://www.daawaah.com', 'شبكة دعوة الاسلامية', 'شبكة دعوة الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(586, 'موقع الاستقامة', 'http://www.al-mishkat.com/istiqama', 'موقع الاستقامة', 'موقع الاستقامة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(587, 'موقع الرساله', 'http://www.alrisaalah.com', 'موقع الرساله', 'موقع الرساله', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(588, 'موقع الفضيلة', 'http://www.alfadeelh.com', 'موقع الفضيلة', 'موقع الفضيلة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(589, 'مسابقة الأسرة العلمية الكبرى', 'http://www.alosrah.net', 'مسابقة الأسرة العلمية الكبرى', 'مسابقة الأسرة العلمية الكبرى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(590, 'دليل مختصر مصور لفهم الإسلام (E)', 'http://www.islam-guide.com', 'دليل مختصر مصور لفهم الإسلام (E)', 'دليل مختصر مصور لفهم الإسلام (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(591, 'مركز البحوث الإسلامية (E)', 'http://www.irf.net', 'مركز البحوث الإسلامية (E)', 'مركز البحوث الإسلامية (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(592, 'موقع ارض الإسلام (E)', 'http://www.islamland.org', 'موقع ارض الإسلام (E)', 'موقع ارض الإسلام (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(593, 'اكتشف الإسلام (E)', 'http://www.discoverislam.com', 'اكتشف الإسلام (E)', 'اكتشف الإسلام (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(594, 'مساجد حول العالم (E)', 'http://www.islam.org/Culture/MOSQUES', 'مساجد حول العالم (E)', 'مساجد حول العالم (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(595, 'فتاوى اون لاين (E)', 'http://www.fatwa-online.com', 'فتاوى اون لاين (E)', 'فتاوى اون لاين (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(596, 'موقع السنة (E)', 'http://www.al-sunnah.com', 'موقع السنة (E)', 'موقع السنة (E)', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(597, 'كلمات الدعاة', 'http://kalimataldoah.net', 'كلمات الدعاة', 'كلمات الدعاة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(598, 'موقع الاسلام والمسلمين', 'http://www.muslem.info/muslem', 'موقع الاسلام والمسلمين', 'موقع الاسلام والمسلمين', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(599, 'موقع ذكرى الإسلامي', 'http://www.thekra.ws', 'موقع ذكرى الإسلامي', 'موقع ذكرى الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(600, 'شبكة إسلامك', 'http://www.islam4m.com', 'شبكة إسلامك', 'شبكة إسلامك', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(601, 'شبكة الفجر الصادق', 'http://www.n7n9.com', 'شبكة الفجر الصادق', 'شبكة الفجر الصادق', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(602, 'تونس المسلمة', 'http://www.tunisalmoslima.com', 'تونس المسلمة', 'تونس المسلمة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(603, 'عالم التطوع العربي', 'http://www.arabvolunteering.org', 'عالم التطوع العربي', 'عالم التطوع العربي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(604, 'موقع طالب العلم', 'http://www.talebal3elm.com', 'موقع طالب العلم', 'موقع طالب العلم', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(605, 'الحضارة الاسلامية في مدينة بخارى', 'http://www.al-bukhari.net', 'الحضارة الاسلامية في مدينة بخارى', 'الحضارة الاسلامية في مدينة بخارى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(606, 'موقع حلقات', 'http://www.halqat.com', 'موقع حلقات', 'موقع حلقات', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(607, 'محمد رسول الله', 'http://www.rasoulallah.net', 'محمد رسول الله', 'محمد رسول الله', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(608, 'شبكة ذكريات الاسلامية', 'http://www.zkryat.com', 'شبكة ذكريات الاسلامية', 'شبكة ذكريات الاسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(609, 'الهمس للوسائط الدعوية', 'http://www.alhams.net', 'الهمس للوسائط الدعوية', 'الهمس للوسائط الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(610, 'لواء الشريعة', 'http://www.shareah.com', 'لواء الشريعة', 'لواء الشريعة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(611, 'شبكة أنوار مكة الأسلامية', 'http://www.anwarmaka.net', 'شبكة أنوار مكة الأسلامية', 'شبكة أنوار مكة الأسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(612, 'نبي الرحمة', 'http://www.nabialrahma.com', 'نبي الرحمة', 'نبي الرحمة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(613, 'لواء الشريعة', 'http://www.shareah.com', 'لواء الشريعة', 'لواء الشريعة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(614, 'البصائر', 'http://albsayer.net', 'البصائر', 'البصائر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414259'),
(615, 'الآمرون بالمعروف والناهون عن المنكر', 'http://www.alameron.com', 'الآمرون بالمعروف والناهون عن المنكر', 'الآمرون بالمعروف والناهون عن المنكر', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(616, 'نور الاسلام', 'http://www.nooralislam.net', 'نور الاسلام', 'نور الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(617, 'طريق الحقيقة', 'http://www.factway.net', 'طريق الحقيقة', 'طريق الحقيقة', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(618, 'أروع القصص الواقعية', 'http://www.ade2006.jeeran.com', 'أروع القصص الواقعية', 'أروع القصص الواقعية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(619, 'مدونة شباب الاسلام', 'http://shabab-alislam.blogspot.com', 'مدونة شباب الاسلام', 'مدونة شباب الاسلام', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(620, 'برنامج إلى صلاتى', 'http://www.ela-salaty.com', 'برنامج إلى صلاتى', 'برنامج إلى صلاتى', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(621, 'نور على الدرب', 'http://www.al-darb.com', 'نور على الدرب', 'نور على الدرب', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(622, 'اليوتيوب الإسلامي', 'http://www.isyoutube.com', 'اليوتيوب الإسلامي', 'اليوتيوب الإسلامي', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(623, 'شبكة المرابط الدعوية', 'http://www.morabt.com', 'شبكة المرابط الدعوية', 'شبكة المرابط الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(624, 'شبكة العلوم الإسلامية', 'http://www.islamicsc.com', 'شبكة العلوم الإسلامية', 'شبكة العلوم الإسلامية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414485'),
(625, 'الرسائل الدعوية', 'http://www.alrsael.net', 'الرسائل الدعوية', 'الرسائل الدعوية', '- - -', NULL, NULL, 1, 1, 0, 0, 0, 1, '1211414598'),
(626, 'رئاسة الحرمين الشريفين', 'http://gph.gov.sa', 'رئاسة الحرمين الشريفين', 'رئاسة الحرمين الشريفين', '- - -', NULL, NULL, 1, 1, 4, 13, 2, 1, '1211414598'),
(627, 'مكتبة الشيخ عبد الله المحمود', 'http://almahmood.ae', 'مكتبة الشيخ عبد الله المحمود', 'مكتبة الشيخ عبد الله المحمود', '- - -', '', '', 1, 1, 3, 15, 2, 1, '1211414598'),
(628, 'الحجاب الاسلامي', 'http://hijab.3rbu.net', 'الحجاب الاسلامي', 'الحجاب الاسلامي', '- - -', '', '', 1, 1, 4, 3, 1, 1, '1211414598'),
(629, 'نواحي', 'http://www.nwahy.com', 'nwahy,نواحي,سكربتات مجانيه,برمجيات,تعليم لغات برمجه,دليل مواقع,دروس,ادوات,تطوير مواقع', 'php,mysql,html,css,phpmyadmin,cpanel,flash,swish,photoshop,fronpage,vb', '- - -', '', '', 1, 25, 4, 3, 1, 1, '1211414598'),
(630, 'نواحي', 'http://www.nwahy.com', 'نواحي,php,mysql,html,css,phpmyadmin,cpanel,flash,swish,photoshop,fronpage,vb', 'nwahy,نواحي,سكربتات مجانيه,برمجيات,تعليم لغات برمجه,دليل مواقع,دروس,ادوات,تطوير مواقع', '- - -', '', '', 1, 63, 4, 3, 1, 1, '1211414598');
");
if(!$sql6){
echo "<li><font color='#0000FF'>خطأ</font> لم يتم وضع البيانات الإفتراضيه في الجدول dlil_site --> ( $error2 )</li>";
}else{
echo "<li>تمت إضافة البيانات الإفتراضية للجدول dlil_site بنجاح .</li>";
}


echo "</ul>";
echo "<form>
<div align='center'><input type='Button' value=' الخطوة التالية ' name='NextStep' onClick=\"location='install.php?step=5'\"></div>
</form>
<p>&nbsp;</p>";
break;

case "5":

echo "<br><div align='center'>
  <center>
  <table border='0' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111' width='98%' id='AutoNumber1' dir='rtl'>
    <tr>
      <td width='100%'>تم تثبيت سكربت دليل المواقع بنجاح .<p>تهانينا لك .</p>
      <p><font color='#FF0000'>ونشكرك على إستخدام هذا السكربت ولا نريد منك سوى
      الدعاء لنا ولذوينا .</font></p>
      <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border: 3px double #CC99FF' bordercolor='#111111' width='100%' id='AutoNumber2' bgcolor='#F0F0FF'>
        <tr>
          <td width='100%'>
          <p align='center'><br>
          لابد من حذف ملف <u><font color='#FF0000'>install.php</font></u> من موقعك مباشرة فور الإنتهاء من التثبيت
          .. وذلك لدواعي أمنيه لموقعك .<br>
&nbsp;</td>
        </tr>
      </table>
      <p align='center'>والآن إختر الوجهه المناسبه لك<br>
      <br>
      <a href='index.php'>الصفحة الرئيسية</a> || <a href='admincp/index.php'>لوحة التحكم</a></p>
      <br><br><div align='center'>سبحان الله والحمدلله ولاإله الا الله والله اكبر</div>
      وتذكر أخي الكريم أنك ستحاسب عن كل موقع تضيفه في السكربت يوم القيامه ولا أسمح بإستخدام السكربت فيما يغضب الله وأرجو استخدام السكربت فيما لا يعارض العادات الاسلاميه ولا الفطره السليمه ولن اسامح من يضع مواقع اغاني او مواقع صور مخله بالأدب في الدليل . . . وقد تم اضافة اكثر من 600 موقع في الدليل بشكل مجاني وجميع المواقع اسلاميه<br><br>والله ولي التوفيق</td>
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
$subject = "تم تركيب السكربت "; 
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