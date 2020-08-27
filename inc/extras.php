<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AccesspressLite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accesspresslite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
    $accesspresslite_options = accesspress_default_setting_value();
    $accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
    //$home_template = $accesspresslite_settings['accesspresslite_home_template'];
    $home_template            = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : 'template_one';
    if ($home_template == 'template_two' || $home_template == '') {
		$classes[] = 'body_template_two';
	}
    if ($home_template == 'template_one') {
		$classes[] = 'body_template_one';
	}

	return $classes;
}
add_filter( 'body_class', 'accesspresslite_body_classes' );

$accesspresslite_options = accesspress_default_setting_value();
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function accesspresslite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'accesspress-lite' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'Display items in the Left Sidebar of the inner pages', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'accesspress-lite' ),
		'id'            => 'right-sidebar',
		'description'   => __( 'Display items in the Right Sidebar of the inner pages', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Event Sidebar', 'accesspress-lite' ),
		'id'            => 'event-sidebar',
		'description'   => __( 'Display items in the Left Sidebar of the inner pages', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog Right Sidebar', 'accesspress-lite' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Display items for the blog category in the Right Sidebar of the inner pages', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area One', 'accesspress-lite' ),
		'id'            => 'footer-1',
		'description'   => __( 'Display items in First Footer Area', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area Two', 'accesspress-lite' ),
		'id'            => 'footer-2',
		'description'   => __( 'Display items in Second Footer Area', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area Three', 'accesspress-lite' ),
		'id'            => 'footer-3',
		'description'   => __( 'Display items in Third Footer Area', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area Four', 'accesspress-lite' ),
		'id'            => 'footer-4',
		'description'   => __( 'Display items in Fourth Footer Area', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Left Block above footer', 'accesspress-lite' ),
		'id'            => 'textblock-1',
		'description'   => __( 'Display items in the left just above the footer', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Middle Block above footer', 'accesspress-lite' ),
		'id'            => 'textblock-2',
		'description'   => __( 'Display items in the middle just above the footer and replaces defaul gallery', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Right Block above footer', 'accesspress-lite' ),
		'id'            => 'textblock-3',
		'description'   => __( 'Display items in the Right just above the footer and replaces Testimonials', 'accesspress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'accesspresslite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspresslite_scripts() {
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );

	$slider_show_pager     = isset( $accesspresslite_settings[ 'slider_show_pager' ] ) ? $accesspresslite_settings[ 'slider_show_pager' ] : '';
	$slider_show_controls  = isset( $accesspresslite_settings[ 'slider_show_controls' ] ) ? $accesspresslite_settings[ 'slider_show_controls' ] : '';
	$slider_auto           = isset( $accesspresslite_settings[ 'slider_auto' ] ) ? $accesspresslite_settings[ 'slider_auto' ] : '';
	$slider_mode           = isset( $accesspresslite_settings[ 'slider_mode' ] ) ? $accesspresslite_settings[ 'slider_mode' ] : '';
	$slider_speed  		   = isset( $accesspresslite_settings[ 'slider_speed' ] ) ? $accesspresslite_settings[ 'slider_speed' ] : 500;
	

	($slider_show_pager == 'yes1' || empty($slider_show_pager)) ? ($a='true') : ($a='false');
    ($slider_show_controls  == 'yes2' || empty($slider_show_controls)) ? ($b='true') : ($b='false');
    ($slider_mode == 'slide' || empty($slider_mode)) ? ($c='horizontal') : ($c='fade');
    ($slider_auto == 'yes3' || empty($slider_auto)) ? ($d='true') : ($d='false');
	empty($accesspresslite_settings['slider_pause']) ? ($e ='5000') : ($e = $accesspresslite_settings['slider_pause']);



    $layout_home            = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : 'template_one';
	$query_args = array(
		'family' => 'Open+Sans:400,400italic,300italic,300,600,600italic|Lato:400,100,300,700|Roboto:400,300italic,300,700',
	);
	
	wp_enqueue_style( 'accesspresslite-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'accesspresslite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'accesspresslite-fancybox-css', get_template_directory_uri() . '/css/nivo-lightbox.css' );
	wp_enqueue_style( 'accesspresslite-bx-slider-style', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'accesspresslite-woo-commerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'accesspresslite-font-style', get_template_directory_uri() . '/css/fonts.css' );
	wp_enqueue_style( 'accesspresslite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'accesspresslite-keyboard', get_template_directory_uri() . '/css/keyboard.css' );
    if($layout_home == 'template_two' || $layout_home == ''){
        wp_enqueue_style('accesspresslite-templatetwo-style',get_template_directory_uri().'/css/template-two.css');

        $responsive_design   = isset( $accesspresslite_settings[ 'responsive_design' ] ) ? $accesspresslite_settings[ 'responsive_design' ] : '';
		if ( $responsive_design == 0 ) {	

            wp_enqueue_style('accesspresslite-templatetwo-responsive',get_template_directory_uri().'/css/responsive-template-two.css');
        }
    }
	wp_enqueue_script( 'accesspresslite-bx-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1', true );
    wp_enqueue_script( 'accesspresslite-stickey-sidebar-js', get_template_directory_uri() . '/js/sticky-sidebar/theia-sticky-sidebar.js');
	wp_enqueue_script( 'accesspresslite-fancybox-js', get_template_directory_uri() . '/js/nivo-lightbox.js', array('jquery'), '2.1', true );
	wp_enqueue_script( 'accesspresslite-jquery-actual-js', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'accesspresslite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_register_script( 'accesspresslite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery','accesspresslite-stickey-sidebar-js'), '1.1', true );

	$script_vals = array(
		'pager' 	=> $a,
		'controls' 	=> $b,
		'mode'		=> $c,
		'auto' 		=> $d,
		'pause' 	=> $e,
		'speed' 	=> $slider_speed


	);
	wp_localize_script('accesspresslite-custom','accesspresslite_loc_script',$script_vals );
	wp_enqueue_script('accesspresslite-custom');



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

/**
* Loads up responsive css if it is not disabled
*/	
	$responsive_design   = isset( $accesspresslite_settings[ 'responsive_design' ] ) ? $accesspresslite_settings[ 'responsive_design' ] : '';
	if ( $responsive_design == 0 ) {	
		wp_enqueue_style( 'accesspresslite-responsive', get_template_directory_uri() . '/css/responsive.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspresslite_scripts' );

function accesspresslite_social_cb(){ 
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	?>
	<div class="socials">
	<?php if(!empty($accesspresslite_settings['accesspresslite_facebook'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_facebook']); ?>" class="facebook" title="Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_twitter'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_twitter']); ?>" class="twitter" title="Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_gplus'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_gplus']); ?>" class="gplus" title="Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_youtube'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_youtube']); ?>" class="youtube" title="Youtube" target="_blank"><span class="font-icon-social-youtube"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_pinterest'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_pinterest']); ?>" class="pinterest" title="Pinterest" target="_blank"><span class="font-icon-social-pinterest"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_linkedin'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_linkedin']); ?>" class="linkedin" title="Linkedin" target="_blank"><span class="font-icon-social-linkedin"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_flickr'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_flickr']); ?>" class="flickr" title="Flickr" target="_blank"><span class="font-icon-social-flickr"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_vimeo'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_vimeo']); ?>" class="vimeo" title="Vimeo" target="_blank"><span class="font-icon-social-vimeo"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_stumbleupon'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_stumbleupon']); ?>" class="stumbleupon" title="Stumbleupon" target="_blank"><span class="font-icon-social-stumbleupon"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_instagram'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_instagram']); ?>" class="instagram" title="instagram" target="_blank"><span class="fa fa-instagram"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_sound_cloud'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_sound_cloud']); ?>" class="sound-cloud" title="sound-cloud" target="_blank"><span class="font-icon-social-soundcloud"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_skype'])){ ?>
	<a href="<?php echo esc_html("skype:").esc_attr($accesspresslite_settings['accesspresslite_skype']); ?>" class="skype" title="Skype"><span class="font-icon-social-skype"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_tumblr'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_tumblr']); ?>" class="tumblr" title="Tumblr"><span class="font-icon-social-tumblr"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_myspace'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_myspace']); ?>" class="myspace" title="Myspace"><span class="font-icon-social-myspace"></span></a>
	<?php } ?>

	<?php if(!empty($accesspresslite_settings['accesspresslite_rss'])){ ?>
	<a href="<?php echo esc_url($accesspresslite_settings['accesspresslite_rss']); ?>" class="rss" title="RSS" target="_blank"><span class="font-icon-rss"></span></a>
	<?php } ?>
	</div>
<?php } 

add_action( 'accesspresslite_social_links', 'accesspresslite_social_cb', 10 );	


function accesspresslite_header_text_cb(){
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	if(!empty($accesspresslite_settings['header_text'])){
	echo '<div class="header-text">'.wp_kses_post(wpautop($accesspresslite_settings['header_text'])).'</div>';
	}
}

add_action('accesspresslite_header_text','accesspresslite_header_text_cb', 10);

function accesspresslite_menu_alignment_cb(){
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	$menu_alignment            = isset( $accesspresslite_settings[ 'menu_alignment' ] ) ? $accesspresslite_settings[ 'menu_alignment' ] : '';
	if($menu_alignment =="Left"){
		$accesspresslite_alignment_class="menu-left";
	}elseif($menu_alignment == "Center"){
		$accesspresslite_alignment_class="menu-center";
	}elseif($menu_alignment == "Right"){
		$accesspresslite_alignment_class="menu-right";
	}else{
		$accesspresslite_alignment_class="";
	}
	echo esc_attr($accesspresslite_alignment_class);
}

add_action('accesspresslite_menu_alignment','accesspresslite_menu_alignment_cb', 10);


function accesspresslite_excerpt( $accesspresslite_content , $accesspresslite_letter_count ){
	$accesspresslite_striped_content = strip_shortcodes($accesspresslite_content);
	$accesspresslite_striped_content = strip_tags($accesspresslite_striped_content);
	$accesspresslite_excerpt = mb_substr($accesspresslite_striped_content, 0, $accesspresslite_letter_count );
	if(strlen($accesspresslite_striped_content) > strlen($accesspresslite_excerpt)){
		$accesspresslite_excerpt .= "...";
	}
	return $accesspresslite_excerpt;
}


function accesspresslite_bxslidercb(){
	global $accesspresslite_options, $post;
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	
	$show_slider            = isset( $accesspresslite_settings[ 'show_slider' ] ) ? $accesspresslite_settings[ 'show_slider' ] : '';

  

	if( $show_slider =='yes') { 

	if((isset($accesspresslite_settings['slider1']) && !empty($accesspresslite_settings['slider1'])) 
		|| (isset($accesspresslite_settings['slider2']) && !empty($accesspresslite_settings['slider2'])) 
		|| (isset($accesspresslite_settings['slider3']) && !empty($accesspresslite_settings['slider3']))
		|| (isset($accesspresslite_settings['slider4']) && !empty($accesspresslite_settings['slider4'])) 
		|| (isset($accesspresslite_settings['slider_cat']) && !empty($accesspresslite_settings['slider_cat']))
	){
		
    
	?>
		
    <?php 

        if($accesspresslite_settings['slider_options'] == 'single_post_slider'){
       
        	if(!empty($accesspresslite_settings['slider1']) || !empty($accesspresslite_settings['slider2']) || !empty($accesspresslite_settings['slider3']) || !empty($accesspresslite_settings['slider4'])){
        		$sliders = array($accesspresslite_settings['slider1'],$accesspresslite_settings['slider2'],$accesspresslite_settings['slider3'],$accesspresslite_settings['slider4']);
				$remove = array(0);
			    $sliders = array_diff($sliders, $remove); ?>

			    <div class="bx-slider">
			    <?php 
			    foreach ($sliders as $slider){
			    	if($slider != ''):
						$args = array (
						'p' => $slider
						);

						$loop = new WP_query( $args );
						if($loop->have_posts()){ 
						while($loop->have_posts()) : $loop-> the_post(); 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
						?>
						<div class="slides">
							
								<img alt="<?php the_title(); ?>" src="<?php echo esc_url($image[0]); ?>">
								
								<?php 
								$slider_caption   = isset( $accesspresslite_settings[ 'slider_caption' ] ) ? $accesspresslite_settings[ 'slider_caption' ] : '';

								if($slider_caption == 1):?>
								<div class="slider-caption">
									<div class="ak-container">
										<div class="caption-title"><?php the_title();?></div>
										<div class="caption-description"><?php the_content();?></div>
									</div>
								</div>
								<?php  endif; ?>
				
			            </div>
						<?php endwhile;
						}
					endif;
				} ?>
			    </div>
                <?php if($home_template == 'template_two' || $home_template == ''){ ?>
                <span id="slider-prev"></span><span id="slider-next"></span>
                <?php } ?>
        	<?php
        	}

        }elseif ($accesspresslite_settings['slider_options'] == 'cat_post_slider') { 
        	
        	?>
        	<div class="bx-slider">
			<?php
			$loop = new WP_Query(array(
					'cat' => $accesspresslite_settings['slider_cat'],
					'posts_per_page' => -1
				));
				if($loop->have_posts()){ 
				while($loop->have_posts()) : $loop-> the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
				?>
				<div class="slides">
						
					<img alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url($image[0]); ?>">
							
					<?php 
					$slider_caption   = isset( $accesspresslite_settings[ 'slider_caption' ] ) ? $accesspresslite_settings[ 'slider_caption' ] : '';
					if($slider_caption == 1):?>
					<div class="slider-caption">
						<div class="ak-container">
							<div class="caption-title"><?php the_title();?></div>
							<div class="caption-description"><?php the_content();?></div>
						</div>
					</div>
					<?php  endif; ?>
			
		            </div>
					<?php endwhile;
					} ?>
			</div>
            <span id="slider-prev"></span><span id="slider-next"></span>
        <?php
    	}
    	}
}
}

add_action('accesspresslite_bxslider','accesspresslite_bxslidercb', 10);

function accesspresslite_layout_class($classes){
	global $post;
		if( is_404()){
	$classes[] = ' ';
	}elseif(is_singular()){
	$post_class = get_post_meta( $post -> ID, 'accesspresslite_sidebar_layout', true );
	$classes[] = $post_class;
	}else{
	$classes[] = 'right-sidebar';	
	}
	return $classes;
}

add_filter( 'body_class', 'accesspresslite_layout_class' );

function accesspresslite_web_layout($classes){
global $accesspresslite_options, $post;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
//$weblayout = $accesspresslite_settings['accesspresslite_webpage_layout'];
$weblayout      = isset( $accesspresslite_settings[ 'accesspresslite_webpage_layout' ] ) ? $accesspresslite_settings[ 'accesspresslite_webpage_layout' ] : '';
if($weblayout =='Boxed'){
    $classes[]= 'boxed-layout';
}
return $classes;
}

add_filter( 'body_class', 'accesspresslite_web_layout' );

function accesspresslite_call_to_action_cb()
{
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	$home_template            = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : 'template_one';
    //$home_template = $accesspresslite_settings['accesspresslite_home_template'];
    
	if(!empty($accesspresslite_settings['action_text']))
    { ?>
    	<section id="call-to-action">
    	<div class="ak-container">
    		<h4><?php echo esc_html($accesspresslite_settings['action_text']); ?></h4>
    		<a class="action-btn" href="<?php echo esc_url($accesspresslite_settings['action_btn_link']); ?>"><?php echo esc_html($accesspresslite_settings['action_btn_text']); ?></a>
    	</div>
    	</section>
<?php }
}

add_action('accesspresslite_call_to_action','accesspresslite_call_to_action_cb', 10);

function accesspresslite_exclude_cat_from_blog($query) {
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );

	$event_cat  	  = isset( $accesspresslite_settings[ 'event_cat' ] ) ? $accesspresslite_settings[ 'event_cat' ] : '';
	$testimonial_cat  = isset( $accesspresslite_settings[ 'testimonial_cat' ] ) ? $accesspresslite_settings[ 'testimonial_cat' ] : '';
	$slider_cat  = isset( $accesspresslite_settings[ 'slider_cat' ] ) ? $accesspresslite_settings[ 'slider_cat' ] : '';
	$portfolio_cat  = isset( $accesspresslite_settings[ 'portfolio_cat' ] ) ? $accesspresslite_settings[ 'portfolio_cat' ] : '';

	$accesspresslite_exclude_cat = array($event_cat,$testimonial_cat, $slider_cat, $portfolio_cat);


	if(!empty($accesspresslite_exclude_cat)):
	$cats = array();
	foreach($accesspresslite_exclude_cat as $value){
	    if(!empty($value) && $value != 0){
	        $cats[] = -$value; 
	    }
	}
	if(!empty($cats)){
	    $category = join( "," , $cats);
	    if ( $query->is_home() ) {
	    $query->set('cat', $category);
	    }
	}
	return $query;
	endif;
}

add_filter('pre_get_posts', 'accesspresslite_exclude_cat_from_blog');


function accesspress_default_setting_value(){
	
	$accesspresslite_options = array(
		'responsive_design'=>'',
		'accesspresslite_favicon'=> '',
		'header_text'=>'',
		'show_search'=> true,
		'menu_alignment'=> 'Left',
		'welcome_post' => '',
		'welcome_post_readmore' => __('Read More','accesspress-lite'),
		'welcome_post_char' => '650',
		'show_fontawesome' => false,
	    'big_icons' => false,
	    'featured_section_title' => __('Feature Posts','accesspress-lite'),
		'featured_post1' => '',
		'featured_post2' => '',
		'featured_post3' => '',
		'featured_post_readmore' => __('Read More','accesspress-lite'),
		'featured_post1_icon' => '',
		'featured_post2_icon' => '',
		'featured_post3_icon' => '',
		'show_event_number' => '3',
		'event_cat' => '',
		'testimonial_cat' => '',
		'portfolio_cat' => '',
		'footer_copyright' => get_bloginfo('name'),

		'show_slider' => 'yes',
		'slider_show_pager' => 'yes1',
		'slider_show_controls' => 'yes2',
		'slider_mode' => 'slide',
		'slider_auto' => 'yes3',
		'slider_speed' => '500',
		'slider_caption'=> true,
		'slider_pause' => '4000',

		'slider1'=>'',
		'slider2'=>'',
		'slider3'=>'',
		'slider4'=>'',

		'leftsidebar_show_latest_events'=>true,
		'leftsidebar_show_testimonials'=>true,
		'rightsidebar_show_latest_events'=>true,
		'rightsidebar_show_testimonials'=>true,
		
		'accesspresslite_facebook' => '',
		'accesspresslite_twitter' => '',
		'accesspresslite_gplus' => '',
		'accesspresslite_youtube' => '',
		'accesspresslite_pinterest' => '',
		'accesspresslite_linkedin' => '',
		'accesspresslite_flickr' => '',
		'accesspresslite_vimeo' => '',
		'accesspresslite_stumbleupon' => '',
		'accesspresslite_instagram' => '',
		'accesspresslite_sound_cloud' => '',
		'accesspresslite_skype' => '',
		'accesspresslite_rss' => '',
		'accesspresslite_tumblr' => '',
		'accesspresslite_myspace' =>'',
		'show_social_header'=>'',

		'accesspresslite_home_page_layout' => 'Default',
	    'accesspresslite_webpage_layout' => 'Fullwidth',
	    'template_color' => '#04A3ED',
	    'gallery_code' => '',

	    'slider_options' => 'single_post_slider',
	    'slider_cat' => '',
	    'view_all_text' =>__('View All','accesspress-lite'),
	    'custom_css' => '',
	    'featured_bar' => false,

	    'action_text' => '',
	    'action_btn_text' => '',
	    'action_btn_link' => '',
	    'welcome_post_content' => false,
	    'show_eventdate' => true,
	    'disable_event' => true,
	    'accesspresslite_home_template' => 'template_one',
	    //'template_option_selected' =>'yes'
	);

	return $accesspresslite_options;
}