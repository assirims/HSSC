<?php
include("config.php");
include("function.php");
include("templates/template.php");

$id = intval($_GET["id"]);
clean_value($id);

$Sql = mysql_query("select * from dlil_catgory where id='$id' AND active=1");
$Row = mysql_fetch_array($Sql);
if (!$Row)
{
error();
exit;
}

$Row['title'] = htmlspecialchars($Row['title']);
$Row['title'] = stripslashes($Row['title']);
$nnn = $Row['title'];

if($Row['metadescription'] == ""){
$meta1 = $Row['title'];
}else{
$meta1 = $Row['metadescription'];
}

if($Row['metakeywords'] == ""){
$meta2 = $Row['title'];
}else{
$meta2 = $Row['metakeywords'];
}

tpl_header($Row['title']);

if($showblocks == 1){
echo "<div class='sitew'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo sections();
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

echo "<div class='sectionw'>".sections()."</div>";

}

tpl_footer();
?>