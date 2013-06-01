<?php 
/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /appointment-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/front-page.php
 */


?>

<?php

$appointment_options = appointment_get_options();

  $show_front=get_option( 'show_on_front' );
  
 $front_page=$appointment_options['front_page'];
 
if ( 'posts' == get_option( 'show_on_front' ) && $appointment_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $appointment_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} 
?>