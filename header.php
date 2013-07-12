<?php  
/**
 * Header Template
 * @file           header.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/header.php
 */

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
 <title><?php
	if(is_home()) {
		echo bloginfo('name').' - Home';
	} elseif(is_category()) {
		echo 'Browsing the Category ';
		wp_title(' ', true, '');
	} elseif(is_archive()){
		echo 'Browsing Archives of';
		wp_title(' ', true, '');
	} elseif(is_search()) {
		echo 'Search Results for   "'.$s.'"';
	} elseif(is_404()) {
		echo '404 - Page got lost!';
	}elseif(is_page('47')) {
		echo 'U can contact on this';
	} 
	else {
		bloginfo('name'); wp_title('-', true, '');
	}
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>" type="text/css" media="screen" />
     
	 <!-- Date Picker -->
<?php 
//redify_comment_script();  
			  
		/* Always have wp_head() just before the closing </head>
     	* tag of your theme, or you will break many plugins, which
     	* generally use this hook to add elements to <head> such
     	* as styles, scripts, and meta tags.
     	*/


	wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<div class="page_hid">
<header>
   <div class="header">
    	<div class="page_wi">
			<h1 id="logo">
    			<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="appoinment" /></a>
    		</h1>
            <div class="menu">
             <ul>
                <?php
                             if ( has_nav_menu( 'header-menu' ) ) :
                              wp_nav_menu( array( 'theme_location' => 'header-menu','container' => false,'menu_id'=> false,'menu_class'=> false ) );
	                           else:
                                     $args = array(
												'sort_column' => 'menu_order, post_title',
												'menu_class'	=>	false,
												'include'     => '',
												'exclude'     => '',
												'echo'        => true,
												'show_home'   => true,
												'link_before' => '',
												'link_after'  => '' );
								                wp_page_menu( $args );
								              	
                   endif;  ?> 
					</ul>
             </div><!-- closing of menu-->
        </div><!-- page_wi-->
    </div><!-- closing of header-->  
 

	   