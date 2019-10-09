jQuery(document).ready(function () { 'use strict';
	var resMwdt = jQuery('#resmwdt').width();
	if( resMwdt < 10 ){
      jQuery('.menu-item-has-children > a, .page_item_has_children > a').click(function(e){
        e.preventDefault();
      });
    }
});