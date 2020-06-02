
function flipcursor(nosettime) {
	document.getElementsById('container').style.cursor = none;
	if (cursor.style.visibility == 'hidden') {
		cursor.style.visibility = '';
	} else {
		cursor.style.visibility = 'hidden';
	}
	if (!nosettime) {
		setTimeout('flipcursor()',300);
	}
}
