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

echo "<div align='center'>������ ����� �� <a href='admininfo.php'>$u</a> - ��� ������� ������� <a href='add_cp.php?action=add'>$xx1</a> - ��� ������� ��� ����� ����� <a href='add_cp.php?action=act'>$xx2</a> - ��� ������ $counterdata - ���������� ����� $online<br><br></div>";

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

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 30;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_site where active='0' order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>������ ����� ������� �����</div>";
}else{
echo "<form name='xxx' action='add_cp.php?action=op' method='post'>

<table class='xtable' width='100%' id='AutoN4umber15'>

<tr>
<td colspan='8' align='center' class='xtt'>����� ����� �������</td>
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
                <td width='20%' class='xtd'>".$p['metadescription']."<br>".$p['metakeywords']."</td>
                <td align='center' width='10%' class='xtd'>".country($p['country'])."</td>
                <td width='15%' align='center' class='xtd'>".$pc['title']."</td>
                <td width='13%' align='center' class='xtd'>$d</td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=edit&id=".$p['id']."'><img border='0' src='images/edit.gif' alt='����� ".$p['title']."' /></a></td>
                <td width='5%' align='center' class='xtd'><a href='add_cp.php?action=delete&id=".$p['id']."'><img border='0' src='images/delete.gif' alt='��� ".$p['title']."' /></a></td>
</tr>";
}
echo "<tr>
<td colspan='8' align='center' class='xtr'><input class='addsubmit' name='activ' type='submit' value=' ����� ������� ' /> <input name='delete' type='submit' id='delete' value=' ��� ������� ' class='addsubmit' /> <input name='edit' type='submit' class='addsubmit' value=' ����� ������� ' /><br />
<a href='add_cp.php?action=act&s=1'>����� ����</a> - <a href='add_cp.php?action=act&s=0'>����� ����</a></td>
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