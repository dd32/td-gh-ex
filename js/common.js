jQuery(document).ready(function($){
    window.addEventListener('DOMContentLoaded', function() {
        new QueryLoader2(document.querySelector("body"), {
            barColor: "#efefef",
            backgroundColor: "#111",
            percentage: true,
            barHeight: 1,
            minimumTime: 200,
            fadeOutTime: 1000
        });
    });
	
});





jQuery(document).ready(function($){

	
	//tooltip
	$(function () { $("[data-toggle='tooltip']").tooltip(); });

	// responsive nav
	jQuery(".site-nav-toggle").click(function(){
				jQuery(".site-nav").toggle();
			});


	$(document).ready( function(){
		var $ct_top_menu = $( 'ul.nav' ),
			$ct_search_icon = $( '#ct_search_icon' );

		$ct_search_icon.click( function() {
			var $this_el = $(this),
				$form = $this_el.siblings( '.ct-search-form' );

			if ( $form.hasClass( 'ct-hidden' ) ) {
				$form.css( { 'display' : 'block', 'opacity' : 0 } ).animate( { opacity : 1 }, 500 );
			} else {
				$form.animate( { opacity : 0 }, 500 );
			}

			$form.toggleClass( 'ct-hidden' );
		} );

		ct_duplicate_menu( $('#ct-top-navigation ul.nav'), $('#ct-top-navigation .mobile_nav'), 'mobile_menu', 'ct_mobile_menu' );

		function ct_duplicate_menu( menu, append_to, menu_id, menu_class ){
			var $cloned_nav;

			menu.clone().attr('id',menu_id).removeClass().attr('class',menu_class).appendTo( append_to );
			$cloned_nav = append_to.find('> ul');
			
			append_to.on( 'click', function(){
				if ( $(this).hasClass('closed') ){
					$(this).removeClass( 'closed' ).addClass( 'opened' );
					$cloned_nav.slideDown( 500 );
				} else {
					$(this).removeClass( 'opened' ).addClass( 'closed' );
					$cloned_nav.slideUp( 500 );
				}
				return false;
			} );

			append_to.on( 'click', 'a', function(event){
				event.stopPropagation();
			} );
		}
	} );


  //fact
		var decimal_places = 0;
		var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;
	  	$('.fact').waypoint(function(down) {
		  	$('.fact').each(function () {
			  	var $this = $(this);
			  	$({ Counter: 0 }).animate({ Counter: parseInt($(this).data('fact')) }, {
				  duration: 1000,
				  easing: 'swing',
				  step: function () {
					  $this.text(Math.ceil(this.Counter));
				  }
			  	});//$({ Counter: 0 }).animate({ Counter: parseInt($(this).data('fact')) }, {
		  	});//$('.fact').each(function () {


		  	$('.fact').animateNumber(
			{
			  	color: 'green',
			},
			1000
		  	)		  
	  },	
	  {
		offset: '70%',
		triggerOnce: true
	 });//$('.fact').waypoint(function(down) {
		  
	// progress bar
	$('.progress-bar').waypoint(function()
		{			
			$(".progress-bar").each(function(){
				var percent = $(this).data("percent");	
				var progressBarWidth = percent * $(".col-md-9").width() / 100;
				$(this).animate({ width: progressBarWidth }, 100);
			});
		},	
		{
		  offset: '90%',
		  triggerOnce: true
		}
	);	

// adjust hight
        $('.ct_post_img a').each(function() {
            var width = $(this).width();   
            var height = $(this).height();  
            var needheight = width* 0.66;  
            $(this).css("height", needheight);  
            $(this).css("width", width); 
        });

        $('#features .content .slider div h3 img').each(function() {
            var width = $(this).width();   
            var height = $(this).height();  
            var needheight = width* 0.66;
            $(this).css("height", needheight);  
            $(this).css("width", width); 
        });

	

});

//return top
window.onscroll=function(){ 
	if ($(document).scrollTop() > 200) 
	{ 
		$(".side").css({display:"block"});
	}else{ 
		$(".side").css({display:"none"});	
	} 
}
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
//return top end

/*
$(function(){ 
	$(".ct_section_columns").hover(function(){ 
		//$(".clsContent").show(); 
		//$(".animated1").css("display","none");
		$(".animated1").addClass("animated bounceLeft");
		//$(".animated1").css("display","block");
		//alert('ok');		
	}) 
});
*/

function testAnim() {
		$('.animated1').removeClass('bounceInLeft' + ' animated').addClass('bounceInLeft' + ' animated');
		$('.animated2').removeClass('bounceInUp' + ' animated').addClass('bounceInUp' + ' animated');
		$('.animated3').removeClass('bounceInUp' + ' animated').addClass('bounceInUp' + ' animated');		
		$('.animated4').removeClass('bounceInRight' + ' animated').addClass('bounceInRight' + ' animated');	
  };

$(document).ready(function(){
	var i=1; 	
	$('.ct_section_columns').hover(function(e){
		if(i==1)
		{
		  e.preventDefault();
		  //var anim = $('.animated1').val();
		  testAnim();
		  i=2;
		}
	});	

	
 });