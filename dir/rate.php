<?php
include("config.php");
include("function.php");

$id = intval($_POST["id"]);
$id = clean_value($id);

$sql = @mysql_query("select * from dlil_site where id='$id' AND active=1");
$Row = @mysql_fetch_array($sql);
if (!$Row)
{
error();
exit;
}

$rate = intval($_POST["rate"]);

$iip = $_SERVER['REMOTE_ADDR'];
$datex = time()+$timerate;
$timenow = time();

$sqldlelte = mysql_query("delete from dlil_ips where date < '$timenow' AND cat='0'");

$sql = mysql_query("select * from dlil_ips where ipx='$iip' AND siteid='$id' AND cat='0'");
if(mysql_num_rows($sql)==0){
$sql2 = @mysql_query("update dlil_site set rate=rate+$rate,count=count+1 where id='$id'") or die ("Query failed4");
$sqlx = mysql_query("insert into dlil_ips SET ipx='$iip', date='$datex',cat='0',siteid='$id'");

if($htmlorphp == 1){
echo "<meta http-equiv='Refresh' content='1;URL=site-$id.html' />";
}else{
echo "<meta http-equiv='Refresh' content='1;URL=site.php?id=$id' />";
}

}else{
echo '<div align="center"><b>б«нгядя  ённг е–« «бгжёЏ б√дя ёг  » ённге ё»б ёбнб</b></div>';
}

?>