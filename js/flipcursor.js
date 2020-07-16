/* @version 1.00 */
function flipcursor(nosettime) {
	var cursor=document.getElementById("cursor");
	if (cursor.style.visibility == 'hidden') {
		cursor.style.visibility = '';
	} else {
		cursor.style.visibility = 'hidden';
	}
	if (!nosettime) {
		setTimeout('flipcursor()',300);
	}
}