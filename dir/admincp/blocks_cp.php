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
      ÅÖÇİÉ ÈáæßÇÊ ÌÏíÏÉ</td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>» ÚäæÇä ÇáÈáæß :</td>
      <td width="65%" class='xtd'><input size="60" name="title" /></td>
    </tr>

    <tr>
      <td width="35%" class='xtr'>» ãÍÊæì ÇáÈáæß íŞÈá ßæÏ html :<br />
      - ÌÏíÏ ÇáãæŞÚ {newsite}<br />- ÃŞÏã ÇáãæÇŞÚ {oldsite}<br />- ÇáÃßËÑ ÊŞííãÇ {ratesite}<br />- ÇáÃßËÑ ãä ÍíË ÇáãÕæÊíä {countsite}<br />- ÇáÃßËÑ ÒíÇÑÉ {visitesite}<br />
- İæÇÆÏ ŞÑÂäíå ÚÔæÇÆíå {randquran}<br />
- ÃÍÇÏíË äÈæíå ÚÔæÇÆíå {randhadeth}<br />
- Íßã æÃãËÇá ÚÔæÇÆíå {randtext}<br />
- ÇáÃŞÓÇã ÇáÑÆíÓíÉ ááÏáíá {cat}<br />
- ÇáÇÓÊİÊÇÁ {poll}<br /></td>
      <td width="36%" class='xtd'><textarea name="text" rows="15" cols="60"></textarea></td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>» ãßÇä ÇáÈáæß :</td>
      <td width="65%" class='xtd'>
<select size="1" name="rightorleft">
<OPTION value='1' selected>íãíä</OPTION>
<OPTION value='0'>íÓÇÑ</OPTION>
</select>
      </td>
    </tr>
    <tr>
      <td width="35%" class='xtr'>» ÊİÚíá ÇáÈáæß :</td>
      <td width="65%" class='xtd'>
<select size="1" name="active">
<OPTION value='1' selected>äÚã</OPTION>
<OPTION value='0'>áÇ</OPTION>
</select>
      </td>

    <tr>
      <td width="35%" class='xtr'>» ÊÑÊíÈ ÇáÈáæß :</td>
      <td width="65%" class='xtd'><input size="10" name="orderblock" /></td>
    </tr>

    </tr>
     <tr>
      <td width="100%" colspan="2" class='xtr' align="center">
      <input type="submit" value=" ÅÖÇİÉ " name="cmdAdd" class='addsubmit'/></td>
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
<td width='100%' colspan='3' class='xtx' align='center'>ÚÑÖ ÌãíÚ ÇáÈáæßÇÊ</td>
</tr>

    <tr>
      <td width='86%' align='center' class='xtr'>ÅÓã ÇáÈáæß</td>
      <td width='7%' align='center' class='xtr'>ÊÚÏíá</td>
      <td width='7%' align='center' class='xtr'>ÍĞİ</td>
    </tr>";
while($cat = mysql_fetch_array($query))
{
echo "<tr>
      <td width='86%' class='xtd'>» $cat[title]</td>
      <td width='7%' align='center' class='xtd'>
      <a href='blocks_cp.php?action=edit&id=$cat[id]'><img border='0' src='images/edit.gif' alt='ÊÚÏíá $cat[title]' /></a></td>
      <td width='7%' align='center' class='xtd'>
      <a href='blocks_cp.php?action=delete&id=$cat[id]'><img border='0' src='images/delete.gif' alt='ÍĞİ $cat[title]' /></a></td>
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
echo "<p align=center>áã ÊßÊÈ ÚäæÇä ááÈáæß . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($text)){
echo "<p align=center>áã ÊßÊÈ ãÍÊæì ÇáÈáæß . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}else{
$query =  mysql_query ("INSERT INTO dlil_blocks (title,text,rightorleft,active,orderblock) VALUES ('$title','$text','$rightorleft','$active','$orderblock')") or die ("ÅÓÊÚáÇã ÎÇØíÁ");
print "<p align=center>ÊãÊ ÅÖÇİÉ ÇáÈáæß ÈäÌÇÍ .</p>";
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
<td width='100%' colspan='2' class='xtt' align='center'>ÊÚÏíá ÇáÈáæß ".$p_cats['title']."</td>
</tr>

<tr>
<td width='25%' class='xtr'>» ÚäæÇä ÇáÈáæß :</td>
<td width='75%' class='xtd'><input name='title' size='60' value='".$p_cats['title']."' /></td>
</tr>

<tr>
<td width='25%' class='xtr'>» ãÍÊæì ÇáÈáæß :</td>
<td width='75%' class='xtd'><textarea name='text' rows='15' cols='60'>".$p_cats['text']."</textarea></td>
</tr>

<tr>
<td width='25%' class='xtr'>» ÊÑÊíÈ ÇáÈáæß :</td>
<td width='75%' class='xtd'><input name='orderblock' size='10' value='$p_cats[orderblock]' /></td>
</tr>

<tr>
<td width='25%' class='xtr'>» ãßÇä ÇáÈáæß :</td>
<td width='75%' class='xtd'>";
if($p_cats['rightorleft'] == 1){
echo "<select size='1' name='rightorleft'>
<OPTION value='1' selected>íãíä</OPTION>
<OPTION value='0'>íÓÇÑ</OPTION>
</select>";
}else{
echo "<select size='1' name='rightorleft'>
<OPTION value='0' selected>íÓÇÑ</OPTION>
<OPTION value='1'>íãíä</OPTION>
</select>";
}
echo "</td>
</tr>

<tr>
<td width='25%' class='xtr'>» ÊİÚíá ÇáÈáæß :</td>
<td width='75%' class='xtd'>";
if($p_cats['active'] == 1){
echo "<select size='1' name='active'>
<OPTION value='1' selected>äÚã</OPTION>
<OPTION value='0'>áÇ</OPTION>
</select>";
}else{
echo "<select size='1' name='active'>
<OPTION value='0' selected>áÇ</OPTION>
<OPTION value='1'>äÚã</OPTION>
</select>";
}
echo "</td>
</tr>


<tr>
<td width='100%' colspan='2' align='center' class='xtr'><input type='submit' class='addsubmit' value=' ÍİÙ ' name='B1' /></td>
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
echo "<p align=center>áã ÊßÊÈ ÚäæÇä ááÈáæß . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}elseif (empty($text)){
echo "<p align=center>áã ÊßÊÈ ãÍÊæì ÇáÈáæß . <a href='javascript:history.back(1)'>ÚæÏÉ ááÎáİ</a></p>";
}else{
$query =  mysql_query("UPDATE dlil_blocks SET title='$title', text='$text', rightorleft='$rightorleft', active='$active', orderblock='$orderblock' where id='$id'");
echo"<p align=center>Êã ÇáÊÚÏíá ÈäÌÇÍ</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=blocks_cp.php?action=add' />";
}

}ELSEIF ($action=="delete"){
$id = intval($_GET['id']);
$query =  mysql_query("DELETE FROM dlil_blocks WHERE id='$id'");
echo"<p>Êã ÍĞİ ÇáÈáæß ...</p><META HTTP-EQUIV='Refresh' CONTENT='1;URL=blocks_cp.php?action=add' />";
}

echo $f;
?>