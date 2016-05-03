<?php
//Making jQuery Google API
function backyard_modify_jquery() {
      wp_deregister_script('jquery');
      wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js', array(), '1.11.3' );
      wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'backyard_modify_jquery');

/**
 * Enqueue scripts and stylesheets
 *
 */
function backyard_scripts() {
	wp_enqueue_style('style', get_stylesheet_uri() );
        wp_enqueue_style('bootstrap_min', get_template_directory_uri().'/assets/css/bootstrap.min.css');
        wp_enqueue_style('main_css', get_template_directory_uri().'/assets/css/main.css');
        wp_enqueue_style('responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');
        wp_enqueue_style('animate_min_css', get_template_directory_uri().'/assets/css/animate.min.css');
        wp_enqueue_script('wow_min_js', get_template_directory_uri().'/assets/js/wow.min.js', array(),true );
        wp_enqueue_script('owl_carousel', get_template_directory_uri().'/assets/js/owl.carousel.js', array(),true );
        wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', array(),true );
        wp_enqueue_script('jquery_flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', array(),true );
		wp_enqueue_script('jquery_collagePlus', get_template_directory_uri().'/assets/js/jquery.collagePlus.js', array(),true );
		wp_enqueue_script('bootstrap_min_js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(),true );
		wp_enqueue_script('maps_google', 'https://maps.google.com/maps/api/js?sensor=false', array(),true );
        wp_enqueue_script('axgmap_map', get_template_directory_uri().'/assets/js/jquery.axgmap.js', array(),true );
 if (is_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
        
}

function backyard_editor_styles() {
    add_editor_style( 'editor-style.css');
}
add_action('admin_init', 'backyard_editor_styles' );

add_action('wp_enqueue_scripts', 'backyard_scripts');
/*Contact form script*/

function contactform_add_script() {
 wp_enqueue_script('contactform-script', get_template_directory_uri().'/assets/js/backyard-contact-form.js', array('jquery') );
 wp_localize_script('contactform-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'contactform_add_script');
function backyard_contact_form_send() {
    $name=sanitize_text_field($_POST['name']);
    $email=sanitize_text_field($_POST['email']);
    $phone=sanitize_text_field($_POST['phone']);
    $msg=sanitize_text_field($_POST['msg']);
	$subject='Contact Detail';
    $to = get_option('admin_email');
    $body="<table width='500'>
    <tr><td>Name :</td><td>".$name."</td></tr>
    <tr><td>Email :</td><td>".$email."</td></tr>
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
 add_action('wp_ajax_contact_form_send', 'backyard_contact_form_send');
 add_action('wp_ajax_nopriv_contact_form_send', 'backyard_contact_form_send');


