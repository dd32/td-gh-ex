<?php
/**
 * Register jquery scripts
 *
 * @register jquery cycle and custom-script
 * hooks action wp_enqueue_scripts
 */
function ci_scripts_method() {	
	//registering JQuery circle all and JQuery set up as dependent on Jquery-cycle
	wp_register_script( 'jquery-cycle', get_stylesheet_directory_uri() . '/js/jquery.cycle.all.js', '2.9999' );
	
	// registering custom scrtips
	wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/js/ci_custom_scripts.js', array( 'jquery', 'jquery-cycle' ), '1.0' );
	
	// enqueue JQuery Scripts	
	wp_enqueue_script( 'custom-script' );	
	
} // ci_scripts_method
add_action( 'wp_enqueue_scripts', 'ci_scripts_method' );


/**
 * Register script for admin section
 *
 * No scripts should be enqueued within this function.
 * jquery cookie used for remembering admin tabs, and potential future features... so let's register it early
 * @uses wp_register_script
 * @action admin_enqueue_scripts
 */
function ci_register_js() {
	//jQuery Cookie
	wp_register_script( 'jquery-cookie', get_stylesheet_directory_uri() . '/js/jquery.cookie.min.js', array( 'jquery' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'ci_register_js' );


/**
 * Register Google Font Style
 *
 * @uses wp_register_style and wp_enqueue_style
 * @action wp_print_styles
 */
function ci_load_google_fonts() {
    wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Lobster');
	wp_enqueue_style( 'google-fonts');
}
add_action('wp_print_styles', 'ci_load_google_fonts');

/**
 * Sets the post excerpt length to 40 words.
 *
 * function tied to the excerpt_length filter hook.
 * @uses filter excerpt_length
 */
function ci_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'ci_excerpt_length' );

/**
 * Remove [...] from excerpt
 *
 * @uses filter get_the_excerpt
 */
function ci_trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'ci_trim_excerpt');

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
function ci_header_logo() {
	//delete_transient( 'ci_header_logo' );
	
	// get data value from catch_options through theme options
	$options = get_option( 'catch_options' );	
		
	if ( !$ci_header_logo = get_transient( 'ci_header_logo' ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_header_logo' ] == "0" ) :
		// if not empty featured_logo_header on theme options
			if ( !empty( $options[ 'featured_logo_header' ] ) ):
				$ci_header_logo = 
					'<img src="'.$options['featured_logo_header'].'" alt="'.get_bloginfo( 'name' ).'" />';
			else:
				// if empty featured_logo_header on theme options, display default logo
				$ci_header_logo ='<img src="'. get_template_directory_uri().'/images/logo.png" alt="logo" />';
			endif;
		endif;
		
	set_transient( 'ci_header_logo', $ci_header_logo, 86940 );
	}
	echo $ci_header_logo;	
} // ci_header_logo

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
function ci_footer_logo() {
	//delete_transient('ci_footer_logo');
	
	// get data value from catch_options through theme options
	$options = get_option( 'catch_options' );
	
	if ( !$ci_footer_logo = get_transient( 'ci_footer_logo' ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_footer_logo' ] == "0" ) :
		
			// if not empty featured_logo_footer on theme options
			if ( !empty( $options[ 'featured_logo_footer' ] ) ) :
				$ci_footer_logo = 
					'<img src="'.$options[ 'featured_logo_footer' ].'" alt="'.get_bloginfo( 'name' ).'" />';
			else:
				// if empty featured_logo_footer on theme options, display default fav icon
				$ci_footer_logo ='
					<img src="'. get_template_directory_uri().'/images/logo-foot.png" alt="footerlogo" />';
			endif;
		endif;

		
	set_transient( 'ci_footer_logo', $ci_footer_logo, 86940 );										  
	}
	echo $ci_footer_logo;
} // ci_footer_logo


/**
 * Get the fav icon Image from theme options
 *
 * @uses fav icon 
 * @get the data value of image from theme options
 * @display fav icon
 *
 * @uses default fav icon if fav icon field on theme options is empty
 *
 * @uses set_transient and delete_transient 
 */
function ci_fav_icon() {
	//delete_transient( 'ci_fav_icon' );
	
	// get data value from catch_options through theme options
	$options = get_option( 'catch_options' );
	
	if( ( !$ci_fav_icon = get_transient( 'ci_fav_icon' ) ) ) {
		echo '<!-- refreshing cache -->';
		if ( $options[ 'remove_favicon' ] == "0" ) :
			// if not empty fav_icon on theme options
			if ( !empty( $options[ 'fav_icon' ] ) ) :
				$ci_fav_icon = '<link rel="shortcut icon" href="'.$options[ 'fav_icon' ].'" type="image/x-icon" />'; 	
			else:
				// if empty fav_icon on theme options, display default fav icon
				$ci_fav_icon = '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/images/favicon.ico" type="image/x-icon" />';
			endif;
		endif;
		
	set_transient( 'ci_fav_icon', $ci_fav_icon, 86940 );	
	}	
	echo $ci_fav_icon ;	
} // ci_fav_icon
add_action( 'admin_head', 'ci_fav_icon' );


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

function ci_featured_sliders() {	
	global $post;
	//delete_transient( 'ci_featured_sliders' );
		
	// get data value from catch_options_slider through theme options
	$options = get_option( 'catch_options_slider' );
	// get slider_qty from theme options
	$postperpage = $options[ 'slider_qty' ];
	
	if( ( !$ci_featured_sliders = get_transient( 'ci_featured_sliders' ) ) && !empty( $options[ 'featured_slider' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$ci_featured_sliders = '
		<div class="featured-slider">';
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' => $postperpage,
				'post__in'		 => $options[ 'featured_slider' ],
				'orderby' 		 => 'post__in',
				'ignore_sticky_posts' => 1 // ignore sticky posts
			));
				
			while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post();
				$title_attribute = esc_attr( apply_filters( 'the_title', get_the_title( $post->ID ) ) );
				$excerpt = str_replace('[...]','<a href="'.get_permalink().'" title="'.get_permalink().'" target="_blank">Continue reading</a>', get_the_excerpt() ) ; //str_replace to remove [...] from excerpt
				$ci_featured_sliders .= '
				<div class="slides">
					<div class="featured">
						<div class="img-effect pngfix"></div>
						<div>
							'.get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'pngfix' ) ).'
						</div>
					</div> <!-- .featured -->
					<div class="featured-text">';
					if( $excerpt !='')
						$ci_featured_sliders .= the_title( '<span>','</span>', false ).' : '.$excerpt; 
					$ci_featured_sliders .=
					'</div><!-- .featured-text -->
				</div> <!-- .slides -->';
			endwhile; wp_reset_query();
		$ci_featured_sliders .= '
		</div> <!-- .featured-slider -->
			<div id="controllers">
			</div><!-- #controllers -->';
			
	set_transient( 'ci_featured_sliders', $ci_featured_sliders, 86940 );
	}
	echo $ci_featured_sliders;	
} // ci_featured_sliders

/**
 * Display slider or breadcrumb on header
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if exist bread
 */
function ci_display_breadcrumb_or_slider() {
	
	// If the page is home or front page  
	if ( is_home() || is_front_page() ) :
		// display featured slider
		if ( function_exists( 'ci_featured_sliders' ) ):
			ci_featured_sliders();
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
} // ci_display_breadcrumb_or_slider


/**
 * This function for social links display on header
 *
 * @fetch links through Theme Options
 * @use in widget
 * @social links, Facebook, Twitter and RSS
  */
function ci_header_social_networks() {
	//delete_transient( 'ci_header_social_networks' );
	
	// get the data value from theme options
	$options = get_option( 'catch_options' );
	
	if ( ( !$ci_header_social_networks = get_transient( 'ci_header_social_networks' ) ) &&  ( !empty( $options[ 'social_twitter' ] ) || !empty( $options[ 'social_youtube' ] )  || !empty( $options[ 'social_facebook' ] ) ) )  {
	
		echo '<!-- refreshing cache -->';
		
		$ci_header_social_networks .='
			<ul class="social-profile">';
		
				//facebook
				if ( !empty( $options[ 'social_facebook' ] ) ) {
					$ci_header_social_networks .=
						'<li class="facebook"><a href="'.$options[ 'social_facebook' ].'" title="'.sprintf( esc_attr__( '%s in Facebook', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Facebook </a></li>';
				}
				
				//Twitter
				if ( !empty( $options[ 'social_twitter' ] ) ) {
					$ci_header_social_networks .=
						'<li class="twitter"><a href="'.$options[ 'social_twitter' ].'" title="'.sprintf( esc_attr__( '%s in Twitter', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' Twitter </a></li>';
				}
				
				//Youtube
				if ( !empty( $options[ 'social_youtube' ] ) ) {
					$ci_header_social_networks .=
						'<li class="you-tube"><a href="'.$options[ 'social_youtube' ].'" title="'.sprintf( esc_attr__( '%s in YouTube', 'simplecatch' ),get_bloginfo( 'name' ) ).'" target="_blank">'.get_bloginfo( 'name' ).' YouTube </a></li>';
				}
				
				//RSS
				if ( !empty( $options[ 'social_rss' ] ) ) {
					$ci_header_social_networks .=
						'<li class="rss"><a href="'.$options[ 'social_rss' ].'" title="'.sprintf( esc_attr__( '%s in RSS', 'simplecatch' ),get_bloginfo('name') ).'" target="_blank">'.get_bloginfo( 'name' ).' RSS </a></li>';
				}
		
		$ci_header_social_networks .='
			</ul>
			<div class="row-end"></div>';
		
	set_transient( 'ci_header_social_networks', $ci_header_social_networks, 86940 );	 
	}
	echo $ci_header_social_networks;
} // ci_header_social_networks


/**
 * This function to load scripts on header
 *
 * @get the data value from theme options
 * @load on the header ONLY
 *
 * @uses set_transient and delete_transient
 */
function ci_header_scripts() {
	//delete_transient( 'ci_header_scripts' );
	
	// get the data value from theme options
	$options = get_option( 'catch_options' );
	
	if ( ( !$ci_header_scripts = get_transient( 'ci_header_scripts' ) ) && !empty( $options[ 'analytic_header' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$ci_header_scripts = $options[ 'analytic_header' ];
			
	set_transient( 'ci_header_scripts', $ci_header_scripts, 86940 );
	}
	echo $ci_header_scripts;
}

/**
 * This function to load scripts on footer
 *
 * @get the data value from theme options
 * @load on the footer ONLY
 *
 * @uses set_transient and delete_transient
 */
function ci_footer_scripts() {
	//delete_transient( 'ci_footer_scripts' );
	
	// get the data value from theme options
	$options = get_option( 'catch_options' );
	
	if ( ( !$ci_footer_scripts = get_transient( 'ci_footer_scripts' ) ) && !empty( $options[ 'analytic_footer' ] ) ) {
		echo '<!-- refreshing cache -->';
			
		$ci_footer_scripts = $options[ 'analytic_footer' ];
			
	set_transient( 'ci_footer_scripts', $ci_footer_scripts, 86940 );
	}
	echo $ci_footer_scripts;
}

/*
 * Function for showing custom tag cloud
 */
function ci_custom_tag_cloud() {
?>
	<div class="custom-tagcloud"><?php wp_tag_cloud('smallest=12&largest=12px&unit=px'); ?></div>
<?php	
}

/**
 * Remove pages from search
 * Displays only post related search only
 * @uses filter pre_get_posts
 */
function ci_SearchFilter($query) {
	if ( $query->is_search ) {
  		$query->set('post_type', 'post');
 	}
 	return $query;
}
add_filter( 'pre_get_posts','ci_SearchFilter' );

/**
 * shows footer credits
 */
function ci_footer() {
?>
	<div class="col5 powered-by"> 
		<?php _e( 'Design by:', 'simplecatch');?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'Catch Themes', 'simplecatch' ); ?>"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a> | <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simplecatch' ) ); ?>" title="<?php esc_attr_e( 'WordPress', 'simplecatch' ); ?>" rel="generator" target="_blank" ><?php printf( __( 'Proudly powered by %s.', 'simplecatch' ), 'WordPress' ); ?></a>
  	</div><!--.col6 powered-by-->

<?php
}
add_filter( 'simplecatch_credits', 'ci_footer' );

/**
 * function that displays frquently asked question in theme option
 */
function ci_faq() {
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