jQuery(document).ready(function($){ //Begin jQuery
    $('.reply').click(function() {
    var atid = '"#' + $(this).parent().parent().parent().attr("id") + '"';
    var atname = $(this).prevAll().find('cite:first').text();
    $("#comment").focus().val("<a href=" + atid + ">@" + atname + " </a>");
});
    $('#cancel-comment-reply-link').click(function() { //click to cancel reply
    $("#comment").val('');
});

//up to top
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
$('#hjylUp').click(function(){
		$body.animate({scrollTop:0},400);
})  //End jQuery

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