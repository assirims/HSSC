<?php
include("config.php");
include("function.php");
include("templates/template.php");

$id = intval($_GET["id"]);
clean_value($id);

$Sql = mysql_query("select * from dlil_site where id='$id' AND active='1'");
$Row = mysql_fetch_array($Sql);
if (!$Row)
{
error();
exit;
}

$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$z = str_replace(" ","_",$Row['title']);
$data = explode("_", $z);
$datac = count($data);
if($data[0] == "„Êﬁ⁄"){
$likename = $data[1];
}else{
$likename = $data[0];
}

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$t = $Row['url'];
$t = str_replace("http://","",$t);
$t = str_replace("http://www.","",$t);
$t = str_replace("http://www","",$t);
$t = str_replace("www.","",$t);
$t = str_replace("www","",$t);
$t = str_replace("/","-",$t);
if(strlen($Row['url']) > 40 ){
$t = substr($t,0,30);
}

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

if($Row['lang']==1){
$lang = "⁄—»Ì";
}else{
$lang = "English";
}

$d = date("j/n/Y",$Row['date']);

if($Row['metadescription'] == ""){
$meta1 = $t;
}else{
$meta1 = $Row['metadescription'];
}

if($Row['metakeywords'] == ""){
$meta2 = $t;
}else{
$meta2 = $Row['metakeywords'];
}

if($Row['metadescription'] == $Row['title']){
$meta1 = $t;
}else{
$meta1 = $Row['metadescription'];
}

if($Row['metakeywords'] == $Row['title']){
$meta2 = $t;
}else{
$meta2 = $Row['metakeywords'];
}

//$img = "<a href='".$Row['url']."' title='".$Row['url']."'><img src='http://open.thumbshots.org/image.pxf?url=".$Row['url']."' border='0' vspace='0' hspace='0' /></a>";
$img = "<a href='".$Row['url']."' title='".$Row['url']."'><img src='http://images.websnapr.com/?url=".$Row['url']."' border='0' /></a>";

$p = "ª ".$Row['title']."<div dir='ltr' align='right'><a target='_blank' class='aa' href='site.php?siteid=".$Row['id']."'>".$Row['url']."</a></div>".$f."";

$sql2 = @mysql_query("update dlil_site set vis=vis+1 where id='$id'") or die ("Query failed4");

$Sqlx = mysql_query("select * from dlil_catgory where id='".$Row['cat']."'");
$Rowx = mysql_fetch_array($Sqlx);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$ratecode = '<a target="_blank" href="'.$pathsite.'/rate-'.$id.'-'.$t.'.html"><img src="'.$pathsite.'/images/ratex.gif" alt="—‘Õ‰« ›Ì '.$name_site.'" border=0></a>';
$sxx = "section-".$Rowx['id'].".html";
}else{
$ratecode = '<a target="_blank" href="'.$pathsite.'/ratecode.php?rate=1&siteid='.$id.'&sitename='.$t.'"><img src="'.$pathsite.'/images/ratex.gif" alt="—‘Õ‰« ›Ì '.$name_site.'" border="0" /></a>';
$sxx = "section.php?id=".$Rowx['id']."";
}

$viewinfo = "<fieldset>
<h2><center><b>".$Row['title']."</b></center></h2><br />
".$Row['metakeywords']."<br /><br /><br />
<center><h3>⁄‰Ê«‰ «·„Êﬁ⁄</h3><P dir=ltr>".$Row['metadescription']."</P></center><br /><br />

ª ⁄‰Ê«‰ «·„Êﬁ⁄ ⁄·Ï «·«‰ —‰  : ".$Row['url']."<br /><br />

ª «·ﬁ”„ «·Œ«’ »«·„Êﬁ⁄ : <a class='aa' href='$sxx'>".$Rowx['title']."</a><br /><br />
ª “Ì«—«  «·„Êﬁ⁄ : ".$Row['vis']."<br /><br />
</fieldset>

<!--
<fieldset>
<span class='aa'>Ê’› «·„Êﬁ⁄</span>
".$Row['metadescription']."<br />
".$Row['metakeywords']."<br />
</fieldset>
--><br /><br />
<fieldset>
<span class='aa'> ﬁÌÌ„ ".$Row['title']."</span><br /><br />
<form name='vbform' method='POST' action='rate.php' style='margin-top: 0; margin-bottom: 0'>
<input type='hidden' name='id' value='$id'>
ª «· ﬁÌÌ„ ".$Row['rate']." «·√’Ê«  ".$Row['count']." ‘Œ’ <select class='addselect' size='1' name='rate'>
  <option value='1' selected>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>

</select> <input type='submit' value='  ﬁÌÌ„ ' name='B1' />
</form>
</fieldset>


<!--
<fieldset>
<legend><span class='aa'>’Ê—… «·„Êﬁ⁄</span></legend>
$img
</fieldset>
-->
"
;


function likesite($name) {
global  $htmlorphp,$limitlikesite,$id;

$Sql = mysql_query("SELECT id,title,url,cat,vis FROM dlil_site where BINARY title LIKE '%$name%' AND active=1 AND id != '$id' order by id desc limit $limitlikesite");
$numberx = mysql_num_rows($Sql);
if($numberx == 0){
$s = "<div class='divmessage'>·«ÌÊÃœ „Ê«ﬁ⁄ „‘«»ÂÂ</div>";
}else{

$s = "<div class='widgetblock'>
<ul>";
while ($Row = @mysql_fetch_array($Sql))
{
$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['url'] = stripslashes($Row['url']);
$Row['url'] = htmlspecialchars($Row['url']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$Row['cat']."'");
$Rowx = @mysql_fetch_array($queryxc);
$Rowx['title'] = stripslashes($Rowx['title']);
$Rowx['title'] = htmlspecialchars($Rowx['title']);

if($htmlorphp==1){
$sxx = "section-".$Rowx['id'].".html";
}else{
$sxx = "section.php?id=".$Rowx['id']."";
}

if($htmlorphp==1){
$s .= "<li><a href='site-".$Row['id'].".html'>".$Row['title']."</a> [<a class='aa' href='$sxx'>".$Rowx['title']."</a>]</li>";
}else{
$s .= "<li><a href='site.php?id=".$Row['id']."'>".$Row['title']."</a> [<a class='aa' href='$sxx'>".$Rowx['title']."</a>]</li>";
}

}

$s .= "</ul>";
}

return $s;
}


tpl_header($Row['title']);

echo "<div class='sitew'>";






if($showblocks == 1){
echo "<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo $viewinfo;
if($showlikesite==1){
echo "<br />
<fieldset>
<legend><span class='aa'>„Ê«ﬁ⁄ „‘«»ÂÂ</span></legend>
".likesite($likename)."
</fieldset>";
}
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table>";

}else{

echo $viewinfo;

if($showlikesite==1){
echo "<fieldset>
<legend><span class='aa'>„Ê«ﬁ⁄ „‘«»ÂÂ</span></legend>
".likesite($likename)."
</fieldset>";
}

}

echo "</div>";

tpl_footer();
?>