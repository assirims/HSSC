<?php
include("config.php");
include("function.php");

$id = intval($_GET["id"]);
$id = clean_value($id);

$sql = @mysql_query("select * from dlil_ads where id='$id' AND active=1");
$Row = @mysql_fetch_array($sql);
if (!$Row)
{
error();
exit;
}
$Row['url'] = stripslashes($Row['url']);

$sql2 = @mysql_query("update dlil_ads set vis=vis+1 where id='$id'") or die ("Query failed4");

echo "<meta http-equiv='Refresh' content='1;URL=".$Row['url']."'>";
?>