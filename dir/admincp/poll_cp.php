<?php
include('header.php');
echo $h;

$action = $_GET['action'];
if(!isset($action)) $action = "add";

IF ($action=="add"){
?>
<form name="vbform" method="post" action="poll_cp.php?action=insert">
<table class='xtable' width='100%' id='AutoNumber1545'>
     <tr>
      <td width="100%" colspan="2" class='xtt' align="center">ÅÖÇİÉ ÇÓÊİÊÇÁ ÌÏíÏ</td>
    </tr>
    <tr>
      <td width="20%" class='xtr'>» ÇáÓÄÇá :</td>
      <td width="80%" class='xtd'><input size="60" name="qus" /></td>
    </tr>

    <tr>
      <td width="20%" class='xtr'>» ÇáÌæÇÈ ÇáÃæá :</td>
      <td width="80%" class='xtd'><input size="60" name="ans1" /></td>
    </tr>
    <tr>
      <td width="20%" class='xtr'>» ÇáÌæÇÈ ÇáËÇäí :</td>
      <td width="80%" class='xtd'><input size="60" name="ans2" /></td>
    </tr>
    <tr>
      <td width="20%" class='xtr'>» ÇáÌæÇÈ ÇáËÇáË :</td>
      <td width="80%" class='xtd'><input size="60" name="ans3" /></td>
    </tr>

     <tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" value=" ÅÖÇİÉ " class='addsubmit' name="cmdAdd" /></td>
    </tr>
  </table>
</form>

<?php
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 30;
$startpoint = ($page * $perpage) - $perpage;

$queryx = mysql_query("SELECT * FROM dlil_poll order by id desc LIMIT $startpoint,$perpage");
$xx = mysql_num_rows($queryx);
if($xx == 0){
echo "";
}else{

echo "<br />&nbsp;
<table class='xtable' width='100%' id='AutoNumber155'>
  <tr>
<td width='100%' colspan='4' class='xtx' align='center'>ÚÑÖ ÌãíÚ ÇáÇÓÊİÊÇÁÇÊ</td>
</tr>
  <tr>
      <td width='79%' align='center' class='xtr'>ÓÄÇá ÇáÇÓÊİÊÇÁ</td>
      <td width='7%' align='center' class='xtr'>ÚÑÖ</td>
      <td width='7%' align='center' class='xtr'>ÊÚÏíá</td>
      <td width='7%' align='center' class='xtr'>ÍĞİ</td>
    </tr>";
while($p = mysql_fetch_array($queryx))
{
$p['qus'] = stripslashes($p['qus']);
$p['qus'] = htmlspecialchars($p['qus']);

$p['ans1'] = stripslashes($p['ans1']);
$p['ans2'] = stripslashes($p['ans2']);
$p['ans3'] = stripslashes($p['ans3']);

$s = "<div align='right'>- ".$p['ans1']." [".$p['vote1']."]<br>- ".$p['ans2']." [".$p['vote2']."]<br>- ".$p['ans3']." [".$p['vote3']."]<br></div>";

if($p['active'] == 1){
$im = "images/on.gif";
$li = "poll_cp.php?action=actx&id=$p[id]&act=0";
$te = "ÅÖÛØ åäÇ ááÍÌÈ";
}else{
$im = "images/off.gif";
$li = "poll_cp.php?action=actx&id=$p[id]&act=1";
$te = "ÅÖÛØ åäÇ ááÊİÚíá";
}

echo "<tr>
      <td width='79%' class='xtd'>» ".$p['qus']."$s</td>
      <td width='7%' align='center' class='xtd'><a href='$li'><img border='0' src='$im' alt='$te ".$p['qus']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='poll_cp.php?action=edit&id=$p[id]'><img border='0' src='images/edit.gif' alt='ÊÚÏíá ".$p['qus']."' /></a></td>
      <td width='7%' align='center' class='xtd'><a href='poll_cp.php?action=delete&id=$p[id]'><img border='0' src='images/delete.gif' alt='ÍĞİ ".$p['qus']."' /></a></td>
    </tr>";
}
echo "</table>";

$pagesnum = @ceil(mysql_num_rows(mysql_query("SELECT * FROM dlil_poll")) / $perpage);
if($pagesnum > 1){
echo "<p align='center'>";
for ($i=1; $i<=$pagesnum; $i++) {
if ($i != $page) {
$z = "[<a href='poll_cp.php?action=add&page=$i'>$i</a>] ";
} else {
$z = "[<u>$i</u>]";
}
echo "$z";
}
echo "</p>";
}
}

}ELSEIF ($action=="insert"){

$qus = addslashes($_POST['qus']);
$qus = trim($qus);

$ans1 = addslashes($_POST['ans1']);
$ans2 = addslashes($_POST['ans2']);
$ans3 = addslashes($_POST['ans3']);

$date1 = time();
$date2 = date("j-n-Y",$date1);

if (empty($qus)){
echo "<p align=center>áã ÊßÊÈ ÓÄÇá ÇáÇÓÊİÊÇÁ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans1)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáÇæá . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans2)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáËÇäí . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans3)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáËÇáË . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";

}else{
$query =  mysql_query ("INSERT INTO dlil_poll (qus,ans1,ans2,ans3,date,active) VALUES ('$qus','$ans1','$ans2','$ans3','$date1','1')") or die ("ÅÓÊÚáÇã ÎÇØíÁ");
print "<p align=center>ÊãÊ ÇáÇÖÇİå ÈäÌÇÍ .</p>";
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=poll_cp.php?action=add' />";
}


}ELSEIF ($action=="edit"){
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM dlil_poll where id='$id'");
$p= mysql_fetch_array($query);

$p['qus'] = stripslashes($p['qus']);
$p['qus'] = htmlspecialchars($p['qus']);

$p['ans1'] = stripslashes($p['ans1']);
$p['ans1'] = htmlspecialchars($p['ans1']);

$p['ans2'] = stripslashes($p['ans2']);
$p['ans2'] = htmlspecialchars($p['ans2']);

$p['ans3'] = stripslashes($p['ans3']);
$p['ans3'] = htmlspecialchars($p['ans3']);

echo"<form name='vbform' method='POST' action='poll_cp.php?action=editok'>
<input type='hidden' name='id' value='$p[id]' />

<table class='xtable' width='100%' id='AutoNumber15'>

<tr>
<td width='100%' colspan='2' class='xtt' align='center'>ÊÚÏíá ÈíÇäÇÊ ".$p['qus']."</td>
</tr>

<tr>
<td width='30%' class='xtr'>» ÇáÓÄÇá :</td>
<td width='70%' class='xtd'><input name='qus' size='60' value='".$p['qus']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>» ÇáÌæÇÈ ÇáÃæá :</td>
<td width='70%' class='xtd'><input name='ans1' size='60' value='".$p['ans1']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>» ÇáÌæÇÈ ÇáËÇäí :</td>
<td width='70%' class='xtd'><input name='ans2' size='60' value='".$p['ans2']."' /></td>
</tr>

<tr>
<td width='30%' class='xtr'>» ÇáÌæÇÈ ÇáËÇáË :</td>
<td width='70%' class='xtd'><input name='ans3' size='60' value='".$p['ans3']."' /></td>
</tr>

<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' class='addsubmit' value=' ÍİÙ ' name='B1' /></td>
</tr>

</table>
</form>";

}ELSEIF ($action=="editok"){

$id    = intval($_POST['id']);

$qus = addslashes($_POST['qus']);
$qus = trim($qus);

$ans1 = addslashes($_POST['ans1']);
$ans2 = addslashes($_POST['ans2']);
$ans3 = addslashes($_POST['ans3']);

if (empty($qus)){
echo "<p align=center>áã ÊßÊÈ ÓÄÇá ÇáÇÓÊİÊÇÁ . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans1)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáÇæá . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans2)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáËÇäí . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($ans3)){
echo "<p align=center>áã ÊßÊÈ ÇáÌæÇÈ ÇáËÇáË . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";

}else{
$query =  mysql_query("UPDATE dlil_poll SET qus='$qus', ans1='$ans1',ans2='$ans2',ans3='$ans3' where id='$id'");
echo"<p align=center>Êã ÇáÊÚÏíá ÈäÌÇÍ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=poll_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_poll WHERE id='$id'");
echo"<p align=center>Êã ÇáÍĞİ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=poll_cp.php?action=add' />";


}ELSEIF ($action=="actx"){
$id = intval($_GET['id']);
$act = intval($_GET['act']);
if ($act == 0){
$query =  mysql_query("UPDATE dlil_poll SET active='$act' where id='$id'");
echo "<p align=center>Êã ÍÌÈ ÇáãŞÇá ÈäÌÇÍ . . . ÌÇÑí ÇáÊæÌíå</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=poll_cp.php?action=add' />";


}ELSEif ($act == 1){
$query =  mysql_query("UPDATE dlil_poll SET active='$act' where id='$id'");
echo "<p align=center>Êã ÊİÚíá ÇáÇÓÊİÊÇÁ ÈäÌÇÍ . . . ÌÇÑí ÇáÊæÌíå</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=poll_cp.php?action=add' />";
}else{
echo "<p align=center>ÎØÃ .... íÊã ÇáÊæÌíå ÇáÊáŞÇÆí</p>";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=poll_cp.php?action=add' />";
}

}
echo $f;
?>