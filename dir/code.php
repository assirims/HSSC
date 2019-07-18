<?php
session_start();
$text = mt_rand();
$text = substr(sha1($text), 0, 4);
$text = str_replace(array('0', 'O', 'o', '9', 'g', 'G'), rand(1, 8), $text);
//$text = rand(1000,9999);
$_SESSION["captchacode"] = $text;
$height = 15;
$width = 40;
$image_p = imagecreate($width, $height);
$black = imagecolorallocate($image_p, 255, 255, 255);
$white = imagecolorallocate($image_p, 0, 0, 0);
$font_size = 14;
imagestring($image_p, $font_size, 1, 0, $text, $white);
imagejpeg($image_p, null, 100);
?>