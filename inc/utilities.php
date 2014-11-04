<?php

/*
 * Utility Functions
 */

function tishonator_show_social_sites( $before,
						  $after,
						  $separatorBefore,
						  $separatorAfter,
						  $openInNewWindow,
						  $iconSize /* must be 16 or 32 */) {

	$options = get_option( 'fmuzz_tishonator_social_settings' );
	if ( $options === false ) {
		return;
	}
	
	echo $before;

	if ( array_key_exists( 'tishonator_social_facebook', $options )
		 && $options['tishonator_social_facebook'] != '' ) {
		tishonator_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'tishonator_social_facebook' ],
				__( 'Follow us on Facebook', 'tishonator' ), 'facebook'.$iconSize, $openInNewWindow );
	}
	
	if ( array_key_exists( 'tishonator_social_googleplus', $options )
		 && $options['tishonator_social_googleplus'] != '' ) {
		tishonator_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'tishonator_social_googleplus' ],
				__( 'Follow us on Google+', 'tishonator' ), 'google'.$iconSize, $openInNewWindow );
	}
	
	if ( array_key_exists( 'tishonator_social_rss', $options )
		 && $options['tishonator_social_rss'] != '' ) {
		tishonator_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'tishonator_social_rss' ],
				__( 'Follow our RSS Feeds', 'tishonator' ), 'rss'.$iconSize, $openInNewWindow );
	}

	if ( array_key_exists( 'tishonator_social_youtube', $options )
		 && $options['tishonator_social_youtube'] != '' ) {

		tishonator_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'tishonator_social_youtube' ],
				__( 'Follow us on YouTube', 'tishonator' ), 'youtube'.$iconSize, $openInNewWindow );
	}

	echo $after;	
}

function tishonator_show_single_social_site( $separatorBefore,
											 $separatorAfter,
											 $socialSiteUrl,
											 $title,
											 $cssClass,
											 $openInNewWindow ) {

	echo $separatorBefore;
	
	if ( $openInNewWindow ) {
		echo "<a href='$socialSiteUrl' title=\"$title\" class='$cssClass' target=\"_blank\"></a>";
	}
	else {
		echo "<a href='$socialSiteUrl' title=\"$title\" class='$cssClass'></a>";
	}

	echo $separatorAfter;
}

/**
 * Display website's logo image
 */
function tishonator_show_website_logo_image() {

	$options = get_option( 'fmuzz_tishonator_header_settings' );
	if ( $options === false ) {
		return;
	}

	if ( array_key_exists( 'tishonator_header_logo', $options )
		 && $options[ 'tishonator_header_logo' ] != '' ) {
	
		$logoImgPath = $options[ 'tishonator_header_logo' ];
		$siteTitle = get_bloginfo( 'name' );
		
		echo "<img src='$logoImgPath' alt='$siteTitle' title='$siteTitle' />";
	}
}

/* 
 * Display content at header top: email, phone and social icons 
 */
function tishonator_show_header_top() {
	
	// display homepage icon
?>
	<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>" class="homepage-icon-link"></a>
<?php
	
	// display social sites
	tishonator_show_social_sites( '<ul class="header-social-widget">', '</ul>', '<li>', '</li>', true, 16 );
}

/**
 * Displays social sites code for footer
 */
function tishonator_show_footer_social_sites($before, $after) {

	echo $before;

	tishonator_show_social_sites( '<ul class="footer-social-widget">', '</ul>', '<li>', '</li>', true, 16 );

	echo $after;
}

/**
 *	Displays the copyright text.
 */
function tishonator_show_copyright_text() {
	
	$options = get_option( 'fmuzz_tishonator_footer_settings' );
	if ( $options !== false && array_key_exists( 'tishonator_footer_copyrighttext', $options )
	     && $options[ 'tishonator_footer_copyrighttext' ] != '' ) {

		echo '<p>'.$options[ 'tishonator_footer_copyrighttext' ];
	} else {
		echo '<p>';
	}
	
	/**
	 * Please, do not remove poweredBy :)
	 *
	 * Thanks in advance :)
	 *
	 * Tishonator Team
	 */
	$poweredBy = ' | Powered by <a title="tishonator.com" href="http://tishonator.com/" target="_blank">tishonator.com</a></p>';
	
	echo $poweredBy;
}

/**
 * Displays the slider
 */
function tishonator_display_slider() {

		$options = get_option( 'fmuzz_tishonator_slider_settings' );
		if ( $options === false ) {
			return;
		}
	 ?>
	 
	 <div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {

					$slideContent = $options[ 'tishonator_slider_slide'.$i.'_content' ];
					$slideImage = $options[ 'tishonator_slider_slide'.$i.'_image' ];
				?>
				
					<div data-thumb="<?php echo $slideImage; ?>" data-src="<?php echo $slideImage; ?>">
						<div class="camera_caption fadeFromBottom">
							<?php echo $slideContent; ?>
						</div>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
	<?php
		wp_enqueue_script( 'tisho-jquery-mobile-js', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'tisho-jquery-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
		wp_enqueue_script( 'tisho-camera-js', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
	?>
	<script>
		jQuery(function(){
			jQuery('#camera_wrap').camera({
				height: '300px',
				loader: 'bar',
				pagination: true,
				
				thumbnails: false,
				imagePath: '<?php echo get_template_directory_uri() ?>/images/slider',
				time: 4500
			});
		});
	</script>
<?php 
}

/**
 *	Displays the page navigation
 */
function tishonator_show_pagenavi( $p = 2 ) { // pages will be show before and after current page
  if ( is_singular() ) {
	return; // do NOT show in single page
  }
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  if ( $max_page == 1 ) {
	return; // don't show when only one page
  }
  if ( empty( $paged ) ) {
	$paged = 1;
  }
  // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> '; // pages
  if ( $paged > $p + 1 ) {
	tishonator_p_link( 1, 'First' );
  }
  if ( $paged > $p + 2 ) {
	echo '... ';
  }
  for ( $i = $paged - $p; $i <= $paged + $p; ++$i ) { 
	// Middle pages
    if ( $i > 0 && $i <= $max_page ) {
		$i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : tishonator_p_link($i);
	}
  }
  if ( $paged < $max_page - $p - 1 ) {
	echo '... ';
  }
  if ( $paged < $max_page - $p ) {
	tishonator_p_link( $max_page, 'Last' );
  }
}
function tishonator_p_link( $i, $title = '' ) {
  if ( $title == '' ) {
	$title = "Page {$i}";
  }
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a>";
}

/**
 *	Used to load the content for posts and pages.
 */
function tishonator_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
		
		echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
		
		the_post_thumbnail();
		
		echo '</a>';
	}
	the_content( __( 'Read More', 'tishonator' ) );
}

/**
 *	Displays the single content.
 */
function tishonator_the_content_single() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {

		the_post_thumbnail();
	}
	the_content( __( 'Read More...', 'tishonator' ) );
}

/**
 * Displays the Page Header Section including Page Title and Breadcrumb
 */
function tishonator_show_page_header_section() { ?>

	<section id="page-header">
		<div id="page-header-content">

			<h1><?php wp_title(''); ?></h1>

			<div class="clear">
			</div>
		</div>
    </section>
<?php
}

?>