function URLEncode(val1)
{
	// The Javascript escape and unescape functions do not correspond
	// with what browsers actually do...
	var SAFECHARS = "0123456789" +					// Numeric
					"ABCDEFGHIJKLMNOPQRSTUVWXYZ" +	// Alphabetic
					"abcdefghijklmnopqrstuvwxyz" +
					"-_.!~*'()";					// RFC2396 Mark characters
	var HEX = "0123456789ABCDEF";

	var plaintext = val1;
	var encoded = "";
	for (var i = 0; i < plaintext.length; i++ ) {
		var ch = plaintext.charAt(i);
	    if (ch == " ") {
		    encoded += "+";				// x-www-urlencoded, rather than %20
		} else if (SAFECHARS.indexOf(ch) != -1) {
		    encoded += ch;
		} else {
		    var charCode = ch.charCodeAt(0);
			if (charCode > 255) {
			    alert( "Unicode Character '" 
                        + ch 
                        + "' cannot be encoded using standard URL encoding.\n" +
				          "(URL encoding only supports 8-bit characters.)\n" +
						  "A space (+) will be substituted." );
				encoded += "+";
			} else {
				encoded += "%";
				encoded += HEX.charAt((charCode >> 4) & 0xF);
				encoded += HEX.charAt(charCode & 0xF);
			}
		}
	} // for

	return encoded;
};

// Current Page Reference
// copyright Stephen Chapman, 1st Jan 2005
// you may copy this function but please keep the copyright notice with it
function getURL(uri) {
	uri.dir = location.href.substring(0, location.href.lastIndexOf('\/'));
	uri.dom = uri.dir; 
	if (uri.dom.substr(0,7) == 'http:\/\/') uri.dom = uri.dom.substr(7);
	uri.path = ''; 
	var pos = uri.dom.indexOf('\/'); 
	if (pos > -1) {
		uri.path = uri.dom.substr(pos+1); 
		uri.dom = uri.dom.substr(0,pos);
	}
	uri.page = location.href.substring(uri.dir.length+1, location.href.length+1);
	pos = uri.page.indexOf('?');
	if (pos > -1) {
		uri.page = uri.page.substring(0, pos);
	}
	pos = uri.page.indexOf('#');
	if (pos > -1) {
		uri.page = uri.page.substring(0, pos);
	}
	uri.ext = ''; 
	pos = uri.page.indexOf('.');
	if (pos > -1) {
		uri.ext =uri.page.substring(pos+1); 
		uri.page = uri.page.substr(0,pos);
	}
	uri.file = uri.page;
	if (uri.ext != '') uri.file += '.' + uri.ext;
	if (uri.file == '') uri.page = 'index';
	uri.args = location.search.substr(1).split("?");
	return uri;
}
function getQueryVariable(variable) { 
	var query = window.location.search.substring(1); 
	var vars = query.split("&"); 
	for (var i=0;i<vars.length;i++) { 
		var pair = vars[i].split("="); 
		if (pair[0] == variable) { 
			return pair[1]; 
		} 
	} 
} 

function openSubWin(url, nm, x, y, w, h, atts) {
	nm = nm || "subwindow";
	atts = atts || "menubar,resizable,scrollbars";
	w = w || 600; 
	h = h || 450;
	x = (typeof x=="number")? x: window.opera? 100: Math.round( (screen.availWidth - w)/2 );
	y = (typeof y=="number")? y: window.opera? 20: Math.round( (screen.availHeight - h)/2 );
	atts += ',width='+w+',height='+h+',left='+x+',top='+y;
	var win = window.open(url, nm, atts); 
	if (win) {
		if (!win.closed) { 
			win.resizeTo(w,h); 
			win.moveTo(x,y); 
			win.focus(); 
			return false; 
		}
	} 
	return true;
}

var uri = new Object();
getURL(uri);

