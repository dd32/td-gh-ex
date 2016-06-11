/*=============================
=========== JS CHECK  =========
===============================*/

        jQuery('html').removeClass('no-js');
        jQuery('html').addClass('js');

/*=============================
======= PRELOADER SCRIPT ======
===============================*/


jQuery(document).ready(function () {

    setTimeout(function () {
        jQuery('body').addClass('loaded');

    }, 1000);
});


/*=============================
========= MAP OVERLAY =========
===============================*/

   jQuery('.map_overlay').click(function(){
       jQuery(this).hide();
   });
