<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if (is_archive() && ($paged > 1)&& ($paged < $wp_query->max_num_pages)) { ?>
<link rel="prefetch" href="<?php echo get_next_posts_page_link(); ?>">
<link rel="prerender" href="<?php echo get_next_posts_page_link(); ?>">
<?php } ?>
<!--[if lte IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head();?>
</head>
<body <?php body_class(); ?> id="hjyl_bb10">
	<header id="hjyl_header">
		<h1 id="bb_logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="logo-line"></div>
		<?php if ( get_header_image() ) : ?>
		<p class="header-logo"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"></p>
		<?php endif; ?>
		<?php get_search_form(); ?>
		<nav id="hjyl_menu">
		<?php if(!bb10_IsMobile || !is_404()) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'bb10_wp_list_pages', 'container' => false ) ); ?>
		<?php }else{ ?>
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'fallback_cb' => 'bb10_wp_list_pages', 'container' => false ) ); ?>
		<?php } ?>
		</nav>
	</header>
	<div class="clear"></div>
<div id="hjylContainer">
	<div id="hjylContent">
		<div class="hjylPosts">
			<div class="position">
				<?php _e('Location', 'bb10'); ?>: <i class="fa fa-home"></i> <a href="<?php echo esc_url( home_url() ); ?>"><?php _e('Home', 'bb10'); ?></a> > 
				  <?php /* If this is a tag archive */ if(is_category()) { ?>
						<?php single_cat_title(); ?>
				 <?php /* If this is a search result */ } elseif (is_search()) { ?>
						<?php printf( __( 'Search Results for: %s', 'bb10' ), get_search_query() ); ?>
				<?php /* If this is a tag archive */ } elseif(is_tag()) { ?>
						<?php single_tag_title(); ?>
			   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<?php the_time( 'Y, F jS' ); ?> 
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<?php the_time( 'Y, F' ); ?>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<?php the_time( 'Y' ); ?>
				<?php /* If this is a single */ } elseif (is_single()) { ?>
						<?php the_title(); ?>
				<?php /* If this is a page */ } elseif (is_page()) { ?>
						<?php the_title(); ?>
				<?php /* If this is Error 404 */ } elseif (is_404()) { ?>
						<?php _e('404 Error', 'bb10'); ?>
				  <?php } ?>
				</div><!--position-->