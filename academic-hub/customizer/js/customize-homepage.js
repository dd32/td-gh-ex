
//Scroll to section
jQuery('body').on('click', 'ul#sub-accordion-panel-academic_hub_homepage_setting li', function(event) {
    //li variable section
    var section_id = $(this).attr('id');
	scrollToSection( section_id );
	
});

//scroll funcions
function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

       // Homepage Slider
       case 'accordion-section-frontpage_slider_section':
       preview_section_id = "frontpage_slider_section";
       break;

       //products category section
       case 'accordion-section-frontpage_service_box_section':
       preview_section_id = "frontpage_service_box_section";
       break;

       

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}

