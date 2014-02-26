jQuery(document).ready(function(){(function(e){e.fn.equalHeight=function(){var t=0;this.each(function(){e(this).each(function(){t=Math.max(t,e(this).height())})});console.log(t);return t}})(jQuery);jQuery(".ft-sep").css("height",jQuery(".ft-sep").equalHeight())})
 jQuery(function($) {
		/* Mobile */
				
		$("#menu-trigger").on("click", function(){
			$(".menu-ommune").slideToggle();
		});
		// iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) $('#menu-ommune ul').addClass('no-transition');      
    });          