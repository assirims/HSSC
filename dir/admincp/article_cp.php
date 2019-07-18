<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){
?>
<form name="vbform" method="post" action="article_cp.php?action=insert">

<table class='xtable' width="100%" id="AutoNumber1">
<tr>
      <td width="100%" colspan="2" class='xtt' align="center">«· Õﬂ„ »«·„ﬁ«·« </td>
</tr>

<tr>
<td width="30%" class='xtr'>ª «·⁄‰Ê«‰ :</td>
<td width="70%" class='xtd'><input name="title" type="text" size="60" /></td>
</tr>

<tr>
<td width="30%" class='xtr'>ª Ê’› «·„ﬁ«· :</td>
<td width="70%" class='xtd'><input name="metadescription" type="text" size="60" /></td>
</tr>

<tr>
<td width="30%" class='xtr'>ª ﬂ·„«  „› «ÕÌÂ :</td>
<td width="70%" class='xtd'><input name="metakeywords" type="text" size="60" /></td>
</tr>

<tr>
<td width="100%" class='xtd' colspan="2" align="center"><textarea id="textarea1" name="text" rows=10 cols=60></textarea>
</td>
</tr>

<tr>
<td width="100%" colspan="2" class='xtr' align="center">
<input type="submit" value=" ≈÷«›… " class='addsubmit' name="cmdAdd" /></td>
</tr>

</table>
</form>

<?php

$queryx = mysql_query("SELECT id,title,vis,active,date FROM dlil_article order by id desc");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "&nbsp;<br />
<table class='xtable' width='100%' id='AutoNumber155'>
  <tr>
<td width='100%' colspan='7' class='xtx' align='center'>⁄—÷ Ã„Ì⁄ «·„ﬁ«·« </td>
</tr>
  <tr>
      <td width='55%' align='center' class='xtr'>«·⁄‰Ê«‰</td>
      <td width='10%' align='center' class='xtr'>«· «—ÌŒ</td>
      <td width='7%' align='center' class='xtr'> ⁄·ﬁ« </td>
      <td width='7%' align='center' class='xtr'>“Ê«—</td>
      <td width='7%' align='center' class='xtr'> ›⁄Ì·</td>
      <td width='7%' align='center' class='xtr'> ⁄œÌ·</td>
      <td width='7%' align='center' class='xtr'>Õ–›</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

if($p['active'] == 1){
$im = "images/on.gif";
$li = "article_cp.php?action=act&id=$p[id]&act=0";
$te = "≈÷€ÿ Â‰« ··ÕÃ»";
}else{
$im = "images/off.gif";
$li = "article_cp.php?action=act&id=$p[id]&act=1";
$te = "≈÷€ÿ Â‰« ·· ›⁄Ì·";
}

$d = date("j/n/Y",$p['date']);

$qcomm = mysql_num_rows(mysql_query("SELECT * FROM dlil_comment where articleid='".$p[id]."'"));

echo "<tr>
      <td width='55%' class='xtd'>ª <a target='_blank' href='../article.php?id=$p[id]'>".$p['title']."</a></td>
      <td width='10%' align='center' class='xtd'>".$d."</td>
      <td width='7%' align='center' class='xtd'>$qcomm</td>
      <td width='7%' align='center' class='xtd'>".$p['vis']."</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='article_cp.php?action=edit&id=$p[id]'><img border='0' src='images/edit.gif' alt=' ⁄œÌ· ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='article_cp.php?action=delete&id=$p[id]'><img border='0' src='images/delete.gif' alt='Õ–› ".$p['title']."' /></a></td>
    </tr>";
}
echo "</table>";
}

}ELSEIF ($action=="insert"){

$title = addslashes($_POST['title']);
$title = trim($title);

$text = addslashes($_POST['text']);
$text = trim($text);

$metadescription = addslashes($_POST['metadescription']);
$metakeywords = addslashes($_POST['metakeywords']);

if (empty($text) or empty($title)){
echo "<p align=center>·„  ﬂ » «·‰’ √Ê «·⁄‰Ê«‰. <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_article (text,title,metadescription,metakeywords,active,date) VALUES ('$text','$title','$metadescription','$metakeywords','1','".time()."')") or die ("≈” ⁄·«„ Œ«ÿÌ¡");
print "<p align=center> „  ≈÷«›… «·„ﬁ«· »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=article_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_article where id='$id'");
$p= mysql_fetch_array($query);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

$p['metadescription'] = stripslashes($p['metadescription']);
$p['metadescription'] = htmlspecialchars($p['metadescription']);

$p['metakeywords'] = stripslashes($p['metakeywords']);
$p['metakeywords'] = htmlspecialchars($p['metakeywords']);

echo "<form name='vbform' method='POST' action='article_cp.php?action=editok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumber15' dir='rtl'>

<tr>
<td width='100%' colspan='2' class='xtt' align='center'> ⁄œÌ· »Ì«‰«  ".$p['title']."</td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·⁄‰Ê«‰ :</td>
<td width='70%' class='xtd'><input name='title' type='text' value='".$p['title']."' size='60' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª Ê’› «·„ﬁ«· :</td>
<td width='70%' class='xtd'><input name='metadescription' type='text' value='".$p['metadescription']."' size='60' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·ﬂ·„«  «·„› «ÕÌÂ :</td>
<td width='70%' class='xtd'><input name='metakeywords' type='text' value='".$p['metakeywords']."' size='60' /></td>
</tr>

<tr>
<td width='100%' class='xtd' colspan='2' align='center'><textarea id='textarea1' name='text' rows=5 cols=60>".$p['text']."</textarea>
</td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' Õ›Ÿ ' name='B1' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);
$title = addslashes($_POST['title']);
$title = trim($title);

$text = addslashes($_POST['text']);
$text = trim($text);

$metadescription = addslashes($_POST['metadescription']);
$metakeywords = addslashes($_POST['metakeywords']);

if (empty($text) or empty($title)){
echo "<p align=center>·„  ﬂ » «·‰’ √Ê «·⁄‰Ê«‰. <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_article SET title='$title',text='$text',metadescription='$metadescription',metakeywords='$metakeywords' where id='$id'");
echo"<p align=center> „ «· ⁄œÌ· »‰Ã«Õ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=article_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_article WHERE id='$id'");
echo"<p align=center> „ Õ–› «·„ﬁ«·</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=article_cp.php?action=add' />";


}ELSEIF ($action=="act"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_article SET active='$act' where id='$id'");
echo "<p align=center> „ ÕÃ» «·„ﬁ«· »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=article_cp.php?action=add' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_article SET active='$act' where id='$id'");
echo "<p align=center> „  ›⁄Ì· «·„ﬁ«· »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=article_cp.php?action=add' />";
}else{
echo "<p align=center>Œÿ√ .... Ì „ «· ÊÃÌÂ «· ·ﬁ«∆Ì</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=article_cp.php?action=add' />";
}


}ELSEIF ($action=="comm"){

if($_GET["s"] == 1){
$hh = "checked";
}elseif($_GET["s"] == 0){
$hh = "";
}else{
$hh = "";
}

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 20;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_comment where active='1' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>·«ÌÊÃœ  ⁄·Ìﬁ«  Õ«·Ì«</div>";
}else{
echo "<form name='xxx' action='article_cp.php?action=op' method='post'>
<table class='xtable' width='100%' id='AutoNumber515'>

<tr>
<td width='100%' colspan='5' class='xtt' align='center'>«· ⁄·Ìﬁ«  «· Ì  „  ›⁄Ì·Â«</td>
</tr>

<tr>
                <td align='center' width='2%' class='xtr'>#</td>
                <td align='center' width='60%' class='xtr'>«·≈”„</td>
                <td align='center' width='10%' class='xtr'>«·≈Ì„Ì·</td>
                <td width='15%' align='center' class='xtr'>«·„ﬁ«·</td>
                <td width='13%' align='center' class='xtr'>«· «—ÌŒ</td>

</tr>";

$i = 0;
while($p = mysql_fetch_array($queryx))
{
$i++;

$p['name'] = stripslashes($p['name']);
$p['name'] = htmlspecialchars($p['name']);

$p['emails'] = stripslashes($p['emails']);
$p['emails'] = htmlspecialchars($p['emails']);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

$d = date("j/n/Y",$p['date']);

$queryxc = mysql_query("SELECT * FROM dlil_article where id='".$p['articleid']."'");
$pc = mysql_fetch_array($queryxc);
$pc['title'] = stripslashes($pc['title']);
$pc['title'] = htmlspecialchars($pc['title']);

echo "<tr>
                <td align='center' width='2%' class='xtr'><input ".$hh." type='checkbox' name='del[$i]' value='".$p['id']."' /></td>
                <td width='60%' class='xtd'>".$p['name']."<div align='right' class='aa'>".$p['text']."</div></td>
                <td align='center' width='10%' class='xtd'>".$p['emails']."</td>
                <td width='15%' align='center' class='xtd'>".$pc['title']."</td>
                <td width='13%' align='center' class='xtd'>$d</td>
</tr>";
}
echo "<tr>
<td colspan='6' align='center' class='xtr'><input class='addsubmit' name='delete' type='submit' id='delete' value=' Õ–› «· ⁄·Ìﬁ«  ' /> <input class='addsubmit' name='edit' type='submit' value='  ⁄œÌ· «· ⁄·Ìﬁ«  ' /><br />
<a class='aa' href='article_cp.php?action=comm&s=1'> ÕœÌœ «·ﬂ·</a> - <a class='aa' href='article_cp.php?action=comm&s=0'>≈·€«¡ «·ﬂ·</a></td>
</tr>
</table>
</form>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_comment where active='1'")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='article_cp.php?action=comm&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}


}ELSEIF ($action=="actx"){

if($_GET["s"] == 1){
$hh = "checked";
}elseif($_GET["s"] == 0){
$hh = "";
}else{
$hh = "";
}

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 20;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_comment where active='0' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>·«ÌÊÃœ  ⁄·Ìﬁ«  ·· ›⁄Ì· Õ«·Ì«</div>";
}else{
echo "<form name='xxx' action='article_cp.php?action=op' method='post'>
<table class='xtable' width='98%' id='AutoNumber415'>

<tr>
<td width='100%' colspan='5' class='xtt' align='center'>«· ⁄·Ìﬁ«  «· Ì  Õ «Ã «·Ï  ›⁄Ì·</td>
</tr>

<tr>
                <td align='center' width='2%' class='xtr'>#</td>
                <td align='center' width='60%' class='xtr'>«·«”„</td>
                <td align='center' width='10%' class='xtr'>«·≈Ì„Ì·</td>
                <td width='15%' align='center' class='xtr'>«·ﬁ’…</td>
                <td width='13%' align='center' class='xtr'>«· «—ÌŒ</td>

</tr>";

$i = 0;
while($p = mysql_fetch_array($queryx))
{
$i++;

$p['name'] = stripslashes($p['name']);
$p['name'] = htmlspecialchars($p['name']);

$p['emails'] = stripslashes($p['emails']);
$p['emails'] = htmlspecialchars($p['emails']);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

$d = date("j/n/Y",$p['date']);

$queryxc = mysql_query("SELECT * FROM dlil_article where id='".$p['articleid']."'");
$pc = mysql_fetch_array($queryxc);
$pc['title'] = stripslashes($pc['title']);
$pc['title'] = htmlspecialchars($pc['title']);

echo "<tr>
                <td align='center' width='2%' class='xtr'><input ".$hh." type='checkbox' name='del[$i]' value='".$p['id']."' /></td>
                <td width='60%' class='xtd'>".$p['name']."<div align='right' class='aa'>".$p['text']."</div></td>
                <td align='center' width='10%' class='xtd'>".$p['emails']."</td>
                <td width='15%' align='center' class='xtd'>".$pc['title']."</td>
                <td width='13%' align='center' class='xtd'>$d</td>
</tr>";
}
echo "<tr>
<td colspan='6' align='center' class='xtr'><input class='addsubmit' name='activ' type='submit' value='  ›⁄Ì· «· ⁄·Ìﬁ«  ' /> <input class='addsubmit' name='delete' type='submit' id='delete' value=' Õ–› «· ⁄·Ìﬁ«  ' /> <input class='addsubmit' name='edit' type='submit' value='  ⁄œÌ· «· ⁄·Ìﬁ«  ' /><br>
<a class='aa' href='article_cp.php?action=actx&s=1'> ÕœÌœ «·ﬂ·</a> - <a class='aa' href='article_cp.php?action=actx&s=0'>≈·€«¡ «·ﬂ·</a></td>
</tr>
</table>
</form>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_comment where active='0'")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='article_cp.php?action=actx&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}

}ELSEIF ($action=="op"){
if(isset($_POST['delete'])){
if(count($_POST['del']) > 0){
$del_id = join(',',$_POST['del']);
$sql = mysql_query("DELETE FROM dlil_comment WHERE id IN($del_id)");
print "<p align=center> „ Õ–› «· ⁄·Ìﬁ«  «· Ì  „  ÕœÌœÂ« »‰Ã«Ã .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=article_cp.php?action=actx' />";
}else{
echo "<div align='center'>·„  ﬁ„ »≈Œ Ì«—  ⁄·Ìﬁ«  ··Õ–›</div>";
}
}


if(isset($_POST['activ'])){
if(count($_POST['del']) > 0){
$del_id = join(',',$_POST['del']);
$sql = mysql_query("UPDATE dlil_comment SET active='1' WHERE id IN($del_id)");
print "<p align=center> „  ÕœÌÀ «·»Ì«‰«  »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=article_cp.php?action=actx' />";
}else{
echo "<div align='center'>·„  ﬁ„ »≈Œ Ì«—  ⁄·Ìﬁ«  !!</div>";
}
}


if(isset($_POST['edit'])){

if(count($_POST['del']) > 0){
$c = count($_POST['del']);

$del_id = join(',',$_POST['del']);
$queryx = mysql_query("SELECT * FROM dlil_comment where id IN($del_id) order by id desc");

echo"<form name='vbform' method='POST' action='article_cp.php?action=editall'>

<table class='xtable' width='100%' id='AutoNumber15' dir='rtl'>
<tr>
<td width='100%' colspan='2' class='xtt' align='center'> ⁄œÌ· «· ⁄·Ìﬁ« </td>
</tr>";

$ii = 0;
while($p = mysql_fetch_array($queryx))
{
++$ii;

$p['name'] = stripslashes($p['name']);
$p['name'] = htmlspecialchars($p['name']);

$p['text'] = stripslashes($p['text']);
$p['text'] = htmlspecialchars($p['text']);

$p['emails'] = stripslashes($p['emails']);
$p['emails'] = htmlspecialchars($p['emails']);

echo "<input type='hidden' name='id[]' value='".$p['id']."' />

<tr>
<td width='30%' class='xtr'>ª «·«”„ :</td>
<td width='70%' class='xtd'><input name='name[]' size='60' value='".$p['name']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·»—Ìœ :</td>
<td width='70%' class='xtd'><input name='emails[]' size='60' value='".$p['emails']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «· ⁄·Ìﬁ :</td>
<td width='70%' class='xtd'><textarea name='text[]' rows=5 cols=60>".$p['text']."</textarea></td>
</tr>


<tr>
<td width='30%' class='xtr'>ª «· ›⁄Ì· :</td>
<td width='70%' class='xtd'>
<select size='1' name='active[]'>";
if($p['active'] == 1){
echo "<option value='1' selected> ›⁄Ì·</option>";
echo "<option value='0'>ÕÃ»</option>";
}else{
echo "<option value='1'> ›⁄Ì·</option>";
echo "<option value='0' selected>ÕÃ»</option>";
}
echo "</select>
</td>
</tr>";

if($ii != $c){
echo "<tr>
<td width='100%' colspan='2' align='center' class='xtr'><hr width='80%' size='0' /></td>
</tr>";
}

}

echo "<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' Õ›Ÿ ' name='B1' /></td>
</tr>

</table>
</form>";

}else{
echo "<div align='center'>·„  ﬁ„ »≈Œ Ì«—  ⁄·Ìﬁ«  !!</div>";
}

}


}ELSEIF ($action=="editall"){
$number = count($_POST['id']);

for($i=0;$i<$number;$i++){
$id = $_POST['id'][$i];
$id = intval($id);

$name = $_POST['name'][$i];
$name = addslashes($name);
$name = trim($name);

$text = $_POST['text'][$i];
$text = addslashes($text);
$text = trim($text);

$emails = $_POST['emails'][$i];
$emails = addslashes($emails);
$emails = trim($emails);

$active = $_POST['active'][$i];

if(!empty($name)){
echo " ÕœÌÀ »Ì«‰«  $name . . . »‰Ã«Õ<br />";
$query =  mysql_query("UPDATE dlil_comment SET name='$name',text='$text',emails='$emails',active='$active' where id='$id'");
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=article_cp.php?action=actx' />";
}

}
}
echo $f;
?>