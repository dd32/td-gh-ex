<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The Header for Weaver Xtreme
 *
 * Displays all of the <head> section and everything up till < div id="container" >
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 *
 * 	>>>> DO NOT EDIT THIS FILE <<<<
 *
 * Warning! DO NOT EDIT THIS FILE, or any other theme file! If you edit ANY theme
 * file, all your changes will be LOST when you update the theme to a newer version.
 * Instead, if you need to change theme functionality, CREATE A CHILD THEME!
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 */
if (function_exists('weaverx_ts_pp_switch'))	// switching to alternate theme?
	weaverx_ts_pp_switch();

?><!DOCTYPE html>
<!--[if IE 8]>	<html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>	<html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 8) | !(IE 9) ]><!-->	<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
	$viewport = "<meta name='viewport' content='width=device-width,initial-scale=1.0' />\n"; /* use full horizontal size on iPad */
	echo $viewport;
?>

<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />
<!-- Weaver Xtreme Standard Google Fonts -->
<?php
	$gf = WEAVERX_GOOGLE_FONTS;
	if (weaverx_getopt('font_set_cryllic')) {
		$gf = str_replace('&subset=','&subset=cyrillic-ext,', $gf);
	}
	if (weaverx_getopt('font_set_greek')) {
		$gf = str_replace('&subset=','&subset=greek,greek-ext,', $gf);
	}
	if (weaverx_getopt('font_set_hebrew')) {
		$gf = str_replace('&subset=','&subset=hebrew,', $gf);
	}
	if (weaverx_getopt('font_set_vietnamese')) {
		$gf = str_replace('&subset=','&subset=vietnamese,', $gf);
	}

	if ( ! weaverx_getopt('disable_google_fonts'))
		echo $gf . "\n";

	// Now we need to polyfill IE8. We need 2 scripts loaded AFTER the .css stylesheets. wp_enqueue_script
	// does not work because it can't add the test for < IE9. And you can't just include the code directly
	// right here because it ends up before the .css enqueues. So we use a little trick as an action for
	// wp_head which lets us put the code here, but have it emitted after the .css files.

	add_action( 'wp_head', 'weaverx_add_ie_scripts' );
	// ++++ FAVICON - only if option has been set ++++
	$icon = weaverx_getopt('_favicon_url');
	if ($icon != '') {
		$url = esc_url(apply_filters('weaverx_css',parse_url($icon,PHP_URL_PATH)));
		echo "<link rel=\"shortcut icon\"  href=\"$url\" />\n";
	}

	do_action('weaverxplus_action','head');	// stuff like other style files...

	// Fix IE8 scripts need to go after the CSS is loaded (at least for the respond script)

	wp_head();
	//echo "<style id='live_custom_css'></style>";
?>
</head>

<body <?php body_class(); ?>>
<a href="#page-bottom" id="page-top">&darr;</a> <!-- add custom CSS to use this page-bottom link -->
<div id="wvrx-page-width">&nbsp;</div>
<noscript><p style="border:1px solid red;font-size:14px;background-color:pink;padding:5px;margin-left:auto;margin-right:auto;max-width:640px;text-align:center;">
<?php _e('JAVASCRIPT IS DISABLED. Please enable JavaScript on your browser to best view this site.', 'weaver-xtreme' /*adm*/); ?></p></noscript><!-- displayed only if JavaScript disabled -->
<?php
	do_action('weaverxplus_action','body_top');	// mostly for the loading screen

	if ( false && WEAVERX_DEV_MODE ) {
		if (is_customize_preview())
			echo '<h2>DISPLAYED WHILE CUSTOMIZER UP</h2>';
	}

	weaverx_inject_area('prewrapper');

	weaverx_area_div( 'wrapper' );

	weaverx_inject_area('fixedtop','wvrx-fixedtop');	// inject fixed top


	/* header layout:
	 * #header
	 *    #top-menu
	 *    #branding
	 *        #site-title
	 *        #site-tagline
	 *    #header-html
	 *    #header-widget-area
	 *    #bottom-menu
	 */

	$hdr_class = ( weaverx_is_checked_page_opt('_pp_hide_header') ) ? 'hide ' : '';
	$hdr_class .= weaverx_getopt_default('header_image_render','header-as-img') . ' ';

	weaverx_clear_both('preheader');
	weaverx_inject_area('preheader');	// inject pre-header HTML
	weaverx_header_widget_area( 'pre_header' );
	weaverx_area_div( 'header',  $hdr_class );      // <div id='header'>

	weaverx_inject_area('header');	// inject header HTML

	do_action('weaverx_nav', 'top');                // menus at top

	/* ======== HEADER WIDGET AREA ======== */
	weaverx_header_widget_area( 'top' );           // show header widget area if set to this position

	$title =  apply_filters('weaverx_site_title', esc_html(get_bloginfo( 'name', 'display' ) ) );

	echo '<header id="branding" role="banner">' . "\n";

	/* ======== SITE LOGO and TITLE ======== */
	$title_over_image = ( weaverx_getopt('title_over_image')
		&& (weaverx_getopt_default('header_image_render','header-as-img') == 'header-as-img' || weaverx_getopt('header_image_html_plus_bg')
			|| weaverx_has_header_video()) );

	if ($title_over_image)
		echo '<div id="title-over-image">' . "\n";

	$h_class = '';

	if ( weaverx_getopt('hide_site_title') != 'hide-none') {
		$h_class = weaverx_getopt('hide_site_title');
		$lead = ' ';
	}

	$t_class = '';
	if ( weaverx_getopt('site_title_add_class') != 'hide-none')
		$t_class .= ' ' . weaverx_getopt('site_title_add_class');

	if ( weaverx_getopt('expand_site_title') ) {
		$t_class .= ' wvrx-expand-full';
	}

	echo "    <div id='title-tagline' class='clearfix{$t_class}'>\n";

	$logo = weaverx_getopt( '_site_logo' );

	$hide_logo = weaverx_getopt( '_hide_site_logo' );

	$wp_logo = weaverx_get_wp_custom_logo();
	if ( $wp_logo ) {
		$hide_wp_logo = weaverx_getopt('hide_wp_site_logo');
		$wp_logo = str_replace('custom-logo-link', 'custom-logo-link ' . $hide_wp_logo, $wp_logo);		// fixup hide
	}

	$title_text = $title;

	if ( strlen($wp_logo) > 0 )	{								// there is a logo - what to do...
		if ( weaverx_getopt('wplogo_for_title') ) {
			$title_text = '<img class="site-title-logo" src="' . weaverx_get_wp_custom_logo_url() . '" alt="' . $title .'" />';

		} else {
			echo "\n    {$wp_logo}\n";
		}
	}

?>
		<h1 id="site-title"<?php echo weaverx_title_class( 'site_title', false, $h_class ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $title; ?>" rel="home">
		<?php echo $title_text; ?></a></h1>

		<?php
		/* ======== SEARCH BOX ======== */
		$hide_search = weaverx_getopt( 'header_search_hide');
		if ( $hide_search != 'hide' ) { ?>
			<div id="header-search" class="<?php echo $hide_search; ?>"><?php get_search_form(); ?></div><?php
		}
		$hide_tag = weaverx_getopt( 'hide_site_tagline' );

		$tagline =  apply_filters('weaverx_tagline', esc_html(get_bloginfo( 'description' )) );

		?>
		<h2 id="site-tagline" class="<?php echo $hide_tag; ?>"><span<?php echo weaverx_title_class('tagline'); ?>><?php echo $tagline; ?></span></h2>
		<?php if ( $logo ) { ?>
		<div id="site-logo" class="site-logo <?php echo $hide_logo; ?>"><?php echo $logo; ?></div>
		<?php }
		get_template_part( 'templates/menu', 'header-mini' ); ?>

	</div><!-- /.title-tagline -->

<?php

	/* The Dynamic Headers shows headers on a per page basis - will also optionally add site link */
	if (function_exists('show_media_header'))
		show_media_header(); 			// Plugin support: **Dynamic Headers**

	weaverx_header_widget_area( 'before_header' );           // show header widget area if set to this position


	/* ======== HEADER IMAGE ======== */

	weaverx_header_image();				// header image or video

	if ($title_over_image)
		echo '</div><!--/#title-over-image -->' . "\n";

	weaverx_header_widget_area( 'after_header' );           // show header widget area if set to this position

	/* ======== EXTRA HTML ======== */

	$extra = weaverx_getopt('header_html_text');

	$hide = weaverx_getopt_default('header_html_hide', 'hide-none');

	if ( $extra == '' && is_customize_preview() ) {
		echo '<div id="header-html" style="display:inline;"></div>';		// need the area there for customizer live preview
	} else if ( $extra != '' && $hide != 'hide' ) {
		$c_class = weaverx_area_class('header_html', 'not-pad', '-none', 'margin-none' );

		if (weaverx_getopt_expand('expand_header-html')) $c_class .= ' wvrx-expand-full';

		?>
		<div id="header-html" class="<?php echo $c_class;?>">
			<?php echo  do_shortcode($extra) ; ?>
		</div> <!-- #header-html -->
	<?php }

	weaverx_header_widget_area( 'after_html' );           // show header widget area if set to this position

	do_action('weaverxplus_action','header_area_bottom');
	weaverx_clear_both('branding');

?>
</header><!-- #branding -->
<?php

	/* ======== BOTTOM MENU ======== */
	do_action('weaverx_nav', 'bottom');

	weaverx_header_widget_area( 'after_menu' );           // show header widget area if set to this position
	echo "\n</div><div class='clear-header-end' style='clear:both;'></div><!-- #header -->\n";
	weaverx_header_widget_area( 'post_header' );
	do_action('weaverx_post_header');

// ------------------------------------------------------------------------------------
function weaverx_header_image() {

	// this is a function party because it is complicated, and partly to be able to use return to end logic.

	$h_hide = weaverx_getopt_default('hide_header_image', 'hide-none');	// stuff depends on hide attribute

	// really hide - don't need to have device download the image
	$really_hide = ( $h_hide == 'hide' || ( weaverx_getopt('hide_header_image_front') && is_front_page() ) ) ;

	if (  $really_hide || ( !is_search() && weaverx_is_checked_page_opt('_pp_hide_header_image') ) ) { // don't bother if hide header image
		echo '<div id="header-image" class="hide"></div>'; 	// place holder
		return;
	}

		// build #header classes

	$img_class = 'header-image ';
	if ( $h_hide != 'hide-none' && $h_hide != 'hide')
		$img_class .= $h_hide . ' ';

	if ( weaverx_getopt_expand('expand_header-image'))
		$img_class .= 'wvrx-expand-full ';

	if (weaverx_getopt('header_image_add_class') != '') {
		$img_class .= weaverx_getopt('header_image_add_class') . ' ';
	}

	$page_type = ( is_single() ) ? 'post' : 'page';
	$hdr_bg = weaverx_fi( $page_type, 'header-image' );

	$hdr_type = ($hdr_bg) ? 'fi' : 'std';

	$img_class .= 'header-image-type-' . $hdr_type;

	echo '<div id="header-image" class="' . $img_class . '">';

	// Check different ways to display a header:
	// 0. Archive type page - including search (Added Fix: 3.1.1)
	// 1. As HTML replacement, possibly with regular image as BG header image
	// 2. As Video Header
	// 3. As Standard or FI BG replacement (no video supported)
	// 4. As FI Replacement
	// 5. As standard Image

	// 0. Archive type page - just use the standard header image for archives and search

	if ( is_archive() || is_search() ) {
		if ( weaverx_getopt('link_site_image') ) {
		?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
		}
		if ( weaverx_getopt('header_actual_size') ) {
?>
		<img src="<?php echo get_header_image() ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" class="wvrx-header-image" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
<?php
		} else {
			the_header_image_tag();
		}

		weaverx_e_opt('link_site_image',"</a>");	/* need to close link */

		echo("\n</div><!-- #header-image -->\n");
		return;
	}


	// 1. HTML replacement

	$hdr_html = weaverx_get_per_page_value('_pp_header_image_html_text');	// per page has priority

	if ( !$hdr_html )
		$hdr_html = weaverx_getopt('header_image_html_text');
	if ( $hdr_html && weaverx_getopt('header_image_html_home_only') && !is_front_page())	// only on global, not per page/post
		$hdr_html = '';		// make empty so will pickup the standard header

	if ($hdr_html) {					// custom header html replacement overrides all other header image options
		echo do_shortcode($hdr_html);	// output the html
	}

	// 2. As Header Video

	if ( !$hdr_html && weaverx_has_header_video()  ) {
		// echo "<!-- has header video -->";
		// Handle Video - don't show if HTML supplied

		// Note: @todo: WP 4.7 doesn't filter has_header_video, but uses it internally, so video won't show unless defined in WP options
		// Now just have to emit standard WP Header image code. BG handled in header_video_settings filter.

		if ( $hdr_bg ) {	// have alternate header image to match video
			$before = '';
			$after = '';

			if ( weaverx_has_header_video() ) { // handle header video
				wp_enqueue_script( 'wp-custom-header' );
				wp_localize_script( 'wp-custom-header', '_wpCustomHeaderSettings', get_header_video_settings() );
				$before =  '<div id="wp-custom-header" class="wp-custom-header">';
				$after = '</div>';
			}

			$alt = esc_attr( get_bloginfo( 'name', 'display' ));
			$fi_hdr = get_the_post_thumbnail( null, 'full', array('alt' => $alt, 'class' => 'wvrx-header-image' ) );
			echo $before . $fi_hdr . $after;

		} else if ( function_exists('the_custom_header_markup') && (weaverx_get_video_render() != 'has-header-video-none') ) {
			the_custom_header_markup();			// default WP Header Image markup - works for most everything, works with customimzer
		}
		else
			the_header_image_tag();

		echo("\n</div><!-- #header-image -->\n");
		return;
	}

	// 3. As Standard or FI BG replacement (no video supported)


	if ( weaverx_getopt_default('header_image_render','header-as-img') != 'header-as-img'	// use as BG image?
		&& ( !$hdr_html || weaverx_getopt('header_image_html_plus_bg') ) ) { // have bg, or have BOTH HTML and bg image?


		if ( !$hdr_bg ) {
			$hdr_bg = get_header_image();		// get the url of the standard header image
		}

		$hdr_bg = str_replace(array('http://', 'https://'),'//', $hdr_bg);

		// have to emit background-image url... this will be Plus only.
		if ( strlen($hdr_bg) > 1 ) {
			$style = "\n<style type='text/css'>";

			if ($h_hide != 'hide')
				$style .= "#header{background-image:url({$hdr_bg});}";

			// handle hide on devices

			if (strpos($h_hide, 's-hide') !== false)
				$style .= '.is-phone #header{background-image:none;}';
			if (strpos($h_hide, 'm-hide') !== false)
				$style .= '.is-tablet #header{background-image:none;}';
			if (strpos($h_hide, 'l-hide') !== false)
				$style .= '.is-desktop #header{background-image:none;}';
			echo $style . "</style>\n";

		}
		echo '<div class="clear-header-image" style="clear:both"></div></div><!-- #header-image -->';

		return;

	} // end of bg image handling

	if ($hdr_html) {
		echo("\n</div><!-- #header-image + HTML -->\n");
		return;
	}

	// Most common case now - either FI replacement, or standard header image
	// to here, then want to get an image. Where does it come from?

	if ( weaverx_getopt('link_site_image') ) {
		?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
	}

	if ( weaverx_fi( $page_type, 'header-image' ) ) {			// Use FI as header image

		$alt = esc_attr( get_bloginfo( 'name', 'display' ));
		echo the_post_thumbnail('full', array('alt' => $alt, 'class' => 'wvrx-header-image' ) );

	} else if ( weaverx_getopt('header_actual_size') ) {
?>
		<img src="<?php echo get_header_image() ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" class="wvrx-header-image" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
<?php
	} else {		// WP custom header image or header video
		if ( function_exists('the_custom_header_markup') && (weaverx_get_video_render() != 'has-header-video-none') ) {
			the_custom_header_markup();			// default WP Header Image markup - works for most everything, works with customimzer
		}
		else
			the_header_image_tag();
	}

	weaverx_e_opt('link_site_image',"</a>");	/* need to close link */

	echo("\n</div><!-- #header-image -->\n");

	// end of header image code
}
?>
