jQuery(document).ready(function( $ ) {
    "use strict";
    
    function scrollToTop($topClass){   
        let top_0 = {scrollTop:0};
        let topClass = $($topClass);
        topClass.on("click" , function(e){
            $("html,body").animate(top_0,1000);
            return false;
        });
        $(window).scroll(function(){
            if($(this).scrollTop() > 700) {
                topClass.fadeIn(500);
            }
            else {
                topClass.fadeOut(500);
            }
        });
    }
    scrollToTop('.scrolltotop i');

	
}(jQuery));