<?php
include("config.php");
include("function.php");

echo "<html dir='rtl'>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>
<title></title>
</head>";


echo "<fieldset>
<legend><span class='aa'>أحدث المواقع</span></legend>
<div align='right'>".block_new_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>أكثر المواقع زيارة</span></legend>
<div align='right'>".block_visite_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>أكثر المواقع تقييماً</span></legend>
<div align='right'>".block_rate_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>أكثر المواقع من حيث عدد المصيوتين</span></legend>
<div align='right'>".block_count_site()."</div>
</fieldset>";

echo "<fieldset>
<legend><span class='aa'>أقدم المواقع</span></legend>
<div align='right'>".block_old_site()."</div>
</fieldset>";
?>