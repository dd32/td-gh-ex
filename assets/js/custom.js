jQuery(document).ready(function ($) {
    "use strict";
    $('body').on('click','.browse-category-wrap', function(){
    	$(this).toggleClass('active');
    });
});