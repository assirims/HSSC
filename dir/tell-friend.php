<?php
session_start();
include("config.php");
include("function.php");
include("templates/template.php");

$action = $_GET['action'];
if(!isset($action)) $action = "index";

IF ($action=="index"){

if($htmlorphp==1){
$z = "friend-send.html";
}else{
$z = "tell-friend.php?action=send";
}

$text1 = rand(0,9);
$text2 = rand(0,9);
$text3 = "���� ���� ����� ".$text1." + ".$text2."";
$text4 = $text1 + $text2;

$_SESSION["captchacode"] = $text4;

tpl_header("����� ������ ��� ����");

$form = "<Form Name='SendPage' method='POST' action='$z'>
<fieldset>
<legend><span class='aa'>����� ������ ��� ����</span></legend>

<table border='0' width='100%' id='AutoNumber155'>
<tr>
      <td width='20%'>� ����� ���������� :</td>
      <td width='80%'><input class='addinput' type='text' name='SenderEmail' size='30' dir='ltr' /></td>
    </tr>
    <tr>
      <td width='20%'>� ���� ����� :</td>
      <td width='80%'><input class='addinput' type='text' name='ReceiverEmail' size=30 maxlength=40 dir='ltr' /></td>
    </tr>
    <tr>
      <td width='20%'>� ����� ������� :</td>
      <td width='80%'><input class='addinput' type='text' name='Subject' size='30' maxlength='40' /></td>
    </tr>
    <tr>
      <td width='20%'>� �� ������� :</td>
      <td width='80%'><textarea class='addinput' name='Message' WRAP=on COLS=53 ROWS=8></textarea></td>
    </tr>";
$form .= "<tr>
    <td width='100%' colspan='2' align='center'>
$text3 <input class='addinput' name='code' size='10' dir='ltr' />
      </td>
      </tr>";

$form .= "<tr>
      <td width='100%' colspan='2' align='center'>
      <input type='submit' class='addsubmit' value=' ���� ' title='����' name='Send' /></td>
    </tr>
  </table>
</fieldset>
</form>";

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo $form;
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

echo "<div class='indexw'>";
echo $form;
echo "</div>";

}

tpl_footer();

}ELSEIF ($action=="send"){

if($_POST['code'] != $_SESSION['captchacode'] OR $_SESSION["captchacode"]=='')
{
tpl_header("����� ������");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
$ssss = "<div class='divmessage'>��� �� ��� �����ޡ �� ���� ��� �������� ��� ���� . <a href='javascript:history.back(1)'>���� �����</a></div>";
echo "<fieldset>
<legend><span class='aa'>����� ������</span></legend>
<div align='center'>$ssss</div>
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

$ssss = "<div class='divmessage'>��� �� ��� �����ޡ �� ���� ��� �������� ��� ���� . <a href='javascript:history.back(1)'>���� �����</a></div>";

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>����� ������</span></legend>
<div align='center'>$ssss</div>
</fieldset></div>";

}

tpl_footer();
exit;
}

$ReceiverEmail  = $_POST['ReceiverEmail'];
$SenderEmail    = $_POST['SenderEmail'];
$Subject        = $_POST['Subject'];
$Message        = $_POST['Message'];
$headers = "From: ". $SenderEmail ."<" . $SenderEmail . ">" . "\r\n";

if($ReceiverEmail == "" OR $SenderEmail == "" OR $Subject == "" OR $Message == ""){
$xxx = "- ���� ��� ������� ����� . <a href='javascript:history.back(1)'>���� �����</a>";
}else{
$X = @mail ($ReceiverEmail,$Subject,$Message,$headers);
If ($X){
$xxx = "- �� ����� ������ ����� ... ���� ������� ��������";

if($htmlorphp==1){
$zy = "index.html";
}else{
$zy = "index.php";
}

$xxx .= "<meta http-equiv='Refresh' content='1;URL=$zy' />";
}else{
$xxx = "- �� ��� ����� ������� ... ���� ��� �� . <a href='javascript:history.back(1)'>���� �����</a>";
}

}

tpl_header("����� ������");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";
echo "<fieldset>
<legend><span class='aa'>����� ������</span></legend>
$xxx
</fieldset>";
echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{
echo "<div class='indexw'><fieldset>
<legend><span class='aa'>����� ������</span></legend>
$xxx
</fieldset></div>";
}

tpl_footer();

}

?>