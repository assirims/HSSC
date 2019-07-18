<?php
include("config.php");
include("function.php");
include("templates/template.php");

$text = $_GET['search'];
$text = trim($text);
$text = strip_tags($text);
$text = htmlspecialchars($text);
//$text = mysql_real_escape_string($text);
$text = addslashes($text);
$text = searchreplace($text);

if(isset($text) and !empty($text) and strlen($text)>=3 and strlen($text)<=15)
{

$tx = "ãÍÑß ÇáÈÍË";
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 20;
$startpoint = ($page * $perpage) - $perpage;

$sql = mysql_query("SELECT * FROM `dlil_site` WHERE `title` LIKE '%$text%' OR `url` LIKE '%$text%' order by id desc LIMIT $startpoint,$perpage")or die(mysql_error());
$num = mysql_num_rows($sql);
if($num == 0){
$msg = "<div align='right'><br />
áã íäÌÍ ÈÍËß Úä İí ÅÙåÇÑ ÃíÉ äÊÇÆÌ.
<br /><br />
Åáíß ÈÚÖ ÇáÇŞÊÑÇÍÇÊ áÈÍË ÃßËÑ ÌÏæì:
<br />
- ÊÃßÏ ãä ßÊÇÈÉ ÇáßáãÇÊ ÈÔßá ÕÍíÍ
<br />
- ÍÇæá ßáãÇÊ ãÎÊáİÉ
<br />
- ÌÑÈ ÇÓÊÎÏÇã ßáãÇÊ ÃßËÑ ÔíæÚÇğ
<br />
- ÍÇæá ÇáÊÚÈíÑ Úä ãŞÕÏß ÈßáãÇÊ ÃŞá
<br /><br /></div>";
}else{
$msg = "";
$c = 1;
while ($Row = mysql_fetch_array($sql))
{
$Row[title] = str_replace("$text","<font color='#CC0000'>$text</font>",$Row[title]);

$Row[title] = stripslashes($Row[title]);
//$Row[title] = htmlspecialchars($Row[title]);

if($htmlorphp==1){
$xx = "site-".$Row['id'].".html";
}else{
$xx = "site.php?id=".$Row['id']."";
}


$msg .= "» <a href='$xx'>$Row[title]</a><br>";
$c++;
}


/*
$nm = $text;
$pagesnum = ceil(mysql_num_rows(mysql_query("SELECT * FROM `dlil_site` WHERE `title` LIKE '%$nm%' OR `url` LIKE '%$nm%'")) / $perpage);
if($pagesnum > 1){
$msg .= "<br><div align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "<a href='dosearch.php?search=$text&page=$i'>$i</a>";
} else {
$z = "<u>$i</u>";
}
$msg .= "[$z]";
}
$msg .= "</div><br>";
}
*/
}

}else{
$tx = "ÑÓÇáÉ ÅÏÇÑíÉ";
$msg .= "<div align='right'><br />
áã íäÌÍ ÈÍËß Úä İí ÅÙåÇÑ ÃíÉ äÊÇÆÌ.
<br /><br />
Åáíß ÈÚÖ ÇáÇŞÊÑÇÍÇÊ áÈÍË ÃßËÑ ÌÏæì:
<br />
- áÇ ÊÊÑß ÎÇäÉ ÇáÈÍË ÎÇáíÉ<br />
- ÇáÈÍË áÇ íŞÈá ÃŞá ãä 3 ÃÍÑİ<br />
- ÇáÈÍË áÇ íŞÈá ÃßËÑ ãä 15 ÍÑİ<br />
- ÊÃßÏ ãä ßáãÉ ÇáÈÍË ÈÃä ÊßÊÈåÇ ÈÇáÔßá ÇáÕÍíÍ
<br /><br /></div>";
$msg2 .=  "<div align='right'><br /><br />
áã íäÌÍ ÈÍËß Úä İí ÅÙåÇÑ ÃíÉ äÊÇÆÌ.
<br /><br />
Åáíß ÈÚÖ ÇáÇŞÊÑÇÍÇÊ áÈÍË ÃßËÑ ÌÏæì:
<br />
- áÇ ÊÊÑß ÎÇäÉ ÇáÈÍË ÎÇáíÉ<br />
- ÇáÈÍË áÇ íŞÈá ÃŞá ãä 3 ÃÍÑİ<br />
- ÇáÈÍË áÇ íŞÈá ÃßËÑ ãä 15 ÍÑİ<br />
- ÊÃßÏ ãä ßáãÉ ÇáÈÍË ÈÃä ÊßÊÈåÇ ÈÇáÔßá ÇáÕÍíÍ
<br /><br /></div>";
}


tpl_header("äÊÇÆÌ ÇáÈÍË");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo "<fieldset>
<legend><span class='aa'>$tx</span></legend>";
echo $msg;
echo "</fieldset>";

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>$tx</span></legend>";
echo $msg;
echo "</fieldset></div>";

}
tpl_footer();
?>