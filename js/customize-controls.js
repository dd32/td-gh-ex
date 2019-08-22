( function( api ) {

	// Extends our custom "advance-fitness-gym" section.
	api.sectionConstructor['advance-fitness-gym'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


	jQuery(document).ready(function () {
	    jQuery('.controls#advance-fitness-gym-img-container li img').click(function () {
	        jQuery('.controls#advance-fitness-gym-img-container li').each(function () {
	            jQuery(this).find('img').removeClass('advance-fitness-gym-radio-img-selected');
	        });
	        jQuery(this).addClass('advance-fitness-gym-radio-img-selected');
	    });
	});