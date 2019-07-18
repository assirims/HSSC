<?php
//template header
function tpl_header($title)
{
global $folder,$meta1,$meta2,$textheader,$ads_headerloop;
if(!file_exists($folder)){echo "FOLDER TEMPLATES <b>$folder</b> NOT FOUND"; exit;}
$openfile = "".$folder."/header.htm";
if (!file_exists($openfile))
{
echo "<p align='center'>FILE TEMPLATE header.htm NOT FOUND INSIDE FOLDER ".$folder."</p>";
exit;
}else{
$writefile = fopen($openfile,"r");
$read = fread($writefile,filesize($openfile));
$read = str_replace("{title}",$title,$read);
$read = str_replace("{description}",$meta1,$read);
$read = str_replace("{keywords}",$meta2,$read);
$read = str_replace("{ads}",ads(0,$ads_headerloop),$read);

echo $read.$textheader;
echo "<br />";
//ads(0,$ads_headerloop);
fclose ($writefile);
}
}


//template footer
function tpl_footer()
{
global $folder,$textfooter,$ads_footerloop;


$openfile = "".$folder."/footer.htm";
if (!file_exists($openfile))
{
$read ="<p align='center'>FILE TEMPLATE footer.htm NOT FOUND INSIDE FOLDER ".$folder."</p>";
}else{
$writefile=@fopen($openfile,"r");

ads(1,$ads_footerloop);
echo "<br />";
$read = "";
$read .= @fread($writefile,filesize($openfile));
echo $textfooter.$read;
@fclose ($writefile);
}
}


//template frame
function tpl_table($frame_title,$frame_rows)
{
global $folder;
$openfile = "".$folder."/table.htm";
if (!file_exists($openfile))
{
$read ="<p align='center'>FILE TEMPLATE table.htm NOT FOUND INSIDE FOLDER ".$folder."</p>";
}else{
$writefile=@fopen($openfile,"r");
$read = @fread($writefile,filesize($openfile));
$read = str_replace("{title}","$frame_title",$read);
$read = str_replace("{text}","$frame_rows",$read);
echo $read;
@fclose ($writefile);
}
}


//template menu
function tpl_menu($menu_title,$menu_rows)
{
global $folder;
$openfile = "".$folder."/menu.htm";
if (!file_exists($openfile))
{
$read ="<p align='center'>FILE TEMPLATE menu.htm NOT FOUND INSIDE FOLDER ".$folder."</p>";
}else{
$writefile=@fopen($openfile,"r");
$read = @fread($writefile,filesize($openfile));
$read = str_replace("{title}","$menu_title",$read);
$read = str_replace("{text}","$menu_rows",$read);
echo $read;
@fclose ($writefile);
}
}

if($closesite == 1){
tpl_header("«·„Êﬁ⁄ „€·ﬁ");

echo "<div class='indexw'><fieldset>
<legend><span class='aa'>«·„Êﬁ⁄ „€·ﬁ Õ«·Ì«</span></legend>
$closesitetext
</fieldset></div>";

tpl_footer();
exit;
}
?>