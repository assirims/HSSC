// Collapse Category Script, credit: phpdissection.com - where they got it from, I don't have a clue. 

var ca_popup_id = -1;
var ca_popup_counter = 0;
var ca_popup_list = new Array();
var ca_forums_list = new Array();
var ca_item;
var ca_item2;
var ca_list;
var ca_list2;
var ca_code;
var ca_timer;
var ca_left;
var ca_exp = new Date(); 

ca_exp.setTime(ca_exp.getTime() + (90*24*60*60*1000));
onload_functions[onload_functions.length] = 'ca_forums_init();';

// cookies
function ca_cookie_set(name, value) 
{
	var argv = ca_cookie_set.arguments;
	var argc = ca_cookie_set.arguments.length;
	var expires = (argc > 2) ? argv[2] : ca_exp;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape(value) +
		((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path == null) ? "" : ("; path=" + path)) +
		((domain == null) ? "" : ("; domain=" + domain)) +
		((secure == true) ? "; secure" : "");
}

function ca_cookie_getval(offset) 
{
	var endstr = document.cookie.indexOf(";",offset);
	if (endstr == -1)
	{
		endstr = document.cookie.length;
	}
	return unescape(document.cookie.substring(offset, endstr));
}

function ca_cookie_get(name) 
{
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) 
	{
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return ca_cookie_getval(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0)
			break;
	} 
	return null;
}


// add new item to queue
function ca_popup_register(id)
{
    ca_popup_list[ca_popup_list.length] = id;
}





// expand forum
function ca_expand_forum(a, id)
{
	// Find parent block
	var e = a.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('UL')[1];
	var expanded = 1;
	if(e)
	{
	    if(e.style.display == 'none')
	    {
	        e.style.display = '';
        	var expanded = 2;
	    }
	    else
	    {
	        e.style.display = 'none';
	    }
	    if(id)
	    {
	        ca_cookie_set('expand' + id, expanded);
        }
	}
}

// add new item to queue
function ca_forum_register(id)
{
    ca_forums_list[ca_forums_list.length] = id;
}

// expand forums
function ca_forums_init()
{
    var id, i, j, do_minimize;
    for(i=0; i<ca_forums_list.length; i++)
    {
        id = ca_forums_list[i];
        // find item, expand block
        ca_item = document.getElementById('forumblock' + id);
        if(ca_item)
        {
            if(ca_cookie_get('expand' + id) == 1)
            {
                ca_expand_forum(ca_item, 0);
            }
        }
    }
}
