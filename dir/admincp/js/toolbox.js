function insertHTML() {
var SelectColor = "background-color:white;color:black";
document.write('<select style="' + SelectColor + ';font-family:tahoma;font-size:11px" onchange="Editor_addCode(\'[color=\'+this[this.selectedIndex].value+\']\',\'[/color]\');this.selectedIndex=0">');
document.write('<option selected> ·Ê‰ «·Œÿ </option>');
document.write('<option value="B7D8FB">√“—ﬁ ›« ‹‹‹Õ</option>');
document.write('<option value="5C92CC">√“—ﬁ „ Ê”ÿ</option>');
document.write('<option value="144273">√“—ﬁ €«„‹‹‹ﬁ</option>');
document.write('<option value="A4D867">√Œ÷— ›« ‹Õ</option>');
document.write('<option value="78AB3C">√Œ÷— „ Ê”ÿ</option>');
document.write('<option value="497418">√Œ÷— €«„‹‹‹‹ﬁ</option>');
document.write('<option value="F6C9D2">Ê—œÌ ›« ‹‹‹Õ</option>');
document.write('<option value="DE94A4">Ê—œÌ „ Ê”ÿ</option>');
document.write('<option value="AC5668">Ê—œÌ €«„‹‹‹ﬁ</option>');
document.write('<option value="FA0309">√Õ„‹‹‹— Õ‹‹‹«œ</option>');
document.write('<option value="940306">√Õ„‹‹— ÀﬁÌ‹‹‹·</option>');
document.write('<option value="000000">√”‹Êœ ‘⁄»Ì</option>');
document.write('<option value="FFFFFF">√»Ì÷ ‘⁄»Ì</option>');
document.write('<option value="E4CDA1">»‰Ì ›« ‹‹Õ</option>');
document.write('<option value="B09664">»‰Ì „ Ê”ÿ</option>');
document.write('<option value="6D5423">»‰Ì €«„‹‹ﬁ</option>');
document.write('<option value="722C70">»‰›”Ã‹‹‹‹‹Ì</option>');
document.write('<option value="F2B7F0">„Ê› ›« ‹‹‹Õ</option>');
document.write('<option value="D6D3D6">—„«œÌ ›« Õ</option>');
document.write('<option value="A8A5A8">—„«œÌ Ê”‹ÿ</option>');
document.write('<option value="706E70">—„«œÌ ÀﬁÌ‹‹·</option>');
document.write('<option value="F8FAB9">√’›— ›« ‹‹Õ</option>');
document.write('<option value="F69935">√’›— „ Ê”ÿ</option>');
document.write('<option value="BE5108">√’›— ÀﬁÌ‹‹·</option>');document.write('</select>');
document.write('<select style="' + SelectColor + ';font-family:tahoma;font-size:11px" onchange="Editor_addCode(\'[size=\'+this[this.selectedIndex].value+\']\',\'[/size]\');this.selectedIndex=0">');
document.write('<option selected> ÕÃ„ «·Œÿ </option>');
document.write('<option value="1">1</option>');
document.write('<option value="2">2</option>');
document.write('<option value="3">3</option>');
document.write('<option value="4">4</option>');
document.write('<option value="5">5</option>');
document.write('<option value="6">6</option>');
document.write('<option value="7">7</option>');
document.write('<option value="8">8</option>');
document.write('<option value="9">9</option>');
document.write('</select>'),
document.write('<select style="' + SelectColor + ';font-family:tahoma;font-size:11px" onchange="Editor_addCode(\'[font=\'+this[this.selectedIndex].value+\']\',\'[/font]\');this.selectedIndex=0">');
document.write('<option selected> ‰Ê⁄ «·Œÿ </option>');
document.write('<option value="Arial">Arial</option>');
document.write('<option value="Arial Black">Arial Black</option>');
document.write('<option value="Arial Narrow">Arial Narrow</option>');
document.write('<option value="Comic Sans MS">Comic Sans MS</option>');
document.write('<option value="Courier New">Courier New</option>');
document.write('<option value="System">System</option>');
document.write('<option value="Tahoma">Tahoma</option>');
document.write('<option value="Times New Roman">Times New Roman</option>');
document.write('<option value="Simplified Arabic">Simplified Arabic</option>');
document.write('<option value="Verdana">Verdana</option>');
document.write('<option value="Wingdings">Wingdings</option>');
document.write('<option value="MS Sans Serif">MS Sans Serif</option>');
document.write('</select>');
}
var buttons = new Array();
function addRow(a) {
buttons = buttons.concat("*");
buttons = buttons.concat(a);
}
function showButtons() {
addRow (new Array("cut|ﬁ’","copy|‰”Œ","paste|·’ﬁ","delete|≈“«·…","keyb|≈ŸÂ«— ·ÊÕ… «·„›« ÌÕ «·⁄—»Ì…","link|—«»ÿ «·ﬂ —Ê‰Ì","image|’Ê—…","ltr| ÕÊÌ· «·ﬂ «»… „‰ «·Ì”«— ≈·Ï «·Ì„Ì‰","rtl| ÕÊÌ· «·ﬂ «»… „‰ «·Ì„Ì‰ ≈·Ï «·Ì”«—","bold|œ«ﬂ‰","italic|„«∆·","uline|Œÿ ”›·Ì","left|≈·Ï «·Ì”«—","center| Ê”Ìÿ","right|≈·Ï «·Ì„Ì‰","justify|„Õ«–«… ≈·Ï «·√ÿ—«›"));
addRow (new Array("php|ﬂÊœ »Ì « ‘ »Ì","code|ﬂÊœ","quote|«ﬁ »«”","list|ﬁ«∆„…","flash| ‘€Ì· „·› ›·«‘ (swf)","qran|ﬁ—¬‰ ﬂ—Ì„","hdeth|ÕœÌÀ ‘—Ì›"));
addButtons(buttons, 0);
buttons = null;
}
var tip = "";
var keyboardColor,statusColor,tipColor;
var btn_backcolor_over, btn_backcolor_down, btn_bordercolor;
var toolbox_background,toolbox_backcolor;
var btn_obj = "";
function Capture(b) {
if (document.activeElement.name != "message") {
return;
}
if (event.srcElement.tagName.toLowerCase() == "select")
return;
if (btn_obj) {
btn_obj.releaseCapture();
btn_obj = "";
} else if (b == 1) {
btn_obj = event.srcElement;
btn_obj.setCapture();
}
}
function button_over(eButton, w) {
if (w == -1) {
eButton.parentElement.background = "images/toolbox/key_2.gif";
eButton.style.color = "white";
} else {
vbform.toolboxbar.style.color = statusColor;
vbform.toolboxbar.value = w;
doButton(btn_backcolor_over, 1, eButton);}
}
function button_out(eButton, w) {
if (w == -1) {
eButton.parentElement.background = "";
eButton.style.color = "black";
} else {
vbform.toolboxbar.style.color = tipColor;
vbform.toolboxbar.value = tip;
doButton("", 0, eButton);
}
}
function button_down(eButton, w) {
if (w != -1)
doButton(btn_backcolor_down, 1, eButton);
}
function button_up(eButton, w) {
if (w != -1)
doButton(btn_backcolor_over, 1, eButton);
        eButton = null;
}
function doButton(bk, s, btn) {
if (event.button == 2) return;
btn.style.backgroundColor = bk;
if (s == 0)        {
btn.parentElement.style.backgroundColor = "transparent";
} else {
btn.parentElement.style.backgroundColor = btn_bordercolor;
}
}
function addKeys(buttons) {
var tbl, events, newRow;
document.write('<table dir="rtl" id="keyboardTable" border="0" cellpadding="0" cellspacing="0" width="1" style="display:none">');
document.write('<tr><td>');
newRow = 1;
for (var i = 0; i < buttons.length; i++) {
if (i % 15 == 0) {
document.write('<table dir="rtl" align="center" background="images/toolbox/key_1.gif" border="0" cellpadding="0" cellspacing="0" width="1px"><tr>');
newRow = 0;
}
events = 'onclick="execTool(\'' + "key_" + buttons[i] + '\')" onmouseover="button_over(this,-1)" onmouseout="button_out(this,-1)" onmousedown="button_down(this,-1)" onmouseup="button_up(this,-1)"';
tbl = '<td height="29px"><div style="cursor:hand;text-align:center;width:30px;height:20px;color:black" ' + events + '>';
if (buttons[i] == " ")
buttons[i] = "&nbsp;";
tbl += '<font face="arial" size="2"><b>' + buttons[i] + '</b></font></div>';
tbl += '</td>';
document.write(tbl);
if ((i + 1) % 15 == 0) {
document.write('</tr></table>');
newRow = 1;
}
}
if (newRow == 0) {
document.write('</tr></table>');
}
document.write('</td></tr></table>');
}
function addButtons(buttons) {
var tbl, bn, events, newRow;
document.write('<table bgcolor="' + toolbox_backcolor + '" background="' + toolbox_background + '" dir="rtl" border="0" cellpadding="0" cellspacing="0" width="1" style="border:0 ridge">');
document.write('<tr><td>');
document.write('<table dir="rtl" border="0" cellpadding="0" cellspacing="0" width="100%" style="border:0 ridge" height=23px><tr><td align="right">');
insertHTML();
document.write('</td></tr></table>');
newRow = 1;
for (var i = 0; i < buttons.length; i++) {
if (buttons[i] == "*") {
if (newRow == 0) {
document.write('</tr></table>');
document.write('</td></tr></table>');
newRow = 1;
}
continue;
}
if (newRow) {
document.write('<table dir="rtl" border="0" cellpadding="0" cellspacing="0" width="1" style="merge:5px;"><tr><td style="border:0 ridge;padding-right:10px;padding-left:10px">');
document.write('<table align="left" width="1" border="0" cellpadding="0" cellspacing="0"><tr>');
newRow = 0
}
if (buttons[i] == "") {
tbl = '</tr></table><td style="border:0 ridge;padding-right:10px;padding-left:10px">';
tbl += '<table align="left" width="1" border="0" cellpadding="0" cellspacing="0"><tr>';
} else if (buttons[i] == " ") {
tbl = '<td style="padding:1px"><div class="cbtn" style="font-size:1pt">&nbsp;';
} else {
bn = buttons[i] + "| ";
bn = bn.split("|");
events = 'onclick="execTool(\'' + bn[0] + '\')" onmouseover="button_over(this,\'' + bn[1] + '\')" onmouseout="button_out(this,1)" onmousedown="button_down(this,1)" onmouseup="button_up(this,1)"';
tbl = '<td style="padding:1px"><div align="center" class="cbtn" ' + events + '>';
tbl += '<img border="0" align="absmiddle" width="18px" height="18px" src="images/toolbox/' + bn[0] + '.gif" alt="' + bn[1] + '">';
}
tbl += '</div></td>';
document.write(tbl);
}
if (newRow == 0) {
document.write('</tr></table>');
document.write('</td></tr></table>');
}

document.write('<table dir="rtl" border="0" cellpadding="0" cellspacing="0" width="100%" style="border:0 ridge"><tr>');
document.write('<td width="1"><img border="0" align="middle" src="images/toolbox/tip.gif"></td>');
        document.write('<td><input type="text" name="toolboxbar" value="' + tip + '" style="height:18px;border-style:none;width:100%;font:8pt MS Sans Serif ;background-color:transparent;color:' + tipColor + '"></td></tr>');
document.write('</table>');
document.write('</td></tr></table>');
}
function showKeyboard() {
var buttons = new Array("«","»"," ","À","Ã","Õ","Œ","œ","–","—","“","”","‘","’","÷","ÿ","Ÿ","⁄","€","›","ﬁ","ﬂ","·","„","‰","Â‹","Ê","Ì","…","√","≈","¬","¡","ƒ","∆","Ï","·«","·≈","·¬"," "," ","‹","°","∫","ø");
addKeys(buttons);
}
function showColorsWindow() {
var posX = event.screenX;
var posY = event.screenY + 5;
var screenW = screen.width;                                 // screen size
var screenH = screen.height - 20;                           // take taskbar into account
if (posX + 232 > screenW) { posX = posX - 232 - 40; }       // if mouse too far right
if (posY + 164 > screenH) { posY = posY - 164 - 80; }       // if mouse too far down
var wPosition = "dialogLeft:" +posX+ "; dialogTop:" +posY;
return showModalDialog("colors.html", "",
"dialogWidth:238px; dialogHeight: 195px; resizable: no; help: no; status: no; scroll: no; "        + wPosition);
}
function execTool(btn) {
if (event.altKey) {
if (btn.substr(0,4) != "key_") {
open("help.php?toolsel=" + btn, "help", "toolbar=no,scrollbars=yes,resizable=yes,width=550px,height=350px,left=50px,top=100px");
}
} else
EditorFunctions(btn);
}
function Editor_getSelText() {
var oSelect,oSelectRange;
document.vbform.message.focus();
oSelect = document.selection;
oSelectRange = oSelect.createRange();
return oSelectRange;
}
function Editor_addCode(tag1,tag2) {
var oSelText = Editor_getSelText();
if (oSelText.text == "")
alert("Ì—ÃÏ  Ÿ·Ì· «·‰’ √Ê·«");
else
oSelText.text = tag1 + oSelText.text + tag2;
}
function EditorFunctions(tag) {
if (tag.substr(0, 4) == "key_") {  // Arabic Keyboard
var oSelText = Editor_getSelText();
tag = tag.substr(4);
if (tag == "Â‹") tag = "Â";
oSelText.text = tag;
}
else if (tag == "rtl" || tag == "ltr") {
document.vbform.message.dir=tag.substr(tag);
}
else if (tag == "bold") {
Editor_addCode("[B]","[/B]");
}
else if (tag == "mtargh") {
Editor_addCode("[mtargh]","[/mtargh]");
}
else if (tag == "m3ft1") {
Editor_addCode("[m3ft1]","[/m3ft1]");
}
else if (tag == "m3ft2") {
Editor_addCode("[m3ft2]","[/m3ft2]");
}
else if (tag == "mklb") {
Editor_addCode("[mklb]","[/mklb]");
}
else if (tag == "sor1") {
Editor_addCode("[sor1]","[/sor1]");
}
else if (tag == "sor2") {
Editor_addCode("[sor2]","[/sor2]");
}
else if (tag == "mklb1") {
Editor_addCode("[mklb1]","[/mklb1]");
}
else if (tag == "foq") {
Editor_addCode("[foq]","[/foq]");
}
else if (tag == "foq1") {
Editor_addCode("[foq1]","[/foq1]");
}
else if (tag == "motr") {
Editor_addCode("[motr]","[/motr]");
}
else if (tag == "motr1") {
Editor_addCode("[motr1]","[/motr1]");
}
else if (tag == "fot1") {
Editor_addCode("[fot1]","[/fot1]");
}
else if (tag == "AREA") {
Editor_addCode("[AREA]","[/AREA]");
}
else if (tag == "blur") {
Editor_addCode("[blur]","[/blur]");
}
else if (tag == "blur1") {
Editor_addCode("[blur1]","[/blur1]");
}
else if (tag == "hide") {
Editor_addCode("[hide]","[/hide]");
}
else if (tag == "italic") {
Editor_addCode("[I]","[/I]");
}
else if (tag == "uline") {
Editor_addCode("[U]","[/U]");
}
else if (tag == "quote") {
Editor_addCode("[quote]","[/quote]");
}


else if (tag == "qran") {
Editor_addCode("[q]","[/q]");
}
else if (tag == "hdeth") {
Editor_addCode("[h]","[/h]");
}



else if (tag == "code") {
Editor_addCode("[code]","[/code]");
}
else if (tag == "php") {
Editor_addCode("[php]","[/php]");
}
else if (tag == "line") {
var oSelText = Editor_getSelText();
oSelText.text = "[line]";
}
else if (tag == "list") {
alert("⁄›Ê« ° Â–Â «·Œœ„… €Ì— „” Œœ„… Õ«·Ì«");
}
else if (tag == "blink") {
Editor_addCode("[blink]","[/blink]");
}
else if (tag == "glint") {
Editor_addCode("[glint]","[/glint]");
}
else if (tag=="mktsr") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("cannedtext.php",oSelText,"help:no; center:yes; status:no; dialogHeight:400px; dialogWidth:400px");
}
else if (tag=="up") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("up/",oSelText,"help:no; center:yes; status:no; dialogHeight:360px; dialogWidth:350px");
}
else if (tag=="zzz") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("zzz.htm",oSelText,"help:no; center:yes; status:no; dialogHeight:360px; dialogWidth:350px");
}
else if (tag=="poetry") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("hackpoet.htm",oSelText,"help:no; center:yes; status:no; dialogHeight:360px; dialogWidth:390px");
}
else if (tag=="lon") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("colo.htm",oSelText,"help:no; center:yes; status:no; dialogHeight:319px; dialogWidth:457px");
}
else if (tag=="list1") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message")
showModalDialog("msn.htm",oSelText,"help:no; center:yes; status:no; dialogHeight:319px; dialogWidth:457px");
}
else if (tag == "gradient") {
var oSelText = Editor_getSelText();
if (oSelText.text == "") {
alert("Ì—ÃÏ  Ÿ·Ì· «·‰’ √Ê·«");
return;
}
code = showModalDialog("gradient_form.htm","","help:no; center:yes; status:no; dialogHeight:150px; dialogWidth:420px");
if (!code)
return;
oSelText.text = "[grade=\"" + code + "\"]" + oSelText.text + "[/grade]"
}
else if (tag == "right") {
Editor_addCode("[RIGHT]","[/P]");
}
else if (tag == "left") {
Editor_addCode("[LEFT]","[/P]");
}
else if (tag == "justify") {
Editor_addCode("[JUSTIFY]","[/P]");
}
else if (tag == "center") {
Editor_addCode("[CENTER]","[/CENTER]");
}

else if (tag == "link") {
var oSelText = Editor_getSelText();
var ob = window.prompt("√œŒ· «·—«»ÿ:","http://");
txt = oSelText.text;
if (ob) {
if (txt=="")
txt = window.prompt("√œŒ· «· ⁄·Ìﬁ ⁄·Ï «·—«»ÿ","");
if (txt)
oSelText.text = "[url="+ob+"]"+txt+"[/url]";
else
oSelText.text = "[url]"+ob+"[/url]";
}

}

else if (tag == "email") {
var oSelText = Editor_getSelText();
var ob = window.prompt("√œŒ· ⁄‰Ê«‰ «·»—Ìœ «·«·ﬂ —Ê‰Ì:","@");
if (ob)
if (oSelText.text=="")
oSelText.text = "[mail="+ob+"]"+ob+"[/mail]";
else
oSelText.text = "[mail="+ob+"]"+oSelText.text +"[/mail]";
}
else if (tag == "image") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ «·’Ê—…:",link);
if (ob)
oSelText.text = "[img]"+ob+"[/img]";
}
else if (tag == "img2") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ «·’Ê—…:",link);
if (ob)
oSelText.text = "[img2]"+ob+"[/img2]";
}
else if (tag == "Unload") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"‰‘ﬂ—ﬂ Ãœ« ⁄·Ì ﬁ—«∆… «·„Ê÷Ê⁄ Ê ·«  »Œ· ⁄·Ì‰« »—œﬂ ":oSelText.text);
var ob = window.prompt("√œŒ· —”«·…  ÊœÌ⁄ ·„‰ Ìﬁ—√ „Ê÷Ê⁄ﬂ »„Ã—œ «·Œ—ÊÃ „‰Â:",link);
if (ob)
oSelText.text = "[Unload]"+ob+"[/Unload]";
}
else if (tag == "img3") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ «·’Ê—…:",link);
if (ob)
oSelText.text = "[img3]"+ob+"[/img3]";
}
else if (tag == "msg") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"":oSelText.text);
var ob = window.prompt("«œŒ· «·—”«·… «·· Ì  Êœ Œ—ÊÃÂ« »„Ã—œ «·œŒÊ· ·„Ê÷Ê⁄ﬂ : „·«ÕŸ… „Â„Â Ãœ« «·—Ã«¡ ⁄œ„ «” Œœ«„ Â–Â «·„Ì“… »«·—œÊœ ›ÂÌ „Œ’’Â ··„Ê«÷Ì⁄ ›ﬁÿ:",link);
if (ob)
oSelText.text = "[msg]"+ob+"[/msg]";
}

else if (tag == "bimg") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ «·’Ê—… «·„—«œ ÷»ÿÂ«:",link);
if (ob)
oSelText.text = "[bimg="+ob+"][/bimg]";
}
  else if (tag == "mleft" || tag == "mright" || tag == "mup" || tag == "mdown") {
    Editor_addCode("[move="+tag.substr(1).toLowerCase()+"]","[/move]");
  }
  else if (tag == "tleft" || tag == "tright" || tag == "tup" || tag == "tdown") {
    Editor_addCode("[movet="+tag.substr(1).toLowerCase()+"]","[/movet]");
  }
  else if (tag == "oleft" || tag == "oright" || tag == "oup" || tag == "odown") {
    Editor_addCode("[moveo="+tag.substr(1).toLowerCase()+"]","[/moveo]");
  }
  else if (tag == "kleft" || tag == "kright" || tag == "kup" || tag == "kdown") {
    Editor_addCode("[movek="+tag.substr(1).toLowerCase()+"]","[/movek]");
  }
  else if (tag == "sleft" || tag == "sright" || tag == "sup" || tag == "sdown") {
    Editor_addCode("[moves="+tag.substr(1).toLowerCase()+"]","[/moves]");
  }
else if (tag == "rplayer") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ „·› «·—ÌÌ· »·«Ì—:", link);
if (ob) {
t = window.prompt("’Ê  ›ﬁÿ = 0\r\n’Ê—… = 1", 0);
if (t) {
if (t==0)
oSelText.text = "[rams="+ob+"][/rams]";
else
oSelText.text = "[ramv="+ob+"][/ramv]";
}
}
}
else if (tag == "media") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· „·› «·’Ê  Ê«·’Ê—…:", link);
if (ob)
oSelText.text = "[media="+ob+"][/media]";
}
else if (tag == "flash") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ „·› «·›·«‘:", link);
if (!ob) return;
var w = window.prompt("√œŒ· ÿÊ· ‘«‘… «·›·«‘ »ÊÕœ… «·»Ìﬂ”·:","500");
if (!w) return;
var h = window.prompt("√œŒ· ⁄—÷ ‘«‘… «·›·«‘ »ÊÕœ… «·»Ìﬂ”·:","400");
if (!h) return;
oSelText.text = "[flash="+ob+" WIDTH="+w+" HEIGHT="+h+"][/flash]";
}

else if (tag == "web") {
var oSelText = Editor_getSelText();
var link=((oSelText.text=="")?"http://":oSelText.text);
var ob = window.prompt("√œŒ· —«»ÿ «·’›Õ…:", link);
if (ob)
oSelText.text = "[web]"+ob+"[/web]";
}
else if (tag == "poem") {
var oSelText = Editor_getSelText();
oSelText.text = "[poem]\n\r\n\r[/poem]";
}
else if (tag == "frame") {
var oSelText = Editor_getSelText();
if (oSelText.text == "") {
alert("Ì—ÃÏ  Ÿ·Ì· «·‰’ √Ê·«");
return;
}
code = showModalDialog("frame_form.htm","","help:no; center:yes; status:no; dialogHeight:290px; dialogWidth:450px");
if (!code)
return;
oSelText.text = '[frame="' + code + '"]' + oSelText.text + '[/frame]';
}
else if (tag == "plain") {
var oSelText = Editor_getSelText();
if (oSelText.parentElement().name=="message") {
var temp = oSelText.text;
temp = temp.replace(/\[FLASH=([^\]]*)\]WIDTH=[0-9]{0,4} HEIGHT=[0-9]{0,4}\[\/FLASH\]/gi,"$1");
temp = temp.replace(/\[VIDEO=([^\]]*)\]WIDTH=[0-9]{0,4} HEIGHT=[0-9]{0,4}\[\/VIDEO\]/gi,"$1");
oSelText.text = temp.replace(/\[[^\]]*\]/gi,"");
}
}
else if (tag == "cut" || tag == "copy" || tag == "paste" || tag == "delete" || tag == "close") {
var oSelText = Editor_getSelText();
oSelText.execCommand(tag);
}
else if (tag == "smile") {
opensmiliewindow(440,280)
}
else if (tag == "undo") {
alert("·· —«Ã⁄\n«÷€ÿ CTRL „⁄ „› «Õ Z");
}
else if (tag == "redo") {
alert("··≈⁄«œ…\n«÷€ÿ CTRL „⁄ „› «Õ Y");
}
else if (tag == "keyb") {
if (keyboardTable.style.display == "none") {
event.srcElement.src = "images/toolbox/keybx.gif";
keyboardTable.style.display = "inline";
event.srcElement.alt = "≈Œ›«¡ ·ÊÕ… «·„›« ÌÕ «·⁄—»Ì…";
}
else {
event.srcElement.src = "images/toolbox/keyb.gif";
keyboardTable.style.display = "none";
event.srcElement.alt = "≈ŸÂ«— ·ÊÕ… «·„›« ÌÕ «·⁄—»Ì…";
}
}
else if (tag == "preview") {
var maxchars = -1;
var l = document.vbform.message.value.replace(/^[\r\n\t ]*|[\r\n\t ]*$/gi, "").length;
if (l == 0)
alert("Õﬁ· «·„Ê÷Ê⁄ √Ê «· ⁄ﬁÌ» ›«—€");
else {
try { maxchars = postmaxchars } catch(e) { try { maxchars = pmmaxchars } catch(e) { ; } }
if (l > maxchars && maxchars != -1)
alert("«·—”«·… ÿÊÌ·… Ãœ«.\n\nÌ—ÃÏ  ÕœÌœ ‰’ «·—”«·…  »‹  " + maxchars + " Õ—›« ﬂÕœ √ﬁ’Ï.\nÀ„ ≈⁄«œ… «·„Õ«Ê·… "+l+" Õ—› «·Õœ «·„”„ÊÕ.");
else
open("postpreview.php", "postpreview");
}
}
  else if (tag == "colorpicker") {
var c = showColorsWindow();
if (c) {
var oSelText = Editor_getSelText();
oSelText.text = c;}
} else if (tag == "glow" || tag == "glow1" || tag == "mark" || tag == "7la1" || tag == "all1" || tag == "color") {
var oSelText = Editor_getSelText();
if (oSelText.text == "") {
alert("Ì—ÃÏ  Ÿ·Ì· «·‰’ √Ê·«");
return;
}
var c = showColorsWindow();
if (c) {
oSelText.text = "[" + tag + "=" + c + "]" + oSelText.text + "[/" + tag + "]";
}
} else if (tag == "help") {
open("help.php", "help",  "toolbar=no,scrollbars=yes,resizable=yes,width=550px,height=350px,left=50px,top=100px");
}
}