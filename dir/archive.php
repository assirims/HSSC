<?php
include("config.php");
include("function.php");
include("templates/template.php");

$Sql = mysql_query("select id,title,date,vis from dlil_article where active='1' order by id desc");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$ssss = "<div class='divmessage'>·«ÌÊÃœ „ﬁ«·«  Õ«·Ì«</div>";
}else{
$ssss = "<fieldset>
<legend><span class='aa'>√—‘Ì› «·„ﬁ«·« </span></legend>
 <div class='widgetblock'>
<ul>";
while($Row = mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$d = date("j/n/Y",$Row['date']);

if($htmlorphp==1){
$s = "article-".$Row['id'].".html";
}else{
$s = "article.php?id=".$Row['id']."";
}

$ssss .= "<li><a href='$s'>".$Row['title']."</a> [".$Row['vis']."]</li>";

}
$ssss .= "</ul></div></fieldset>";
}

tpl_header("√—‘Ì› «·„ﬁ«·« ");


if($showblocks == 1){

echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumb5er10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo $ssss;

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

echo "<div class='indexw'>";

echo $ssss;

echo "</div>";

}

tpl_footer();
?>