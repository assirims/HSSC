<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){
?>

<form name="vbform" method="post" action="add_cp.php?action=insert">
<table class='xtable' width='100%' id='AutoNumber15'>
<tr>
<td width="100%" colspan="2" class='xtt' align="center">����� ���� ����</td>
</tr>

    <tr>
      <td width="30%" class='xtr'>� ��� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="title" /></td>
    </tr>
    <tr>
      <td width="30%" class='xtr'>� ����� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="url" dir="ltr" /></td>
    </tr>
    <tr>
      <td width="30%" class='xtr'>� ��� ���� description :</td>
      <td width="70%" class='xtd'><textarea name="metadescription" rows=2 cols=60></textarea></td>
    </tr>
    <tr>
      <td width="30%" class='xtr'>� ��� ���� keywords :</td>
      <td width="70%" class='xtd'><textarea name="metakeywords" rows=2 cols=60></textarea></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ��� ���� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="yourname" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ���� ���� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="yourmail" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ������ :</td>
      <td width="70%" class='xtd'>
<select  size='1' name='country'>
<option value='0' selected='selected'>������ ...</option>
<option value='sa'>��������</option>
<option value='kw'>������</option>
<option value='ae'>��������</option>
<option value='bh'>�������</option>
<option value='om'>����</option>
<option value='qa'>���</option>
<option value='jo'>������</option>
<option value='so'>�������</option>
<option value='sd'>�������</option>
<option value='iq'>������</option>
<option value='ma'>������</option>
<option value='ye'>�����</option>
<option value='km'>�����</option>
<option value='dj'>������</option>
<option value='lb'>�����</option>
<option value='ps'>������</option>
<option value='sy'>����</option>
<option value='eg'>���</option>
<option value='dz'>�������</option>
<option value='tn'>����</option>
<option value='ly'>����</option>
<option value='mr'>��������</option>
<option value='ot'>���� ����</option>
</select>

      </td>
    </tr>

        <tr>
      <td width="30%" class='xtr'>� ��� ������ :</td>
      <td width="70%" class='xtd'>
<select size="1" name="lang">

<OPTION value='1'>ar</OPTION>
<OPTION value='2'>en</OPTION>

</select>
      </td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ����� :</td>
      <td width="70%" class='xtd'>
<select size="1" name="cat">
<?php
$query = mysql_query("SELECT * FROM dlil_catgory order by id desc");
while($cat = mysql_fetch_array($query))
{
if($cat[id]==$_GET['cat']){
echo "<OPTION value='$cat[id]' selected>$cat[title]</OPTION>";
}else{
echo "<OPTION value='$cat[id]'>$cat[title]</OPTION>";
}
}
?>
</select>
      </td>
    </tr>
     <tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" value=" ����� " class='addsubmit' name="cmdAdd" /></td>
    </tr>
  </table>

</form>

<?php
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 30;
$startpoint = ($page * $perpage) - $perpage;

if(isset($_GET['cat'])){
$sqql = "AND cat='".intval($_GET['cat'])."'";
$cccc = "&cat=".intval($_GET['cat'])."";
}else{
$sqql = "";
$cccc = "";
}

if(isset($_GET['order']) AND $_GET['order']=="new"){
$ooo = "order by id desc";
}elseif(isset($_GET['order']) AND $_GET['order']=="old"){
$ooo = "order by id asc";
}elseif(isset($_GET['order']) AND $_GET['order']=="mostvisit"){
$ooo = "order by vis desc";
}elseif(isset($_GET['order']) AND $_GET['order']=="leastvisit"){
$ooo = "order by vis asc";
}elseif(isset($_GET['order']) AND $_GET['order']=="mostrate"){
$ooo = "order by rate desc";
}elseif(isset($_GET['order']) AND $_GET['order']=="leastrate"){
$ooo = "order by rate asc";
}elseif(isset($_GET['order']) AND $_GET['order']=="morecount"){
$ooo = "order by count desc";
}elseif(isset($_GET['order']) AND $_GET['order']=="leastcount"){
$ooo = "order by count asc";
}else{
$ooo = "order by id desc";
}

$orders = "<a href='add_cp.php?action=add&order=new".$cccc."'>������</a> / <a href='add_cp.php?action=add&order=old".$cccc."'>������</a> /
<a href='add_cp.php?action=add&order=mostvisit".$cccc."'>������ �����</a> / <a href='add_cp.php?action=add&order=leastvisit".$cccc."'>����� �����</a> /
<a href='add_cp.php?action=add&order=mostrate".$cccc."'>������ ������</a> / <a href='add_cp.php?action=add&order=leastrate".$cccc."'>����� ������</a> /
<a href='add_cp.php?action=add&order=morecount".$cccc."'>������ �������</a> / <a href='add_cp.php?action=add&order=leastcount".$cccc."'>����� �������</a>";



$queryx = mysql_query("SELECT * FROM dlil_site where active=1 $sqql $ooo LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

function country($char)
{
if($char=="sa"){
$name = "��������";
}elseif($char=="kw"){
$name = "������";
}elseif($char=="ae"){
$name = "��������";
}elseif($char=="bh"){
$name = "�������";
}elseif($char=="om"){
$name = "����";
}elseif($char=="qa"){
$name = "���";
}elseif($char=="jo"){
$name = "������";
}elseif($char=="so"){
$name = "�������";
}elseif($char=="sd"){
$name = "�������";
}elseif($char=="iq"){
$name = "������";
}elseif($char=="ma"){
$name = "������";
}elseif($char=="ye"){
$name = "�����";
}elseif($char=="km"){
$name = "�����";
}elseif($char=="dj"){
$name = "������";
}elseif($char=="lb"){
$name = "�����";
}elseif($char=="ps"){
$name = "������";
}elseif($char=="sy"){
$name = "����";
}elseif($char=="eg"){
$name = "���";
}elseif($char=="dz"){
$name = "�������";
}elseif($char=="tn"){
$name = "����";
}elseif($char=="ly"){
$name = "����";
}elseif($char=="mr"){
$name = "��������";
}elseif($char=="ot"){
$name = "���� ����";
}else{
$name = "��� �����";
}
return $name;
}

echo "&nbsp;<br />
<table class='xtable' width='100%' id='AutoNum4ber155'>
<tr>
<td width='100%' colspan='8' class='xtx' align='center'>������� ���� ��� �������</td>
</tr>

<tr>
<td width='100%' colspan='8' class='xtr' align='center'>[ $orders ]</td>
</tr>

  <tr>
      <td width='48%' align='center' class='xtr'>��� ������</td>
      <td width='10%' align='center' class='xtr'>������</td>
      <td width='7%' align='center' class='xtr'>�����</td>
      <td width='7%' align='center' class='xtr'>�������</td>
      <td width='7%' align='center' class='xtr'>����</td>
      <td width='7%' align='center' class='xtr'>���</td>
      <td width='7%' align='center' class='xtr'>�����</td>
      <td width='7%' align='center' class='xtr'>���</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
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

if($p['active'] == 1){
$im = "images/on.gif";
$li = "add_cp.php?action=actx&id=$p[id]&act=0";
$te = "���� ��� �����";
}else{
$im = "images/off.gif";
$li = "add_cp.php?action=actx&id=$p[id]&act=1";
$te = "���� ��� �������";
}

echo "<tr>
      <td width='48%' class='xtd'>� ".$p['title']."<div align='left'><a target='_blank' class='aa' href='".$p['url']."'>".$p['url']."</a></div></td>
      <td width='10%' align='center' class='xtd'>".country($p['country'])."</td>
      <td width='7%' align='center' class='xtd'>".$p['rate']."</td>
      <td width='7%' align='center' class='xtd'>".$p['count']."</td>
      <td width='7%' align='center' class='xtd'>".$p['vis']."</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='add_cp.php?action=edit&id=$p[id]'><img border='0' src='images/edit.gif' alt='����� ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='add_cp.php?action=delete&id=$p[id]'><img border='0' src='images/delete.gif' alt='��� ".$p['title']."' /></a></td>
    </tr>";
}

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_site where active=1 $sqql")) / $perpage);
if($pagesnum > 1){
echo "<tr>
<td width='100%' colspan='8' class='xtr' align='center'>

<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='add_cp.php?action=add&page=$i".$cccc."'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</td>
</tr>";
}
echo "</table>";
}

}ELSEIF ($action=="insert"){

$title = addslashes($_POST['title']);
$title = trim($title);

$url = addslashes($_POST['url']);
$url = trim($url);

if(substr($url,0,7) != "http://"){
$u = "http://".$url;
}else{
$u = $url;
}

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

$country = addslashes($_POST['country']);
$yourname = addslashes($_POST['yourname']);
$yourmail = addslashes($_POST['yourmail']);

$cat = $_POST['cat'];
$lang = $_POST['lang'];

if($metadescription == ""){
$xx1 = $title;
}else{
$xx1 = $metadescription;
}

if($metakeywords == ""){
$xx2 = $title;
}else{
$xx2 = $metakeywords;
}

if (empty($title)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($url)){
echo "<p align=center>�� ���� ���� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";

}else{

$Sql2 = mysql_query("SELECT * FROM dlil_site where url='$u'");
$numbers = mysql_num_rows($Sql2);
if($numbers==0){
$query =  mysql_query ("INSERT INTO dlil_site (title,url,metadescription,metakeywords,active,country,yourname,yourmail,lang,cat,date) VALUES ('$title','$u','$xx1','$xx2','1','$country','$yourname','$yourmail','$lang','$cat','".time()."')") or die ("������� �����");
print "<br />";
print "<p align=center>��� ����� ������ ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=add' />";
}else{
echo "<div align='center'><br /><br /><br />��� ����� ������ <a href='$u'>$url</a> ������ ����� ����� �� ������ �� ������ ����� ������� �� �� ������ ����� ������� . <a href='javascript:history.back(1)'>���� �����</a></div>";
echo"<form name='vbform' method='POST' action='add_cp.php?action=insertx'>
<input type='hidden' name='title' value='$title' />
<input type='hidden' name='url' value='$url' />
<input type='hidden' name='metadescription' value='$metadescription' />
<input type='hidden' name='metakeywords' value='$metakeywords' />
<input type='hidden' name='country' value='$country' />
<input type='hidden' name='yourname' value='$yourname' />
<input type='hidden' name='yourmail' value='$yourmail' />
<input type='hidden' name='cat' value='$cat' />
<input type='hidden' name='lang' value='$lang' />

<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' align='center' class='xtr'><input type='submit' class='addsubmit' value=' �� ���� ���� ����� ������ - ���� ��� ' name='B1' /></td>
</tr>

</table>
</form>";
}

}

}ELSEIF ($action=="insertx"){

$title = addslashes($_POST['title']);
$title = trim($title);

$url = addslashes($_POST['url']);
$url = trim($url);

if(substr($url,0,7) != "http://"){
$u = "http://".$url;
}else{
$u = $url;
}

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

$country = addslashes($_POST['country']);
$yourname = addslashes($_POST['yourname']);
$yourmail = addslashes($_POST['yourmail']);

$cat = $_POST['cat'];
$lang = $_POST['lang'];

if($metadescription == ""){
$xx1 = $title;
}else{
$xx1 = $metadescription;
}

if($metakeywords == ""){
$xx2 = $title;
}else{
$xx2 = $metakeywords;
}

if (empty($title)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($url)){
echo "<p align=center>�� ���� ���� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";

}else{

$query =  mysql_query ("INSERT INTO dlil_site (title,url,metadescription,metakeywords,active,country,yourname,yourmail,lang,cat,date) VALUES ('$title','$u','$xx1','$xx2','1','$country','$yourname','$yourmail','$lang','$cat','".time()."')") or die ("������� �����");
print "<p align=center>��� ����� ������ ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_site where id='$id'");
$p= mysql_fetch_array($query);

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

echo "<form name='vbform' method='POST' action='add_cp.php?action=editok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumbe5r15'>
<tr>
<td width='100%' colspan='2' class='xtx' align='center'>����� ������ ������ [ ".$p['title']." ]</td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ������ :</td>
<td width='70%' class='xtd'><input name='title' size='60' value='".$p['title']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ������ :</td>
<td width='70%' class='xtd'><input name='url' size='60' value='".$p['url']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� description :</td>
<td width='70%' class='xtd'><textarea name='metadescription'  wrap='on' rows=4 cols=60>".$p['metadescription']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� keywords :</td>
<td width='70%' class='xtd'><textarea name='metakeywords' rows=4 wrap='on'  cols=60>".$p['metakeywords']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ������ :</td>
<td width='70%' class='xtd'><input name='country' size='60' value='".$p['country']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� ������ :</td>
<td width='70%' class='xtd'><input name='yourname' size='60' value='".$p['yourname']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ���� ������ :</td>
<td width='70%' class='xtd'><input name='yourmail' size='60' value='".$p['yourmail']."' /></td>
</tr>

<tr>
<td width='20%' class='xtr'>� ����� :</td>
<td width='80%' class='xtd'>
<select size='1' name='cat'>";
$sql = mysql_query ("SELECT * FROM dlil_catgory") or die ("error");
while($sub = mysql_fetch_array($sql))
{
if($sub['id'] ==  $p['cat']){
echo "<option value='$sub[id]' selected>$sub[title]</option>";
}else{
echo "<option value='$sub[id]'>$sub[title]</option>";
}

}
echo "</select>
</td>
</tr>


<tr>
<td width='20%' class='xtr'>� ����� :</td>
<td width='80%' class='xtd'>
<select size='1' name='lang'>";
if($p['lang'] == 1){
echo "<option value='1' selected>ar</option>";
echo "<option value='2'>en</option>";
}elseif($p['lang'] == 2){
echo "<option value='1'>ar</option>";
echo "<option value='2' selected>en</option>";
}
echo "</select>
</td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' ��� ��������� �� ������ ����� ������� ' name='B1' /> <input class='addsubmit' type='submit' value=' ��� ��������� �� ������ ���� ������ ' name='refresh' /></td>
</tr>

</table>

</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);
$title = addslashes($_POST['title']);
$title = trim($title);

$url = addslashes($_POST['url']);
$url = trim($url);

$metadescription = addslashes($_POST['metadescription']);
$metadescription = trim($metadescription);

$metakeywords = addslashes($_POST['metakeywords']);
$metakeywords = trim($metakeywords);

$country = addslashes($_POST['country']);
$yourname = addslashes($_POST['yourname']);
$yourmail = addslashes($_POST['yourmail']);

$cat = $_POST['cat'];
$lang = $_POST['lang'];

if (empty($title)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($url)){
echo "<p align=center>�� ���� ���� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";

}else{
$query =  mysql_query("UPDATE dlil_site SET title='$title', url='$url',metadescription='$metadescription',metakeywords='$metakeywords',country='$country',yourname='$yourname',yourmail='$yourmail',cat='$cat',lang='$lang' where id='$id'");

if($query){
if(isset($_POST['refresh'])){
echo "<p align='center'>�� ������� ����� ... ���� ������� �������� <a href='add_cp.php?action=edit&id=$id'>���� ��� ��� ������ ��������</a></p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=edit&id=$id' />";
}else{
echo "<p align='center'>�� ������� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=add' />";
}

}else{
echo "<p align='center'>���� ��� �� ... �� ��� ����� �������� !!</p>";
}
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_site WHERE id='$id'");
if($query){
echo"<p align=center>�� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=add' />";
}else{
echo "<p align='center'>���� ��� �� ... �� ��� ��� �������� !!</p>";
}

}ELSEIF ($action=="actx"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_site SET active='$act' where id='$id'");
echo "<p align=center>�� ��� ������ ����� . . . ���� �������</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=add' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_site SET active='$act' where id='$id'");
echo "<p align=center>�� ����� ������ ����� . . . ���� �������</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=add' />";
}else{
echo "<p align=center>��� .... ��� ������� ��������</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=add_cp.php?action=add' />";
}





}ELSEIF ($action=="act"){

function country($char)
{
if($char=="sa"){
$name = "��������";
}elseif($char=="kw"){
$name = "������";
}elseif($char=="ae"){
$name = "��������";
}elseif($char=="bh"){
$name = "�������";
}elseif($char=="om"){
$name = "����";
}elseif($char=="qa"){
$name = "���";
}elseif($char=="jo"){
$name = "������";
}elseif($char=="so"){
$name = "�������";
}elseif($char=="sd"){
$name = "�������";
}elseif($char=="iq"){
$name = "������";
}elseif($char=="ma"){
$name = "������";
}elseif($char=="ye"){
$name = "�����";
}elseif($char=="km"){
$name = "�����";
}elseif($char=="dj"){
$name = "������";
}elseif($char=="lb"){
$name = "�����";
}elseif($char=="ps"){
$name = "������";
}elseif($char=="sy"){
$name = "����";
}elseif($char=="eg"){
$name = "���";
}elseif($char=="dz"){
$name = "�������";
}elseif($char=="tn"){
$name = "����";
}elseif($char=="ly"){
$name = "����";
}elseif($char=="mr"){
$name = "��������";
}elseif($char=="ot"){
$name = "���� ����";
}else{
$name = "��� �����";
}
return $name;
}

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

$queryx = mysql_query("SELECT * FROM dlil_site where active='0' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>������ ����� ������� �����</div>";
}else{
echo "<form name='xxx' action='add_cp.php?action=op' method='post'>

<table class='xtable' width='100%' id='A425utoNumber15'>

<tr>
<td width='100%' colspan='8' class='xtx' align='center'>����� ����� �������</td>
</tr>

<tr>
                <td align='center' width='2%' class='xtr'>#</td>
                <td align='center' width='40%' class='xtr'>��� ������</td>
                <td align='center' width='20%' class='xtr'>��� ������</td>
                <td align='center' width='10%' class='xtr'>������</td>
                <td width='15%' align='center' class='xtr'>�����</td>
                <td width='13%' align='center' class='xtr'>�������</td>
                <td width='5%' align='center' class='xtr'>�����</td>
                <td width='5%' align='center' class='xtr'>���</td>
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
                <td width='20%' class='xtd'>".$p['metadescription']."<br />".$p['metakeywords']."</td>
                <td align='center' width='10%' class='xtd'>". country($p['country'])."</td>
                <td width='15%' align='center' class='xtd'>".$pc['title']."</td>
                <td width='13%' align='center' class='xtd'>$d</td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=edit&id=".$p['id']."'><img border='0' src='images/edit.gif' alt='����� ".$p['title']."' /></a></td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=delete&id=".$p['id']."'><img border='0' src='images/delete.gif' alt='��� ".$p['title']."' /></a></td>
</tr>";
}
echo "<tr>
<td colspan='8' align='center' class='xtr'><input name='activ' class='addsubmit' type='submit' value=' ����� ������� ' /> <input name='delete' class='addsubmit' type='submit' id='delete' value=' ��� ������� ' /> <input class='addsubmit' name='edit' type='submit' value=' ����� ������� ' /><br />
<a class='aa' href='add_cp.php?action=act&s=1'>����� ����</a> - <a class='aa' href='add_cp.php?action=act&s=0'>����� ����</a></td>
</tr>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_site where active='0'")) / $perpage);
if($pagesnum > 1){
echo "<tr>
<td width='100%' colspan='8' class='xtr' align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='add_cp.php?action=act&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</td>
</tr>";
}
echo "</table>

</form>";
}

}ELSEIF ($action=="op"){

if(isset($_POST['delete'])){
if(count($_POST['del']) > 0){
$del_id = join(',',$_POST['del']);
$sql = mysql_query("DELETE FROM dlil_site WHERE id IN($del_id)");
print "<p align=center>�� ��� ������� ���� �� ������� ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=act' />";
}else{
echo "<div align='center'>�� ��� ������� ����� �����</div>";
}
}


if(isset($_POST['activ'])){
if(count($_POST['del']) > 0){
$del_id = join(',',$_POST['del']);
$sql = mysql_query("UPDATE dlil_site SET active='1' WHERE id IN($del_id)");
print "<p align=center>�� ����� �������� ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=act' />";
}else{
echo "<div align='center'>�� ��� ������� ����� !!</div>";
}
}


if(isset($_POST['edit'])){

if(count($_POST['del']) > 0){
$c = count($_POST['del']);

$del_id = join(',',$_POST['del']);
$queryx = mysql_query("SELECT * FROM dlil_site where active=0 AND id IN($del_id) order by id desc");

echo"<form name='vbform' method='POST' action='add_cp.php?action=editall'>
<table class='xtable' width='100%' id='AutoNumber15555'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'>����� �������</td>
</tr>";
$ii = 0;
while($p = mysql_fetch_array($queryx))
{
++$ii;

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

echo "<input type='hidden' name='id[]' value='".$p['id']."' />
<tr>
<td width='30%' class='xtr'>� ��� ������ :</td>
<td width='70%' class='xtd'><input name='title[]' size='60' value='".$p['title']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ������ :</td>
<td width='70%' class='xtd'><input name='url[]' size='60' value='".$p['url']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� description :</td>
<td width='70%' class='xtd'><textarea name='metadescription[]' rows=4 cols=60>".$p['metadescription']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� keywords :</td>
<td width='70%' class='xtd'><textarea name='metakeywords[]' rows=4 cols=60>".$p['metakeywords']."</textarea></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ������ :</td>
<td width='70%' class='xtd'><input name='country[]' size='60' value='".$p['country']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ���� ������ :</td>
<td width='70%' class='xtd'><input name='yourname[]' size='60' value='".$p['yourname']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ���� ������ :</td>
<td width='70%' class='xtd'><input name='yourmail[]' size='60' value='".$p['yourmail']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ����� :</td>
<td width='70%' class='xtd'>
<select size='1' name='cat[]'>";
$sql = mysql_query ("SELECT * FROM dlil_catgory") or die ("error");
while($sub = mysql_fetch_array($sql))
{
if($sub['id'] ==  $p['cat']){
echo "<option value='$sub[id]' selected>$sub[title]</option>";
}else{
echo "<option value='$sub[id]'>$sub[title]</option>";
}

}
echo "</select>
</td>
</tr>

<tr>
<td width='30%' class='xtr'>� ������� :</td>
<td width='70%' class='xtd'>
<select size='1' name='active[]'>";
if($p['active'] == 1){
echo "<option value='1' selected>�����</option>";
echo "<option value='0'>���</option>";
}else{
echo "<option value='1'>�����</option>";
echo "<option value='0' selected>���</option>";
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
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' ��� ' name='B1' /></td>
</tr>

</table>
</form>";

}else{
echo "<div align='center'>�� ��� ������� ����� !!</div>";
}

}


}ELSEIF ($action=="editall"){

$number = count($_POST['id']);

for($i=0;$i<$number;$i++){
$id = $_POST['id'][$i];
$id = intval($id);

$title = $_POST['title'][$i];
$title = addslashes($title);
$title = trim($title);

$url = $_POST['url'][$i];
$url = addslashes($url);
$url = trim($url);

$metadescription = $_POST['metadescription'][$i];
$metadescription = addslashes($metadescription);
$metadescription = trim($metadescription);

$metakeywords = $_POST['metakeywords'][$i];
$metakeywords = addslashes($metakeywords);
$metakeywords = trim($metakeywords);

$country = $_POST['country'][$i];
$country = addslashes($country);
$country = trim($country);

$yourname = $_POST['yourname'][$i];
$yourname = addslashes($yourname);
$yourname = trim($yourname);

$yourmail = $_POST['yourmail'][$i];
$yourmail = addslashes($yourmail);
$yourmail = trim($yourmail);

$cat = $_POST['cat'][$i];
$active = $_POST['active'][$i];

if(!empty($title) OR !empty($url)){
echo "����� ������ $title . . . �����<br />";
$query =  mysql_query("UPDATE dlil_site SET title='$title',url='$url',metadescription='$metadescription',metakeywords='$metakeywords',country='$country',yourname='$yourname',yourmail='$yourmail',cat='$cat',active='$active' where id='$id'");
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=act' />";
}

}

}ELSEIF ($action=="freeadd"){
if(isset($_GET['num']) AND $_GET['num'] != 0){
$number = intval($_GET['num']);
$xcatss = intval($_GET['xcat']);
}else{
$number = 5;
}
?>
<form name="vbform" method="GET" action="">
<input name="action" type="hidden" value="freeadd" />
<div align="center">� ��� ���� ������� <input name="num" type="text" size=10 value="<?php echo $number; ?>" /> � ��� id ����� <input name="xcat" type="text" size=10 value="<?php echo $xcatss; ?>"/> <input type="submit" value=" ����� " class='addsubmit'></div>
</form>

<form name="GGG" method="post" action="add_cp.php?action=freeinsert">

<table class='xtable' width='100%' id='AutoNu1mber15'>
     <tr>
      <td width="100%" colspan="2" class='xtt' align="center">
      ����� ����� �����</td>
    </tr>
<?php

for($i=0;$i<$number;$i++){
?>
    <tr>
      <td width="30%" class='xtr'>� ��� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="title[]" /></td>
    </tr>
    <tr>
      <td width="30%" class='xtr'>� ����� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="url[]" dir="ltr" /></td>
    </tr>



       <tr>
      <td width="30%" class='xtr'>� ��� ���� description :</td>
      <td width="70%" class='xtd'><textarea name="metadescription[]" rows=2 cols=60></textarea></td>
    </tr>
    <tr>
      <td width="30%" class='xtr'>� ��� ���� keywords :</td>
      <td width="70%" class='xtd'><textarea name="metakeywords[]" rows=2 cols=60></textarea></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ��� ���� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="yourname[]" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ���� ���� ������ :</td>
      <td width="70%" class='xtd'><input size="60" name="yourmail[]" /></td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ������ :</td>
      <td width="70%" class='xtd'>
<select  size='1' name='country[]'>
<option value='0' selected='selected'>������ ...</option>
<option value='sa'>��������</option>
<option value='kw'>������</option>
<option value='ae'>��������</option>
<option value='bh'>�������</option>
<option value='om'>����</option>
<option value='qa'>���</option>
<option value='jo'>������</option>
<option value='so'>�������</option>
<option value='sd'>�������</option>
<option value='iq'>������</option>
<option value='ma'>������</option>
<option value='ye'>�����</option>
<option value='km'>�����</option>
<option value='dj'>������</option>
<option value='lb'>�����</option>
<option value='ps'>������</option>
<option value='sy'>����</option>
<option value='eg'>���</option>
<option value='dz'>�������</option>
<option value='tn'>����</option>
<option value='ly'>����</option>
<option value='mr'>��������</option>
<option value='ot'>���� ����</option>
</select>

      </td>
    </tr>


        <tr>
      <td width="30%" class='xtr'>� ��� ������ :</td>
      <td width="70%" class='xtd'>
<select size="1" name="lang[]">

<OPTION value='1'>ar</OPTION>
<OPTION value='2'>en</OPTION>

</select>
      </td>
    </tr>

    <tr>
      <td width="30%" class='xtr'>� ����� :</td>
      <td width="70%" class='xtd'>
<select size="1" name="cat[]">
<?php
$query = mysql_query("SELECT * FROM dlil_catgory order by id desc");
while($cat = mysql_fetch_array($query))
{
if(isset($_GET['xcat']) AND $_GET['xcat'] == $cat['id']){
echo "<OPTION value='$cat[id]' selected>$cat[title]</OPTION>";
}else{
echo "<OPTION value='$cat[id]'>$cat[title]</OPTION>";
}
}
?>
</select>
      </td>
    </tr>

<tr>
<td width="100%" colspan="2" class='xtr' align="center">- - - - - - - - -</td>
</tr>

<?php
}
?>
<tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" value=" ����� " name="cmdAdd" class='addsubmit' /></td>
    </tr>
  </table>
</form>
<?php


}ELSEIF ($action=="freeinsert"){
$number = count($_POST['title']);

for($i=0;$i<$number;$i++){
$title = $_POST['title'][$i];
$title = addslashes($title);
$title = trim($title);

$url = $_POST['url'][$i];
$url = addslashes($url);
$url = trim($url);

$cat = $_POST['cat'][$i];
$lang = $_POST['lang'][$i];




///////////////


$metadescription = $_POST['metadescription'][$i];
$metadescription = addslashes($metadescription);
$metadescription = trim($metadescription);

$metakeywords = $_POST['metakeywords'][$i];
$metakeywords = addslashes($metakeywords);
$metakeywords = trim($metakeywords);

$country = $_POST['country'][$i];

$yourname = $_POST['yourname'][$i];
$yourname = addslashes($yourname);

$yourmail = $_POST['yourmail'][$i];
$yourmail = addslashes($yourmail);

if($metadescription == ""){
$xx1 = $title;
}else{
$xx1 = $metadescription;
}

if($metakeywords == ""){
$xx2 = $title;
}else{
$xx2 = $metakeywords;
}



if(!empty($title) OR !empty($url)){
$q = mysql_query("INSERT INTO `dlil_site` (title,url,cat,lang,date,active,country,metadescription,metakeywords,yourname,yourmail)values('$title','$url','$cat','$lang','".time()."',1,'$country','$xx1','$xx2','$yourname','$yourmail')");
echo "<div align='right'>$title ....... ��<br /></div>";
}
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=add_cp.php?action=freeadd' />";
}
}
echo $f;
?>