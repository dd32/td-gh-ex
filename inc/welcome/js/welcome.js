jQuery(document).ready(function() {

  var counter = jQuery('#counter-count').data('counter');
  if ( counter != '0')  {
    jQuery('li.bestblog-w-red-tab a').append('<span class="bestblog-actions-count">' + counter + '</span>');
  } else {
    jQuery('.bestblog-tab').removeClass( 'bestblog-w-red-tab' );
  }
	/* Tabs in welcome page */
	function bestblog_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".bestblog-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var bestblog_actions_anchor = location.hash;

	if( (typeof bestblog_actions_anchor !== 'undefined') && (bestblog_actions_anchor != '') ) {
		bestblog_welcome_page_tabs('a[href="'+ bestblog_actions_anchor +'"]');
	}

    jQuery(".bestblog-nav-tabs a").click(function(event) {
        event.preventDefault();
		bestblog_welcome_page_tabs(this);
    });

 /* Tab Content height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.bestblog-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
    if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
  {
		$newheight = $admin_menu_height - 180;
		$tab.css('min-height',$newheight);
  }
});
