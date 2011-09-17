<?php
/**
 * The Header for our theme.
 *
 * @since admired 1.0
 */
?><!DOCTYPE html>
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
<?php global $options;
$options = get_option('admired_theme_options'); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	if ( isset ($options['admired_hide_metainfo'])) {
		wp_title('');	/* this is compatible with SEO plugins */
    } else {
	/* Else Print the <title> tag.
	 ----------------------------*/
	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' ); // Name.
	$site_description = get_bloginfo( 'description', 'display' ); // Description
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add page number:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'admired' ), max( $paged, $page ) );
	} ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php	//* load the script needed for the superfish menu bar 
    if ( isset ($options['admired_remove_superfish']) &&  ($options['admired_remove_superfish']!="") ) {
		echo ' ';}
	else {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('admiredSFhoverIntent', get_template_directory_uri().'/js/superfish/hoverIntent.js');
		wp_enqueue_script('admiredSF', get_template_directory_uri().'/js/superfish/superfish.js');
	}
	/* JavaScript for threaded comments.
	 ----------------------------------*/
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* wp_head() before closing </head> tag.
	---------------------------------------*/
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<div id="head-wrapper">
		<?php /* ======== TOP MENU ======== */
		if ( isset ($options['admired_show_secondary_menu'])&&  ($options['admired_show_secondary_menu'] != "") ) {
		get_template_part('top','menu'); } else { echo "";}?>
		<header id="branding" role="banner">
			<div id="header-group"> <?php // can't have a <div> inside of <hgroup> probably a future fix ?>
				<div id="header-logo">
					<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php if ( isset ($options['admired_show_social_icons'])&&  ($options['admired_show_social_icons'] != "") ) {
					get_template_part('header','social');} else { echo "";}
					if ( isset ($options['admired_search_placement'])&&  ($options['admired_search_placement'] == "Header") ) {
					get_search_form(); } ?>
				</div>
			</div>
		</header><!-- #branding -->
	</div><!-- #head-wrapper -->
<div id="page" class="hfeed">
	<?php /* ======== BOTTOM MENU ======== */
	get_template_part('bottom','menu'); ?>
	<div id="main">