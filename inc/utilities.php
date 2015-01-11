<?php

/*
 * Utility Functions
 */

function fkidd_show_social_sites( $before,
						  $after,
						  $separatorBefore,
						  $separatorAfter,
						  $openInNewWindow,
						  $iconSize /* must be 16 or 32 */) {

	$options = fkidd_get_options();
	
	echo $before;

	if ( array_key_exists( 'social_facebook', $options )
		 && $options['social_facebook'] != '' ) {
		fkidd_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'social_facebook' ],
				__( 'Follow us on Facebook', 'fkidd'), 'facebook'.$iconSize, $openInNewWindow );
	}
	
	if ( array_key_exists( 'social_googleplus', $options )
		 && $options['social_googleplus'] != '' ) {
		fkidd_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'social_googleplus' ],
				__( 'Follow us on Google+', 'fkidd'), 'google'.$iconSize, $openInNewWindow );
	}
	
	if ( array_key_exists( 'social_rss', $options )
		 && $options['social_rss'] != '' ) {
		fkidd_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'social_rss' ],
				__( 'Follow our RSS Feeds', 'fkidd'), 'rss'.$iconSize, $openInNewWindow );
	}

	if ( array_key_exists( 'social_youtube', $options )
		 && $options['social_youtube'] != '' ) {

		fkidd_show_single_social_site( $separatorBefore, $separatorAfter, $options[ 'social_youtube' ],
				__( 'Follow us on YouTube', 'fkidd'), 'youtube'.$iconSize, $openInNewWindow );
	}

	echo $after;	
}

function fkidd_show_single_social_site( $separatorBefore,
											 $separatorAfter,
											 $socialSiteUrl,
											 $title,
											 $cssClass,
											 $openInNewWindow ) {

	echo $separatorBefore;
	
	if ( $openInNewWindow ) {
		echo "<a href='" . esc_url( $socialSiteUrl ) . "' title=\"" . esc_attr( $title ) . "\" class='" . esc_attr( $cssClass ) . "' target=\"_blank\"></a>";
	}
	else {
		echo "<a href='". esc_url( $socialSiteUrl ) . "' title=\"" . esc_attr( $title ) . "\" class='" . esc_attr( $cssClass ) . "'></a>";
	}

	echo $separatorAfter;
}

/**
 * Display website's logo image
 */
function fkidd_show_website_logo_image_or_title() {

	$options = fkidd_get_options();

	if ( get_header_image() != '' ) {
	
		// Check if the user selected a header Image in the Customizer or the Header Menu
		$logoImgPath = get_header_image();
		$siteTitle = get_bloginfo( 'name' );
		$imageWidth = get_custom_header()->width;
		$imageHeight = get_custom_header()->height;
		
		echo '<a href="'.home_url('/').'" title="'.get_bloginfo('name').'">';
		
		echo "<img src='$logoImgPath' alt='$siteTitle' title='$siteTitle' width='$imageWidth' height='$imageHeight' alt='' />";
		
		echo '</a>';

	} else if ( array_key_exists( 'header_logo', $options ) && $options[ 'header_logo' ] != '' ) {
		 
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		$logoImgPath = $options[ 'header_logo' ];
		$siteTitle = get_bloginfo( 'name' );
		
		echo "<img src='" . esc_attr( $logoImgPath ) . "' alt='" . esc_attr( $siteTitle ) . "' title='" . esc_attr( $siteTitle ) . "' />";
	
		echo '</a>';

	} else {
	
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		echo '<h1>'.get_bloginfo('name').'</h1>';
		
		echo '</a>';
		
		echo '<strong>'.get_bloginfo('description').'</strong>';
	}
	
	/*t
	$options = get_option( 'fkidd_settings' );

	if (get_header_image() != '') {
	
		// Check if the user selected a header Image in the Customizer or the Header Menu
		$logoImgPath = get_header_image();
		$siteTitle = get_bloginfo( 'name' );
		$imageWidth = get_custom_header()->width;
		$imageHeight = get_custom_header()->height;
		
		echo '<a href="'.home_url('/').'" title="'.get_bloginfo('name').'">';
		
		echo "<img src='$logoImgPath' alt='$siteTitle' title='$siteTitle' width='$imageWidth' height='$imageHeight' alt='' />";
		
		echo '</a>';

	} else if ( $options !== false && array_key_exists( 'header_logo', $options )
		 && $options[ 'header_logo' ] != '' ) {
		 
		echo '<a href="'.home_url('/').'" title="'.get_bloginfo('name').'">';
		
		$logoImgPath = $options[ 'header_logo' ];
		$siteTitle = get_bloginfo( 'name' );
		
		echo "<img src='$logoImgPath' alt='$siteTitle' title='$siteTitle' />";
	
		echo '</a>';
		
		

	} else {
	
		echo '<a href="'.home_url('/').'" title="'.get_bloginfo('name').'">';
		
		echo '<h1>'.get_bloginfo('name').'</h1>';
		
		echo '</a>';
		
		echo '<strong>'.get_bloginfo('description').'</strong>';
	}
	
	t*/
}

/* 
 * Display content at header top: email, phone and social icons 
 */
function fkidd_show_header_top() {
	
	// display homepage icon
?>
	<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>" class="homepage-icon-link"></a>
<?php
	
	// display social sites
	fkidd_show_social_sites( '<ul class="header-social-widget">', '</ul>', '<li>', '</li>', true, 16 );
}

/**
 *	Displays the copyright text.
 */
function fkidd_show_copyright_text() {
	
	$options = fkidd_get_options();
	if ( array_key_exists( 'footer_copyrighttext', $options ) && $options[ 'footer_copyrighttext' ] != '' ) {

		echo esc_html( $options[ 'footer_copyrighttext' ] ) . ' | ';
	}
}

/**
 * Displays the slider
 */
function fkidd_display_slider() {

		$options = fkidd_get_options();
	 ?>
	 
	 <div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {

					$slideContent = $options[ 'slider_slide'.$i.'_content' ];
					$slideImage = $options[ 'slider_slide'.$i.'_image' ];
				?>
				
					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<div class="camera_caption fadeFromBottom">
							<?php echo $slideContent; ?>
						</div>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
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
function fkidd_show_pagenavi( $p = 2 ) { // pages will be show before and after current page
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
	fkidd_p_link( 1, 'First' );
  }
  if ( $paged > $p + 2 ) {
	echo '... ';
  }
  for ( $i = $paged - $p; $i <= $paged + $p; ++$i ) { 
	// Middle pages
    if ( $i > 0 && $i <= $max_page ) {
		$i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : fkidd_p_link($i);
	}
  }
  if ( $paged < $max_page - $p - 1 ) {
	echo '... ';
  }
  if ( $paged < $max_page - $p ) {
	fkidd_p_link( $max_page, 'Last' );
  }
}
function fkidd_p_link( $i, $title = '' ) {
  if ( $title == '' ) {
	$title = "Page {$i}";
  }
  echo "<a class='page-numbers' href='", esc_url( esc_html( get_pagenum_link( $i ) ) ), "' title='{$title}'>{$i}</a>";
}

/**
 *	Used to load the content for posts and pages.
 */
function fkidd_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
		
		echo '<a href="'. esc_url( get_permalink() ) .'" title="' . esc_attr( get_the_title() ) . '">';
		
		the_post_thumbnail();
		
		echo '</a>';
	}
	the_content( __( 'Read More', 'fkidd') );
}

/**
 *	Displays the single content.
 */
function fkidd_the_content_single() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {

		the_post_thumbnail();
	}
	the_content( __( 'Read More...', 'fkidd') );
}

/**
 * Displays the Page Header Section including Page Title and Breadcrumb
 */
function fkidd_show_page_header_section() { 
	global $paged, $page;

	if ( is_single() || is_page() ) :
        $title = single_post_title( '', false );

	elseif ( is_home() ) :
		if ( $paged >= 2 || $page >= 2 ) :
			$title = sprintf( __( '%s - Page %s', 'fkidd' ), single_post_title( '', false ), max( $paged, $page ) );	
		else :
			$title = single_post_title( '', false );	
		endif;

	elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
		$title = __( 'Asides', 'fkidd' );

	elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
		$title = __( 'Images', 'fkidd' );

	elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
		$title = __( 'Videos', 'fkidd' );

	elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
		$title = __( 'Audio', 'fkidd' );

	elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
		$title = __( 'Quotes', 'fkidd' );

	elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
		$title = __( 'Links', 'fkidd' );
		
	elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
		$title = __( 'Galleries', 'fkidd' );
		
	elseif ( is_tag() ) :
		$title = sprintf( __( 'Tag Archives: %s', 'fkidd' ), single_tag_title( '', false ) );

	elseif ( is_category() ) :
		$title = sprintf( __( 'Category Archives: %s', 'fkidd' ), single_cat_title( '', false ) );
		
	elseif ( is_day() ) :
		$title = sprintf( __( 'Daily Archives: %s', 'fkidd' ), get_the_date() );

	elseif ( is_month() ) :
		$title = sprintf( __( 'Monthly Archives: %s', 'fkidd' ),
					get_the_date( _x( 'F Y', 'monthly archives date format', 'fkidd' ) ) );

	elseif ( is_year() ) :
		$title = sprintf( __( 'Yearly Archives: %s', 'fkidd' ),
					get_the_date( _x( 'Y', 'yearly archives date format', 'fkidd' )  ) );

	elseif ( is_archive() ) :
		$title = __( 'Archives', 'fkidd' );
		
	elseif ( is_404() ) :
		$title = __( 'Error 404: Not Found', 'fkidd' );

	else :
		$title = wp_title('', false);

	endif;
	
	
	?>

	<section id="page-header">
		<div id="page-header-content">

			<h1><?php echo $title; ?></h1>

			<div class="clear">
			</div>
		</div>
    </section>
<?php
}

?>