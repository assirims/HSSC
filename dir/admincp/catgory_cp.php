<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){
?>
<form name="vbform" method="post" action="catgory_cp.php?action=insert">

  <table class='xtable' width="100%" id="AutoNumber1">

    <tr>
      <td width="100%" colspan="2" class='xtt' align="center">≈÷«›… «·√ﬁ”«„ ·œ·Ì· «·„Ê«ﬁ⁄</td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>ª ⁄‰Ê«‰ «·ﬁ”„ :</td>
      <td width="70%" class='xtd'><input size="60" name="title" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>ª Ê’› „Ì « description :</td>
      <td width="70%" class='xtd'><textarea name="metadescription" rows=3 cols=60></textarea></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>ª Ê’› „Ì « keywords :</td>
      <td width="70%" class='xtd'><textarea name="metakeywords" rows=3 cols=60></textarea></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>ª  — Ì» «·⁄—÷ :</td>
      <td width="70%" class='xtd'><input size="10" name="ordercat" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>ª «·ﬁ”„ «·√» :</td>
      <td width="70%" class='xtd'>
<select size="1" name="sub">
<OPTION value='0' selected>ﬁ”„ —∆Ì”Ì</OPTION>
<?php
$query = mysql_query("SELECT * FROM dlil_catgory where sub=0 order by id desc");
while($cat = mysql_fetch_array($query))
{
echo "<OPTION value='$cat[id]'>$cat[title]</OPTION>";
}
?>
</select>
      </td>
    </tr>

     <tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" class='addsubmit' value=" ≈÷«›… " name="cmdAdd" /></td>
    </tr>
  </table>
</form>

<?php

$queryx = mysql_query("SELECT * FROM dlil_catgory order by id desc");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "&nbsp;<br />
<table class='xtable' width='100%' id='AutoNumber15'>
  <tr>
<td width='100%' colspan='5' class='xtx' align='center'>⁄—÷ Ã„Ì⁄ «·«ﬁ”«„</td>
</tr>

  <tr>
      <td width='72%' align='center' class='xtr'>≈”„ «·ﬁ”„</td>
      <td width='7%' align='center' class='xtr'>«·„Ê«ﬁ⁄</td>
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
$li = "catgory_cp.php?action=act&id=$p[id]&act=0";
$te = "≈÷€ÿ Â‰« ··ÕÃ»";
}else{
$im = "images/off.gif";
$li = "catgory_cp.php?action=act&id=$p[id]&act=1";
$te = "≈÷€ÿ Â‰« ·· ›⁄Ì·";
}

$qcount = mysql_num_rows(mysql_query("SELECT * FROM dlil_site where cat='".$p['id']."'"));

echo "<tr>
      <td width='79%' class='xtd'>ª <a target='_blank' href='../section.php?id=".$p['id']."'>".$p['title']."</a></td>
      <td width='7%' align='center' class='xtd'><a href='add_cp.php?action=add&cat=".$p['id']."'>".$qcount."</a></td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='catgory_cp.php?action=edit&id=$p[id]'><img border='0' src='images/edit.gif' alt=' ⁄œÌ· ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='catgory_cp.php?action=delete&id=$p[id]'><img border='0' src='images/delete.gif' alt='Õ–› ".$p['title']."' /></a></td>
    </tr>";
}
echo "</table>";
}

}ELSEIF ($action=="insert"){

$title = addslashes($_POST['title']);
$title = trim($title);

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

$sub = $_POST['sub'];
$ordercat = $_POST['ordercat'];

if (empty($title)){
echo "<p align=center>·„  ﬂ » ⁄‰Ê«‰ «·ﬁ”„ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_catgory (title,sub,metadescription,metakeywords,active,ordercat) VALUES ('$title','$sub','$metadescription','$metakeywords','1','$ordercat')") or die ("≈” ⁄·«„ Œ«ÿÌ¡");
print "<p align=center> „  ≈÷«›… «·ﬁ”„ »‰Ã«Õ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=catgory_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_catgory where id='$id'");
$p= mysql_fetch_array($query);

$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

$p['metadescription'] = stripslashes($p['metadescription']);
$p['metadescription'] = htmlspecialchars($p['metadescription']);

$p['metakeywords'] = stripslashes($p['metakeywords']);
$p['metakeywords'] = htmlspecialchars($p['metakeywords']);

echo"<form name='vbform' method='POST' action='catgory_cp.php?action=editok'>
<input type='hidden' name='id' value='$p[id]' />
<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'> ⁄œÌ· »Ì«‰«  ".$p['title']."</td>
</tr>

<tr>
<td width='30%' class='xtr'>ª ⁄‰Ê«‰ «·ﬁ”„ :</td>
<td width='70%' class='xtd'><input name='title' size='60' value='".$p['title']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª Ê’› „Ì « description :</td>
<td width='70%' class='xtd'><textarea name='metadescription' rows=4 cols=60>".$p['metadescription']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª Ê’› „Ì « keywords :</td>
<td width='70%' class='xtd'><textarea name='metakeywords' rows=4 cols=60>".$p['metakeywords']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>ª «·ﬁ”„ «·√» :</td>
<td width='70%' class='xtd'>
<select size='1' name='sub'>";
echo "<option value='0'>ﬁ”„ —∆Ì”Ì</option>";
$sql = mysql_query ("SELECT * FROM dlil_catgory where id != '$id' order by id") or die ("error");
while($sub = mysql_fetch_array($sql))
{
if($sub['id'] ==  $p['sub']){
echo "<option value='$sub[id]' selected>$sub[title]</option>";
}else{
echo "<option value='$sub[id]'>$sub[title]</option>";
}

}
echo "</select>
</td>
</tr>

<tr>
<td width='30%' class='xtr'>ª  — Ì» «·⁄—÷ :</td>
<td width='70%' class='xtd'><input name='ordercat' size='10' value='".$p['ordercat']."' /></td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' value=' Õ›Ÿ ' name='B1' class='addsubmit' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);
$title = addslashes($_POST['title']);
$title = trim($title);

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

$sub = intval($_POST['sub']);
$ordercat = $_POST['ordercat'];

if (empty($title)){
echo "<p align=center>·„  ﬂ » ⁄‰Ê«‰ «·ﬁ”„ . <a href='javascript:history.back(1)'>⁄Êœ… ··Œ·›</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_catgory SET title='$title', sub='$sub',metadescription='$metadescription',metakeywords='$metakeywords',ordercat='$ordercat' where id='$id'");
echo"<p align=center> „ «· ⁄œÌ· »‰Ã«Õ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=catgory_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$id2 = intval($_POST['id']);

if(isset($_POST['x']) AND $_POST['x']=="ok"){

$query =  mysql_query("DELETE FROM dlil_catgory WHERE id='$id2'");
echo "<p align='center'>";
if($query){
if($_POST['sites']=="ON"){
$query2 =  mysql_query("DELETE FROM dlil_site WHERE cat='$id2'");
echo "-  „ Õ–› «·„Ê«ﬁ⁄ «· Ì  ‰œ—Ã  Õ  «·ﬁ”„ <br />";
}

echo " „ Õ–› «·ﬁ”„ .</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=catgory_cp.php?action=add' />";
}else{
echo "·„   „ «·⁄„·ÌÂ Â‰«ﬂ Œÿ√ „« !!";
}


}else{

echo "<form name='vbform' method='POST' action='catgory_cp.php?action=delete'>
<input type='hidden' name='id' value='$id' />
<input type='hidden' name='x' value='ok' />

<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' align='center' class='xtr'><input name='sites' type='checkbox' value='ON' />Õ–› «·„Ê«ﬁ⁄ «· Ì  ‰œ—Ã  Õ  «·ﬁ”„
<input type='submit' class='addsubmit' value=' ≈–« ﬂ‰  „ √ﬂœ „‰ Õ–› «·ﬁ”„ ≈÷€ÿ Â‰« ' name='B1' /></td>
</tr>

</table>
</form>";

}




}ELSEIF ($action=="act"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_catgory SET active='$act' where id='$id'");
echo "<p align=center> „ ÕÃ» «·ﬁ”„ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=catgory_cp.php?action=add' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_catgory SET active='$act' where id='$id'");
echo "<p align=center> „  ›⁄Ì· «·ﬁ”„ »‰Ã«Õ . . . Ã«—Ì «· ÊÃÌÂ</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=catgory_cp.php?action=add' />";
}else{
echo "<p align=center>Œÿ√ .... Ì „ «· ÊÃÌÂ «· ·ﬁ«∆Ì</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=catgory_cp.php?action=add' />";
}

}

echo $f;
?>