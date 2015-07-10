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
    if(!$self.has('img').length && !$self.hasClass('hjylCopy')){
            $self.append(' <i class="fa fa-external-link"></i>');
    }
});

}); 
