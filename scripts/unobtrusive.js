// http://docs.jquery.com/Tutorials:PNG_Opacity_Fix_for_IE6#The_Solution

$(document).ready(function() {
  var badBrowser = (/MSIE ((5\.5)|6)/.test(navigator.userAgent) && navigator.platform == "Win32");
  if (badBrowser) {
    // get all pngs on page
    $('img[src$=.png]').each(function() {
      if (!this.complete) {
        this.onload = function() { fixPng(this) };
      } else {
        fixPng(this);
      }
    });
  }

  $("input#searchsubmit").mouseover( function() { $(this).attr({ style: "background-color: #e81e25;" }); });
  $("input#searchsubmit").mouseout( function() { $(this).attr({ style: "background-color: #f39a2b;" }); });
  
  // compare browser and rendering engine
  if (  (($.browser.mozilla) && (parseFloat($.browser.version) < 1.9)) 
	 || (($.browser.safari) && (parseFloat($.browser.version) < 523)) 
	 || (($.browser.msie) && (parseFloat($.browser.version) < 7)) 
	 ) { 
  		//alert('Please upgrade your browser ;-)');
  		$('head > style').append("@import url('css/degradation.css');");
  };
	
	// add characters to top nav
	$('#topNav ul.tabs li.page_item a').prepend('<span class="unibullet">&raquo;</span> ');

});

function fixPng(png) {
  // get src
  var src = png.src;
  // set width and height
  if (!png.style.width) { png.style.width = $(png).width(); }
  if (!png.style.height) { png.style.height = $(png).height(); }
  // replace by blank image
  png.onload = function() { };
  png.src = blank.src;
  // set filter (display original image)
  png.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "',sizingMethod='scale')";
}

// transparency 
/*function setOpacity(value) {
	testObj.style.opacity = value/10;
	testObj.style.filter = 'alpha(opacity=' + value*10 + ')';
}*/
