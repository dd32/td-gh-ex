jQuery(document).ready(function($){
//up to top
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
$('#oloUp').click(function(){
		$body.animate({scrollTop:0},400);
});

//control height
	var h1 = $(".oloPosts").height();
	var h2 = $("#oloWidget").height();

	if(h2 < h1){
		$("#oloWidget").height(h1);
		}else {
		$(".oloPosts").height(h2);
		}
		
//add external link to entry a tag;
$('.oloEntry p a').each(function(){
    $self = $(this);
    if(!$self.has('img').length && !$self.hasClass('oloCopy')){
            $self.append(' <i class="fa fa-external-link"></i>');
    }
});
}); 