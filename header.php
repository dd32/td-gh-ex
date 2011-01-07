<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php if (is_front_page() ) {
    bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo ' - ' ; bloginfo('name');
	} elseif (is_single() ) {
		single_post_title();
	} elseif (is_page() ) {
		single_post_title(); echo ' - '; bloginfo('name');
	} elseif (is_archive() ) {
		single_month_title(); echo ' - '; bloginfo('name');
	} else {
		wp_title('',true);
	} ?></title>
		
		
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">

DD_belatedPNG.fix('#navbar .nav li a, #home_btn img, .menu, #logo img, #searchsubmit, #search, #img-left img, .read-more a, #img-right img, .widget-container ul li');

</script>
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	
	<?php wp_enqueue_style('superfish', get_template_directory_uri()  . '/css/superfish.css'); ?>

<?php if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_enqueue_script('jquery'); ?>
	
	<?php wp_head(); ?>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"> </script>
	
		<script type="text/javascript"> 
 
    jQuery(document).ready(function() { 
        jQuery('ul.nav').superfish({ 
            delay:       0,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
            dropShadows: false                            // disable drop shadows 
        }); 
    });
 
</script>

	<?php $googleanalytics=get_option("app_go_code"); ?>
	<?php echo stripslashes($googleanalytics); ?>
	
</head>

<body <?php body_class(); ?>>

	<!--wrapper-->
	<div id="wrapper">
	
		<!--header-->
		<div id="header">
		
			<div id="logo">

				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" /></a>
				
			</div><!--logo end-->
			
			</div><!-- header end-->
		
		<!--menu-->
			
		<div class="menu">
		
		<!--nav bar-->
		
		<div id="navbar">
			
	<?php $navcheck = '' ; ?>
	
	<?php if (function_exists( 'wp_nav_menu' )) {
		$navcheck = wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'nav' ,'fallback_cb' => '', 'echo' => false ) );
	} ?>

	<?php  if ($navcheck == '') { ?>
	
	<ul class="nav">
					
		<?php

				if(get_option('app_menu_bar') == 'true'){
					wp_list_pages('title_li');
				}
		?>
		
		<?php
				if (get_option('app_cat_bar') == 'true'){
					wp_list_categories('title_li');
					}
		?>

	</ul>
<?php } else echo($navcheck); ?> 

</div><!--nav bar end-->

			<div id="search-header">
			
				<?php get_search_form(); ?>
			
			</div><!--search header end-->

	</div>
	<!--menu end-->
