<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "home";

IF ($action=="home"){

$query2 = mysql_query("SELECT * FROM dlil_options where id='1'");
$s = mysql_fetch_array($query2);

$s['namesite'] = htmlspecialchars($s['namesite']);
$s['namesite'] = stripslashes($s['namesite']);

$s['urlsite'] = htmlspecialchars($s['urlsite']);
$s['urlsite'] = stripslashes($s['urlsite']);

$s['pathsite'] = htmlspecialchars($s['pathsite']);
$s['pathsite'] = stripslashes($s['pathsite']);

$s['emailsite'] = htmlspecialchars($s['emailsite']);
$s['emailsite'] = stripslashes($s['emailsite']);

$s['textheader'] = htmlspecialchars($s['textheader']);
$s['textheader'] = stripslashes($s['textheader']);

$s['textfooter'] = htmlspecialchars($s['textfooter']);
$s['textfooter'] = stripslashes($s['textfooter']);

$s['closesitetext'] = htmlspecialchars($s['closesitetext']);
$s['closesitetext'] = stripslashes($s['closesitetext']);

$s['foldertemplate'] = htmlspecialchars($s['foldertemplate']);
$s['foldertemplate'] = stripslashes($s['foldertemplate']);

$s['meta1'] = htmlspecialchars($s['meta1']);
$s['meta1'] = stripslashes($s['meta1']);

$s['meta2'] = htmlspecialchars($s['meta2']);
$s['meta2'] = stripslashes($s['meta2']);

$s['disallowcatid'] = htmlspecialchars($s['disallowcatid']);
$s['disallowcatid'] = stripslashes($s['disallowcatid']);

$s['textadd'] = htmlspecialchars($s['textadd']);
$s['textadd'] = stripslashes($s['textadd']);


if($s['htmlorphp'] == 1){
$op1 = "<option value='1' selected>���</option>
<option value='0'>��</option>";
}else{
$op1 = "<option value='1'>���</option>
<option value='0' selected>��</option>";
}


if($s['closesite'] == 1){
$op6 = "<option value='1' selected>���</option>
<option value='0'>��</option>";
}else{
$op6 = "<option value='1'>���</option>
<option value='0' selected>��</option>";
}


if($s['allow_add'] == 1){
$opx1 = "<option value='1' selected>���</option>
<option value='0'>��</option>";
}else{
$opx1 = "<option value='1'>���</option>
<option value='0' selected>��</option>";
}

if($s['showblocks'] == 1){
$opx2 = "<option value='1' selected>������ ��������</option>
<option value='0'>��� ������ ��������</option>";
}else{
$opx2 = "<option value='1'>������ ��������</option>
<option value='0' selected>��� ������ ��������</option>";
}


if($s['showrticles'] == 1){
$opxa1 = "<option value='1' selected>������ ��� �������� ���������</option>
<option value='0'>��� ������ �������� ���������</option>";
}else{
$opxa1 = "<option value='1'>������ ��� �������� ���������</option>
<option value='0' selected>��� ������ �������� ���������</option>";
}

if($s['activecomments'] == 1){
$opxa2 = "<option value='1' selected>����� �������� ������</option>
<option value='0'>����� ����� �������</option>";
}else{
$opxa2 = "<option value='1'>����� �������� ������</option>
<option value='0' selected>����� ����� �������</option>";
}

if($s['showcomments'] == 1){
$opxa3 = "<option value='1' selected>������ ���������</option>
<option value='0'>����� ���������</option>";
}else{
$opxa3 = "<option value='1'>������ ���������</option>
<option value='0' selected>����� ���������</option>";
}

if($s['allowcomments'] == 1){
$opxa4 = "<option value='1' selected>������ �������� ��� ��������</option>
<option value='0'>����� ������� ��� ��������</option>";
}else{
$opxa4 = "<option value='1'>������ ���������</option>
<option value='0' selected>����� ���������</option>";
}

if($s['showlikesite'] == 1){
$opxa5 = "<option value='1' selected>����� ������� �������� �� ���� ��� ������</option>
<option value='0'>��� ����� ������� ��������</option>";
}else{
$opxa5 = "<option value='1' selected>����� ������� �������� �� ���� ��� ������</option>
<option value='0' selected>��� ����� ������� ��������</option>";
}

if($s['typeaddcheck'] == 1){
$opxa6 = "<option value='1' selected>��� ������� �����</option>
<option value='0'>��� ������� ������</option>";
}else{
$opxa6 = "<option value='1' selected>��� ������� �����</option>
<option value='0' selected>��� ������� ������</option>";
}

if($s['randtype'] == 1){
$opxa7 = "<option value='1' selected>�� �����</option>
<option value='2'>�� ����</option>
<option value='3'>�� ���</option>
<option value='4'>�� ���</option>";
}elseif($s['randtype'] == 2){
$opxa7 = "<option value='1'>�� �����</option>
<option value='2' selected>�� ����</option>
<option value='3'>�� ���</option>
<option value='4'>�� ���</option>";
}elseif($s['randtype'] == 3){
$opxa7 = "<option value='1'>�� �����</option>
<option value='2'>�� ����</option>
<option value='3' selected>�� ���</option>
<option value='4'>�� ���</option>";
}elseif($s['randtype'] == 4){
$opxa7 = "<option value='1'>�� �����</option>
<option value='2'>�� ����</option>
<option value='3'>�� ���</option>
<option value='4' selected>�� ���</option>";
}else{
$opxa7 = "<option value='1'>�� �����</option>
<option value='2'>�� ����</option>
<option value='3'>�� ���</option>
<option value='4'>�� ���</option>";
}

if($s['showrandsiteinindex'] == 1){
$opxa8 = "<option value='1' selected>����� ���� ������ �� ��������</option>
<option value='0'>��� ����� ���� ������ ���������</option>";
}else{
$opxa8 = "<option value='1'>����� ���� ������ �� ��������</option>
<option value='0' selected>��� ����� ���� ������ ���������</option>";
}

$sqlp = @mysql_query("SELECT * FROM dlil_poll where active='1' order by id desc");
$xx = mysql_num_rows($sqlp);
if($xx == 0){
$prints = "<div align='center'>������ ��������� �����</div>";
}else{
$prints = "<select size='1' name='idpoll'>";
while($Rowxx = mysql_fetch_array($sqlp))
{
$Rowxx['qus'] = stripslashes($Rowxx['qus']);

if($s['idpoll']==$Rowxx['id']){
$prints .= "<option value='".$Rowxx['id']."' selected>".$Rowxx['qus']."</option>";
}else{
$prints .= "<option value='".$Rowxx['id']."'>".$Rowxx['qus']."</option>";
}
}
$prints .= "</select>";
}

$ww1 = "45%";
$ww2 = "55%";

$form = "<form name='vbform' method='POST' action='option.php?action=update'>
<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' colspan='2' class='xtx' align='center'>������ ��������</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ������ :</td>
<td width='$ww2' class='xtd'><input name='namesite' size='60' value='".$s['namesite']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ���� ������ :</td>
<td width='$ww2' class='xtd'><input name='urlsite' dir='ltr' size='60' value='".$s['urlsite']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ���� �������� :</td>
<td width='$ww2' class='xtd'><input name='pathsite' dir='ltr' size='60' value='".$s['pathsite']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� ������ :</td>
<td width='$ww2' class='xtd'><input name='emailsite' dir='ltr' size='60' value='".$s['emailsite']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ���� Description ( ��� ������ ):</td>
<td width='$ww2' class='xtd'><input name='meta1' size='60' value='".$s['meta1']."' /><br /></td>
</tr>
<tr>
<td width='$ww1' class='xtr'>� ���� Keywords ( ����� ������� ):</td>
<td width='$ww2' class='xtd'><input name='meta2' size='60' value='".$s['meta2']."' /><br />
���� ����� ������� ���� ������� ,</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ���� ���� �������� :</td>
<td width='$ww2' class='xtd'><input name='foldertemplate' dir='ltr' size='60' value='".$s['foldertemplate']."' />
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ��������� ������ ������ �� ������ :</td>
<td width='$ww2' class='xtd'><input name='ads_headerloop' size='40' value='".$s['ads_headerloop']."' /></td>
</tr>
<tr>
<td width='$ww1' class='xtr'>� ��� ��������� ������ ������ �� ������ :</td>
<td width='$ww2' class='xtd'><input name='ads_footerloop' size='40' value='".$s['ads_footerloop']."' /></td>
</tr>
<tr>
<td width='$ww1' class='xtr'>� ��� ������� ���� ����� ��� ������� �� ������ �������� :</td>
<td width='$ww2' class='xtd'><input name='index_limit' size='40' value='".$s['index_limit']."' /></td>
</tr>
<tr>
<td width='$ww1' class='xtr'>� ����� id ������� ���� ����� ������� �� ������ �������� :</td>
<td width='$ww2' class='xtd'><input name='disallowcatid' size='40' value='".$s['disallowcatid']."' /><br />
���� ��� ����� ������ ������ ������� ,</td>
</tr>


<tr>
<td width='$ww1' class='xtr'>� ��� ������� ���� ����� ������� �������� ������ ������ :</td>
<td width='$ww2' class='xtd'><input name='number' size='40' value='".$s['number']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ������� ���� ����� ���� ������� :</td>
<td width='$ww2' class='xtd'><input name='site_cat_limit' size='40' value='".$s['site_cat_limit']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ������� ���� ����� ��������� :</td>
<td width='$ww2' class='xtd'><input name='limitinblock' size='40' value='".$s['limitinblock']."' /></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� �������� ������� �������� :</td>
<td width='$ww2' class='xtd'><input name='limitarticles' size='40' value='".$s['limitarticles']."' />
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� �������� ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='showrticles'>
$opxa1
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ������ ����� ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='activecomments'>
$opxa2
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ������ ����� ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='allowcomments'>
$opxa4
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ������ ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='showcomments'>
$opxa3
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ���� ������� ������� ��� :</td>
<td width='$ww2' class='xtd'><input name='numbercharcomments' size='10' value='".$s['numbercharcomments']."' />
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� ������ ��� ��������� ��� ���� :</td>
<td width='$ww2' class='xtd'><input name='timerate' size='10' value='".$s['timerate']."' /> �����
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��������� ��������� :</td>
<td width='$ww2' class='xtd'>
$prints
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ���� ������ ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='showrandsiteinindex'>
$opxa8
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ����� ������ �������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='randtype'>
$opxa7
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� ������� �������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='showlikesite'>
$opxa5
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ��� ������� �������� :</td>
<td width='$ww2' class='xtd'><input name='limitlikesite' size='10' value='".$s['limitlikesite']."' />
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ������� �� ������ :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='typeaddcheck'>
$opxa6
</select>
</td>
</tr>
";


$form .= "<tr>
<td width='$ww1' class='xtr'>� ����� ��������� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='htmlorphp'>
$op1
</select>
</td>
</tr>";


$form .= "<tr>
<td width='$ww1' class='xtr'>� ����� ����� ������ ����� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='allow_add'>
$opx1
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� ����� :</td>
<td width='$ww2' class='xtd'>
<select size='1' name='showblocks'>
$opx2
</select>
</td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� �� ������� :</td>
<td width='$ww2' class='xtd'><textarea name='textheader' rows='5' cols='75'>".$s['textheader']."</textarea></td>
</tr>

<tr>
<td width='$ww1' class='xtr'>� ����� �� ������� :</td>
<td width='$ww2' class='xtd'><textarea name='textfooter' rows='5' cols='75'>".$s['textfooter']."</textarea></td>
</tr>


<tr>
<td width='$ww1' class='xtr'>� ����� ������ :</td>
<td width='$ww2' class='xtd'>
<textarea name='closesitetext' rows='5' cols='75'>".$s['closesitetext']."</textarea><br /><select size='1' name='closesite'>
$op6
</select></td>
</tr>

<tr>
<td align='center' width='100%' colspan='2' class='xtd'>
����� ������� ����� ������� ������<br />
<textarea id='textarea1' name='textadd' rows=5 cols=75>".$s['textadd']."</textarea>
</td>
</tr>

<tr>
<td align='center' width='100%' colspan='2' class='xtr'><input class='addsubmit' type='submit' value=' ����� �������� ' name='B1' /></td>
</tr>

</table>


</form>";

echo $form;

}ELSEIF ($action=="update"){

$namesite = addslashes($_POST['namesite']);
$namesite = trim($namesite);
$urlsite = addslashes($_POST['urlsite']);
$urlsite = trim($urlsite);
$pathsite = addslashes($_POST['pathsite']);
$pathsite = trim($pathsite);
$emailsite = addslashes($_POST['emailsite']);
$emailsite = trim($emailsite);
$textfooter = addslashes($_POST['textfooter']);
$textfooter = trim($textfooter);
$textheader = addslashes($_POST['textheader']);
$textheader = trim($textheader);
$closesitetext = addslashes($_POST['closesitetext']);
$closesite = $_POST['closesite'];
$htmlorphp = $_POST['htmlorphp'];

$ads_headerloop = $_POST['ads_headerloop'];
$ads_footerloop = $_POST['ads_footerloop'];
$index_limit = $_POST['index_limit'];
$disallowcatid = $_POST['disallowcatid'];
$number = $_POST['number'];
$site_cat_limit = $_POST['site_cat_limit'];
$limitinblock = $_POST['limitinblock'];

$meta1 = addslashes($_POST['meta1']);
$meta2 = addslashes($_POST['meta2']);
$foldertemplate = addslashes($_POST['foldertemplate']);

$allow_add = $_POST['allow_add'];
$showblocks = $_POST['showblocks'];
$opt1 = $_POST['opt1'];



$limitarticles = $_POST['limitarticles'];
$showrticles = $_POST['showrticles'];
$activecomments = $_POST['activecomments'];
$showcomments = $_POST['showcomments'];
$allowcomments = $_POST['allowcomments'];
$numbercharcomments = $_POST['numbercharcomments'];
$timerate = $_POST['timerate'];
$idpoll = $_POST['idpoll'];
$randdate = $_POST['randdate'];
$randsiteid = $_POST['randsiteid'];
$randtype = $_POST['randtype'];
$showrandsiteinindex = $_POST['showrandsiteinindex'];
$limitlikesite = $_POST['limitlikesite'];
$showlikesite = $_POST['showlikesite'];
$typeaddcheck = $_POST['typeaddcheck'];
$textadd = addslashes($_POST['textadd']);


$query3 =  mysql_query("UPDATE dlil_options SET
namesite='$namesite',
urlsite='$urlsite',
pathsite='$pathsite',
emailsite='$emailsite',
textfooter='$textfooter',
textheader='$textheader',
closesitetext='$closesitetext',
closesite='$closesite',
htmlorphp='$htmlorphp',
ads_headerloop='$ads_headerloop',
ads_footerloop='$ads_footerloop',
index_limit='$index_limit',
disallowcatid='$disallowcatid',
number='$number',
site_cat_limit='$site_cat_limit',
limitinblock='$limitinblock',
meta1='$meta1',
meta2='$meta2',
foldertemplate='$foldertemplate',
allow_add='$allow_add',
showblocks='$showblocks',
limitarticles = '$limitarticles',
showrticles = '$showrticles',
activecomments = '$activecomments',
showcomments = '$showcomments',
allowcomments = '$allowcomments',
numbercharcomments = '$numbercharcomments',
timerate = '$timerate',
idpoll = '$idpoll',
randtype = '$randtype',
showrandsiteinindex = '$showrandsiteinindex',
limitlikesite = '$limitlikesite',
showlikesite = '$showlikesite',
typeaddcheck = '$typeaddcheck',
textadd = '$textadd',
opt1='$opt1' where id='1'");

if($query3){
echo "<p align=center>�� ������� �����</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=option.php?action=home' />";
}else{
echo "<div align='center'>��� �� ����� �������� ������ �� ������ dlil_options ������</div>";
}
}


echo $f;
?>