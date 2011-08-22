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
<?php
/* This  retrieves  admin options. */
$options = get_option('ma_options');
if($options) {

$mop_tables = $options['mop_tables'];
$mop_side = $options['mop_side'];
$mop_sidewidth = $options['mop_sidewidth'];
$mop_sidebar = $options['mop_sidebar'];
$totalwidth= $mop_sidewidth+$mop_sidebar+50;
$mop_colpad = $options['mop_colpad'];
$mop_fontsize = $options['mop_fontsize'];
$mop_textalign = $options['mop_textalign'];
$mop_fontfamily = $options['mop_fontfamily'];
$mop_caption = $options['mop_caption'];
$mop_title = $options['mop_title'];
$mop_pagetitle = $options['mop_pagetitle'];
$mop_categtitle = $options['mop_categtitle'];
$mop_postdate = $options['mop_postdate'];
$mop_postauthor = $options['mop_postauthor'];
$mop_postcateg = $options['mop_postcateg'];
$mop_postbook = $options['mop_postbook'];
$mop_parindent = $options['mop_parindent'];
$mop_posttime = $options['mop_posttime'];

$mop_headfontsize = $options['mop_headfontsize'];
$mop_sidefontsize = $options['mop_sidefontsize'];
$mop_lineheight = $options['mop_lineheight'];
$mop_wordspace = $options['mop_wordspace'];
$mop_letterspace = $options['mop_letterspace'];

$mop_backcolor = $options['mop_backcolor'];
$mop_headercolor = $options['mop_headercolor'];
$mop_prefootercolor = $options['mop_prefootercolor'];
$mop_footercolor = $options['mop_footercolor'];
$mop_titlecolor = $options['mop_titlecolor'];
$mop_descriptioncolor = $options['mop_descriptioncolor'];
$mop_contentcolor = $options['mop_contentcolor'];
$mop_linkscolor = $options['mop_linkscolor'];
$mop_hovercolor = $options['mop_hovercolor'];
$mop_headtextcolor = $options['mop_headtextcolor'];
$mop_headtexthover = $options['mop_headtexthover'];
$mop_sideheadbackcolor = $options['mop_sideheadbackcolor'];
$mop_sideheadtextcolor = $options['mop_sideheadtextcolor'];

$mop_footerheader = $options['mop_footerheader'];
$mop_footertext = $options['mop_footertext'];
$mop_footerhover = $options['mop_footerhover'];

$mop_pin = $options['mop_pin'];
$mop_sidebullet = $options['mop_sidebullet'];
$mop_contentlist = $options['mop_contentlist'];

$mop_excerpthome = $options['mop_excerpthome'];
$mop_excerptcateg = $options['mop_excerptcateg'];
$mop_excerptarchive = $options['mop_excerptarchive'];
$mop_excerptwords = $options['mop_excerptwords'];

$mop_comtext = $options['mop_comtext'];
$mop_backtop = $options['mop_backtop'];

$mop_facebook = $options['mop_facebook'];
$mop_tweeter = $options['mop_tweeter'];
$mop_rss = $options['mop_rss'];





	if ( !is_admin() ) {
		wp_register_script('menu',get_template_directory_uri() . '/js/menu.js', array('jquery') );
			wp_enqueue_script('menu');
				if($mop_backtop!="Disable") {
							wp_register_script('top',get_template_directory_uri() . '/js/top.js');
							wp_enqueue_script('top');}
	}

  }?>


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
    wp_enqueue_script("jquery");

	wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	 <style type="text/css">
 <?php
 if($options) {
?>.single-attachment #content,#wrapper, #access, #access .menu-header, div.menu, #colophon, #branding, #main,  .attachment img { width:<?php echo ($totalwidth) ?>px !important;} <?php 
 if ($mop_side == "Disable") { ?>#content {width:<?php echo ($totalwidth-50) ?>px !important;margin:20px;} #primary, #secondary {display:none;} <?php }
?><?php
if ($mop_side == "Right") { ?>
#container {margin-right:<?php echo (-$mop_sidebar-$mop_colpad-30) ?>px;}
#content { width:<?php echo ($mop_sidewidth- $mop_colpad) ?>px;}
#primary,#secondary {width:<?php echo ($mop_sidebar  ) ?>px;}
#content img {	max-width:<?php echo ($mop_sidewidth-40) ?>px;}
#content .wp-caption{	max-width:<?php echo ($mop_sidewidth-30) ?>px;} <?php }
?><?php if ($mop_side == "Left") { ?>
#container {margin:0 0 0 <?php echo (-$mop_sidebar-$mop_colpad-30) ?>px;float:right;}
#content { width:<?php echo ($mop_sidewidth - $mop_colpad) ?>px;float:right;margin:0 20px 0 0;}
#primary,#secondary {width:<?php echo ($mop_sidebar ) ?>px;float:left;padding-left:0px;clear:left;border:none;border-right:1px dashed #EEE;padding-right:20px;}
.widget-title { -moz-border-radius-topleft:0px; -webkit-border-radius:0px;border-radius-topleft:0px ; -moz-border-radius-topright:10px ;border-radius-topright:10px ;	border-top-right-radius:10px;
	-webkit-border-top-right-radius:10px;text-align:right;padding-right:5%;width:100%;}
#content img {	max-width:<?php echo ($mop_sidewidth-40) ?>px;}
#content .wp-caption{	max-width:<?php echo ($mop_sidewidth-30) ?>px;} <?php } ?>

#content p, #content ul, #content ol {
font-size:<?php echo $mop_fontsize ?>;
<?php if ($mop_lineheight != "Default") { ?>line-height:<?php echo $mop_lineheight ?>; <?php }
?><?php if ($mop_wordspace != "Default") { ?>word-spacing:<?php echo $mop_wordspace ?>;<?php }
?><?php if ($mop_letterspace != "Default") { ?>letter-spacing:<?php echo $mop_letterspace ?>;<?php }
?><?php if ($mop_textalign != "Default") { ?>text-align:<?php echo $mop_textalign;  ?> ; <?php } ?>}
<?php if (stripslashes($mop_fontfamily) != '"Segoe UI", Arial, sans-serif') { ?>
* {font-family:<?php echo stripslashes($mop_fontfamily);  ?> !important; }<?php }
?><?php if ($mop_caption != "Light") { ?> #content .wp-caption { <?php }
?><?php if ($mop_caption == "White") { ?> background-color:#FFF;}
 <?php } else if ($mop_caption == "Light Gray") {?> background-color:#EEE; }
 <?php } else if ($mop_caption == "Gray") {?> background-color:#CCC;}
 <?php } else if ($mop_caption == "Dark Gray") {?> background-color:#444;color:#CCC;}
 <?php } else if ($mop_caption == "Black") {?> background-color:#000;color:#CCC;}
<?php }
?><?php if ($mop_contentlist == "Hide") { ?> #content ul li { background-image:none ; padding-left:0;} <?php }
?><?php if ($mop_title == "Hide") { ?> #site-title, #site-description { visibility:hidden;} <?php }
?><?php if ($mop_comtext == "Hide") { ?> #respond .form-allowed-tags { display:none;} <?php }
?><?php if ($mop_tables == "Enable") { ?> #content table {border:none;} #content tr {background:none;} #content table {border:none;} #content tr th,
#content thead th {background:none;} #content tr td {border:none;}<?php }

?><?php if ($mop_headfontsize != "Default") { ?> h2.entry-title { font-size:<?php echo $mop_headfontsize; ?> !important ;}<?php }
?><?php if ($mop_sidefontsize != "Default") { ?> .widget-area a { font-size:<?php echo $mop_sidefontsize; ?> !important ;}<?php }

?><?php if ($mop_backcolor != "444444") { ?> body { background-color:<?php echo $mop_backcolor; ?> !important ;}<?php }
?><?php if ($mop_headercolor != "333333") { ?> #header { background-color:<?php echo $mop_headercolor; ?> !important ;}<?php }
?><?php if ($mop_prefootercolor != "222222") { ?> #footer { background-color:<?php echo $mop_prefootercolor; ?> !important ;}<?php }
?><?php if ($mop_footercolor != "171717") { ?> #footer2 { background-color:<?php echo $mop_footercolor; ?> !important ;}<?php }
?><?php if ($mop_titlecolor != "0D85CC") { ?> #site-title span a { color:<?php echo $mop_titlecolor; ?> !important ;}<?php }
?><?php if ($mop_descriptioncolor != "0D85CC") { ?> #site-description { color:<?php echo $mop_descriptioncolor; ?> !important ;}<?php }
?><?php if ($mop_contentcolor != "333333") { ?> #content p, #content ul, #content ol { color:<?php echo $mop_contentcolor; ?> !important ;}<?php }
?><?php if ($mop_linkscolor != "0D85CC") { ?> a, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6,#searchform #s:hover , #container #s:hover, #site-title a:hover, #access a:hover { color:<?php echo $mop_linkscolor; ?> !important ;}<?php }
?><?php if ($mop_hovercolor != "333333") { ?> a:hover { color:<?php echo $mop_hovercolor; ?> !important ;}<?php }
?><?php if ($mop_headtextcolor != "333333") { ?> #content .entry-title a { color:<?php echo $mop_headtextcolor; ?> !important ;}<?php }
?><?php if ($mop_headtexthover != "000000") { ?> #content .entry-title a:hover { color:<?php echo $mop_headtexthover; ?> !important ;}<?php }
?><?php if ($mop_sideheadbackcolor != "444444") { ?> .widget-title { background-color:<?php echo $mop_sideheadbackcolor; ?> !important ;}<?php }
?><?php if ($mop_sideheadtextcolor != "2EA5FD") { ?> .widget-title { color:<?php echo $mop_sideheadtextcolor; ?> !important ;}<?php }

?><?php if (1) { ?> #footer-widget-area .widget-title { color:<?php echo $mop_footerheader; ?> !important ;}<?php }
?><?php if (1) { ?> #footer-widget-area a { color:<?php echo $mop_footertext; ?> !important ;}<?php }
?><?php if (1) { ?> #footer-widget-area a:hover { color:<?php echo $mop_footerhover; ?> !important ;}<?php }

?><?php if ($mop_pin != "Pin2") { ?> #content .wp-caption { background-image:url(<?php echo get_template_directory_uri()."/images/pins/".$mop_pin; ?>.png) !important ;} <?php }
?><?php if ($mop_sidebullet != "arrow_white") { ?>.widget-area ul ul li{ background-image:url(<?php echo get_template_directory_uri()."/images/bullets/".$mop_sidebullet; ?>.png) !important;
<?php if($mop_sidebullet == "folder_black" || $mop_sidebullet == "folder_light") {?> padding-top:5px;padding-left:20px; } <?php } ?><?php }

?><?php if ($mop_pagetitle == "Hide") { ?> #content h1.entry-title { display:none;} <?php }
?><?php if ($mop_categtitle == "Hide") { ?> h1.page-title { display:none;} <?php }
?><?php if (($mop_postdate == "Hide" && $mop_postcateg == "Hide") || ($mop_postauthor == "Hide" && $mop_postcateg == "Hide") ) { ?>.bl_sep {display:none;} <?php }
?><?php if ($mop_postdate == "Hide") { ?> span.entry-date, span.onDate {display:none;} <?php }
?><?php if ($mop_postauthor == "Hide") { ?> .author {display:none;} <?php }
?><?php if ($mop_postcateg == "Hide") { ?> span.bl_categ {display:none;} <?php }
?><?php if ($mop_postbook == "Hide") { ?>  span.bl_bookmark {display:none;} <?php }
?><?php if ($mop_parindent != "0px") { ?>  p {text-indent:<?php echo $mop_parindent;?> ;} <?php }
?><?php if ($mop_posttime == "Hide") { ?>  .entry-time {display:none;} <?php } }?>

</style>

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