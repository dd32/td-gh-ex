// JavaScript Document

function getRadioValue(o) {
	if(!o) return "";
	var rl = o.length;
	if(rl == undefined)
		if(o.checked) return o.value;
		else return "";
	for(var i = 0; i < rl; i++) {
		if(o[i].checked) return o[i].value;
	}
	return "";
}

function headerMenu1_tD(o) {
		var v = getRadioValue(o);
		if(v=='pages') {
			document.getElementById('headerMenu1_sortBy_categories').style.display = 'none';
			document.getElementById('headerMenu1_sortBy_pages').style.display = 'block';
		} else if(v=='categories') {
			document.getElementById('headerMenu1_sortBy_categories').style.display = 'block';
			document.getElementById('headerMenu1_sortBy_pages').style.display = 'none';
		}
}
function headerMenu2_tD(o) {
		var v = getRadioValue(o);
		if(v=='pages') {
			document.getElementById('headerMenu2_sortBy_categories').style.display = 'none';
			document.getElementById('headerMenu2_sortBy_pages').style.display = 'block';
		} else if(v=='categories') {
			document.getElementById('headerMenu2_sortBy_categories').style.display = 'block';
			document.getElementById('headerMenu2_sortBy_pages').style.display = 'none';
		}
}
