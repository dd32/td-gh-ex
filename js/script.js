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


/*=============================
========= KNOBS VALUES ========
===============================*/

jQuery('.percentages').knob({
    'readOnly': true,
    'thickness': '.25',
    'height': '100',
    'width': '100',
    'dynamicDraw': true,
    'draw': function () {
        jQuery(this.i).val(this.cv + '%');
    },

});
