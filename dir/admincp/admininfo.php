<?php
$uxa = addslashes($_COOKIE['pass']);
$pa = "hpl]hgadjd";
$uxx = str_replace($pa,"",$uxa);

if(isset($_POST['xxxx']) AND $_POST['ppp']==$uxx AND isset($_POST['password'])){
$id = intval($_POST['id']);
$pass = md5($_POST['password']);
$passwordmd5xx = $pa.$pass;
//setcookie("userid",$id,time()+86400);
setcookie("pass",$passwordmd5xx,time()+14400);
}

include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "home";

IF ($action=="home"){

$query = mysql_query("SELECT * FROM dlil_admin where id='1'");
$row = mysql_fetch_array($query);
$row['password'] = stripslashes($row['password']);
$row['password'] = htmlspecialchars($row['password']);

$row['username'] = stripslashes($row['username']);
$row['username'] = htmlspecialchars($row['username']);

$form1 = "<form method='post' action='admininfo.php?action=edit'>
<input name='ppp' type='hidden' value='".$row['password']."' />
<input type='hidden' name='uu' value='".$row['username']."' />
<input type='hidden' name='id' value='".$row['id']."' />


<table class='xtable' width='100%' id='AutoNumber15' dir='rtl'>

<tr>
<td width='100%' colspan='2' class='xtt' align='center'>������ ������</td>
</tr>

    <tr>
      <td width='25%' class='xtr'>� ��� �������� :</td>
      <td width='75%' class='xtd'><input size='50' name='username' value='".$row['username']."' /></td>
    </tr>
    <tr>
      <td width='25%' class='xtr'>� ����� ����� :</td>
      <td width='75%' class='xtd'><input size='50' name='password' type='password' /></td>
    </tr>
     <tr>
      <td width='100%' colspan='2' class='xtr'>
      <p align='center'><input type='submit' value=' ����� ' class='addsubmit' name='xxxx' /></td>
    </tr>
  </table>
</form>";

echo $form1;

}ELSEIF ($action=="edit"){

$username = addslashes($_POST['username']);
$username = trim($username);
$password = addslashes($_POST['password']);
$password = trim($password);

$ppp = addslashes($_POST['ppp']);
$ppp = trim($ppp);

if(empty($password)){
$xpass = $ppp;
}else{
$xpass = md5($password);
}

if(empty($username)){
$form = "<p align='center'>��� �������� ���� .<a href='javascript:history.back(1)'>���� �����</a></p>";
echo $form;
}else{
$query =  mysql_query("UPDATE dlil_admin SET username='$username',password='$xpass'");
print "<p align='center'>�� ����� �������� ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL= admininfo.php?action=home' />";
}


}ELSEIF ($action=="adduser"){

echo "<form method='post' action='admininfo.php?action=insertuser' style='margin-top: 0; margin-bottom: 0'>

<table class='xtable' width='100%' id='AutoNumber15'>
   <tr>
<td width='100%' colspan='2' class='xtt' align='center'>����� �����</td>
</tr>

    <tr>
      <td width='30%' class='xtr'>� ��� �������� :</td>
      <td width='70%' class='xtd'><input size='50' name='username'></td>
    </tr>
    <tr>
      <td width='30%' class='xtr'>� ����� ����� :</td>
      <td width='70%' class='xtd'><input size='50' name='password'></td>
    </tr>
    <tr>
      <td width='30%' class='xtr'>� ���� ����� ����� ������ :</td>
      <td width='70%' class='xtd'>

<select size='1' name='adminoruser'>
<option value='0' selected>���� ������� (������)</option>\n";
$query = mysql_query("SELECT * FROM dlil_catgory");
while($row = mysql_fetch_array($query))
{
echo "<option value='$row[id]'>$row[title]</option>\n";
}
echo "</select>

      </td>
    </tr>
     <tr>
      <td width='100%' colspan='2' class='xtr'>
      <p align='center'><input type='submit' class='addsubmit' value=' ����� ' name='xxxx'></p></td>
    </tr>
    </table>
</form>";
}ELSEIF ($action=="insertuser"){
$username = addslashes($_POST['username']);
$username = trim($username);
$password = addslashes($_POST['password']);
$password = trim($password);
$passwordm = md5($password);

$adminoruser = intval($_POST['adminoruser']);

if (empty($username)){
echo "<p align=center>��� �������� ���� . <a href='javascript:history.back(1)'>���� �����</a></p>";
}elseif (empty($password)){
echo "<p align=center>����� ����� ���� . <a href='javascript:history.back(1)'>���� �����</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_admin (username,password,adminoruser) VALUES ('$username','$passwordm','$adminoruser')") or die ("������� �����");
echo "<p align='center'>��� ����� ������ ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=admininfo.php?action=adduser' />";
}


}ELSEIF ($action=="selectuser"){

$queryx = mysql_query("SELECT * FROM dlil_admin where id != '1' order by id desc");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "<div align='center'>�� ��� ����� ������ ��� ����</div>";
}else{

echo "<table class='xtable' width='100%' id='AutoNumber15'>
<tr>
<td width='100%' colspan='4' class='xtr' align='center'>��� ��������</td>
</tr>
<tr>
      <td width='66%' align='center' class='xtr'>��� ��������</td>
      <td width='20%' align='center' class='xtr'>���� ��� �����</td>
      <td width='7%' align='center' class='xtr'>�����</td>
      <td width='7%' align='center' class='xtr'>���</td>
</tr>";
while($p = mysql_fetch_array($queryx))
{
$p['username'] = stripslashes($p['username']);
$p['username'] = htmlspecialchars($p['username']);

$queryxc = mysql_query("SELECT * FROM dlil_catgory where id='".$p['adminoruser']."'");
$pc = mysql_fetch_array($queryxc);
$pc['title'] = stripslashes($pc['title']);
$pc['title'] = htmlspecialchars($pc['title']);

if($p['adminoruser'] == 0){
$f = "<font color='#CC0000'>���� ������� (����)</font>";
}else{
$f = $pc['title'];
}

echo "<tr>
      <td width='66%' class='xtd'>� ".$p['username']."</td>
      <td width='66%' class='xtd' align='center'>".$f."</td>
      <td width='7%' align='center' class='xtd'>
      <a href='admininfo.php?action=edituser&id=$p[id]'><img border='0' src='images/edit.gif' alt='����� ".$p['username']."' /></a></td>
      <td width='7%' align='center' class='xtd'>
      <a href='admininfo.php?action=deleteuser&id=$p[id]'><img border='0' src='images/delete.gif' alt='��� ".$p['username']."' /></a></td>
    </tr>";
}
echo "</table>";
}
}ELSEIF ($action=="edituser"){
$id = intval($_GET['id']);
if($id==1){
echo "<div align='center'>������ ����� ��� ������� ����� ����� ������</div>";
}else{
$query = mysql_query("SELECT * FROM dlil_admin where id='$id'");
$p= mysql_fetch_array($query);
$p['username'] = stripslashes($p['username']);
$p['username'] = htmlspecialchars($p['username']);

$p['password'] = stripslashes($p['password']);

echo "<form method='post' action='admininfo.php?action=updateuser' style='margin-top: 0; margin-bottom: 0'>
<input name='ppp' type='hidden' value='".$p['password']."' />
<input name='id' type='hidden' value='".$id."' />

<table class='xtable' width='100%' id='AutoNumber15' dir='rtl'>
    <tr>
<td width='100%' colspan='2' class='xtr' align='center'>����� ������ ".$p['username']."</td>
</tr>

    <tr>
      <td width='30%' class='xtr'>� ��� �������� :</td>
      <td width='70%' class='xtd'><input size='50' name='username' value='".$p['username']."' /></td>
    </tr>
    <tr>
      <td width='30%' class='xtr'>� ����� ����� :</td>
      <td width='70%' class='xtd'><input size='50' name='password' /></td>
    </tr>

    <tr>
      <td width='30%' class='xtr'>� ����� ����� ������ :</td>
      <td width='70%' class='xtd'>";

echo "<select size='1' name='adminoruser'>";

$sql = mysql_query ("SELECT * FROM dlil_catgory order by id") or die ("error");
echo "<option value='0'>���� ������� (������)</option>\n";
while($sub = mysql_fetch_array($sql))
{
if($sub['id'] ==  $p['adminoruser']){
echo "<option value='$sub[id]' selected>$sub[title]</option>\n";
}else{
echo "<option value='$sub[id]'>$sub[title]</option>\n";
}

}
echo "</select>";

      echo "</td>
    </tr>

     <tr>
      <td width='100%' colspan='2' class='xtr'>
      <p align='center'><input class='addsubmit' type='submit' value=' ����� ' name='xxxx' /></p></td>
    </tr>
  </table>
</form>";
}

}ELSEIF ($action=="updateuser"){
$id = intval($_POST['id']);
$username = addslashes($_POST['username']);
$username = trim($username);
$password = addslashes($_POST['password']);
$password = trim($password);

$ppp = addslashes($_POST['ppp']);
$ppp = trim($ppp);

if(empty($password)){
$xpass = $ppp;
}else{
$xpass = md5($password);
}

$adminoruser = intval($_POST['adminoruser']);

if(empty($username)){
$form = "<p align='center'>��� �������� ���� .<a href='javascript:history.back(1)'>���� �����</a></p>";
echo $form;
}else{
$query =  mysql_query("UPDATE dlil_admin SET username='$username',password='$xpass',adminoruser='$adminoruser' where id='$id'");
print "<p align='center'>��� ������� ����� .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL= admininfo.php?action=selectuser' />";
}

}ELSEIF ($action=="deleteuser"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_admin WHERE id='$id'");
echo"<br><p align=center>�� ��� �����</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=admininfo.php?action=selectuser' />";

}
echo $f;
?>