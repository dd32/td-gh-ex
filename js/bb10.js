jQuery(document).ready(function($){ //Begin jQuery
//up to top
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
$(window).scroll(function(){
	if($(window).scrollTop()>=300){
		$('#hjylUp').fadeIn(600);
	}else{
		$('#hjylUp').fadeOut(600);
}});
$('#hjylUp').click(function() {
	$body.animate({
		scrollTop: 0
	}, 600)
});
$('a:has(img)').addClass('notbottom');
//add external link to entry a tag;
$('.hjylEntry p a').each(function(){
    $self = $(this);
    if(!$self.has('img').length && !$self.hasClass('hjyl_Copy')){
            $self.append('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#227EC0" fill-rule="evenodd" d="M19,14 L19,19 C19,20.1045695 18.1045695,21 17,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,7 C3,5.8954305 3.8954305,5 5,5 L10,5 L10,7 L5,7 L5,19 L17,19 L17,14 L19,14 Z M18.9971001,6.41421356 L11.7042068,13.7071068 L10.2899933,12.2928932 L17.5828865,5 L12.9971001,5 L12.9971001,3 L20.9971001,3 L20.9971001,11 L18.9971001,11 L18.9971001,6.41421356 Z"/></svg>');
    }
});

 $('.qrcode').click(function(){
	$('.qrcode').toggleClass('active');
	$('.qrcodeimg').fadeToggle(250);
});

}); 

//let logo up
function addEventSimple(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent('on' + evt, fn);
    }
}
addEventSimple(window, 'load', initScrolling);
var scrollingBox;
var scrollingInterval;
var reachedBottom = false;
var bottom;

function initScrolling() {
    scrollingBox = document.getElementById('bb_logo');
    scrollingBox.style.overflow = "hidden";
    scrollingInterval = setInterval("scrolling()", 50);
    scrollingBox.onmouseover = over;
    scrollingBox.onmouseout = out;
}

function scrolling() {
    var origin = scrollingBox.scrollTop++;
    if (origin == scrollingBox.scrollTop) {
        if (!reachedBottom) {
            scrollingBox.innerHTML += scrollingBox.innerHTML;
            reachedBottom = true;
            bottom = origin;
        } else {
            scrollingBox.scrollTop = bottom;
        }
    }
}

function over() {
    clearInterval(scrollingInterval);
}

function out() {
    scrollingInterval = setInterval("scrolling()", 50);
}