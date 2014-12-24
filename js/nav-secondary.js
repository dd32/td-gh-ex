/*
 * MOBILE NAVIGATION WITHOUT SUBPAGE LISTING
 * Source: http://maxfoundry.com/blog/responsive-mobile-navigation-in-wordpress/
 * Copyright author: John Hartley
 * Author URI: http://maxfoundry.com/blog/author/johnbhartley 
 * License: GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

jQuery(document).ready(function() { 
	// build <select> dropdown
	jQuery("<select />").appendTo("div.nav-head-secondary");

	// create deafult option "Menu..."
	jQuery("<option />", {
		"selected": "selected",
		"value": "",
		"text": "Menu Top..."  
	}).appendTo(".nav-head-secondary select");

	// populate
	jQuery(".nav-head-secondary ul li a").each(function() {
		var el = jQuery(this);

		if(el.parents('.nav-head-secondary ul ul').length) {
			// if there are ul in li
		} else { 
			// if no ul in li
			jQuery('<option />', {
				'value': el.attr('href'),
				'text': el.text()
			}).appendTo('.nav-head-secondary select');
		}
	});

	// make links work 
	jQuery(".nav-head-secondary select").change(function() { 
		window.location = jQuery(this).find("option:selected").val();
	});
});
