jQuery(document).ready(function ($) {
    "use strict";
    $('body').on('click keypress','.browse-category-wrap', function(){
    	$(this).toggleClass('active');
    });
});