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

    // Load Progress
    $(window).on('load', function () {
        if ($("#progress").length === 0) {
            // inject the bar..
            $("body").append($("<div><b></b><i></i></div>").attr("id", "progress"));
            
            // animate the progress..
            $("#progress").width("101%").delay(800).fadeOut(1000, function() {
            // ..then remove it.
            $(this).remove();
            });  
        }
    });
}(jQuery));