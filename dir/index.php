<?php
include("config.php");
include("function.php");
include("templates/template.php");


$q1 = mysql_query("SELECT id FROM dlil_site where active=1");
$xx1 = mysql_num_rows($q1);

$q2 = mysql_query("SELECT id FROM dlil_site where active=0");
$xx2 = mysql_num_rows($q2);

$action = $_GET['action'];
if(!isset($action)) $action = "home";

IF ($action=="home"){

if($htmlorphp==1){
$c = "show-site.html";
$cc = "show-section.html";
$ccc = "add-site.html";
}else{
$c = "index.php?X=1";
$cc = "index.php?X=2";
$ccc = "add.php";
}

tpl_header("$name_site");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

/* echo "<fieldset>
<legend><span class='aa'>ØÑíŞÉ ÇáÚÑÖ</span></legend>
<div align='center'><a href='$c'>ÚÑÖ ÇáãæÇŞÚ</a> - <a href='$cc'>ÚÑÖ ÇáÃŞÓÇã</a> - <a href='$ccc'>ÃÖİ ãæŞÚß</a></div>
</fieldset>"; */

if($showrticles==1){
echo "<br />";
echo "<fieldset>
<legend><span class='aa'>ÃÍÏË ÇáãŞÇáÇÊ</span></legend>
".articles()."
</fieldset>";
}

if($showrandsiteinindex==1){
echo "<br />";
echo "<fieldset>
<legend><span class='aa'>ãæŞÚ ÚÔæÇÆí</span></legend>
".block_randsite()."
</fieldset>";
}

/*
echo "<fieldset>
<legend><span class='aa'>ÃÍÏË ÇáãæÇŞÚ</span></legend>
<div align='right'>".block_new_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>ÃßËÑ ÇáãæÇŞÚ ÒíÇÑÉ</span></legend>
<div align='right'>".block_visite_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>ÃßËÑ ÇáãæÇŞÚ ÊŞííãÇ</span></legend>
<div align='right'>".block_rate_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>ÃßËÑ ÇáãæÇŞÚ ãä ÍíË ÇáãÕæÊíä</span></legend>
<div align='right'>".block_count_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>ÃŞÏã ÇáãæÇŞÚ</span></legend>
<div align='right'>".block_old_site()."</div>
</fieldset>";
*/
echo "<br />";

$x = intval($_GET["X"]);
if($x == 1){
echo catgory1();
}elseif($x == 2){
echo catgory2();
}else{
echo catgory2();
}

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{


echo "<div class='indexw'>";
/* echo "<fieldset>
<legend><span class='aa'>ØÑíŞÉ ÇáÚÑÖ</span></legend>
<div align='center'><a href='$c'>ÚÑÖ ÇáãæÇŞÚ</a> - <a href='$cc'>ÚÑÖ ÇáÃŞÓÇã</a> - <a href='$ccc'>ÃÖİ ãæŞÚß</a></div>
</fieldset>"; */

if($showrticles==1){
echo "<br />";
echo "<fieldset>
<legend><span class='aa'>ÃÍÏË ÇáãŞÇáÇÊ</span></legend>
".articles()."
</fieldset>";
}

if($showrandsiteinindex==1){
echo "<br />";
echo "<fieldset>
<legend><span class='aa'>ãæŞÚ ÚÔæÇÆí</span></legend>
".block_randsite()."
</fieldset>";
}

$x = intval($_GET["X"]);
if($x == 1){
echo catgory1();
}elseif($x == 2){
echo catgory2();
}else{
echo catgory2();
}
echo "</div>";
}
echo "<br /><br /><br /><div align='center'>ÚÏÇÏ ÇáÒæÇÑ $counterdata æÇáãÊæÇÌÏæä ÍÇáíÇ $onlin æÚÏÏ ÇáãæÇŞÚ $xx1 æÚÏÏ ÇáãæÇŞÚ ÇáÊí ÊäÊÙÑ ÇáÊİÚíá $xx2</div>
<br /><br />";

tpl_footer();

}
?>