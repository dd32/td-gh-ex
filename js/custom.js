/* ----------------- Start Document ----------------- */
(function($){
  $(document).ready(function(){
    'use strict';

/*----------------------------------------------------*/
/*	Foundation Magic
/*----------------------------------------------------*/

		$(document).foundation();

/*----------------------------------------------------*/
/*  Fancybox Images
/*----------------------------------------------------*/

      $(".fancybox").fancybox({
        padding     : 0,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(35, 39, 43, 1)'
                }
            },
          title : {
            type: 'outside'
          },
          thumbs  : {
            width : 50,
            height  : 50
          }
        }
      });

/* ------------------ End Document ------------------ */
});

})(this.jQuery);

