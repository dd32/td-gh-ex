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

	$options = get_option( 'fgymm_tishonator_social_settings' );
	if ( $options === false ) {
		$options = array (  
				'tishonator_social_facebook'   => 	'https://www.facebook.com/tishonator',
				'tishonator_social_googleplus' => 	'https://plus.google.com/+tishonator',
				'tishonator_social_rss' 	   => 	get_bloginfo( 'rss2_url' ),
				'tishonator_social_youtube'    => 	'http://www.youtube.com/',	
			  );
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
function tishonator_show_website_logo_image_or_title() {

	$options = get_option( 'fgymm_tishonator_header_settings' );

	if ( $options !== false && array_key_exists( 'tishonator_header_logo', $options )
		 && $options[ 'tishonator_header_logo' ] != '' ) {
		 
		echo '<a href="'.home_url().'" title="'.get_bloginfo('name').'">';
		
		$logoImgPath = $options[ 'tishonator_header_logo' ];
		$siteTitle = get_bloginfo( 'name' );
		
		echo "<img src='$logoImgPath' alt='$siteTitle' title='$siteTitle' />";
	
		echo '</a>';

	} else {
	
		echo '<a href="'.home_url().'" title="'.get_bloginfo('name').'">';
		
		echo '<h1>'.get_bloginfo('name').'</h1>';
		
		echo '</a>';
		
		echo '<strong>'.get_bloginfo('description').'</strong>';
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
	
	$options = get_option( 'fgymm_tishonator_footer_settings' );
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

		$options = get_option( 'fgymm_tishonator_slider_settings' );
		if ( $options === false ) {
			$options = array(
				// Slide #1 default settings
				'tishonator_slider_slide1_content' 	   		=> '<h2>Lorem ipsum dolor</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>',
				'tishonator_slider_slide1_image'	   		=> get_stylesheet_directory_uri().'/images/slider/1.jpg',
				
				// Slide #2 default settings
				'tishonator_slider_slide2_content' 	   		=> '<h2>Everti Constituam</h2><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a class="btn" title="Read more" href="#">Read more</a>',
				'tishonator_slider_slide2_image'	   		=> get_stylesheet_directory_uri().'/images/slider/2.jpg',
				
				// Slide #3 default settings
				'tishonator_slider_slide3_content' 	   		=> '<h2>Id Essent Cetero</h2><p>Quodsi docendi sed id. Ea eam quod aliquam epicurei, qui tollit inimicus partiendo cu ei. Nisl consul expetendis at duo, mea ea ceteros constituam.</p><a class="btn" title="Read more" href="#">Read more</a>',
				'tishonator_slider_slide3_image' 	   		=> get_stylesheet_directory_uri().'/images/slider/3.jpg',
			);
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