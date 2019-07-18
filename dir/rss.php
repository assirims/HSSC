<?php
include("config.php");
include("function.php");

header ('Content-type: text/xml');

$dat = date("j/n/Y",time());

echo "<?xml version=\"1.0\" encoding=\"windows-1256\"?>\n";
echo "<rss version=\"2.0\">\n";
echo "<channel>\n";

echo "<title>".$name_site." RSS</title>\n";
echo "<link>".$pathsite."</link>\n";
echo "<description>ÌÏíÏ ÇáãæÇÞÚ</description>\n";
echo "<generator>".$meta1."</generator>\n";
echo "<date>".$dat."</date>\n";

$result = mysql_query("SELECT id,title,url,metadescription,cat,vis,rate,count,date FROM dlil_site where active=1 order by id desc limit 0,10");
while ($Row = mysql_fetch_assoc($result))
{  //loooooooop
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$d = date("j/n/Y",$Row['date']);

if($htmlorphp==1){
$s = "site-".$Row['id'].".html";
}else{
$s = "site.php?id=".$Row['id']."";
}

echo"<item>\n";
echo "<title>".$Row['title']."</title>\n";
echo "<link>".$s."</link>\n";
echo "<description>".$Row['metadescription']."</description>\n";
//echo "<keywords>".$Row['metakeywords']."</keywords>\n";
echo "<date>".$d."</date>\n";
echo"</item>\n";
}

echo "</channel>\n ";
echo"</rss>";
?>