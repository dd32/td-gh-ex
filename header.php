<?php
/**
 * The Header
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9" /> 
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
		echo ' | ' . sprintf( __( 'Page %s', 'mantra' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
<?php
/* This  retrieves  admin options. */

$options= mantra_get_theme_options();
foreach ($options as $key => $value) {	
     ${"$key"} = $value ;
}
$totalwidth= $mop_sidewidth+$mop_sidebar+50;


	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<script>
    jQuery(document).ready(function() {
    jQuery("#content img").addClass("<?php echo 'image'.$mop_image;?>");
    });

</script>

<div id="toTop">^ <?php _e("Back to Top","mantra") ?></div>

<div id="wrapper" class="hfeed">
<div id="header">

		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?><?php if (get_header_image() != '') { ?>

						<style> #branding { background:url(<?php header_image(); ?>) no-repeat;
								 width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
								 height:<?php echo HEADER_IMAGE_HEIGHT; ?>px; }	}
</style>
									<?php } else { ?><?php } ?><?php endif; ?>
				<div style="clear:both;"></div>
			</div><!-- #branding -->
		
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mantra' ); ?>"><?php _e( 'Skip to content', 'mantra' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */
				?><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->

<div style="clear:both;"> </div>




	</div><!-- #header -->
	<div id="main">
	<div  id="forbottom" >
			<div id="socials">
<?php if ($mop_rss) {  ?><a href="<?php echo $mop_rss ?>" id="srss" title="RSS"><span>RSS</span></a><?php }
?><?php if ($mop_tweeter) {  ?><a href="<?php echo $mop_tweeter ?>" id="stweet" title="Twitter"><span>Twitter</span></a><?php }
?><?php if ($mop_facebook) {  ?> <a href="<?php echo $mop_facebook ?>" id="sface" title="Facebook"><span>FaceBook</span></a> <?php }?>



</div>
<div style="clear:both;"> </div>