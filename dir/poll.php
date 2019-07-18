<?php
include("config.php");
include("function.php");
include("templates/template.php");

$action = $_GET['x'];
if(!isset($action)) $action = "home";

IF ($action=="home"){
tpl_header("«·«” › «¡");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo poll($idpoll);

echo "<fieldset>
<legend><span class='aa'>«” › «¡«  ”«»ﬁ…</span></legend>";
echo allpoll();
echo "</fieldset>";

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{

echo "<div class='indexw'>";
echo poll($idpoll);
echo "</div";

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>«” › «¡«  ”«»ﬁ…</span></legend>";
echo allpoll();
echo "</fieldset></div>";

}


tpl_footer();

}ELSEIF ($action=="show"){
$id = intval($_GET["id"]);
$id = clean_value($id);


$sql = @mysql_query("select * from dlil_poll where id='$id' AND active='1'");
$Row = @mysql_fetch_array($sql);
if (!$Row)
{
error();
exit;
}
$Row['qus'] = stripslashes($Row['qus']);
$Row['ans1'] = stripslashes($Row['ans1']);
$Row['ans2'] = stripslashes($Row['ans2']);
$Row['ans3'] = stripslashes($Row['ans3']);

tpl_header($Row['qus']);

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo poll($id);

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{

echo "<div class='indexw'>";
echo poll($id);
echo "</div>";

}

tpl_footer();
}ELSEIF ($action=="vote"){

$xxx = intval($_POST['xxx']);
if($xxx==0){
$id = intval($idpoll);
}else{
$id = intval($xxx);
}

$answers = addslashes($_POST['answer']);

if ($answers == "vote1"){
$update = mysql_query("UPDATE dlil_poll SET vote1=vote1+1 where id='$id'");
}elseif ($answers == "vote2"){
$update = mysql_query("UPDATE dlil_poll SET vote2=vote2+1 where id='$id'");
}elseif ($answers == "vote3"){
$update = mysql_query("UPDATE dlil_poll SET vote3=vote3+1 where id='$id'");
}

if ($update){
$x = " „ «· ’ÊÌ  »‰Ã«Õ";
$x .= "<meta http-equiv='Refresh' content='1;URL=poll.php'>";
}else{
$x = "·„ Ì „ «· ’ÊÌ  !!";
}

tpl_header(" ﬁ—Ì— «·≈œ«—…");

if($showblocks == 1){
echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumber10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo "<fieldset>
<legend><span class='aa'> ﬁ—Ì— «·≈œ«—…</span></legend>";
echo $x;
echo "</fieldset>";

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";
}else{

echo "<div class='indexw'><fieldset>
<legend><span class='aa'> ﬁ—Ì— «·≈œ«—…</span></legend>";
echo $x;
echo "</fieldset></div>";

}

tpl_footer();
}
?>