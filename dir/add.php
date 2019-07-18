<?php
session_start();

include("config.php");
include("function.php");
include("templates/template.php");

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){

tpl_header("ÇÖİ ááÏáíá");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
if($allow_add == 1){
addsite();
}else{
echo "<div class='divmessage'>äÃÓİ áÅÒÚÇÌß ÃÎí ÇáßÑíã .. Êã ÅíŞÇİ åĞå ÇáÎÇÕíÉ ãä ÇáÅÏÇÑÉ</div>";
}
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

if($allow_add == 1){
echo "<div class='indexw'>";
addsite();
echo "</div>";
}else{
echo "<div class='divmessage'>äÃÓİ áÅÒÚÇÌß ÃÎí ÇáßÑíã .. Êã ÅíŞÇİ åĞå ÇáÎÇÕíÉ ãä ÇáÅÏÇÑÉ</div>";
}
}

tpl_footer();

}ELSEIF ($action=="insert"){
if($_POST['agree'] == 1){
tpl_header("ÑÓÇáÉ ÅÏÇÑíÉ");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
$ssss = "<div class='divmessage'>ÚĞÑÇ ÃÎí ÇáßÑíã áã ÊŞã ÈÇáãæÇİŞå Úáì ÔÑæØ ÅÖÇİÉ ÇáãæŞÚ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";
echo "<fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
<div align='center'>$ssss</div>
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

$ssss = "<div class='divmessage'>ÚĞÑÇ ÃÎí ÇáßÑíã áã ÊŞã ÈÇáãæÇİŞå Úáì ÔÑæØ ÅÖÇİÉ ÇáãæŞÚ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
<div align='center'>$ssss</div>
</fieldset></div>";

}

tpl_footer();
exit;
}

/*
if($_POST['code'] != $_SESSION['captchacode'] OR $_SESSION["captchacode"]=='')
{
tpl_header("ÑÓÇáÉ ÅÏÇÑíå");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
$ssss = "<div class='divmessage'>ÎØÃ İí ßæÏ ÇáÊÍŞŞ¡ ãä İÖáß ÃÚÏ ÇáãÍÇæáÉ ãÑÉ ÃÎÑì . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";
//tpl_table("ÑÓÇáÉ ÅÏÇÑíå",$ssss);
echo "<fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
<div align='center'>$ssss</div>
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

$ssss = "<div class='divmessage'>ÎØÃ İí ßæÏ ÇáÊÍŞŞ¡ ãä İÖáß ÃÚÏ ÇáãÍÇæáÉ ãÑÉ ÃÎÑì . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
<div align='center'>$ssss</div>
</fieldset></div>";

}

tpl_footer();
exit;
}
*/

$title = addslashes($_POST['title']);
$title = trim($title);

$url = addslashes($_POST['url']);
$url = trim($url);

if(substr($url,0,0) == ""){
$u = "áÇíæÌÏ ÚäæÇä";
}else{
$u = $url;
}

$country = addslashes($_POST['country']);
$yourname = addslashes($_POST['yourname']);
$yourmail = addslashes($_POST['yourmail']);

$cat = $_POST['cat'];
$lang = $_POST['lang'];

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

if($metadescription == ""){
$xx1 = $title;
}else{
$xx1 = $metadescription;
}

if($metakeywords == ""){
$xx2 = $title;
}else{
$xx2 = $metakeywords;
}

if (empty($title)){
$xx = "- áã ÊßÊÈ ÅÓã ÇáãæŞÚ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a>";
}else{

$query =  mysql_query ("INSERT INTO dlil_site (title,url,metadescription,metakeywords,active,country,yourname,yourmail,lang,cat,date) VALUES ('$title','$u','$xx1','$xx2','0','$country','$yourname','$yourmail','$lang','$cat','".time()."')") or die ("ÅÓÊÚáÇã ÎÇØíÁ");
$xx = "- ÊãÊ ÇáÅÖÇİÉ ÈäÌÇÌ ... ÓíÊã ÇáÊİÚíá ŞÑíÈÇ Çä ÔÇÁ Çááå . . . . . ÌÇÑí ÇáÊæÌíå ÇáÊáŞÇÆí";

if($htmlorphp==1){
$z = "index.html";
}else{
$z = "index.php";
}

$xx .= "<META HTTP-EQUIV='refresh' CONTENT='1; URL=$z'>";


}

tpl_header("ÇÖİ ááÏáíá");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo "<fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
$xx
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{
echo "<div class='indexw'><fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
$xx
</fieldset></div>";
}
tpl_footer();


}ELSEIF ($action=="addcomments"){
if($_POST['code'] != $_SESSION['captchacode'] OR $_SESSION["captchacode"]=='')
{
tpl_header("ÑÓÇáÉ ÅÏÇÑíÉ");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
$ssss = "<div align='center'>ÎØÃ İí ßæÏ ÇáÊÍŞŞ¡ ãä İÖáß ÃÚÏ ÇáãÍÇæáÉ ãÑÉ ÃÎÑì . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";
echo "<fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
$ssss
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{
$ssss = "<div align='center'>ÎØÃ İí ßæÏ ÇáÊÍŞŞ¡ ãä İÖáß ÃÚÏ ÇáãÍÇæáÉ ãÑÉ ÃÎÑì . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></div>";
echo "<div class='indexw'><fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
<div align='center'>$ssss</div>
</fieldset></div>";
}

tpl_footer();
exit;
}

$name = addslashes($_POST['name']);
$name = trim($name);

$emails = addslashes($_POST['emails']);
$emails = trim($emails);

$text = addslashes($_POST['text']);
$text = trim($text);

$articleid = intval($_POST['articleid']);

if (empty($name) AND empty($text)){
$xx = "- áã ÊßÊÈ ÅÓãß .<br>- áã ÊßÊÈ ÇáÊÚáíŞ .<br>- <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a>";
}elseif (empty($name)){
$xx = "- áã ÊßÊÈ ÅÓãß . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a>";
}elseif (empty($text)){
$xx = "- áã ÊßÊÈ ÇáÊÚáíŞ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a>";
}elseif ($emails != "" AND !eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-z]{2,4})$',$emails)){
$xx = "- áã ÊßÊÈ ÇáÈÑíÏ ÇáÅáßÊÑæäí ÈÇáÖßá ÇáÕÍíÍ xxxxx@domin.com . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a>";

}else{

$query =  mysql_query ("INSERT INTO dlil_comment (name,emails,text,active,articleid,date) VALUES ('$name','$emails','$text','$activecomments','$articleid','".time()."')") or die ("ÅÓÊÚáÇã ÎÇØíÁ");
$xx = "-  ÅÖÇİÉ ÇáÊÚáíŞ ÈäÌÇÍ . . . ÓíÊã ÊæÌíåß ÊáŞÇÆíÇ áÕİÍÉ ÇáãŞÇá ÇáÓÇÈŞ . . æÔßÑÇ áÊæÇÕáß ãÚäÇ";

if($htmlorphp==1){
$z = "article-".$articleid.".html";
}else{
$z = "article.php?id=".$articleid."";
}

$xx .= "<META HTTP-EQUIV='refresh' CONTENT='1; URL=$z'>";
}

tpl_header("ÅÖÇİÉ ÊÚáíŞ");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo "<fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
$xx
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{
echo "<div class='indexw'><fieldset>
<legend><span class='aa'>ÑÓÇáÉ ÅÏÇÑíÉ</span></legend>
$xx
</fieldset></div>";
}

tpl_footer();
}
?>