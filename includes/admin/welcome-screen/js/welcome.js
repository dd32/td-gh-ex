jQuery(document).ready(function() {
	
	/* Tabs in welcome page */
	function avis_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".avis-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var avis_actions_anchor = location.hash;
	
	if( (typeof avis_actions_anchor !== 'undefined') && (avis_actions_anchor != '') ) {
		avis_welcome_page_tabs('a[href="'+ avis_actions_anchor +'"]');
	}
	
    jQuery(".avis-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
		avis_welcome_page_tabs(this);
    });

});