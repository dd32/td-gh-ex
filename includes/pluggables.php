<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly

/* pluggables.php - functions and settings tests that could be overridden
 *
 * Added 3.2 - Jan 2018
 */

if (! function_exists('xxx')) :

endif;	// xxx

if (! function_exists('weaverx_header_extra_html')) :
function weaverx_header_extra_html() {

	// add extra html to header

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
}
endif;
//--

// ------------------------------------------------------------------------------------
if (! function_exists('weaverx_header_image')) :
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

	$hdr_bg = weaverx_fi( $page_type, 'header-image');

	$hdr_type = ($hdr_bg) ? 'fi' : 'std';

	$img_class .= 'header-image-type-' . $hdr_type;

	echo '<div id="header-image" class="' . $img_class . '">';

	// Check different ways to display a header:
	// 0. Archive type page - including search (Changed: 3.1.1)
	// 1. As HTML replacement, possibly with regular image as BG header image
	// 2. As Video Header
	// 3. As Standard or FI BG replacement (no video supported)
	// 4. As FI Replacement
	// 5. As standard Image


	// 1. HTML replacement
	$hdr_html = '';

	if ( !$hdr_bg ) {		// FI as header replacement has priority

		$hdr_html = weaverx_get_per_page_value('_pp_header_image_html_text');	// per page has priority

		if ( !$hdr_html )
			$hdr_html = weaverx_getopt('header_image_html_text');
		if ( $hdr_html && weaverx_getopt('header_image_html_home_only') && !is_front_page())	// only on global, not per page/post
			$hdr_html = '';		// make empty so will pickup the standard header

		if ($hdr_html) {					// custom header html replacement overrides all other header image options
			echo do_shortcode($hdr_html);	// output the html
		}
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
			$style .= "</style>\n";
			// echo $style;
			weaverx_inline_style( $style, 'header.php' );

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
endif; 	// weaverx_header_image
//--


if (! function_exists('weaverx_logo_and_title')) :
function weaverx_logo_and_title() {
	// generate output to show logo and the title

	$title_over_image = weaverx_getopt('title_over_image')
		&& (weaverx_getopt_default('header_image_render','header-as-img') == 'header-as-img' || weaverx_getopt('header_image_html_plus_bg')
			|| weaverx_has_header_video()) ;

	if ( $title_over_image )
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

	$title =  apply_filters('weaverx_site_title', esc_html(get_bloginfo( 'name', 'display' ) ) );

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
		get_template_part( 'templates/menu', 'header-mini' );

	echo "    </div><!-- /.title-tagline -->\n";


	return $title_over_image;	// indicator that needs the closing div after the header image itself
}
endif;	//

?>
