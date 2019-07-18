<?php
if(isset($_COOKIE['userid']) AND isset($_COOKIE['pass'])){
include('../config.php');

$u = intval($_COOKIE['userid']);

$p = addslashes($_COOKIE['pass']);
$p = htmlspecialchars($p);
$pa = "hpl]hgadjd";
$pmd5 = str_replace($pa,"",$p);

$query = mysql_query ("SELECT * FROM `dlil_admin` WHERE id='$u' AND password='$pmd5' AND adminoruser='0'") or die ("Query failed");
$counts = mysql_num_rows($query);
if($counts == 0){
echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html dir='rtl' xmlns='http://www.w3.org/1999/xhtml' xml:lang='ar' lang='ar'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256' />
<link rel='stylesheet' href='style.css' type='text/css' />
<title>لوحة التحكم</title>
</head>
<body>
<div id='wrap'>
<br /> <br /> <br />
<div align='center'>لم تتطابق بيانات الكوكيز مع بيانات الادمن بالقاعدة <a href='out.php'>تسجيل خروج ومحاولة الدخول مرة أخرى</a></div>
<br /> <br /> <br />
</div>
</body>
</html>";
exit;
}


$links = '<div class="arrowlistmenu">

<h3 class="menuheader expandable">الصفحات الرئيسية</h3>
<ul class="categoryitems">
<li><a target="_blank" href="../index.php">الصفحة الرئيسية</a></li>
<li><a href="catgory_cp.php?action=add">التحكم بالأقسام</a></li>
<li><a href="add_cp.php?action=add">التحكم بالمواقع</a></li>
<li><a href="add_cp.php?action=act">تفعيل المواقع</a></li>
<li><a href="add_cp.php?action=freeadd">إضافة جماعية للمواقع</a></li>
</ul>


<h3 class="menuheader expandable">التحكم بالمقالات</h3>
<ul class="categoryitems">
<li><a target="_blank" href="../archive.php">صفحة أرشيف المقالات</a></li>
<li><a href="article_cp.php?action=add">التحكم بالمقالات</a></li>
<li><a href="article_cp.php?action=comm">التحكم بالتعليقات</a></li>
<li><a href="article_cp.php?action=actx">تفعيل التعليقات</a></li>
</ul>

<h3 class="menuheader expandable">التحكم بالعشوائيات</h3>
<ul class="categoryitems">
<li><a href="random_cp.php?action=add1">فوئد قرآنيه</a></li>
<li><a href="random_cp.php?action=add2">أحاديث نبويه</a></li>
<li><a href="random_cp.php?action=add3">حكم وأمثال</a></li>
</ul>

<h3 class="menuheader expandable">خدمات البرنامج</h3>
<ul class="categoryitems">
<li><a href="ads_cp.php?action=add">التحكم بالإعلانات</a></li>
<li><a href="blocks_cp.php">التحكم بالبلوكات</a></li>
<li><a href="poll_cp.php">التحكم بالاستفتاء</a></li>
<li><a href="xml.php?x=code">شاهد كود xml</a></li>
<li><a href="xml.php?x=save">حفظ ملف xml</a></li>
<li><a href="backup.php">باك اب للقاعده</a></li>
</ul>

<h3 class="menuheader expandable">خيارات إدارية</h3>
<ul class="categoryitems">
<li><a href="stats.php">الإحصائية</a></li>
<li><a href="option.php">الخيارات</a></li>
<li><a href="admininfo.php">بيانات الأدمن</a></li>
<li><a href="out.php">تسجيل الخروج</a></li>
</ul>


<!--
<h3 class="menuheader" style="cursor: default">FeedBack</h3>
<div>
Regular contents here. Header does not expand or contact.
</div>
-->

</div>';
$h = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html dir='rtl' xmlns='http://www.w3.org/1999/xhtml' xml:lang='ar' lang='ar'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256' />

<script type=\"text/javascript\" src=\"js/jquery-1.2.2.pack.js\"></script>
<script type=\"text/javascript\" src=\"js/ddaccordion.js\"></script>
<script type=\"text/javascript\" src=\"js/ed.js\"></script>

<link rel='stylesheet' href='style.css' type='text/css' />

<title>لوحة التحكم</title>

<script type='text/javascript'>

ddaccordion.init({
        headerclass: 'expandable', //Shared CSS class name of headers group that are expandable
        contentclass: 'categoryitems', //Shared CSS class name of contents group
        revealtype: 'click', //Reveal content when user clicks or onmouseover the header? Valid value: 'click' or 'mouseover
        collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
        defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
        onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
        animatedefault: false, //Should contents open by default be animated into view?
        persiststate: true, //persist state of opened contents within browser session?
        toggleclass: ['', 'openheader'], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ['class1', 'class2']
        togglehtml: ['prefix', '', ''], //Additional HTML added to the header when it's collapsed and expanded, respectively  ['position', 'html1', 'html2'] (see docs)
        animatespeed: 'normal', //speed of animation: 'fast', 'normal', or 'slow'
        oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                //do nothing
        }
})

</script>


<script type=\"text/javascript\" src=\"tinymce/tiny_mce.js\"></script>
<script type=\"text/javascript\">
tinyMCE.init({
        // General options
        mode : \"exact\", //textareas
        elements : \"textarea1,textarea2\",
        theme : \"advanced\",
        plugins : \"safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager\",

        // Theme options
        theme_advanced_buttons1 : \"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect\",
        theme_advanced_buttons2 : \"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor\",
        theme_advanced_buttons3 : \"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen\",
        theme_advanced_buttons4 : \"insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage\",
        theme_advanced_toolbar_location : \"top\",
        theme_advanced_toolbar_align : \"right\",
        theme_advanced_statusbar_location : \"bottom\",
        theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
        content_css : \"css/example.css\",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : \"js/template_list.js\",
        external_link_list_url : \"js/link_list.js\",
        external_image_list_url : \"js/image_list.js\",
        media_external_list_url : \"js/media_list.js\",

        // Replace values for the template plugin
        template_replace_values : {
                username : \"Some User\",
                staffid : \"991234\"
        }
});
</script>

</head>

<script language='javascript'>
function tools(code) {
document.vbform.message.value += ' ' + code + ' ';
document.vbform.message.focus();
}
</script>


<body>

<div id='wrap'>

<div align='center' class='bar'>
<a target='_blank' href='../index.php'>الصفحة الرئيسية للسكربت</a> || <a href='stats.php'>الإحصائية</a> || <a href='option.php'>الخيارات</a> || <a href='out.php'>تسجيل الخروج</a></div><br />

<div class='menu'>
$links
</div>
<div class='content'>";


$f = "<br /><br /></div>

<div align='center' class='bar'>
<p align='center'><a target='_blank' href='http://www.nwahy.com/'>دليل المواقع الاصدار 2.2 برمجة موقع نواحي</a></p>
</div><br /><br />

</div>
</body>
</html>";

}else{

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html dir='rtl' xmlns='http://www.w3.org/1999/xhtml' xml:lang='ar' lang='ar'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256' />
<link rel='stylesheet' href='style.css' type='text/css' />
<title>لوحة التحكم</title>
</head>
<body>
<br /><br /><br /><br />
<div align='center'>لم تقم بتسجيل الدخول <a href='index.php'>إضغط هنا لتسجيل الدخول</a></div>
<br /><br /><br /><br />
<p align='center'><a target='_blank' href='http://www.nwahy.com/'>دليل المواقع الاصدار 2.2</a></p>
</body>
</html>";
exit;
}
?>