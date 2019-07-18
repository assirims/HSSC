<?php
session_start();

$text1 = rand(0,9);
$text2 = rand(0,9);
$text3 = "«ﬂ » ‰« Ã «·⁄œœ ".$text1." + ".$text2."";
$text4 = $text1 + $text2;

$_SESSION["captchacode"] = $text4;

include("config.php");
include("function.php");
include("templates/template.php");

$id = intval($_GET["id"]);
clean_value($id);

$Sql = mysql_query("select * from dlil_article where id='$id' AND active='1'");
$Row = mysql_fetch_array($Sql);
if (!$Row)
{
error();
exit;
}

$Row['title'] = stripslashes($Row['title']);
$Row['title'] = htmlspecialchars($Row['title']);

$Row['metadescription'] = stripslashes($Row['metadescription']);
$Row['metadescription'] = htmlspecialchars($Row['metadescription']);

$Row['metakeywords'] = stripslashes($Row['metakeywords']);
$Row['metakeywords'] = htmlspecialchars($Row['metakeywords']);

$Row['text'] = stripslashes($Row['text']);
//$Row['text'] = htmlspecialchars($Row['text']);

$d = date("j/n/Y",$Row['date']);

if($Row['metadescription'] == ""){
$meta1 = $Row['title'];
}else{
$meta1 = $Row['metadescription'];
}

if($Row['metakeywords'] == ""){
$meta2 = $Row['title'];
}else{
$meta2 = $Row['metakeywords'];
}


$sql2 = @mysql_query("update dlil_article set vis=vis+1 where id='$id'") or die ("Query failed4");

tpl_header($Row['title']);

if($htmlorphp==1){
$zd = "insert-comment.html";
}else{
$zd = "add.php?action=addcomments";
}

?>

<Script language=javascript>
var ns6=document.getElementById&&!document.all

function restrictinput(maxlength,e,placeholder){
if (window.event&&event.srcElement.value.length>=maxlength)
return false
else if (e.target&&e.target==eval(placeholder)&&e.target.value.length>=maxlength){
var pressedkey=/[a-zA-Z0-9\.\,\/]/ //detect alphanumeric keys
if (pressedkey.test(String.fromCharCode(e.which)))
e.stopPropagation()
}
}

function countlimit(maxlength,e,placeholder){
var theform=eval(placeholder)
var lengthleft=maxlength-theform.value.length
var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder)
if (window.event||e.target&&e.target==eval(placeholder)){
if (lengthleft<0)
theform.value=theform.value.substring(0,maxlength)
placeholderobj.innerHTML=lengthleft
}
}

function displaylimit(thename, theid, thelimit){
var theform=theid!=""? document.getElementById(theid) : thename
var limit_text='⁄œœ Õ—Ê› «· ⁄·Ìﬁ «·„ »ﬁÌÂ ·ﬂ <span id="'+theform.toString()+'">'+thelimit+'</span> Õ—›'
if (document.all||ns6)
document.write(limit_text)
if (document.all){
eval(theform).onkeypress=function(){ return restrictinput(thelimit,event,theform)}
eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform)}
}
else if (ns6){
document.body.addEventListener('keypress', function(event) { restrictinput(thelimit,event,theform) }, true);
document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform) }, true);
}
}
</Script>
<?php

$xxform = "<form name='sampleform' method='post' action='$zd'>
<input name='articleid' type='hidden' value='$id' />
<fieldset>
<legend><span class='aa'>√÷›  ⁄·Ìﬁﬂ ⁄·Ï «·„ﬁ«·</span></legend>

<table border='0' width='100%' id='AutoNumber15'>

    <tr>
      <td width='20%'>ª ≈”„ﬂ :</td>
      <td width='80%'><input size='50' class='addinput' name='name' /></td>
    </tr>
    <tr>
      <td width='20%'>ª ≈Ì„Ì·ﬂ - «Œ Ì«—Ì:</td>
      <td width='80%'><input size='50' class='addinput' name='emails' dir='ltr' /></td>
    </tr>
    <tr>
      <td width='20%'>ª «· ⁄·Ìﬁ :</td>
      <td width='80%'><textarea id='limit' name='text' rows='5' cols='60' class='addinput'></textarea><br />
      <script>
displaylimit('','limit',$numbercharcomments)
</script>
      </td>
    </tr>

    <tr>
      <td width='20%'>ª «·ﬂÊœ :</td>
      <td width='80%'>$text3 <input class='addinput' name='code' size='10' dir='ltr' /></td>
    </tr>

     <tr>
      <td width='100%' colspan='2' align='center'>
      <input type='submit' class='addsubmitpoll' value=' √÷› «· ⁄·Ìﬁ ' title=' √÷› «· ⁄·Ìﬁ ' name='cmdAdd' /></td>
    </tr>
  </table>
  </fieldset>
</form>";

if($showblocks == 1){
$ssss = "<fieldset>
<legend><span class='aa'>".$Row['title']."</span></legend>
".$Row['text']."<br /><br />
ª “Ì«—«  «·„ﬁ«· : ".$Row['vis']."<br />
ª  ‹‹«—ÌŒ «·„ﬁ«· : ".$d."<br />
ª ⁄‰Ê«‰ «·„ﬁ«· : ".$Row['title']."<br />
</fieldset>";

echo "<div class='indexw'>
<table border='0' width='100%' id='AutoNumb5er10'>
<tr>
<td width='10%' valign='top'>";
right_blocks();
echo "</td><td width='80%' valign='top'>";

echo $ssss;
if($showcomments==1){
echo comments();
echo "<br />";
}
if($allowcomments==1){
echo $xxform;
}

echo "</td><td width='10%' valign='top'>";
left_blocks();
echo "</td></tr></table></div>";

}else{

$ssss = "<div class='indexw'><fieldset>
<legend><span class='aa'>".$Row['title']."</span></legend>
".$Row['text']."<br /><br />
ª “Ì«—«  «·„ﬁ«· : ".$Row['vis']."<br />
ª  ‹‹«—ÌŒ «·„ﬁ«· : ".$d."<br />
ª ⁄‰Ê«‰ «·„ﬁ«· : ".$Row['title']."</fieldset>";
echo $ssss;
if($showcomments==1){
echo comments();
echo "<br />";
}

if($allowcomments==1){
echo $xxform;
}

echo "</div>";

}




tpl_footer();
?>