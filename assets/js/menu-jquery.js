jQuery(document).ready(function($){
    var anchor = window.location.hash;
    if ( $(anchor).length > 0 ) {
        $('html, body').animate({
            scrollTop: $(anchor).offset().top
        }, 1500);
    }
});


jQuery(document).ready(function($){

// Bootstrap Menu Dropdown on Hover
$('ul.nav li.dropdown').hover(function() {
var nav = $(this);
setTimeout(function() {
nav.addClass("open");
}, 200);
$(this).children('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
}, function() {
var nav = $(this);
setTimeout(function() {
nav.removeClass("open");
}, 0);
$(this).children('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
});
});