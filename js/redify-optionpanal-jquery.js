/*general setting save value 1*/
function datasave_generalsetting() {
jQuery("#redify_settings_save").val("1"); 

       jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_general_setting').serialize(),
           success : function(data){
                                   jQuery('#success_message_save_general').show();
								   jQuery("#success_message_save_general").fadeOut(5000);
                                   }
					
       });
}
/*save value 2*/
function reset_data_generalsetting() {

 jQuery("#redify_settings_save").val("2");
       jQuery.ajax({ 
               url:'admin.php?page=redify',
               type:'post',
              data : jQuery('#redify_general_setting').serialize(),
           success : function(data){
                                   jQuery('#success_message_reset_general').show();
								   jQuery("#success_message_reset_general").fadeOut(5000);
                                   }
					
       });
	  
}
/*end general setting*/

/*footer customize of save value 1*/

function datasave_footer() {
       jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_footer_form').serialize(),
			    success : function(data){
                                   jQuery('#success_message_save_footer').show();
								   jQuery("#success_message_save_footer").fadeOut(5000);
                                   }
					
       });
}

/*footer customize save value 2*/
function reset_data_footersetting() {

 jQuery("#redify_footer_customization").val("2");
       jQuery.ajax({ 
               url:'admin.php?page=redify',
               type:'post',
              data : jQuery('#redify_footer_form').serialize(),
           success : function(data){
                                   jQuery('#success_message_reset_footer').show();
								   jQuery("#success_message_reset_footer").fadeOut(5000);
                                   }
					
       });
	  
}
/*end of footer customize*/

/*home page slider save value 1*/
function datasave_slider() {
 jQuery("#redify_sliders_save").val("1");
       jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_homepage_slider').serialize(),
			    success : function(data){
                                   jQuery('#success_message_save_slider').show();
								   jQuery("#success_message_save_slider").fadeOut(5000);
                                   }
       });
}

/*home page slider value 2*/
function reset_data_slider() {
 jQuery("#redify_sliders_save").val("2");
       jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_homepage_slider').serialize(),
			  success : function(data){
                                   jQuery('#success_message_reset_slider').show();
								   jQuery("#success_message_reset_slider").fadeOut(5000);
                                   }
       });
}
/*end of page slide save*/

/*typography page save value 1*/
function datasave_typography() {
jQuery("#redify_typography_save").val("1"); 
               jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_typography_form').serialize(),
           success : function(data){
                                   jQuery('#success_message_save').show();
								   jQuery("#success_message_save").fadeOut(5000);
                                   }
					
       });
}
/*typography save value 2*/
function reset_data_typography() {

 jQuery("#redify_typography_save").val("2");
 
       jQuery.ajax({ 
               url:'admin.php?page=redify',
               type:'post',
              data : jQuery('#redify_typography_form').serialize(),
           success : function(data){
                                   jQuery('#success_message').show();
								   jQuery("#success_message").fadeOut(5000);
                                   }
					
       });
	  
}
/*end of typography save value*/
/*Home setting save value 1*/
function datasave_homesetting() {
jQuery("#redify_home_settings_save").val("1"); 

       jQuery.ajax({
               url:'admin.php?page=redify',
               type:'post',
               data : jQuery('#redify_home_setting').serialize(),
           success : function(data){
                                   jQuery('#success_message_save_home').show();
								   jQuery("#success_message_save_home").fadeOut(5000);
                                   }
					
       });
}
/*save value 2*/
function reset_data_homesetting() {

 jQuery("#redify_home_settings_save").val("2");
       jQuery.ajax({ 
               url:'admin.php?page=redify',
               type:'post',
              data : jQuery('#redify_home_setting').serialize(),
           success : function(data){
                                   jQuery('#success_message_reset_home').show();
								   jQuery("#success_message_reset_home").fadeOut(5000);
                                   }
					
       });
	  
}
/*end home setting*/





/*color picker general typographi*/
jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_title');
    var p = jQuery('#picker_title').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_title').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_title']").click(function(){
jQuery('#picker_title').show();
});

});
/*end of color picker typographi*/

/*menu navigation typographi*/
 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_navigation');
    var p = jQuery('#picker_navigation').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_navigation').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_navigation']").click(function(){
jQuery('#picker_navigation').show();
});

});
/*end of navigation typographi*/

/*Post Title typographi*/
 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_post_title');
    var p = jQuery('#picker_post_title').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_post_title').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_post_title']").click(function(){
jQuery('#picker_post_title').show();
});

});
/*end of Post Title typographi*/

/*Post Excerpt typography*/
 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_post_entry');
    var p = jQuery('#picker_post_entry').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_post_entry').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_post_entry']").click(function(){
jQuery('#picker_post_entry').show();
});

});
/*end of Post Excerpt typography*/

/*Post Meta typographi*/
 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_post_meta');
    var p = jQuery('#picker_post_meta').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_post_meta').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_post_meta']").click(function(){
jQuery('#picker_post_meta').show();
});

});
/*end of Post Meta*/

/*Sidebar Widget Titles typographi*/
 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_sidebar_widget_titles');
    var p = jQuery('#picker_sidebar_widget_titles').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_sidebar_widget_titles').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_sidebar_widget_titles']").click(function(){
jQuery('#picker_sidebar_widget_titles').show();
});

});

/*end of Sidebar Widget Titles*/

/*typographi Footer Widget Titles*/
jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_footer_widget_titles');
    var p = jQuery('#picker_footer_widget_titles').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_footer_widget_titles').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_footer_widget_titles']").click(function(){
jQuery('#picker_footer_widget_titles').show();
});

});
/*end typographi Footer Widget Titles*/

/*general option color Site Title*/

 jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#picker_title');
    var p = jQuery('#picker_title').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#picker_title').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='color_title']").click(function(){
jQuery('#picker_title').show();
});

});
/*end of site title*/

/*color picker Home setting*/
jQuery(document).ready(function() {
     jQuery('#demo').hide();
    var f = jQuery.farbtastic('#home_picker_title');
    var p = jQuery('#home_picker_title').css('opacity', 0.25);
    var selected;
    jQuery('.colorwell')
      .each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
      .focus(function() {
        if (selected) {
         jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
        }
        f.linkTo(this);
        p.css('opacity', 1);
        jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
      });
	  
/////////////////logic jquery//////////////////////////////////////////////	  
	  
jQuery(document).mousedown( function() {
			jQuery('#home_picker_title').hide();
		});
	  
/* assign a name of input tag */
jQuery("input[name='home_color_title']").click(function(){
jQuery('#home_picker_title').show();
});

});
/*end of color picker typographi*/


