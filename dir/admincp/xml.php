<?php
include('header.php');
$query = mysql_query("SELECT id,htmlorphp,namesite,urlsite,pathsite FROM dlil_options where id='1'");
$rows = mysql_fetch_array($query);
$name_site = stripslashes($rows['namesite']);
$name_url = stripslashes($rows['urlsite']);
$pathsite = stripslashes($rows['pathsite']);
$htmlorphp = $rows['htmlorphp'];

$action = $_GET['x'];
if(!isset($action)) $action = "code";

IF ($action=="save"){

header("Expires: Mon, 1 Jan 1996 01:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=\"sites.xml\"");

echo "<?xml version=\"1.0\" encoding=\"windows-1256\"?>\n";
echo "<urlset
      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

echo "<url>\n";
echo "<loc>".$name_url."</loc>\n";
echo "<priority>0.8</priority>\n";
echo "<lastmod>".date("c")."</lastmod>\n";
echo "<changefreq>daily</changefreq>\n";
echo "</url>\n";

$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc");
while($Row = @mysql_fetch_array($sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

if($htmlorphp==1){
$s = "".$pathsite."/site-".$Row['id'].".html";
}else{
$s = "".$pathsite."/site.php?id=".$Row['id']."";
}

echo "<url>\n";
echo "<loc>".$s."</loc>\n";
echo "<priority>1.00</priority>\n";
echo "<changefreq>never</changefreq>\n";
echo "</url>\n";
}

echo "</urlset>\n";

exit;

}ELSEIF ($action=="code"){

echo $h;

if(isset($_GET['xcat'])){

$codex = "<?xml version=\"1.0\" encoding=\"windows-1256\"?>\n";
$codex .= "<urlset
      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

$codex .= "<url>\n";
$codex .= "<loc>".$name_url."</loc>\n";
$codex .= "<priority>0.8</priority>\n";
$codex .= "<lastmod>".date("c")."</lastmod>\n";
$codex .= "<changefreq>daily</changefreq>\n";
$codex .= "</url>\n";

if(isset($_GET['num']) AND isset($_GET['xcat'])){
$number = intval($_GET['num']);
$cat = intval($_GET['xcat']);

if($cat==0 AND $number==0){
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc");
}elseif($cat==0 AND $number !=0){
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc limit $number");
}elseif($cat !=0 AND $number==0){
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 AND cat='$cat' order by id desc");
}elseif($cat !=0 AND $number !=0){
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 AND cat='$cat' order by id desc limit $number");
}elseif($cat=="" AND $number==""){
$number=0;
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc");
}else{
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc");
}

}else{
$sql = @mysql_query("SELECT id,title,url FROM dlil_site where active=1 order by id desc");
}
while($Row = @mysql_fetch_array($sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

if($htmlorphp==1){
$s = "".$pathsite."/site-".$Row['id'].".html";
}else{
$s = "".$pathsite."/site.php?id=".$Row['id']."";
}

$codex .= "<url>\n";
$codex .= "<loc>".$s."</loc>\n";
$codex .= "<priority>1.00</priority>\n";
$codex .= "<changefreq>never</changefreq>\n";
$codex .= "</url>\n";
}
$codex .= "</urlset>\n";

}else{
$codex = "ÍÏÏ ÇáŞÓã ÇáĞí ÊÑíÏ ÇÙåÇÑ ÇáßæÏ ÇáÎÇÕ Èå æÖÚ ÇáÑŞã ÕİÑ Çä ßäÊ ÊÑíÏ ÚÑÖ ÌãíÚ ÇáãæÇŞÚ æÇä ßäÊ ÊÑíÏ ÊÍÏíÏ ÚÏÏ ãÚíä ááãæŞÚ ÖÚ ÇáÑŞã ÇáĞí íäÇÓÈß æÇä ÊÑíÏ ÚÑÖ ÌãíÚ ÇáãæÇŞÚ Ïæä ÇÓÊËäÇÁ ÇÎÊÑ ÇáÎíÇÑ ÌãíÚ ÇáãæÇŞÚ æÇÖÛØ ÊÍÏíË ÓíÊã ÚÑÖ ÇáßæÏ ßÇãáÇ";
}

echo "<form name='vbform2' method='GET' action=''>
<input name='x' type='hidden' value='code' />
<div align='center'>» ÊÍÏíÏ ŞÓã ãÚíä ";
$queryv = mysql_query("SELECT * FROM dlil_catgory order by id desc");
echo "<select size='1' name='xcat'>
<OPTION value='0'>ÌãíÚ ÇáÃŞÓÇã</OPTION>";
while($cat = mysql_fetch_array($queryv))
{
if(isset($_GET['xcat']) AND $_GET['xcat'] == $cat['id']){
echo "<OPTION value='$cat[id]' selected>$cat[title]</OPTION>";
}else{
echo "<OPTION value='$cat[id]'>$cat[title]</OPTION>";
}
}
echo "</select> ";
echo " » ÚÏÏ ÇáãæÇŞÚ <input name='num' type='text' value='$number' size=10 /> <input class='addsubmit' type='submit' value=' ÊÍÏíË ' /></div>
</form>";

echo "<table class='xtable' width='100%' id='AutoNumber415'>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'>ßæÏ xml áÅäÔÇÁ ÎÑíØå ááÏáíá</td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtd'>
<textarea dir='ltr' name='metadescription' rows=30 cols=90>".$codex."</textarea>
</td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'>ÇäÓÎ ÇáßæÏ ßÇãáÇ æÖÚå İí ãáİ xml</td>
</tr>

</table>";
}

echo $f;
?>