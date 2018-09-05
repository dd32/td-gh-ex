jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About rockers page -> Actions required tab */
    var rockers_nr_actions_required = rockersLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof rockers_nr_actions_required !== 'undefined') && (rockers_nr_actions_required != '0') ) {
        jQuery('li.rockers-w-red-tab a').append('<span class="rockers-actions-count">' + rockers_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".rockers-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'rockers_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : rockersLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.rockers-tab-pane h1').append('<div id="temp_load" style="text-align:center"><img src="' + rockersLiteWelcomeScreenObject.template_directory + '/inc/rockers-info/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var rockers_lite_actions_count = jQuery('.rockers-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof rockers_lite_actions_count !== 'undefined' ) {
                    if( rockers_lite_actions_count == '1' ) {
                        jQuery('.rockers-actions-count').remove();
                        jQuery('.rockers-tab-pane').append('<p>' + rockersLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.rockers-actions-count').text(parseInt(rockers_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function rockers_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".rockers-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var rockers_actions_anchor = location.hash;

	if( (typeof rockers_actions_anchor !== 'undefined') && (rockers_actions_anchor != '') ) {
		rockers_welcome_page_tabs('a[href="'+ rockers_actions_anchor +'"]');
	}

    jQuery(".rockers-nav-tabs a").click(function(event) {
        event.preventDefault();
		rockers_welcome_page_tabs(this);
    });

		/* Tab rockers height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.rockers-tab-rockers > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
