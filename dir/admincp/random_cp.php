<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add1";

IF ($action=="add1"){
?>
<form name="vbform" method="post" action="random_cp.php?action=insert1">

<table class='xtable' width="100%" id="AutoNumber1">

<tr>
<td width="100%" colspan="2" class='xtt' align="center">≈÷«›… ›Ê«∆œ ﬁ—¬‰ÌÂ</td>
</tr>

<tr>
<td width="30%" class='xtr'>ª «·‰’ :</td>
<td width="70%" class='xtd'><textarea name="text" rows=5 cols=80></textarea></td>
</tr>

<tr>
<td width="100%" colspan="2" class='xtr' align="center">
<input type="submit" value=" ≈÷«›… " name="cmdAdd" class='addsubmit' /></td>
</tr>

</table>
</form>


<?php
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 10;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_rand1 order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "&nbsp;<br />
<table class='xtable' width='100%' id='AutoNumber15'>
  <tr>
<td width='100%' colspan='4' class='xtx' align='center'>⁄—÷ Ã„Ì⁄ «·»Ì«‰« </td>
</tr>
  <tr>
      <td width='79%' align='center' class='xtr'>«·‰’</td>
      <td width='7%' align='center' class='xtr'> ›⁄Ì·</td>
      <td width='7%' align='center' class='xtr'> ⁄œÌ·</td>
      <td width='7%' align='center' class='xtr'>Õ–›</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

if(strlen($p['text']) > 100 ){
$text = substr($p['text'],0,99);
$name = "$text ...";
}else{
$name = $p['text'];
}

if($p['active'] == 1){
$im = "images/on.gif";
$li = "random_cp.php?action=act1&id=$p[id]&act=0";
$te = "≈÷€ÿ Â‰« ··ÕÃ»";
}else{
$im = "images/off.gif";
$li = "random_cp.php?action=act1&id=$p[id]&act=1";
$te = "≈÷€ÿ Â‰« ·· ›⁄Ì·";
}

echo "<tr>
      <td width='79%' class='xtd'>ª ".$name."</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=edit1&id=$p[id]'><img border='0' src='images/edit.gif' alt=' ⁄œÌ· ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=delete1&id=$p[id]'><img border='0' src='images/delete.gif' alt='Õ–› ".$name."' /></a></td>
    </tr>";
}
echo "</table>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_rand1")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='random_cp.php?action=add1&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}

}ELSEIF ($action=="insert1"){

$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{


$Sql2 = mysql_query("SELECT * FROM dlil_rand1 where text='$text'");
$numbers = mysql_num_rows($Sql2);
if($numbers==0){
$query =  mysql_query ("INSERT INTO dlil_rand1 (text,active) VALUES ('$text','1')") or die ("≈” ⁄·«„ Œ«ÿÌ¡");
print "<p align=center> „  ≈÷«›… «·‰’ »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=random_cp.php?action=add1' />";
}else{
echo " „ ≈œ«—Ã «·‰’ <b>$text</b> „”»ﬁ« . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a>";
}
}


}ELSEIF ($action=="edit1"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_rand1 where id='$id'");
$p= mysql_fetch_array($query);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

echo "<form name='vbform' method='POST' action='random_cp.php?action=edit1ok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'> ⁄œÌ· «·»Ì«‰« </td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·‰’ :</td>
<td width='70%' class='xtd'><textarea name='text' rows=5 cols=80>".$p['text']."</textarea></td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' Õ›Ÿ ' name='B1'></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="edit1ok"){

$id    = intval($_POST['id']);
$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_rand1 SET text='$text' where id='$id'");
echo "<p align=center> „ «· ⁄œÌ· »‰Ã«Õ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add1' />";
}

}ELSEIF ($action=="delete1"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_rand1 WHERE id='$id'");
echo "<p align=center> „ Õ–› «·‰’</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add1' />";


}ELSEIF ($action=="act1"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_rand1 SET active='$act' where id='$id'");
echo "<p align=center> „ ÕÃ» «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add1' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_rand1 SET active='$act' where id='$id'");
echo "<p align=center> „  ›⁄Ì· «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add1' />";
}else{
echo "<p align=center>Œÿ√ .... Ì „ «· ÊÃÌÂ «· ·ﬁ«∆Ì</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add1' />";
}



}ELSEIF ($action=="add2"){
?>

<form name="vbform" method="post" action="random_cp.php?action=insert2">

<table class='xtable' width="100%" id="AutoNumber1">

<tr>
<td width="100%" colspan="2" class='xtt' align="center">≈÷«›… √Õ«œÌÀ ‰»ÊÌÂ</td>
</tr>

<tr>
<td width="30%" class='xtr'>ª «·‰’ :</td>
<td width="70%" class='xtd'><textarea name="text" rows=5 cols=80></textarea></td>
</tr>

<tr>
<td width="100%" colspan="2" class='xtr' align="center">
<input type="submit" value=" ≈÷«›… " class='addsubmit' name="cmdAdd"></td>
</tr>

</table>
</form>

<?php
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 10;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_rand2 order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "<br />&nbsp;<table class='xtable' width='100%' id='AutoNumber15'>
  <tr>
<td width='100%' colspan='4' class='xtx' align='center'>⁄—÷ Ã„Ì⁄ «·»Ì«‰« </td>
</tr>
  <tr>
      <td width='79%' align='center' class='xtr'>«·‰’</td>
      <td width='7%' align='center' class='xtr'> ›⁄Ì·</td>
      <td width='7%' align='center' class='xtr'> ⁄œÌ·</td>
      <td width='7%' align='center' class='xtr'>Õ–›</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

if(strlen($p['text']) > 100 ){
$text = substr($p['text'],0,99);
$name = "$text ...";
}else{
$name = $p['text'];
}

if($p['active'] == 1){
$im = "images/on.gif";
$li = "random_cp.php?action=act2&id=$p[id]&act=0";
$te = "≈÷€ÿ Â‰« ··ÕÃ»";
}else{
$im = "images/off.gif";
$li = "random_cp.php?action=act2&id=$p[id]&act=1";
$te = "≈÷€ÿ Â‰« ·· ›⁄Ì·";
}

echo "<tr>
      <td width='79%' class='xtd'>ª ".$name."</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=edit2&id=$p[id]'><img border='0' src='images/edit.gif' alt=' ⁄œÌ· ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=delete2&id=$p[id]'><img border='0' src='images/delete.gif' alt='Õ–› ".$name."' /></a></td>
    </tr>";
}
echo "</table>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_rand2")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='random_cp.php?action=add2&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}

}ELSEIF ($action=="insert2"){

$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{


$Sql2 = mysql_query("SELECT * FROM dlil_rand2 where text='$text'");
$numbers = mysql_num_rows($Sql2);
if($numbers==0){
$query =  mysql_query ("INSERT INTO dlil_rand2 (text,active) VALUES ('$text','1')") or die ("≈” ⁄·«„ Œ«ÿÌ¡");
print "<p align=center> „  ≈÷«›… «·‰’ »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=random_cp.php?action=add2' />";
}else{
echo " „ ≈œ«—Ã «·‰’ <b>$text</b> „”»ﬁ« . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a>";
}
}


}ELSEIF ($action=="edit2"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_rand2 where id='$id'");
$p= mysql_fetch_array($query);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

echo "<form name='vbform' method='POST' action='random_cp.php?action=edit2ok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumber145'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'> ⁄œÌ· «·»Ì«‰« </td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·‰’ :</td>
<td width='70%' class='xtd'><textarea name='text' rows=5 cols=80>".$p['text']."</textarea></td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' class='addsubmit' value=' Õ›Ÿ ' name='B1' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="edit2ok"){

$id    = intval($_POST['id']);
$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_rand2 SET text='$text' where id='$id'");
echo "<p align=center> „ «· ⁄œÌ· »‰Ã«Õ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add2' />";
}

}ELSEIF ($action=="delete2"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_rand2 WHERE id='$id'");
echo "<p align=center> „ Õ–› «·‰’</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add2' />";


}ELSEIF ($action=="act2"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_rand2 SET active='$act' where id='$id'");
echo "<p align=center> „ ÕÃ» «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add2' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_rand2 SET active='$act' where id='$id'");
echo "<p align=center> „  ›⁄Ì· «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add2' />";
}else{
echo "<p align=center>Œÿ√ .... Ì „ «· ÊÃÌÂ «· ·ﬁ«∆Ì</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add2' />";
}


}ELSEIF ($action=="add3"){
?>
<form name="vbform" method="post" action="random_cp.php?action=insert3">
<table class='xtable' width="100%" id="AutoNumber521">

<tr>
<td width="100%" colspan="2" class='xtt' align="center">≈÷«›… Õﬂ„ Ê√„À«·</td>
</tr>

<tr>
<td width="30%" class='xtr'>ª «·‰’ :</td>
<td width="70%" class='xtd'><textarea name="text" rows=5 cols=80></textarea></td>
</tr>

<tr>
<td width="100%" colspan="2" class='xtr' align="center">
<input type="submit" value=" ≈÷«›… " name="cmdAdd" class='addsubmit'></td>
</tr>

</table>
</form>

<?php
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 10;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_rand3 order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "<br />&nbsp;
<table class='xtable' width='100%' id='AutoNumbe4r15'>
  <tr>
<td width='100%' colspan='4' class='xtx' align='center'>⁄—÷ Ã„Ì⁄ «·»Ì«‰« </td>
</tr>
  <tr>
      <td width='79%' align='center' class='xtr'>«·‰’</td>
      <td width='7%' align='center' class='xtr'> ›⁄Ì·</td>
      <td width='7%' align='center' class='xtr'> ⁄œÌ·</td>
      <td width='7%' align='center' class='xtr'>Õ–›</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

if(strlen($p['text']) > 100 ){
$text = substr($p['text'],0,99);
$name = "$text ...";
}else{
$name = $p['text'];
}

if($p['active'] == 1){
$im = "images/on.gif";
$li = "random_cp.php?action=act3&id=$p[id]&act=0";
$te = "≈÷€ÿ Â‰« ··ÕÃ»";
}else{
$im = "images/off.gif";
$li = "random_cp.php?action=act3&id=$p[id]&act=1";
$te = "≈÷€ÿ Â‰« ·· ›⁄Ì·";
}

echo "<tr>
      <td width='79%' class='xtd'>ª ".$name."</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=edit3&id=$p[id]'><img border='0' src='images/edit.gif' alt=' ⁄œÌ· ".$name."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='random_cp.php?action=delete3&id=$p[id]'><img border='0' src='images/delete.gif' alt='Õ–› ".$name."' /></a></td>
    </tr>";
}
echo "</table>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_rand3")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='random_cp.php?action=add3&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}

}ELSEIF ($action=="insert3"){

$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{


$Sql2 = mysql_query("SELECT * FROM dlil_rand3 where text='$text'");
$numbers = mysql_num_rows($Sql2);
if($numbers==0){
$query =  mysql_query ("INSERT INTO dlil_rand3 (text,active) VALUES ('$text','1')") or die ("≈” ⁄·«„ Œ«ÿÌ¡");
print "<p align=center> „  ≈÷«›… «·‰’ »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=random_cp.php?action=add3' />";
}else{
echo " „ ≈œ«—Ã «·‰’ <b>$text</b> „”»ﬁ« . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a>";
}
}


}ELSEIF ($action=="edit3"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_rand3 where id='$id'");
$p= mysql_fetch_array($query);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

echo"<form name='vbform' method='POST' action='random_cp.php?action=edit3ok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumber15' dir='rtl'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'> ⁄œÌ· «·»Ì«‰« </td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·‰’ :</td>
<td width='70%' class='xtd'><textarea name='text' rows=5 cols=80>".$p['text']."</textarea></td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' value=' Õ›Ÿ ' name='B1' class='addsubmit' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="edit3ok"){

$id    = intval($_POST['id']);
$text = addslashes($_POST['text']);
$text = trim($text);

if (empty($text)){
echo "<p align=center>·„  ﬂ » «·‰’ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_rand3 SET text='$text' where id='$id'");
echo"<p align=center> „ «· ⁄œÌ· »‰Ã«Õ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add3' />";
}

}ELSEIF ($action=="delete3"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_rand3 WHERE id='$id'");
echo"<p align=center> „ Õ–› «·‰’</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add3' />";


}ELSEIF ($action=="act3"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_rand3 SET active='$act' where id='$id'");
echo "<p align=center> „ ÕÃ» «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add3' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_rand3 SET active='$act' where id='$id'");
echo "<p align=center> „  ›⁄Ì· «·‰’ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add3' />";
}else{
echo "<p align=center>Œÿ√ .... Ì „ «· ÊÃÌÂ «· ·ﬁ«∆Ì</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=random_cp.php?action=add3' />";
}
}

echo $f;
?>