<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){
?>
<form name="vbform" method="post" action="ads_cp.php?action=insert">

  <table class='xtable' width="100%" id="AutoNumber1">
     <tr>
      <td width="100%" colspan="2" class='xtt' align="center">
      ����� �������</td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>� ��� ������� :</td>
      <td width="80%" class='xtd'><input size="60" name="title" /></td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>� ���� ������� :</td>
      <td width="80%" class='xtd'><input size="60" name="image" /></td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>� ���� ������� :</td>
      <td width="80%" class='xtd'><input size="60" name="url" /></td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>� ����� ����� :</td>
      <td width="80%" class='xtd'><input size="60" name="orderads" /></td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>� ���� ������� :</td>
      <td width="80%" class='xtd'>
<select size="1" name="upordown">
<OPTION value='0' selected>�� ������</OPTION>
<OPTION value='1'>�� ������</OPTION>
<OPTION value='2'>����</OPTION>
<OPTION value='3'>����</OPTION>

</select>
      </td>
    </tr>

     <tr>
      <td width="100%" colspan="2" class='xtr'>
      <p align="center"><input type="submit" class='addsubmit' value=" ����� " name="cmdAdd" /></td>
    </tr>
  </table>
</form>
<br />&nbsp;

<?php

$queryx = mysql_query("SELECT * FROM dlil_ads order by id desc");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "<table class='xtable' width='100%' id='AutoNu5mber15'>
  <tr>
<td width='100%' colspan='4' class='xtx' align='center'>��� ���� ���������</td>
</tr>

  <tr>
      <td width='79%' align='center' class='xtr'>�������</td>
      <td width='7%' align='center' class='xtr'>������</td>
      <td width='7%' align='center' class='xtr'>�����</td>
      <td width='7%' align='center' class='xtr'>���</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

$p['url'] = stripslashes($p['url']);
$p['url'] = htmlspecialchars($p['url']);

echo "<tr>
      <td width='79%' class='xtd'>� <a target='_blank' href='".$p['url']."'>".$p['title']."</a></td>
      <td width='7%' align='center' class='xtd'>".$p['vis']."</td>
      <td width='7%' align='center' class='xtd'><a href='ads_cp.php?action=edit&id=$p[id]'><img border='0' src='images/edit.gif' alt='����� ".$p['title']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='ads_cp.php?action=delete&id=$p[id]'><img border='0' src='images/delete.gif' alt='��� ".$p['title']."' /></a></td>
    </tr>";
}
echo "</table>";
}

}ELSEIF ($action=="insert"){

$title = addslashes($_POST['title']);
$title = trim($title);

$url = addslashes($_POST['url']);
$url = trim($url);

$image = addslashes($_POST['image']);
$image = trim($image);

$upordown = $_POST['upordown'];
$orderads = $_POST['orderads'];

if (empty($title)){
echo "<p align=center>�� ���� ��� ������� . <a href='javascript:history.back(1)'>���� �����</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_ads (title,url,upordown,orderads,image,active) VALUES ('$title','$url','$upordown','$orderads','$image',1)") or die ("������� �����");
print "<p align=center>��� ����� ������� ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=ads_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_ads where id='$id'");
$p= mysql_fetch_array($query);

$p['title'] = stripslashes($p['title']);
$p['title'] = htmlspecialchars($p['title']);

$p['url'] = stripslashes($p['url']);
$p['url'] = htmlspecialchars($p['url']);

$p['image'] = stripslashes($p['image']);
$p['image'] = htmlspecialchars($p['image']);

echo"<form name='vbform' method='POST' action='ads_cp.php?action=editok'>
<input type='hidden' name='id' value='$p[id]' />
<table class='xtable' width='100%' id='AutoNumber155'>

<tr>
<td width='100%' colspan='2' class='xtt' align='center'>����� ������� ".$p['title']."</td>
</tr>

<tr>
<td width='30%' class='xtr'>� ��� ������� :</td>
<td width='70%' class='xtd'><input name='title' size='60' value='".$p['title']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ������� :</td>
<td width='70%' class='xtd'><input name='image' size='60' value='".$p['image']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ������� :</td>
<td width='70%' class='xtd'><input name='url' size='60' value='".$p['url']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ����� ������� :</td>
<td width='70%' class='xtd'><input name='orderads' size='60' value='".$p['orderads']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>� ���� ������� :</td>
<td width='70%' class='xtd'>
<select size='1' name='upordown'>";

if($p['upordown'] == 0){
echo "<OPTION value='0' selected>�� ������</OPTION>
<OPTION value='1'>�� ������</OPTION>
<OPTION value='2'>����</OPTION>
<OPTION value='3'>����</OPTION>";
}elseif($p['upordown'] == 1){
echo "<OPTION value='0'>�� ������</OPTION>
<OPTION value='1' selected>�� ������</OPTION>
<OPTION value='2'>����</OPTION>
<OPTION value='3'>����</OPTION>";
}elseif($p['upordown'] == 2){
echo "<OPTION value='0'>�� ������</OPTION>
<OPTION value='1'>�� ������</OPTION>
<OPTION value='2' selected>����</OPTION>
<OPTION value='3'>����</OPTION>";
}elseif($p['upordown'] == 3){
echo "<OPTION value='0'>�� ������</OPTION>
<OPTION value='1'>�� ������</OPTION>
<OPTION value='2'>����</OPTION>
<OPTION value='3' selected>����</OPTION>";
}
echo "</select>
</td>
</tr>

<tr>
<td width='30%' class='xtr'>� ������� :</td>
<td width='70%' class='xtd'>
<select size='1' name='active'>";

if($p['active'] == 0){
echo "<OPTION value='0' selected>��</OPTION>
<OPTION value='1'>���</OPTION>";
}elseif($p['active'] == 1){
echo "<OPTION value='0'>��</OPTION>
<OPTION value='1' selected>���</OPTION>";
}

echo "</select>
</td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input class='addsubmit' type='submit' value=' ��� ' name='B1' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);
$title = addslashes($_POST['title']);
$title = trim($title);

$image = addslashes($_POST['image']);
$image = trim($image);

$url = addslashes($_POST['url']);
$url = trim($url);

$upordown = $_POST['upordown'];
$orderads = $_POST['orderads'];
$active = $_POST['active'];

if (empty($title)){
echo "<p align=center>�� ���� ��� ������� . <a href='javascript:history.back(1)'>���� �����</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_ads SET title='$title', url='$url', upordown='$upordown', orderads='$orderads', active='$active', image='$image' where id='$id'");
echo"<p align=center>�� ������� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=ads_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_ads WHERE id='$id'");
echo"<p align=center>�� ��� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=ads_cp.php?action=add' />";

}

echo $f;
?>