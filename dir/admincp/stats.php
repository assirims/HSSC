<?php
include('header.php');

$q1 = mysql_query("SELECT id FROM dlil_site where active=1");
$xx1 = mysql_num_rows($q1);

$q2 = mysql_query("SELECT id FROM dlil_site where active=0");
$xx2 = mysql_num_rows($q2);

$OnlineUsers = mysql_query("select * from dlil_online");
$online = mysql_num_rows($OnlineUsers);

$Sql = mysql_query("SELECT * FROM dlil_counter");
$scon = mysql_fetch_array($Sql);
$counterdata = $scon['counterdata'];

echo $h;

echo "<div align='center'>ÇáÓáÇã Úáíßã íÇ <a href='admininfo.php'>$u</a> - ÚÏÏ ÇáãæÇŞÚ ÇáãİÚáå <a href='add_cp.php?action=add'>$xx1</a> - ÚÏÏ ÇáãæÇŞÚ ÇÊí ÊÍÊÇÌ ÊİÚíá <a href='add_cp.php?action=act'>$xx2</a> - ÚÏÏ ÇáÒæÇÑ $counterdata - ÇáãÊæÇÌÏæä ÍÇáíÇ $online<br><br></div>";

if($_GET["s"] == 1){
$hh = "checked";
}elseif($_GET["s"] == 0){
$hh = "";
}else{
$hh = "";
}

function country($char)
{
if($char=="sa"){
$name = "ÇáÓÚæÏíÉ";
}elseif($char=="kw"){
$name = "ÇáßæíÊ";
}elseif($char=="ae"){
$name = "ÇáÅãÇÑÇÊ";
}elseif($char=="bh"){
$name = "ÇáÈÍÑíä";
}elseif($char=="om"){
$name = "ÚãÇä";
}elseif($char=="qa"){
$name = "ŞØÑ";
}elseif($char=="jo"){
$name = "ÇáÃÑÏä";
}elseif($char=="so"){
$name = "ÇáÕæãÇá";
}elseif($char=="sd"){
$name = "ÇáÓæÏÇä";
}elseif($char=="iq"){
$name = "ÇáÚÑÇŞ";
}elseif($char=="ma"){
$name = "ÇáãÛÑÈ";
}elseif($char=="ye"){
$name = "Çáíãä";
}elseif($char=="km"){
$name = "ÇáŞãÑ";
}elseif($char=="dj"){
$name = "ÌíÈæÊí";
}elseif($char=="lb"){
$name = "áÈäÇä";
}elseif($char=="ps"){
$name = "İáÓØíä";
}elseif($char=="sy"){
$name = "ÓæÑí";
}elseif($char=="eg"){
$name = "ãÕÑ";
}elseif($char=="dz"){
$name = "ÇáÌÒÇÆÑ";
}elseif($char=="tn"){
$name = "ÊæäÓ";
}elseif($char=="ly"){
$name = "áíÈí";
}elseif($char=="mr"){
$name = "ãæÑíÊÇäí";
}elseif($char=="ot"){
$name = "ÏæáÉ ÃÎÑì";
}else{
$name = "ÛíÑ ãÚÑæİ";
}
return $name;
}

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 30;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_site where active='0' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>áÇíæÌÏ ãæÇŞÚ ááÊİÚíá ÍÇáíÇ</div>";
}else{
echo "<form name='xxx' action='add_cp.php?action=op' method='post'>

<table class='xtable' width='100%' id='AutoN4umber15'>

<tr>
<td colspan='8' align='center' class='xtt'>ãæÇŞÚ ÊÍÊÇÌ ááÊİÚíá</td>
</tr>

<tr>
                <td align='center' width='2%' class='xtr'>#</td>
                <td align='center' width='40%' class='xtr'>ÅÓã ÇáãæŞÚ</td>
                <td align='center' width='20%' class='xtr'>æÕİ ÇáãíÊÇ</td>
                <td align='center' width='10%' class='xtr'>ÇáÏæáå</td>
                <td width='15%' align='center' class='xtr'>ÇáŞÓã</td>
                <td width='13%' align='center' class='xtr'>ÇáÊÇÑíÎ</td>
                <td width='5%' align='center' class='xtr'>ÊÚÏíá</td>
                <td width='5%' align='center' class='xtr'>ÍĞİ</td>
</tr>";

$i = 0;
while($p = mysql_fetch_array($queryx))
{
$i++;

$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

$p['url'] = stripslashes($p['url']);
$p['url'] = htmlspecialchars($p['url']);

$p['metadescription'] = stripslashes($p['metadescription']);
$p['metadescription'] = htmlspecialchars($p['metadescription']);

$p['metakeywords'] = stripslashes($p['metakeywords']);
$p['metakeywords'] = htmlspecialchars($p['metakeywords']);

$p['country'] = stripslashes($p['country']);
$p['country'] = htmlspecialchars($p['country']);

$p['yourname'] = stripslashes($p['yourname']);
$p['yourname'] = htmlspecialchars($p['yourname']);

$p['yourmail'] = stripslashes($p['yourmail']);
$p['yourmail'] = htmlspecialchars($p['yourmail']);


$d = date("j/n/Y",$p['date']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$p['cat']."'");
$pc = mysql_fetch_array($queryxc);
$pc['title'] = stripslashes($pc['title']);
$pc['title'] = htmlspecialchars($pc['title']);

echo "<tr>
                <td align='center' width='2%' class='xtr'><input ".$hh." type='checkbox' name='del[$i]' value='".$p['id']."' /></td>
                <td width='40%' class='xtd'>".$p['title']."<div align='left'><a target='_blank' class='aa' href='".$p['url']."'>".$p['url']."</a></div></td>
                <td width='20%' class='xtd'>".$p['metadescription']."<br>".$p['metakeywords']."</td>
                <td align='center' width='10%' class='xtd'>".country($p['country'])."</td>
                <td width='15%' align='center' class='xtd'>".$pc['title']."</td>
                <td width='13%' align='center' class='xtd'>$d</td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=edit&id=".$p['id']."'><img border='0' src='images/edit.gif' alt='ÊÚÏíá ".$p['title']."' /></a></td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=delete&id=".$p['id']."'><img border='0' src='images/delete.gif' alt='ÍĞİ ".$p['title']."' /></a></td>
</tr>";
}
echo "<tr>
<td colspan='8' align='center' class='xtr'><input class='addsubmit' name='activ' type='submit' value=' ÊİÚíá ÇáãæÇŞÚ ' /> <input name='delete' type='submit' id='delete' value=' ÍĞİ ÇáãæÇŞÚ ' class='addsubmit' /> <input name='edit' type='submit' class='addsubmit' value=' ÊÚÏíá ÇáãæÇŞÚ ' /><br />
<a href='add_cp.php?action=act&s=1'>ÊÍÏíÏ Çáßá</a> - <a href='add_cp.php?action=act&s=0'>ÅáÛÇÁ Çáßá</a></td>
</tr>
</table>

<br />
</form>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_site where active='0'")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='add_cp.php?action=act&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p><br />";
}
}

echo $f;
?>