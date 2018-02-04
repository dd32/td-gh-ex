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
//add external link to entry a tag;
$('.hjylEntry p a').each(function(){
    $self = $(this);
    if(!$self.has('img').length && !$self.hasClass('hjyl_Copy')){
            $self.append(' <i class="fa fa-external-link"></i>');
    }
});

 $('.fa-qrcode').click(function(){
	$('.fa-qrcode').toggleClass('active');
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