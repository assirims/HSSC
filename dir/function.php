<?php
if (file_exists('install.php'))
{
echo "<br /><div dir='rtl' align='center'><b><font color='#FF0000'>⁄–—« ... ·«»œ „‰ Õ–› «·„·› install.php „‰ „Êﬁ⁄ﬂ Õ Ï Ì⁄„· «·”ﬂ—»  »√„«‰ .</font></b> </div>";
exit;
}

if (file_exists('upgrade.php'))
{
echo "<br /><div dir='rtl' align='center'><b><font color='#FF0000'>⁄–—« ... ·«»œ „‰ Õ–› «·„·› upgrade.php „‰ „Êﬁ⁄ﬂ Õ Ï Ì⁄„· «·”ﬂ—»  »√„«‰ .</font></b> </div>";
exit;
}

$query = mysql_query("SELECT * FROM dlil_options where id='1'");
$s = mysql_fetch_array($query);

$name_site = stripslashes($s['namesite']);
$name_url = stripslashes($s['urlsite']);
$pathsite = stripslashes($s['pathsite']);
$emailsite = stripslashes($s['emailsite']);

$textheader = stripslashes($s['textheader']);
$textfooter = stripslashes($s['textfooter']);

$closesitetext = stripslashes($s['closesitetext']);
$closesite = $s['closesite'];

if(file_exists(".htaccess")){
$htmlorphp = $s['htmlorphp'];
}else{
$htmlorphp = 0;
}

$ads_headerloop = $s['ads_headerloop'];
$ads_footerloop = $s['ads_footerloop'];

$index_limit = $s['index_limit'];
$disallowcatid = stripslashes($s['disallowcatid']);
$number = $s['number'];
$site_cat_limit = $s['site_cat_limit'];
$allow_add = $s['allow_add'];
$limitinblock = $s['limitinblock'];
$showblocks = $s['showblocks'];

$folder = stripslashes($s['foldertemplate']);

$meta1 = stripslashes($s['meta1']);
$meta2 = stripslashes($s['meta2']);

$limitarticles = $s['limitarticles'];
$showrticles = $s['showrticles'];
$activecomments = $s['activecomments'];
$showcomments = $s['showcomments'];
$allowcomments = $s['allowcomments'];
$numbercharcomments = $s['numbercharcomments'];
$timerate = $s['timerate'];
$idpoll = $s['idpoll'];
$randdate = $s['randdate'];
$randsiteid = $s['randsiteid'];
$randtype = $s['randtype'];
$showrandsiteinindex = $s['showrandsiteinindex'];
$limitlikesite = $s['limitlikesite'];
$showlikesite = $s['showlikesite'];
$typeaddcheck = $s['typeaddcheck'];
$textadd = stripslashes($s['textadd']);

$indexview = 2;
$last_limit = 2;


function block_randsite() {
global  $htmlorphp,$randtype,$randdate,$randsiteid,$folder;
/*
d : 01 to 31
j : 1 to 31
F : January through December
m : 01 through 12
n : 1 through 12
Y : Examples: 1999 or 2003
y : Examples: 99 or 03
a : am or pm
A : AM or PM
i : 00 to 59
h : 12-hour format of an hour with leading zeros 01 through 12
H : 24-hour format of an hour with leading zeros 00 through 23
g : 12-hour format of an hour without leading zeros 1 through 12
G : 24-hour format of an hour without leading zeros 0 through 23
B : Swatch Internet time 000 through 999
s : Seconds, with leading zeros 00 through 59
u : Milliseconds (added in PHP 5.2.2) Example: 54321

Full Date/Time
c : ISO 8601 date (added in PHP 5) 2004-02-12T15:19:21+00:00
r : ª RFC 2822 formatted date Example: Thu, 21 Dec 2000 16:01:07 +0200
U : Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT) See also time()
*/

$timextime = time();

if($randtype==1){
$day1 = date("i");
$day2 = date("i",$randdate);
}elseif($randtype==2){
$day1 = date("h");
$day2 = date("h",$randdate);
}elseif($randtype==3){
$day1 = date("j");
$day2 = date("j",$randdate);
}elseif($randtype==4){
$day1 = date("n");
$day2 = date("n",$randdate);
}else{
$day1 = date("i");
$day2 = date("i",$randdate);
}

$number = mysql_num_rows(mysql_query("select * from dlil_site where active='1'"));
$randxx = rand(0,$number);

if($randdate=="" OR $randdate==0 OR $randsiteid=="" OR $randsiteid==0){
$updatesql1 = mysql_query("update dlil_options set randdate='$timextime' where id='1'") or die ("Query failed4");
$updatesql2 = mysql_query("update dlil_options set randsiteid='$randxx' where id='1'") or die ("Query failed4");
}


if($day1 != $day2){
$Sql = mysql_query("select * from dlil_site where id='$randxx' AND active='1' limit 1");
$updatesqlx1 = mysql_query("update dlil_options set randdate='$timextime' where id='1'") or die ("Query failed4");
$updatesqlx2 = mysql_query("update dlil_options set randsiteid='$randxx' where id='1'") or die ("Query failed4");
}else{
$Sql = mysql_query("select * from dlil_site where id='$randsiteid' AND active='1' limit 1");
}

$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$sss = "<div class='divmessage'>·«ÌÊÃœ „Êﬁ⁄ Õ«·Ì«</div>";
}else{

$Row = mysql_fetch_array($Sql);

$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$t = $Row['url'];
$t = str_replace("http://","",$t);
$t = str_replace("http://www.","",$t);
$t = str_replace("http://www","",$t);
$t = str_replace("www.","",$t);
$t = str_replace("www","",$t);

$d = date("j/n/Y",$Row['date']);

if($htmlorphp==1){
$s = "<a href='site-".$Row['id'].".html'>".$Row['title']."</a>";
$sxs = "<a class='aa' href='site-".$Row['id'].".html'>".$Row['url']."</a>";
}else{
$s = "<a href='site.php?id=".$Row['id']."'>".$Row['title']."</a>";
$sxs = "<a class='aa' href='site.php?id=".$Row['id']."'>".$Row['url']."</a>";
}

if(site_is_up("www.websnapr.com")){
$img = "<a href='".$Row['url']."' title='".$Row['url']."'><img src='http://images.websnapr.com/?url=".$Row['url']."' border='0' /></a>";
}else{
$img = "<img src='$folder/icons/nopic.jpg' title='«·„Êﬁ⁄ „ÕÃÊ» «Ê «‰ «·„Êﬁ⁄ ·« Ì⁄„· ·œÌﬂ' alt='«·„Êﬁ⁄ „ÕÃÊ» «Ê «‰ «·„Êﬁ⁄ ·« Ì⁄„· ·œÌﬂ' border='0' />";
}

/*
if(site_is_up("www.thumbshots.org")){
$img = "<a href='".$Row['url']."' title='".$Row['url']."'><img src='http://open.thumbshots.org/image.pxf?url=".$Row['url']."' border='0' alt='".$Row['url']."' /></a>";
}else{
$img = "<img src='$folder/icons/nopic.jpg' title='«·„Êﬁ⁄ „ÕÃÊ» «Ê «‰ «·„Êﬁ⁄ ·« Ì⁄„· ·œÌﬂ' alt='«·„Êﬁ⁄ „ÕÃÊ» «Ê «‰ «·„Êﬁ⁄ ·« Ì⁄„· ·œÌﬂ' border='0' />";
}
*/

$Sqlx = mysql_query("select * from dlil_catgory where id='".$Row['cat']."'");
$Rowx = mysql_fetch_array($Sqlx);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$sxx = "section-".$Rowx['id'].".html";
}else{
$sxx = "section.php?id=".$Rowx['id']."";
}

$sss = "<div class='boxitem'>
$img
<h3>$s</h3>
<p>
ª ".$sxs."<br />
ª ".$d."<br />
ª «·“Ì«—«  : ".$Row['vis']."<br />
ª «· ﬁÌÌ„ : ".$Row['rate']."/".$Row['count']."<br />
ª «·ﬁ”„ : <a href='$sxx'>".$Rowx['title']."</a><br />
</p>
</div>";
}

return $sss;
}


function rand1() {
global  $htmlorphp;

$Sql = mysql_query("SELECT * FROM dlil_rand1 where active=1 order by RAND() limit 1");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ „Õ ÊÏ</div>";
}else{

$s = "";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['text'] = stripslashes($Row['text']);
//$Row['text'] = htmlspecialchars($Row['text']);

$s .= "<div class='divrand'>".$Row['text']."</div>";
}
}
return $s;
}

function rand2() {
global  $htmlorphp;

$Sql = mysql_query("SELECT * FROM dlil_rand2 where active=1 order by RAND() limit 1");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ „Õ ÊÏ</div>";
}else{

$s = "";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['text'] = stripslashes($Row['text']);
//$Row['text'] = htmlspecialchars($Row['text']);

$s .= "<div class='divrand'>".$Row['text']."</div>";
}
}
return $s;
}

function rand3() {
global  $htmlorphp;

$Sql = mysql_query("SELECT * FROM dlil_rand3 where active=1 order by RAND() limit 1");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ „Õ ÊÏ</div>";
}else{

$s = "";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['text'] = stripslashes($Row['text']);
//$Row['text'] = htmlspecialchars($Row['text']);

$s .= "<div class='divrand'>".$Row['text']."</div>";
}
}
return $s;
}


function articles() {
global  $htmlorphp,$limitarticles;

$Sql = mysql_query("SELECT id,title,vis,date FROM dlil_article where active=1 order by id desc limit 0,$limitarticles");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ „ﬁ«·«  Õ«·Ì«</div>";
}else{

$s = "<div class='widgetblock'>
<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
//$Row['title'] = htmlspecialchars($Row['title']);

if($htmlorphp==1){
$s .= "<li><a href='article-".$Row['id'].".html'>".$Row['title']."</a> [".$Row['vis']."]</li>";
}else{
$s .= "<li><a href='article.php?id=".$Row['id']."'>".$Row['title']."</a> [".$Row['vis']."]</li>";
}

}
$s .= "</ul>
</div>";
}

return $s;
}


function comments() {
global  $folder,$id,$_GET,$htmlorphp;

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 15;
$startpoint = ($page * $perpage) - $perpage;

$sql = @mysql_query("SELECT * FROM dlil_comment where active='1' AND articleid='$id' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($sql);
if($xx == 0){
$prints = "";
}else{
$prints = "<br />
<fieldset>
<legend><span class='aa'> ⁄·Ìﬁ«  «·“Ê«—</span></legend>";
$c = 0;
while ($Row = @mysql_fetch_array($sql))
{
++$c;
if($c == $xx){
$smbol = "";
}else{
$smbol = "<hr width='90%' size='1' />";
}

$Row['name'] = stripslashes($Row['name']);
$Row['name'] = htmlspecialchars($Row['name']);

$Row['emails'] = stripslashes($Row['emails']);
$Row['emails'] = htmlspecialchars($Row['emails']);

$Row['text'] = stripslashes($Row['text']);
$Row['text'] = htmlspecialchars($Row['text']);

$d = date("j/n/Y",$Row['date']);

if($Row['name'] == ""){
$i = "";
}else{
$i = "ª ".$Row['name']."<br />";
}

if($Row['emails'] == ""){
$i2 = "";
}else{
$i2 = "ª <a href='mailto:".$Row['emails']."'>".$Row['emails']."</a><br />";
}

$bbbb = $i.$i2."ª  «—ÌŒ «· ⁄·Ìﬁ $d<div class='commenttext'>".$Row['text']."</div>$smbol";
$prints .= "$bbbb";
}

$prints .= "</fieldset>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_comment where active='1' AND articleid='$id'")) / $perpage);
if($pagesnum > 1){
$prints .= "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
if($htmlorphp==1){
$z = "[<a href='comment-$id-$i.html'>$i</a>] ";
}else{
$z = "[<a href='article.php?id=$id&page=$i'>$i</a>] ";
}
} else {
$z = "[<u>$i</u>]";
}
$prints .= "$z";
}
$prints .= "</p>";
}
}

mysql_free_result($sql);
return $prints;
}



function block_catgory() {
global  $htmlorphp;

$Sql = mysql_query("SELECT * FROM dlil_catgory where active=1 AND sub='0' order by ordercat");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ √ﬁ”«„ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

if($htmlorphp==1){
$sxxx = "section-".$Row['id'].".html";
}else{
$sxxx = "section.php?id=".$Row['id']."";
}

if($htmlorphp==1){
$s .= "<li><a href='$sxxx'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a href='$sxxx'>".$Row['title']."</a></li>";
}

}
$s .= "</ul>";
}

return $s;
}


function block_new_site() {
global  $htmlorphp,$limitinblock;


$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 order by id desc limit 0,$limitinblock");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div align='center'>·«ÌÊÃœ „Ê«ﬁ⁄ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$s .= "<li><a title='«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site-".$Row['id'].".html'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a title='«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site.php?id=".$Row['id']."'>".$Row['title']."</a></li>";
}

}

$s .= "</ul>";
}

return $s;
}


function block_old_site() {
global  $htmlorphp,$limitinblock;


$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 order by id ASC limit 0,$limitinblock");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div align='center'>·«ÌÊÃœ „Ê«ﬁ⁄ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$s .= "<li><a title='«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site-".$Row['id'].".html'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a title='«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site.php?id=".$Row['id']."'>".$Row['title']."</a></li>";
}

}
$s .= "</ul>";
}

return $s;
}


function block_rate_site() {
global  $htmlorphp,$limitinblock;


$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 order by rate desc limit 0,$limitinblock");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div align='center'>·«ÌÊÃœ „Ê«ﬁ⁄ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$s .= "<li><a title='«· ﬁÌ„„ ".$Row['rate']."\n«·“Ì«—«  ".$Row['vis']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site-".$Row['id'].".html'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a title='«· ﬁÌ„„ ".$Row['rate']."\n«·“Ì«—«  ".$Row['vis']."\n«·„’Ê Ì‰ ".$Row['count']."' href='site.php?id=".$Row['id']."'>".$Row['title']."</a></li>";
}

}
$s .= "</ul>";
}

return $s;
}



function block_count_site() {
global  $htmlorphp,$limitinblock;


$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 order by count desc limit 0,$limitinblock");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div align='center'>·«ÌÊÃœ „Ê«ﬁ⁄ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$s .= "<li><a title='«·„’Ê Ì‰ ".$Row['count']."\n«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."' href='site-".$Row['id'].".html'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a title='«·„’Ê Ì‰ ".$Row['count']."\n«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."' href='site.php?id=".$Row['id']."'>".$Row['title']."</a></li>";
}

}
$s .= "</ul>";
}

return $s;
}


function block_visite_site() {
global  $htmlorphp,$limitinblock;


$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 order by vis desc limit 0,$limitinblock");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div align='center'>·«ÌÊÃœ „Ê«ﬁ⁄ Õ«·Ì«</div>";
}else{

$s = "<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$s .= "<li><a title='«·„’Ê Ì‰ ".$Row['count']."\n«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."' href='site-".$Row['id'].".html'>".$Row['title']."</a></li>";
}else{
$s .= "<li><a title='«·„’Ê Ì‰ ".$Row['count']."\n«·“Ì«—«  ".$Row['vis']."\n«· ﬁÌ„„ ".$Row['rate']."' href='site.php?id=".$Row['id']."'>".$Row['title']."</a></li>";
}

}
$s .= "</ul>";
}

return $s;
}

//********************************************************************************//
function catgory1() {
global  $htmlorphp,$index_limit,$disallowcatid,$number;

$Sql = mysql_query("SELECT * FROM dlil_catgory where active=1 AND id IN($disallowcatid) order by ordercat");
//$Sql = mysql_query("SELECT * FROM dlil_catgory where active=1 AND sub=0 AND id NOT IN($disallowcatid) order by ordercat");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$printcats .= "<div align='center'>·«ÌÊÃœ √ﬁ”«„ Õ«·Ì«</div>";
}else{

$printcats = "";
$t = 0;
while ($Row2 = @mysql_fetch_array($Sql))
{
++$t;

$Row2['title'] = stripslashes($Row2['title']);
$Row2['title'] = htmlspecialchars($Row2['title']);


if($htmlorphp==1){
$sxxx = "section-".$Row2['id'].".html";
}else{
$sxxx = "section.php?id=".$Row2['id']."";
}

$printcats .= "<fieldset>
<h2><div align='center'><a class='aa' href='$sxxx'>".$Row2['title']."</a></div></h2>

</fieldset>";
if($t != $numberx){
$printcats .= "<br />";
}
}

}

return $printcats;
}

//**************************************************************************************************

function catgory2() {
global  $htmlorphp,$index_limit,$disallowcatid,$number;

$Sql = mysql_query("SELECT * FROM dlil_catgory where active=1 AND id IN($disallowcatid) order by ordercat");
//$Sql = mysql_query("SELECT * FROM dlil_catgory where active=1 AND sub=0 AND id NOT IN($disallowcatid) order by ordercat");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$printcats .= "<div align='center'>·«ÌÊÃœ √ﬁ”«„ Õ«·Ì«</div>";
}else{

$printcats = "";
$t = 0;
while ($Row2 = @mysql_fetch_array($Sql))
{
++$t;

$Row2['title'] = stripslashes($Row2['title']);
$Row2['title'] = htmlspecialchars($Row2['title']);


if($htmlorphp==1){
$sxxx = "section-".$Row2['id'].".html";
}else{
$sxxx = "section.php?id=".$Row2['id']."";
}

$printcats .= "<fieldset>

<h2><div align='center'><a class='aa' href='$sxxx'>".$Row2['title']."</a></div></h2>

</fieldset>";
if($t != $numberx){
$printcats .= "<br />";
}
}

}

return $printcats;
}


//****************************************************************************************


function ads($place,$number)
{
global  $htmlorphp;

if($number=="1"){$width = "100%";}
elseif($number=="2"){$width = "50%";}
elseif($number=="3"){$width = "33%";}
elseif($number=="4"){$width = "25%";}
elseif($number=="5"){$width = "20%";}
elseif($number=="6"){$width = "16%";}
else{$width = "";}

$query = mysql_query("SELECT * FROM dlil_ads where active='1' AND upordown='$place' order by orderads");
$xx = mysql_num_rows($query);
if($xx == 0){
$x = "";
}else{
$x = "<div align='center'>
<table border='0' width='10%' id='AutoNumlber2'>
<tr>";
$tslsls = '0';
$z=0;
while($b = mysql_fetch_array($query))
{
$b['title'] = stripslashes($b['title']);
$b['image'] = stripslashes($b['image']);
$b['url'] = stripslashes($b['url']);

++$z;
++$tslsls;

if($tslsls=="$number"){
$tslslats = "</tr><tr>";
$tslsls="0";
}else{
$tslslats = "";
}

if($htmlorphp==1){
$sxxx = "ads-".$b['id'].".html";
}else{
$sxxx = "go.php?id=".$b['id']."";
}


$x .= "<td width='$width' align='center'><a target='_blank' href='$sxxx'><img src='".$b['image']."' alt='".$b['title']."' border='0' /></a></td>";
if($z==$xx){
$tslslatsx = str_replace("<tr>","",$tslslats); ;
}else{
$tslslatsx = $tslslats;
}
$x .= "$tslslatsx";

}

$x .= "</table>
</div>";
}
return $x;
}


function sections() {
global $id,$site_cat_limit,$nnn,$htmlorphp;

$Sqlxx = mysql_query("SELECT * FROM dlil_catgory where active=1 AND sub='$id' order by ordercat");
$numberxxx = mysql_num_rows($Sqlxx);
if($numberxxx == 0){
$printcats = "";
}else{

$printcats = "<fieldset class='sec'>
<legend>&nbsp;«·√ﬁ”«„ «·›—⁄Ì… ·‹ $nnn </legend>
<table border='0' width='100%' id='AutoNumber2'>
<tr>";
$z=0;
$tslsls = '0';
while ($Row = @mysql_fetch_array($Sqlxx))
{
++$z;
++$tslsls;
if($tslsls=="2"){
$tslslats = "</tr><tr>";
$tslsls="0";
}else{
$tslslats = "";
}

$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

if($htmlorphp==1){
$c = "section-".$Row['id'].".html";
}else{
$c = "section.php?id=".$Row['id']."";
}

$printcats .= "<td width='50%' valign='top'>
ª <a class='aa' href='$c'>".$Row['title']."</a>
</td>";

if($z==$numberxxx){
$tslslatsx = str_replace("<tr>","",$tslslats); ;
}else{
$tslslatsx = $tslslats;
}
$printcats .= "$tslslatsx";

}

$printcats .= "</table>
</fieldset>";
}



///////////////



$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = $site_cat_limit;
$startpoint = ($page * $perpage) - $perpage;

if($_GET["order"] == 1){
$x = "order by vis desc";
}elseif($_GET["order"] == 2){
$x = "order by rate desc";
}elseif($_GET["order"] == 3){
$x = "order by id asc";
}elseif($_GET["order"] == 4){
$x = "order by id desc";
}elseif($_GET["order"] == 0){
$x = "order by id desc";
}else{
$x = "order by id desc";
}

$Sql = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count FROM dlil_site where active=1 AND cat=$id ".$x." LIMIT $startpoint,$perpage");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$printcats .= "";
}else{

if($numberxxx != 0 AND $numberx != 0){
$printcats .= "<br />";
}


if($htmlorphp==1){
$c1 = "orderbyvisitor-".$id.".html";
$c2 = "orderbyrate-".$id.".html";
$c3 = "orderbyold-".$id.".html";
$c4 = "orderbylast-".$id.".html";
}else{
$c1 = "section.php?id=$id&order=1";
$c2 = "section.php?id=$id&order=2";
$c3 = "section.php?id=$id&order=3";
$c4 = "section.php?id=$id&order=4";
}

$printcats .= "<div class='divmessage'> — Ì» «·„Ê«ﬁ⁄ Õ”» : <a href='$c1'>«·√ﬂÀ— “Ì«—…</a> - <a href='$c2'>«·√ﬂÀ—  ﬁÌÌ„«</a> - <a href='$c3'>«·√ﬁœ„</a> - <a href='$c4'>«·√ÕœÀ</a><br /><br /></div>";

$printcats .= "<fieldset>
<legend>&nbsp;<b>$nnn</b> </legend>";

$b = 0;
while ($Row = @mysql_fetch_array($Sql))
{
++$b;
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$Row['country'] = stripslashes($Row['country']);
$Row['country'] = htmlspecialchars($Row['country']);

$Row['yourname'] = stripslashes($Row['yourname']);
$Row['yourname'] = htmlspecialchars($Row['yourname']);

$Row['yourmail'] = stripslashes($Row['yourmail']);
$Row['yourmail'] = htmlspecialchars($Row['yourmail']);

$d = date("j/n/Y",$Row['date']);

if($Row['metadescription'] == ""){
$f = "";
}else{
$f = "<div align='right'>".$Row['metadescription']."</div>";
}

if($htmlorphp==1){
$cx = "site-".$Row['id'].".html";
}else{
$cx = "site.php?id=".$Row['id']."";
}

$printcats .= "ª <a href='$cx'>".$Row['title']."</a><div dir='ltr' align='right'>".$Row['url']."</div><div class='statsite'> «·“Ì«—«  ".$Row['vis']." - «· ﬁÌÌ„ : ".$Row['rate']." - «·√’Ê«  : ".$Row['count']."</div>".$f."";

if($numberx != $b){
$printcats .= "<hr width='100%' size='1'>";
}

}
$printcats .= "</fieldset>";

$pagesnum = ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_site where active=1 AND cat=$id")) / $perpage);

if($pagesnum > 1){
$printcats .= "<p align='center' style='margin-top: 0; margin-bottom: 0'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {


if($htmlorphp==1){
$z = "<a href='pages-$id-$i.html'>$i</a>";
}else{
$z = "<a href='section.php?id=$id&page=$i'>$i</a>";
}


} else {
$z = "<u>$i</u>";
}
$printcats .= "[$z]";
}
$printcats .= "</p>";
}
}

return $printcats;
}


function addsite() {
global $htmlorphp,$numbercharcomments,$typeaddcheck,$_SESSION,$textadd,$name_site;

$text1 = rand(0,9);
$text2 = rand(0,9);
$text3 = "«ﬂ » ‰« Ã «·⁄œœ ".$text1." + ".$text2."";
$text4 = $text1 + $text2;

$_SESSION["captchacode"] = $text4;

if($htmlorphp==1){
$z = "insert-site.html";
}else{
$z = "add.php?action=insert";
}
?>

<Script language=javascript>
var ns6=document.getElementById&&!document.all

function restrictinput(maxlength,e,placeholder){
if (window.event&&event.srcElement.value.length>=maxlength)
return false
else if (e.target&&e.target==eval(placeholder)&&e.target.value.length>=maxlength){
var pressedkey=/[a-zA-Z0-9\.\,\/]/ //detect alphanumeric keys
if (pressedkey.test(String.fromCharCode(e.which)))
e.stopPropagation()
}
}

function countlimit(maxlength,e,placeholder){
var theform=eval(placeholder)
var lengthleft=maxlength-theform.value.length
var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder)
if (window.event||e.target&&e.target==eval(placeholder)){
if (lengthleft<0)
theform.value=theform.value.substring(0,maxlength)
placeholderobj.innerHTML=lengthleft
}
}

function displaylimit(thename, theid, thelimit){
var theform=theid!=""? document.getElementById(theid) : thename
var limit_text='⁄œœ Õ—Ê› «· ⁄·Ìﬁ «·„ »ﬁÌÂ ·ﬂ <span id="'+theform.toString()+'">'+thelimit+'</span> Õ—›<br /><br />'
if (document.all||ns6)
document.write(limit_text)
if (document.all){
eval(theform).onkeypress=function(){ return restrictinput(thelimit,event,theform)}
eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform)}
}
else if (ns6){
document.body.addEventListener('keypress', function(event) { restrictinput(thelimit,event,theform) }, true);
document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform) }, true);
}
}
</Script>

<form name="vbform" method="post" action="<?php echo $z; ?>">
<fieldset>
<legend><span class='aa'>«÷› ··œ·Ì·</span></legend>

<table border='0' width='100%' id='table1'>
        <tr>
                <td width='50%' align='center'><span class='addtext'>≈”„ «·„Êﬁ⁄</span></td>
                <td width='50%' align='center'><span class='addtext'>—«»ÿ «·„Êﬁ⁄ ⁄·Ï «·«‰ —‰  - «Œ Ì«—Ì</span></td>
        </tr>
        <tr>
                <td width='50%' align='center'><input class='addinput' size="30" name="title" /><br /><br /></td>
                <td width='50%' align='center'><input class='addinput' size="30" name="url" dir="ltr" value="" /><br /><br /></td>
        </tr>
        <tr>
                <td width='50%' align='center'><span class='addtext'>⁄‰Ê«‰ «·„Êﬁ⁄ - The Address</span></td>
                <td width='50%' align='center'><span class='addtext'>Ê’› «·„Êﬁ⁄ - «Œ Ì«—Ì</span></td>
        </tr>
        <tr>
                <td width='50%' align='center' dir=ltr><textarea class='addinput' id="limit2" name="metadescription" rows=5 cols=30></textarea><br /><br /></td>
                <td width='50%' align='center'><textarea class='addinput' name="metakeywords" rows=5 cols=30></textarea><br /><br /></td>
        </tr>

        <tr>
                <td width='50%' align='center'><span class='addtext'>«Œ — «·ﬁ”„ «·„‰«”»</span></td>
                <td width='50%' align='center'><span class='addtext'><!--ﬂÊœ «· √ﬂÌœ--></span></td>
        </tr>
        <tr>
                <td width='50%' align='center'><select class='addselect' size="1" name="cat">
<?php
$query = mysql_query("SELECT * FROM dlil_catgory where active=1 order by id desc");
while($cat = mysql_fetch_array($query))
{
echo "<OPTION value='$cat[id]'>$cat[title]</OPTION>";
}
?>
</select><br /><br /></td>

                <td width='50%' align='center'>
<?php
//echo "<img src='code.php' alt='code' border='0' /> <input class='addinput' name='code' size='10' dir='ltr' /> «ﬂ » «·ﬂÊœ Â‰«";
?>
</td>
        </tr>

        <!--<tr>
                <td width='100%' colspan='2'>
<div align="center"><span class='addtext'>‘—Êÿ «·„Ê«›ﬁÂ ⁄·Ï ≈÷«›… „Êﬁ⁄ﬂ ›Ì <?php echo $name_site; ?></span></div>
<div class="agree">
<?php echo $textadd; ?>
</div>

<div><label for="a"><input type="checkbox" name="agree" id="a" value="1" /><strong>‰⁄„ ﬁ—√  ﬂ«›… «·‘—Êÿ ›Ì <?php echo $name_site; ?> Ê√Ê«›ﬁ Ê√· “„ »„« Ã«¡ ›ÌÂ« .</strong></label></div>
<br />

                </td>
        </tr>-->

        <tr>
                <td width='100%' align='center' colspan='2'><input class="addsubmit" type="submit" value=" ≈÷«›… " name="cmdAdd" /></td>
        </tr>

</table>

</fieldset>

</form>
<?php
}

function country($char)
{
if($char=="sa"){
$name = "«·”⁄ÊœÌ…";
}elseif($char=="kw"){
$name = "«·ﬂÊÌ ";
}elseif($char=="ae"){
$name = "«·≈„«—« ";
}elseif($char=="bh"){
$name = "«·»Õ—Ì‰";
}elseif($char=="om"){
$name = "⁄„«‰";
}elseif($char=="qa"){
$name = "ﬁÿ—";
}elseif($char=="jo"){
$name = "«·√—œ‰";
}elseif($char=="so"){
$name = "«·’Ê„«·";
}elseif($char=="sd"){
$name = "«·”Êœ«‰";
}elseif($char=="iq"){
$name = "«·⁄—«ﬁ";
}elseif($char=="ma"){
$name = "«·„€—»";
}elseif($char=="ye"){
$name = "«·Ì„‰";
}elseif($char=="km"){
$name = "«·ﬁ„—";
}elseif($char=="dj"){
$name = "ÃÌ»Ê Ì";
}elseif($char=="lb"){
$name = "·»‰«‰";
}elseif($char=="ps"){
$name = "›·”ÿÌ‰";
}elseif($char=="sy"){
$name = "”Ê—Ì";
}elseif($char=="eg"){
$name = "„’—";
}elseif($char=="dz"){
$name = "«·Ã“«∆—";
}elseif($char=="tn"){
$name = " Ê‰”";
}elseif($char=="ly"){
$name = "·Ì»Ì";
}elseif($char=="mr"){
$name = "„Ê—Ì «‰Ì";
}elseif($char=="ot"){
$name = "œÊ·… √Œ—Ï";
}else{
$name = "€Ì— „⁄—Ê›";
}
return $name;
}


function clean_value($getandpost)
    {
    $getandpost = htmlspecialchars($getandpost);
    $getandpost = str_replace("select","",$getandpost);
    $getandpost = str_replace("union", "", $getandpost);
    $getandpost = str_replace("update","",$getandpost);
    $getandpost = str_replace("insert","",$getandpost);
    $getandpost = str_replace("where","",$getandpost);
    $getandpost = str_replace("like","",$getandpost);
    $getandpost = str_replace("or","",$getandpost);
    $getandpost = str_replace("and","",$getandpost);
    $getandpost = str_replace("set","",$getandpost);
    $getandpost = str_replace("into","",$getandpost);
    $getandpost = str_replace("'", "", $getandpost);
    $getandpost = str_replace(";", "", $getandpost);
    $getandpost = str_replace(">", "", $getandpost);
    $getandpost = str_replace("<", "", $getandpost);
    $getandpost = str_replace("*", "", $getandpost);
    $getandpost = strip_tags($getandpost);
    return $getandpost;
}

function searchreplace($text)
{
$t = explode(".", $text);
$x = $t[count($t)-1];

if(substr($text,0,11) == "http://www."){
$text = str_replace("http://www.","",$text);
}elseif(substr($text,0,10) == "http://www"){
$text = str_replace("http://www","",$text);
}elseif(substr($text,0,7) == "http://"){
$text = str_replace("http://","",$text);
}elseif(substr($text,0,3) == "htt"){
$text = str_replace("htt","",$text);
}elseif(substr($text,0,4) == "http"){
$text = str_replace("http","",$text);
}elseif(substr($text,0,5) == "http:"){
$text = str_replace("http:","",$text);
}elseif(substr($text,0,6) == "http:/"){
$text = str_replace("http:/","",$text);
}elseif(substr($text,0,4) == "www."){
$text = str_replace("www.","",$text);
}elseif(substr($text,0,3) == "www"){
$text = str_replace("www","",$text);
}

if($x == "com"){
$text = str_replace(".com","",$text);
}elseif($x == "net"){
$text = str_replace(".net","",$text);
}elseif($x == "org"){
$text = str_replace(".org","",$text);
}

return $text;
}

function error()
{
echo "<meta http-equiv='Refresh' content='1;URL=index.php'>";
}



















function poll($idpoll) {
global  $htmlorphp,$folder,$_GET;

if(isset($_GET["id"])){
$id = intval($_GET["id"]);
$id = clean_value($id);
}else{
$id = 0;
}

$sql = @mysql_query("SELECT * FROM dlil_poll where id='$idpoll' AND active='1' order by id desc limit 1");
$xx = mysql_num_rows($sql);
if($xx == 0){
$prints = "<div class='divmessage'>·« ÌÊÃœ «” › «¡ ÌÕ„· «·—ﬁ„ $idpoll</div>";
}else{
$prints = "";
$Row = @mysql_fetch_array($sql);

$total = ($Row['vote1']+$Row['vote2']+$Row['vote3']);

$Row['qus'] = stripslashes($Row['qus']);
$Row['ans1'] = stripslashes($Row['ans1']);
$Row['ans2'] = stripslashes($Row['ans2']);
$Row['ans3'] = stripslashes($Row['ans3']);
$d = date("j/n/Y",$Row['date']);


if($Row['vote1']==0){
$bar1 = 0;
}else{
$bar1 = (($Row['vote1']/$total)*100);
$bar1 = sprintf("%01.2f", $bar1);
//$bar1 = ceil($bar1);
}

if($Row['vote2']==0){
$bar2 = 0;
}else{
$bar2 = (($Row['vote2']/$total)*100);
$bar2 = sprintf("%01.2f", $bar2);
//$bar2 = ceil($bar2);
}

if($Row['vote3']==0){
$bar3 = 0;
}else{
$bar3 = (($Row['vote3']/$total)*100);
$bar3 = sprintf("%01.2f", $bar3);
//$bar3 = ceil($bar3);
}

if ($htmlorphp=="1"){
$y = "vote.html";
}else{
$y = "poll.php?x=vote";
}
/*
$bar1 = round($Row[vote1]*100/$total)."%";
$bar2 = round($Row[vote2]*100/$total)."%";
$bar3 = round($Row[vote3]*100/$total)."%";
*/

/*
$tab1 = "<table style='border-collapse: collapse' class='xtable' width='".$bar1."%' height='10' id='AutoNumbsser5515'>
<tr><td class='xtr'></td>
</tr></table>";

$tab2 = "<table style='border-collapse: collapse' class='xtable' width='".$bar2."%' height='10' id='AutoNumbsser25515'>
<tr><td class='xtr'></td>
</tr></table>";

$tab3 = "<table style='border-collapse: collapse' class='xtable' width='".$bar3."%' height='10' id='AutoNum2bsser5515'>
<tr><td class='xtr'></td>
</tr></table>";
*/

$tab1 = "<img border='1' src='$folder/icons/green.gif' width='$bar1' height='15' border='0' alt='«” › «¡' />";

$tab2 = "<img border='1' src='$folder/icons/gold.gif' width='$bar2' height='15' border='0' alt='«” › «¡' />";

$tab3 = "<img border='1' src='$folder/icons/blue.gif' width='$bar3' height='15' border='0' alt='«” › «¡' />";

$bbbb = "<fieldset>
<legend><span class='aa'>".$Row['qus']."</span></legend>

<form name='FormName' action='$y' method='post' style='margin-top: 0; margin-bottom: 0'>
<input name='xxx' type='hidden' value='$id' />

<table border='0' cellpadding='2' style='border-collapse: collapse' width='100%' id='tab88le2'>

<tr>
<td width='1%' align='center'><input type='radio' value='vote1' name='answer' checked='checked' /></td>
<td width='1%' nowrap='nowrap'>ª ".$Row['ans1']."</td>
<td width='1%' nowrap='nowrap' align='center'>$bar1%</td>
<td>$tab1</td>
</tr>

<tr>
<td width='1%' align='center'><input type='radio' value='vote2' name='answer' /></td>
<td width='1%' nowrap='nowrap'>ª ".$Row['ans2']."</td>
<td width='1%' nowrap='nowrap' align='center'>$bar2%</td>
<td>$tab2</td>
</tr>

<tr>
<td width='1%' align='center'><input type='radio' value='vote3' name='answer' /></td>
<td width='1%' nowrap='nowrap'>ª ".$Row['ans3']."</td>
<td width='1%' nowrap='nowrap' align='center'>$bar3%</td>
<td>$tab3</td>
</tr>

<!--
<tr>
<td colspan='4' align='center'>
<input style=\" border: medium none; width:53px; height:23px; cursor:pointer; background-color:transparent;background-image: url('$folder/icons/vote.jpg')\" type='submit' value='' name='sendokayx' /></td>
</tr>
-->

<tr>
<td colspan='4' align='center'>
<input class='addsubmit' type='submit' value='  ’ÊÌ  ' />
</td>
</tr>

</table>

</form>
</fieldset>";


$prints .= "$bbbb";
}

mysql_free_result($sql);
return $prints;
}




function pollindex() {
global  $htmlorphp,$folder,$idpoll;

$sql = @mysql_query("SELECT * FROM dlil_poll where id='$idpoll' AND active='1' order by id desc limit 1");
$xx = mysql_num_rows($sql);
if($xx == 0){
$prints = "<div class='divmessage'>·« ÌÊÃœ «” › «¡ ÌÕ„· «·—ﬁ„ $idpoll</div>";
}else{
$prints = "";
$Row = @mysql_fetch_array($sql);

$total = ($Row['vote1']+$Row['vote2']+$Row['vote3']);

$Row['qus'] = stripslashes($Row['qus']);
$Row['ans1'] = stripslashes($Row['ans1']);
$Row['ans2'] = stripslashes($Row['ans2']);
$Row['ans3'] = stripslashes($Row['ans3']);
$d = date("j/n/Y",$Row['date']);


if($Row['vote1']==0){
$bar1 = 0;
}else{
$bar1 = (($Row['vote1']/$total)*100);
$bar1 = sprintf("%01.2f", $bar1);
//$bar1 = ceil($bar1);
}

if($Row['vote2']==0){
$bar2 = 0;
}else{
$bar2 = (($Row['vote2']/$total)*100);
$bar2 = sprintf("%01.2f", $bar2);
//$bar2 = ceil($bar2);
}

if($Row['vote3']==0){
$bar3 = 0;
}else{
$bar3 = (($Row['vote3']/$total)*100);
$bar3 = sprintf("%01.2f", $bar3);
//$bar3 = ceil($bar3);
}

if ($htmlorphp=="1"){
$y = "vote.html";
}else{
$y = "poll.php?x=vote";
}


$bbbb = "<form name='FormName' action='$y' method='post' style='margin-top: 0; margin-bottom: 0'>
<input name='xxx' type='hidden' value='$id' />
<div class='pollqus'>".$Row['qus']."</div>

<div class='pollans'><input type='radio' value='vote1' name='answer' checked='checked' /> ".$Row['ans1']." $bar1 %</div>
<div class='pollans'><input type='radio' value='vote2' name='answer' /> ".$Row['ans2']." $bar2 %</div>
<div class='pollans'><input type='radio' value='vote3' name='answer' /> ".$Row['ans3']." $bar3 %</div>
<div class=''><input class='addsubmitpoll' type='submit' value='  ’ÊÌ  ' /></div>

</form>";

$prints .= "$bbbb";
}

mysql_free_result($sql);
return $prints;
}



function allpoll() {
global $htmlorphp;

$Sql = mysql_query("SELECT * FROM dlil_poll where active='1' order by id desc");
$numbercat = mysql_num_rows($Sql);
if($numbercat == "0"){
$printcats .= "";

}else{

$printcats .= "";
while ($Row = @mysql_fetch_array($Sql))
{


$Row['qus'] = stripslashes($Row['qus']);
$Row['ans1'] = stripslashes($Row['ans1']);
$Row['ans2'] = stripslashes($Row['ans2']);
$Row['ans3'] = stripslashes($Row['ans3']);
$d = date("j/n/Y",$Row['date']);

$total = ($Row['vote1']+$Row['vote2']+$Row['vote3']);

if ($htmlorphp=="1"){
$xx = "poll-$Row[id].html";
}else{
$xx = "poll.php?x=show&id=$Row[id]";
}

$printcats .= "ª <a href='$xx'>".$Row['qus']."</a> ⁄œœ «·√’Ê«  ($total)  «—ÌŒ «·≈÷«›… ($d)<br />";

}

$printcats .= "";
}
return $printcats;
}








function right_blocks()
{
global $htmlorphp;

$queryx = mysql_query("SELECT * FROM dlil_ads where active='1' AND upordown='2' order by orderads");
$xxx = mysql_num_rows($queryx);
if($xxx == 0){
echo "";
}else{
$dd = "<div align='center'>";
$n = 0;
while($bx = mysql_fetch_array($queryx))
{
++$n;

if($n == $xxx){
$br = "";
}else{
$br = "<br /><br />";
}

$bx['title'] = stripslashes($bx['title']);
$bx['image'] = stripslashes($bx['image']);
$bx['url'] = stripslashes($bx['url']);

if($htmlorphp==1){
$sxxx = "ads-".$bx['id'].".html";
}else{
$sxxx = "go.php?id=".$bx['id']."";
}

$dd .= "<a target='_blank' href='$sxxx'><img src='".$bx['image']."' alt='".$bx['title']."' border='0'></a>".$br."";
}
$dd .= "</div>";
tpl_menu("«·≈⁄·«‰« ",$dd);
}



$query = mysql_query("SELECT * FROM dlil_blocks where active='1' AND rightorleft='1' order by orderblock");
$xx = mysql_num_rows($query);
if($xx == 0){
echo "";
}else{
while($b = mysql_fetch_array($query))
{
$b['title'] = stripslashes($b['title']);
$b['text'] = stripslashes($b['text']);

if($b['text'] == "{newsite}"){
$bbb = str_replace("{newsite}",block_new_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{oldsite}"){
$bbb = str_replace("{oldsite}",block_old_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{ratesite}"){
$bbb = str_replace("{ratesite}",block_rate_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{countsite}"){
$bbb = str_replace("{countsite}",block_count_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{visitesite}"){
$bbb = str_replace("{visitesite}",block_visite_site(),$b['text']);
tpl_menu($b['title'],$bbb);

}elseif($b['text'] == "{randquran}"){
$bbb = str_replace("{randquran}",rand1(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{randhadeth}"){
$bbb = str_replace("{randhadeth}",rand2(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{randtext}"){
$bbb = str_replace("{randtext}",rand3(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{cat}"){
$bbb = str_replace("{cat}",block_catgory(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{poll}"){
$bbb = str_replace("{poll}",pollindex(),$b['text']);
tpl_menu($b['title'],$bbb);


}else{
tpl_menu($b['title'],$b['text']);
}
}
}
}


function left_blocks()
{
global $htmlorphp;

$queryx = mysql_query("SELECT * FROM dlil_ads where active='1' AND upordown='3' order by orderads");
$xxx = mysql_num_rows($queryx);
if($xxx == 0){
echo "";
}else{
$dd = "<div align='center'>";
$n = 0;
while($bx = mysql_fetch_array($queryx))
{
++$n;

if($n == $xxx){
$br = "";
}else{
$br = "<br /><br />";
}

$bx['title'] = stripslashes($bx['title']);
$bx['image'] = stripslashes($bx['image']);
$bx['url'] = stripslashes($bx['url']);

if($htmlorphp==1){
$sxxx = "ads-".$bx['id'].".html";
}else{
$sxxx = "go.php?id=".$bx['id']."";
}


$dd .= "<a target='_blank' href='$sxxx'><img src='".$bx['image']."' alt='".$bx['title']."' border='0'></a>".$br."";
}
$dd .= "</div>";
tpl_menu("«·≈⁄·«‰« ",$dd);
echo "<br />";
}

$query = mysql_query("SELECT * FROM dlil_blocks where active='1' AND rightorleft='0' order by orderblock");
$xx = mysql_num_rows($query);
if($xx == 0){
echo "";
}else{
while($b = mysql_fetch_array($query))
{

$b['title'] = stripslashes($b['title']);
$b['text'] = stripslashes($b['text']);

if($b['text'] == "{newsite}"){
$bbb = str_replace("{newsite}",block_new_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{oldsite}"){
$bbb = str_replace("{oldsite}",block_old_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{ratesite}"){
$bbb = str_replace("{ratesite}",block_rate_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{countsite}"){
$bbb = str_replace("{countsite}",block_count_site(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{visitesite}"){
$bbb = str_replace("{visitesite}",block_visite_site(),$b['text']);
tpl_menu($b['title'],$bbb);

}elseif($b['text'] == "{randquran}"){
$bbb = str_replace("{randquran}",rand1(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{randhadeth}"){
$bbb = str_replace("{randhadeth}",rand2(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{randtext}"){
$bbb = str_replace("{randtext}",rand3(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{cat}"){
$bbb = str_replace("{cat}",block_catgory(),$b['text']);
tpl_menu($b['title'],$bbb);
}elseif($b['text'] == "{poll}"){
$bbb = str_replace("{poll}",pollindex(),$b['text']);
tpl_menu($b['title'],$bbb);

}else{
tpl_menu($b['title'],$b['text']);
}
}
}
}


// start counter
$Sql = mysql_query("SELECT * FROM dlil_counter");
$num = mysql_num_rows($Sql);
if($num == 0){
$counter = mysql_query ("INSERT INTO dlil_counter (counterdata) VALUES ('1')") or die ("Query failed");
}else{
$counter =  mysql_query ("update dlil_counter set counterdata=counterdata+1") or die ("Query failed");
}
$scon = mysql_fetch_array($Sql);
$counterdata = $scon['counterdata'];
// end counter


// start online

$tttime = time();
$xxtime = time()+3600;

$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
$sqlr = mysql_query("select xtime from dlil_online where xip='$REMOTE_ADDR'");
if (mysql_num_rows($sqlr)==0){
$sqli = mysql_query("insert into dlil_online SET xip='$REMOTE_ADDR', xtime='$xxtime'");
}else{
$sqli = mysql_query("update dlil_online set xtime='$xxtime' where xip='$REMOTE_ADDR'");
}

$sqld = mysql_query("delete from dlil_online where xtime < '$tttime'");

$OnlineUsers = mysql_query("select * from dlil_online");
$onlin = mysql_num_rows($OnlineUsers);

// end online

function site_is_up($site,$port=80){
$port = $port === NULL ? 80 : $port;
$fp = @fsockopen(str_replace('http://','',$site), $port, $errno, $errstr);
if($fp === false){
return false;
}
fclose($fp);
return true;
}
?>