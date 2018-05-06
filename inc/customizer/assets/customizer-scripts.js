jQuery(document).ready(function ($) {

  // On Off  Switch Control
  $('body').on('click', '.onoffswitch', function(){
      var $this = $(this);
      if($this.hasClass('switch-on')){
          $(this).removeClass('switch-on');
          $this.next('input').val('off').trigger('change')
      }else{
          $(this).addClass('switch-on');
          $this.next('input').val('on').trigger('change')
      }
  });

  /** 
  *scroll home page sections on clicking related customizer sections
  */
   $('body').on('click', '#sub-accordion-panel-agensy_home_page_setting .control-subsection .accordion-section-title', function(event) {
       var section_id = $(this).parent('.control-subsection').attr('id');
       scrollToSection( section_id );
   });

    function scrollToSection( section_id ){
       var preview_section_id = "agensy-about-us-section";

       var $contents = jQuery('#customize-preview iframe').contents();

       switch ( section_id ) {
           
           case 'accordion-section-agensy_slider_section':
           preview_section_id = "header-slider-wrap";
           break;
           
           case 'accordion-section-agensy_home_page_section':
           preview_section_id = "agensy-scroll-about";
           break;

           case 'accordion-section-agensy_faq_section':
           preview_section_id = "agensy-scroll-faq";
           break;

           case 'accordion-section-agensy_features_section':
           preview_section_id = "agensy-scroll-features";
           break;

           case 'accordion-section-agensy_service_slider_section':
           preview_section_id = "agensy-scroll-service";
           break;

           case 'accordion-section-agensy_team_page_section':
           preview_section_id = "agensy-scroll-team";
           break;

           case 'accordion-section-agensy_counter_section':
           preview_section_id = "agensy-scroll-counter";
           break;

           case 'accordion-section-agensy_blog_page_section':
           preview_section_id = "agensy-scroll-blog";
           break;

           case 'accordion-section-agensy_logo_section':
           preview_section_id = "agensy-scroll-logo";
           break;
       }

       if( $contents.find('#'+preview_section_id).length > 0 ){
           $contents.find("html, body").animate({
           scrollTop: $contents.find( "#" + preview_section_id ).offset().top - 82
           }, 500);
       }
    }

    jQuery(document).ready(function($){/** Select Multiple Categories **/
      $('.ex-cat-wrap input:checkbox').on('change', function (e) {
         e.preventDefault();
         var chkbox = $(this).parents('.ex-cat-wrap').find('input:checkbox');//$('#ex-cat-wrap input:checkbox');
         var id = '';
         
         $.each( chkbox, function () {
             var oid = $(this).val(); 
             
             if($(this).attr('checked')) {
                 id += oid;
                 id += ','; 
             }
         });
         
         $(this).parents('.ex-cat-wrap').next('input:hidden').val(id).change();
      });
   
   });
});

