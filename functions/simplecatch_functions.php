<?php
/**
 * Register jquery scripts
 *
 * @register jquery cycle and custom-script
 * hooks action wp_enqueue_scripts
 */
function simplecatch_scripts_method() {	
	//registering JQuery circle all and JQuery set up as dependent on Jquery-cycle
	wp_register_script( 'jquery-cycle', get_stylesheet_directory_uri() . '/js/jquery.cycle.all.js', '2.9999' );
	
	// registering custom scrtips
	wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/js/simplecatch_custom_scripts.js', array( 'jquery', 'jquery-cycle' ), '1.0' );
	
	// enqueue JQuery Scripts	
	wp_enqueue_script( 'custom-script' );	
	
} // simplecatch_scripts_method
add_action( 'wp_enqueue_scripts', 'simplecatch_scripts_method' );


/**
 * Register script for admin section
 *
 * No scripts should be enqueued within this function.
 * jquery cookie used for remembering admin tabs, and potential future features... so let's register it early
 * @uses wp_register_script
 * @action admin_enqueue_scripts
 */
function simplecatch_register_js() {
	//jQuery Cookie
	wp_register_script( 'jquery-cookie', get_stylesheet_directory_uri() . '/js/jquery.cookie.min.js', array( 'jquery' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'simplecatch_register_js' );


/**
 * Register Google Font Style
 *
 * @uses wp_register_style and wp_enqueue_style
 * @action wp_print_styles
 */
function simplecatch_load_google_fonts() {
    wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Lobster');
	wp_enqueue_style( 'google-fonts');
}
add_action('wp_print_styles', 'simplecatch_load_google_fonts');

/**
 * Sets the post excerpt length to 30 words.
 *
 * function tied to the excerpt_length filter hook.
 * @uses filter excerpt_length
 */
function simplecatch_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'simplecatch_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function simplecatch_continue_reading() {
	return ' <a class="readmore" href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading &rarr;', 'simplecatch' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with simplecatch_continue_reading().
 *
 */
function simplecatch_excerpt_more( $more ) {
	return ' &hellip;' . simplecatch_continue_reading();
}
add_filter( 'excerpt_more', 'simplecatch_excerpt_more' );


/**
 * Adds Continue Reading link to post excerpts.
 *
 * function tied to the get_the_excerpt filter hook.
 */
function simplecatch_custom_excerpt( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= simplecatch_continue_reading();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'simplecatch_custom_excerpt' );


/** 
 * Allows post queries to sort the results by the order specified in the post__in parameter. 
 * Just set the orderby parameter to post__in
 *
 * uses action filter posts_orderby
 */
if ( !function_exists('simplecatch_sort_query_by_post_in') ) : //simple WordPress 3.0+ version, now across VIP

	add_filter('posts_orderby', 'simplecatch_sort_query_by_post_in', 10, 2);
	
	function simplecatch_sort_query_by_post_in($sortby, $thequery) {
		if ( isset($thequery->query['post__in']) && !empty($thequery->query['post__in']) && isset($thequery->query['orderby']) && $thequery->query['orderby'] == 'post__in' )
			$sortby = "find_in_set(ID, '" . implode( ',', $thequery->query['post__in'] ) . "')";
		return $sortby;
	}

endif;

/**
 * Get the header logo Image from theme options
 *
 * @uses header logo 
 * @get the data value of image from theme options
 * @display Header Image logo
 *
 * @uses default logo if logo field on theme options is empty
 *
 * @uses set_transient and delete_transient 
 */
function simplecatch_headerlogo() {
	//delete_transient( 'simplecatch_headerlogo' );
	
	// get data value from simplecatch_options through theme options
	$options = get_option( 'simplecatch_options' );	
		
	if ( !$simplecatch_headerlogo = get_transient( 'simplecatch_headerlogo' ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_header_logo' ] == "0" ) :
		// if not empty featured_logo_header on theme options
			if ( !empty( $options[ 'featured_logo_header' ] ) ):
				$simplecatch_headerlogo = 
					'<img src="'.$options['featured_logo_header'].'" alt="'.get_bloginfo( 'name' ).'" />';
			else:
				// if empty featured_logo_header on theme options, display default logo
				$simplecatch_headerlogo ='<img src="'. get_template_directory_uri().'/images/logo.png" alt="logo" />';
			endif;
		endif;
		
	set_transient( 'simplecatch_headerlogo', $simplecatch_headerlogo, 86940 );
	}
	echo $simplecatch_headerlogo;	
} // simplecatch_headerlogo

/**
 * Get the footer logo Image from theme options
 *
 * @uses footer logo 
 * @get the data value of image from theme options
 * @display footer Image logo
 *
 * @uses default logo if logo field on theme options is empty
 *
 * @uses set_transient and delete_transient 
 */
function simplecatch_footerlogo() {
	//delete_transient('simplecatch_footerlogo');
	
	// get data value from catch_options through theme options
	$options = get_option( 'simplecatch_options' );
	
	if ( !$simplecatch_footerlogo = get_transient( 'simplecatch_footerlogo' ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_footer_logo' ] == "0" ) :
		
			// if not empty featured_logo_footer on theme options
			if ( !empty( $options[ 'featured_logo_footer' ] ) ) :
				$simplecatch_footerlogo = 
					'<img src="'.$options[ 'featured_logo_footer' ].'" alt="'.get_bloginfo( 'name' ).'" />';
			else:
				// if empty featured_logo_footer on theme options, display default fav icon
				$simplecatch_footerlogo ='
					<img src="'. get_template_directory_uri().'/images/logo-foot.png" alt="footerlogo" />';
			endif;
		endif;

		
	set_transient( 'simplecatch_footerlogo', $simplecatch_footerlogo, 86940 );										  
	}
	echo $simplecatch_footerlogo;
} // simplecatch_footerlogo


/**
 * Get the favicon Image from theme options
 *
 * @uses favicon 
 * @get the data value of image from theme options
 * @display favicon
 *
 * @uses default favicon if favicon field on theme options is empty
 *
 * @uses set_transient and delete_transient 
 */
function simplecatch_favicon() {
	//delete_transient( 'simplecatch_favicon' );
	
	// get data value from simplecatch_options through theme options
	$options = get_option( 'simplecatch_options' );
	
	if( ( !$simplecatch_favicon = get_transient( 'simplecatch_favicon' ) ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_favicon' ] == "0" ) :
			// if not empty fav_icon on theme options
			if ( !empty( $options[ 'fav_icon' ] ) ) :
				$simplecatch_favicon = '<link rel="shortcut icon" href="'.$options[ 'fav_icon' ].'" type="image/x-icon" />'; 	
			else:
				// if empty fav_icon on theme options, display default fav icon
				$simplecatch_favicon = '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/images/favicon.ico" type="image/x-icon" />';
			endif;
		endif;
		
	set_transient( 'simplecatch_favicon', $simplecatch_favicon, 86940 );	
	}	
	echo $simplecatch_favicon ;	
} // simplecatch_favicon

//Load Favicon in Header Section
add_action('wp_head', 'simplecatch_favicon');

//Load Favicon in Admin Section
add_action( 'admin_head', 'simplecatch_favicon' );

/**
 * This function to display featured posts on homepage header
 *
 * @get the data value from theme options
 * @displays on the homepage header
 *
 * @useage Featured Image, Title and Content of Post
 *
 * @uses set_transient and delete_transient
 */

function simplecatch_sliders() {	
	global $post;
	//delete_transient( 'simplecatch_sliders' );
		
	// get data value from simplecatch_options_slider through theme options
	$options = get_option( 'simplecatch_options_slider' );
	// get slider_qty from theme options
	$postperpage = $options[ 'slider_qty' ];
	
	if( ( !$simplecatch_sliders = get_transient( 'simplecatch_sliders' ) ) && !empty( $options[ 'featured_slider' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$simplecatch_sliders = '
		<div class="featured-slider">';
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' => $postperpage,
				'post__in'		 => $options[ 'featured_slider' ],
				'orderby' 		 => 'post__in',
				'ignore_sticky_posts' => 1 // ignore sticky posts
			));
			while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post();
				$title_attribute = esc_attr( apply_filters( 'the_title', get_the_title( $post->ID ) ) );
				$excerpt = get_the_excerpt();
				$simplecatch_sliders .= '
				<div class="slides">
					<div class="featured">
						<div class="slide-image">';
							if( has_post_thumbnail() ) {
								$simplecatch_sliders .= '<a href="' . get_permalink() . '" title="Permalink to '.the_title('','',false).'"><span class="img-effect pngfix"></span>'.get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'pngfix' ) ).'</a>';
							}
							else {
								$simplecatch_sliders .= '<span class="img-effect pngfix"></span>';	
							}
							$simplecatch_sliders .= '
						</div> <!-- .slide-image -->
					</div> <!-- .featured -->
					<div class="featured-text">';
						if( $excerpt !='') {
							$simplecatch_sliders .= the_title( '<span>','</span>', false ).': '.$excerpt;
						}
						$simplecatch_sliders .= '
					</div><!-- .featured-text -->
				</div> <!-- .slides -->';
			endwhile; wp_reset_query();
		$simplecatch_sliders .= '
		</div> <!-- .featured-slider -->
			<div id="controllers">
			</div><!-- #controllers -->';
			
	set_transient( 'simplecatch_sliders', $simplecatch_sliders, 86940 );
	}
	echo $simplecatch_sliders;	
} // simplecatch_sliders

/**
 * Display slider or breadcrumb on header
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if exist bread
 */
function simplecatch_sliderbreadcrumb() {
	
	// If the page is home or front page  
	if ( is_home() || is_front_page() ) :
		// display featured slider
		if ( function_exists( 'simplecatch_sliders' ) ):
			simplecatch_sliders();
		endif;
	else : 
		// if breadcrumb is not empty, display breadcrumb
		if ( function_exists( 'bcn_display_list' ) ):
			echo '<div class="breadcrumb">
					<ul>';
						bcn_display_list();
			 	echo '</ul>
					<div class="row-end"></div>
				</div> <!-- .breadcrumb -->';			
		endif; 
		
  	endif;
} // simplecatch_sliderbreadcrumb


/**
 * This function for social links display on header
 *
 * @fetch links through Theme Options
 * @use in widget
 * @social links, Facebook, Twitter and RSS
  */
function simplecatch_headersocialnetworks() {
	//delete_transient( 'simplecatch_headersocialnetworks' );
	
	// get the data value from theme options
	$options = get_option( 'simplecatch_options' );
	
	if ( ( !$simplecatch_headersocialnetworks = get_transient( 'simplecatch_headersocialnetworks' ) ) &&  ( !empty( $options[ 'social_twitter' ] ) || !empty( $options[ 'social_youtube' ] )  || !empty( $options[ 'social_facebook' ] ) || !empty( $options[ 'social_googleplus' ] )  || !empty( $options[ 'social_pinterest' ] ) ) )  {
	
		echo '<!-- refreshing cache -->';
		
		$simplecatch_headersocialnetworks .='
			<ul class="social-profile">';
		
				//facebook
				if ( !empty( $options[ 'social_facebook' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="facebook"><a href="'.$options[ 'social_facebook' ].'" title="'.sprintf( esc_attr__( '%s in Facebook', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Facebook </a></li>';
				}
				
				//Twitter
				if ( !empty( $options[ 'social_twitter' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="twitter"><a href="'.$options[ 'social_twitter' ].'" title="'.sprintf( esc_attr__( '%s in Twitter', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Twitter </a></li>';
				}
				
				//Google+
				if ( !empty( $options[ 'social_googleplus' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="google-plus"><a href="'.$options[ 'social_googleplus' ].'" title="'.sprintf( esc_attr__( '%s in Google+', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Google+ </a></li>';
				}
				
				//Pinterest
				if ( !empty( $options[ 'social_pinterest' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="pinterest"><a href="'.$options[ 'social_pinterest' ].'" title="'.sprintf( esc_attr__( '%s in Pinterest', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Twitter </a></li>';
				}				
				
				//Youtube
				if ( !empty( $options[ 'social_youtube' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="you-tube"><a href="'.$options[ 'social_youtube' ].'" title="'.sprintf( esc_attr__( '%s in YouTube', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' YouTube </a></li>';
				}
				
				//RSS
				if ( !empty( $options[ 'social_rss' ] ) ) {
					$simplecatch_headersocialnetworks .=
						'<li class="rss"><a href="'.$options[ 'social_rss' ].'" title="'.sprintf( esc_attr__( '%s in RSS', 'simplecatch' ),get_bloginfo('name') ).'" target="_blank">'.get_bloginfo( 'name' ).' RSS </a></li>';
				}
		
		$simplecatch_headersocialnetworks .='
			</ul>
			<div class="row-end"></div>';
		
	set_transient( 'simplecatch_headersocialnetworks', $simplecatch_headersocialnetworks, 86940 );	 
	}
	echo $simplecatch_headersocialnetworks;
} // simplecatch_headersocialnetworks


/**
 * This function loads the Header Code such as google analytics code from the Theme Option
 *
 * @get the data value from theme options
 * @uses wp_head action to add the code in the header
 * @uses set_transient and delete_transient API for cache
 */
function simplecatch_headercode() {
	//delete_transient( 'simplecatch_headercode' );
	
	// get the data value from theme options
	$options = get_option( 'simplecatch_options' );
	
	if ( ( !$simplecatch_headercode = get_transient( 'simplecatch_headercode' ) ) && !empty( $options[ 'analytic_header' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$simplecatch_headercode = $options[ 'analytic_header' ];
			
	set_transient( 'simplecatch_headercode', $simplecatch_headercode, 86940 );
	}
	echo $simplecatch_headercode;
}
add_action('wp_head', 'simplecatch_headercode');


/**
 * This function loads the Footer Code such as Add this code from the Theme Option
 *
 * @get the data value from theme options
 * @load on the footer ONLY
 * @uses wp_footer action to add the code in the footer
 * @uses set_transient and delete_transient
 */
function simplecatch_footercode() {
	//delete_transient( 'simplecatch_footercode' );
	
	// get the data value from theme options
	$options = get_option( 'simplecatch_options' );
	
	if ( ( !$simplecatch_footercode = get_transient( 'simplecatch_footercode' ) ) && !empty( $options[ 'analytic_footer' ] ) ) {
		echo '<!-- refreshing cache -->';
			
		$simplecatch_footercode = $options[ 'analytic_footer' ];
			
	set_transient( 'simplecatch_footercode', $simplecatch_footercode, 86940 );
	}
	echo $simplecatch_footercode;
}
add_action('wp_footer', 'simplecatch_headercode');

/*
 * Function for showing custom tag cloud
 */
function simplecatch_custom_tag_cloud() {
?>
	<div class="custom-tagcloud"><?php wp_tag_cloud('smallest=12&largest=12px&unit=px'); ?></div>
<?php	
}

/**
 * shows footer credits
 */
function simplecatch_footer() {
?>
	<div class="col5 powered-by"> 
		<?php _e( 'Design by:', 'simplecatch');?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'Catch Themes', 'simplecatch' ); ?>"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a> | <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simplecatch' ) ); ?>" title="<?php esc_attr_e( 'WordPress', 'simplecatch' ); ?>" rel="generator" target="_blank" ><?php printf( __( 'Proudly powered by %s.', 'simplecatch' ), 'WordPress' ); ?></a>
  	</div><!--.col6 powered-by-->

<?php
}
add_filter( 'simplecatch_credits', 'simplecatch_footer' );

/**
 * function that displays frquently asked question in theme option
 */
function simplecatch_faq() {
?>
		<h2>FAQ: Frequently Asked Questions</h2>
		<h3>1. How to change logo on Header and Footer? </h3>
		<ul>
			<li> Click on Theme Options under Appearance. </li>
			<li> Select the Logo Tab. You can see the default logo previews. </li>
			<li> Now click on Change Header Logo and Footer Logo button. </li>
			<li> Browse the Logo image from desired location and insert into the Post. </li>
			<li> Click on Save button. Now you can see the previews.</li>
		</ul>
		
		<h3>2. How to change fav icon? </h3>
		<ul>
			<li> Click on Theme Options under Appearance. </li>
			<li> Select the Fav Icon Tab. You can see the default fav icon preview. </li>
			<li> Now click on Change Fav Icon button. </li>
			<li> Browse the fav icon image from desired location and insert into the Post. </li>
			<li> Click on Save button. Now you can see the preview.</li>
		</ul>
			
		<h3>3. How to insert Social links on the right side of header? </h3>
		<ul>
			<li> Click on Theme Options under Appearance. </li>
			<li> Select the Social Links Tab.</li>
			<li> Here you can see different social links like facebook, twitter etc. </li>
			<li> Give the social links on its respective socal fields. For example http://www.facebook.com. for facebook etc.</li>
			<li> Click on Save button.</li>
		</ul>
		
		<h3>4. How to insert Analytic scripts? </h3>
		<ul>
			<li> Click on Theme Options under Appearance. </li>
			<li> Select the Analytic Option Tab.</li>
			<li> Here you can put different scripts like, google, facebook etc. </li>
			<li> Put the script on upper textarea which you want to load on header. </li>
			<li> Put the script on lower textarea which you want to load on footer. </li>
			<li> Click on Save button.</li>
		</ul>
		
		<h3>5. How to choose featured slider? </h3>
		<ul>
			<li> Click on Featured Slider under Appearance. </li>
			<li> Give the No. of slides and click on Save Button. </li>
			<li> Now there is list of the Featured Col #1, #2 etc.</li>
			<li> To Give the Post ID's, click on "Click Here to Edit" Button which redirect you into the edit posts.</li>
			<li> Now find the post ID's which you want to display and keep that ID's on blank Featured Col #1..... </li>
			<li> Click on Save button.</li>
		</ul>
		
		<h3>6. How to create pagination in single post if the post is too long? </h3>
		<ul>
			<li> Click on the Post. </li>
			<li> Edit the specific post which you want to breakdown into more pages. </li>
			<li> Now Keep the cursor to the exact place of post where you like to break. </li>
			<li> Then copy this shortcode <!--nextpage--> and paste it.</li>
			<li> You can repeat this shortcode many times where you wan to break down.</li>
			<li> Update the post. </li>
			<li> Click on Save button.</li>
		</ul>
                    
<?php
}
?>