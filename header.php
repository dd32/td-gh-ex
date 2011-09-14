<?php //Retrieve Theme Options Data
global $options;
$options = get_option('p2h_theme_options'); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'undedicated' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie-fixes.css" type="text/css" media="screen" />
	<![endif]-->	

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	
	<?php if((is_home() && ($paged < 2 )) || is_single() || is_page()){
    echo '<meta name="robots" content="index,follow" />';
		} else {
    echo '<meta name="robots" content="noindex,follow" />';
	} ?>

<?php
	// Custom CSS block in Theme Options Page//	if ( isset ($options['custom_css']) &&  ($options['custom_css']!="") ) {
	$output = '<style type="text/css">'."\n";
	$output .= $options['custom_css'] . "\n";
	$output .= '</style>'."\n";
	echo $output;
	}

	if ( isset ($options['feedurl']) &&  ($options['feedurl']!="") ) {
	echo '<link rel="alternate" type="application/rss+xml" href="'.$options['feedurl'].'" title="'. get_bloginfo('name') .' RSS Feed"/>'."\n";
	}
	
?>
	
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	
	<div id="header">
		<div id="masthead">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		</div><!-- #masthead -->

	<?php if (get_option('p2h_show_search') != '') { ?>
	<div id="search-header">
    	<?php get_search_form(); ?>
	</div>
	<?php } ?>

	</div><!-- #header -->
	
	<div id="access">
		<?php wp_nav_menu( array( 'menu' => 'Header Navigation', 'container_class' => 'menu-header', 'theme_location' => 'primary', 'theme_location' => 'primary-menu' ) ); ?>

		<ul id="connect">	

		<li>
			<?php if ( isset($options['feedurl']) && ($options['feedurl']!="") ){ ?>
				<a class="feedicon" href="<?php echo $options['feedurl']; ?>" title="<?php _e('Subscribe ', 'undedicated'); ?><?php bloginfo('name'); ?><?php _e(' RSS Feed', 'undedicated'); ?>"><?php _e('RSS', 'undedicated'); ?></a>
			<?php } else { ?>
				<a class="feedicon" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Subscribe ', 'undedicated'); ?><?php bloginfo('name'); ?><?php _e(' RSS Feed', 'undedicated'); ?>"><img src="<?php get_template_directory_uri(); ?>/images/feed.png" alt="<?php _e(' RSS', 'undedicated'); ?>" /></a>
			<?php } ?>
		</li>
		
		<?php if ( isset($options['twitterid']) && ($options['twitterid']!="") ){ ?>
		<li>
			<a class="twittericon" href="http://twitter.com/<?php echo $options['twitterid'];?>" title="<?php _e('Follow ', 'undedicated'); ?><?php bloginfo('name'); ?><?php _e(' on Twitter', 'undedicated'); ?>"><?php _e('Twitter', 'undedicated'); ?></a>
		</li>
		<?php } ?>

		<?php if ( isset($options['facebookid']) && ($options['facebookid']!="") ){ ?>
		<li>
			<a class="facebookicon" href="<?php echo(stripslashes ($options['facebookid']));?>" title="<?php _e('Find ', 'undedicated'); ?><?php bloginfo('name'); ?><?php _e(' on Facebook', 'undedicated'); ?>"><?php _e('Facebook', 'undedicated'); ?></a>
		</li>
		<?php } ?>
		
		</ul>
		
	</div><!-- #access -->
		