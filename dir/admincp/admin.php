<?php
$username = addslashes($_POST['user']);
$username = htmlspecialchars($username);
$password = addslashes($_POST['pass']);
$password = htmlspecialchars($password);
$passwordm = md5($password);
$passwordmd5xx = "hpl]hgadjd".$passwordm;

if(!empty($username) AND !empty($password))
{
include('../config.php');
$query = mysql_query ("SELECT * FROM `dlil_admin` WHERE username='$username' AND password='$passwordm' AND adminoruser='0'") or die ("Query failed");
$counts = mysql_num_rows($query);

if($counts == 0){
include('index.php');
}else{
$rows = mysql_fetch_array($query);

setcookie("userid",$rows['id'],time()+86400);
setcookie("pass",$passwordmd5xx,time()+86400);
echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=stats.php' />";

mysql_close($connectdb);
}

}else{
include('index.php');
}
?>