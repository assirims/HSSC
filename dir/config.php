<?php
$dbhost = "localhost";
$dbname = "hssc_99k_db1";
$dbuname = "909423_assiri";
$ppass = "0500117090";
$connectdb = @mysql_connect($dbhost,$dbuname,$ppass) or die('<div align="center">והַß ־״ֳ Ýם דÚבזדַÊ ÞַÚֹֿ ַבָםַהַÊ זבד םÊד ַבַÊױַב ָÞַÚֹֿ ַבָםַהַÊ</div>');
$xx = mysql_select_db($dbname,$connectdb) or die('<div align="center">בד ÊÞד ָÊֽֿםֿ ÞַÚֹֿ ָםַהַÊ ... והַß ־״ֳ Ýם דÚבזדַÊ ÞַÚֹֿ ַבָםַהַÊ</div>');
?>