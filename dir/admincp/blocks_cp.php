<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";


IF ($action=="add"){
?>
<form name="vbform" method="post" action="blocks_cp.php?action=insert">

<table class='xtable' width='100%' id='AutoNumber15'>
  <tr>
      <td width="100%" colspan="2" class='xtt' align="center">
      ����� ������ �����</td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>� ����� ������ :</td>
      <td width="65%" class='xtd'><input size="60" name="title" /></td>
    </tr>

    <tr>
      <td width="35%" class='xtr'>� ����� ������ ���� ��� html :<br />
      - ���� ������ {newsite}<br />- ���� ������� {oldsite}<br />- ������ ������ {ratesite}<br />- ������ �� ��� �������� {countsite}<br />- ������ ����� {visitesite}<br />
- ����� ������ ������� {randquran}<br />
- ������ ����� ������� {randhadeth}<br />
- ��� ������ ������� {randtext}<br />
- ������� �������� ������ {cat}<br />
- ��������� {poll}<br /></td>
      <td width="36%" class='xtd'><textarea name="text" rows="15" cols="60"></textarea></td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>� ���� ������ :</td>
      <td width="65%" class='xtd'>
<select size="1" name="rightorleft">
<OPTION value='1' selected>����</OPTION>
<OPTION value='0'>����</OPTION>
</select>
      </td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>� ����� ������ :</td>
      <td width="65%" class='xtd'>
<select size="1" name="active">
<OPTION value='1' selected>���</OPTION>
<OPTION value='0'>��</OPTION>
</select>
      </td>

    <tr>
      <td width="35%" class='xtr'>� ����� ������ :</td>
      <td width="65%" class='xtd'><input size="10" name="orderblock" /></td>
    </tr>

    </tr>
     <tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" value=" ����� " name="cmdAdd" class='addsubmit'/></td>
    </tr>
  </table>
</form>&nbsp;

<?php

$query = mysql_query("SELECT * FROM dlil_blocks order by id desc");
$xx = mysql_num_rows($query);
if($xx == 0){
echo "";
}else{

echo "<table class='xtable' width='100%' id='AutoNumb4er15'>
    <tr>
<td width='100%' colspan='3' class='xtx' align='center'>��� ���� ��������</td>
</tr>

    <tr>
      <td width='86%' align='center' class='xtr'>��� ������</td>
      <td width='7%' align='center' class='xtr'>�����</td>
      <td width='7%' align='center' class='xtr'>���</td>
    </tr>";
while($cat = mysql_fetch_array($query))
{
echo "<tr>
      <td width='86%' class='xtd'>� $cat[title]</td>
      <td width='7%' align='center' class='xtd'>
      <a href='blocks_cp.php?action=edit&id=$cat[id]'><img border='0' src='images/edit.gif' alt='����� $cat[title]' /></a></td>
      <td width='7%' align='center' class='xtd'>
      <a href='blocks_cp.php?action=delete&id=$cat[id]'><img border='0' src='images/delete.gif' alt='��� $cat[title]' /></a></td>
    </tr>";
}
echo "</table>";
}

}ELSEIF ($action=="insert"){

$title = addslashes($_POST['title']);
$title = trim($title);
$text  = addslashes($_POST['text']);
$text = trim($text);
$rightorleft = intval($_POST['rightorleft']);
$active = intval($_POST['active']);
$orderblock = intval($_POST['orderblock']);

if (empty($title)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($text)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_blocks (title,text,rightorleft,active,orderblock) VALUES ('$title','$text','$rightorleft','$active','$orderblock')") or die ("������� �����");
print "<p align=center>��� ����� ������ ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=blocks_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_blocks where id='$id'");
$p_cats= mysql_fetch_array($query);

$p_cats['title'] = stripslashes($p_cats['title']);
$p_cats['title'] = htmlspecialchars($p_cats['title']);

$p_cats['text'] = stripslashes($p_cats['text']);
$p_cats['text'] = htmlspecialchars($p_cats['text']);

echo"<form name='vbform' method='POST' action='blocks_cp.php?action=editok'>
<input type='hidden' name='id' value='$p_cats[id]' />

<table class='xtable' width='100%' id='AutoNumber155'>

<tr>
<td width='100%' colspan='2' class='xtt' align='center'>����� ������ ".$p_cats['title']."</td>
</tr>

<tr>
<td width='25%' class='xtr'>� ����� ������ :</td>
<td width='75%' class='xtd'><input name='title' size='60' value='".$p_cats['title']."' /></td>
</tr>

<tr>
<td width='25%' class='xtr'>� ����� ������ :</td>
<td width='75%' class='xtd'><textarea name='text' rows='15' cols='60'>".$p_cats['text']."</textarea></td>
</tr>

<tr>
<td width='25%' class='xtr'>� ����� ������ :</td>
<td width='75%' class='xtd'><input name='orderblock' size='10' value='$p_cats[orderblock]' /></td>
</tr>

<tr>
<td width='25%' class='xtr'>� ���� ������ :</td>
<td width='75%' class='xtd'>";
if($p_cats['rightorleft'] == 1){
echo "<select size='1' name='rightorleft'>
<OPTION value='1' selected>����</OPTION>
<OPTION value='0'>����</OPTION>
</select>";
}else{
echo "<select size='1' name='rightorleft'>
<OPTION value='0' selected>����</OPTION>
<OPTION value='1'>����</OPTION>
</select>";
}
echo "</td>
</tr>

<tr>
<td width='25%' class='xtr'>� ����� ������ :</td>
<td width='75%' class='xtd'>";
if($p_cats['active'] == 1){
echo "<select size='1' name='active'>
<OPTION value='1' selected>���</OPTION>
<OPTION value='0'>��</OPTION>
</select>";
}else{
echo "<select size='1' name='active'>
<OPTION value='0' selected>��</OPTION>
<OPTION value='1'>���</OPTION>
</select>";
}
echo "</td>
</tr>


<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' class='addsubmit' value=' ��� ' name='B1' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);
$title = addslashes($_POST['title']);
$title = trim($title);
$text  = addslashes($_POST['text']);
$text = trim($text);
$rightorleft = intval($_POST['rightorleft']);
$active = intval($_POST['active']);
$orderblock = intval($_POST['orderblock']);

if (empty($title)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($text)){
echo "<p align=center>�� ���� ����� ������ . <a href='javascript:history.back(1)'>���� �����</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_blocks SET title='$title', text='$text', rightorleft='$rightorleft', active='$active', orderblock='$orderblock' where id='$id'");
echo"<p align=center>�� ������� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=blocks_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_blocks WHERE id='$id'");
echo"<p>�� ��� ������ ...</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=blocks_cp.php?action=add' />";
}

echo $f;
?>