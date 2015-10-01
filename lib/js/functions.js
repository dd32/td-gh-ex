
//
//
window.onload = function()
{
var categories = document.getElementById('categories');
var cat = categories.innerHTML;
var find = '<br>';
var re = new RegExp(find, 'g');
var n = cat.replace(re, '<hr />');
categories.innerHTML = n;
document.getElementById("search-img").addEventListener("click", submit);
}
//
//
//
//
//This file contains simple functions that are dependent to the browser and must be set on 
//visitor environment instead of the server for maximum functionality.
function submit()
{
	document.forms['search'].submit() ;
}

