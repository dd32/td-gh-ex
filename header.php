<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php 
    global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'adsticle' ), max( $paged, $page ) ); 
?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
  if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?> 
</head><?php flush(); ?>
<body <?php body_class(); ?>>

<div class="wrapper">

<div class="header">

<div class="title">
<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<span><?php bloginfo('description'); ?></span>
</div>

<div class="ads468-60">
<?php echo sanitize_text_field(adt_get_option('adt_a468x60')); ?>
</div>

</div>

<?php if (get_option('adt_show_main_menu', '0') == '1') : ?>
<div id="access" role="navigation">			  
  <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>
<?php endif; ?>

<?php if (adt_get_option('adt_a728x15_top', '') != '' ): ?>
<div class="ads_728-15-top">			  
<?php echo sanitize_text_field(adt_get_option('adt_a728x15_top')); ?>
</div>
<?php endif; ?>

<div class="middle">