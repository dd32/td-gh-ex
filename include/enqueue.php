<?php
/**
 * Enqueue scripts and styles.  
 */
 function reidolfi_script() {
	wp_enqueue_script('bootstrap_min_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'3.3.6',true ); 
	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr.js', array('jquery'),'2.8.1',true );
	wp_enqueue_script('jquery_animateSlider_js', get_template_directory_uri() . '/js/jquery.animateSlider.js', array('jquery'),'0.1.0',true);
	// Load the HTML5 Shiv.
	wp_enqueue_script('comley-html5', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2' );
	wp_script_add_data('comley-html5', 'conditional', 'lt IE 9' );
	//Respond.js for IE8 support of HTML5 elements and media queries
	wp_enqueue_script('comley-ie8supportofhtml5', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2');
	wp_script_add_data('comley-ie8supportofhtml5', 'conditional', 'lt IE 8');
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/js/custom.js',array('jquery'),'',true);
	wp_enqueue_script('comment-reply');
	wp_enqueue_style('bootstrap_min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('responsive_css', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style('jquery_animateSlider_css', get_template_directory_uri() . '/css/jquery.animateSlider.css' );
	wp_enqueue_style('jquery-ui_css', get_template_directory_uri() . '/css/jquery-ui.css' );
	wp_enqueue_style('font_awesome_min_css', get_template_directory_uri().'/css/font-awesome.min.css');
	
	wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false);
	wp_enqueue_style('wpb-google-roboto-fonts', 'https://fonts.googleapis.com/css?family=Raleway:100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic,100,200,300,400,500,600,700,800,900);
@import url(https://fonts.googleapis.com/css?family=Lato:100italic,300italic,400italic,700italic,900italic,100,300,400,700,,900', false);
  }
add_action('wp_enqueue_scripts', 'reidolfi_script');
function contactform_add_script() {
wp_enqueue_script('contactform-script', get_template_directory_uri().'/js/ridolfi-contact-form.js', array('jquery'),'',true);
wp_localize_script('contactform-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('wp_enqueue_scripts', 'contactform_add_script');
function ridolfi_contact_form_send() {
   
   $name=sanitize_text_field($_POST['name']);
   $email=sanitize_text_field($_POST['email']);
   $subject=sanitize_text_field($_POST['subject']);
   $phone=sanitize_text_field($_POST['phone']);
   $msg=sanitize_text_field($_POST['msg']);
   if(get_theme_mod('mail_to'))
   {
      $to = esc_html(get_theme_mod('mail_to')); 
   }else 
   {
    $to = get_option('admin_email');   
   }
   
   $body="<table width='500'>
   <tr><td>Name :</td><td>".$name."</td></tr>
   <tr><td>Email :</td><td>".$email."</td></tr>
   <tr><td>Subject :</td><td>".$subject."</td></tr>
   <tr><td>Phone :</td><td>".$phone."</td></tr>
   <tr><td>Message :</td><td>".$msg."</td></tr>
   </table>";
   $headers= "From: $name <$email>\n";
   $headers.= "Reply-To: $subject <$email>\n";
   $headers.= "Return-Path: $subject <$email>\n";
   $headers.= "Content-type: text/html; charset=UTF-8 \r\n";
   $headers.= "MIME-version: 1.0\n";
   if (@mail($to, $subject, $body, $headers,"-f $email")){
   print "<span style='color:green; font-weight: bold;'>Your message sent successfully.</span><span id='mail-sent-success' success='1'></span>" ;
 } else {
	print "<span style='color:red; font-weight: bold;'>Sorry! Please try again. </span>";	 }
  
die();
}

add_action('wp_ajax_contact_form_send', 'ridolfi_contact_form_send');
add_action('wp_ajax_nopriv_contact_form_send', 'ridolfi_contact_form_send');
?>