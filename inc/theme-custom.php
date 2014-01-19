<?php
function bs_slider_js_starter(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if('none' != $bs_options['slider_status']){
        $bs_options["slider_autoplay"] = ( isset( $bs_options["slider_autoplay"]) ) ? $bs_options["slider_autoplay"] : 0;
        ?>
        <script type="text/javascript">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            if(jQuery().nivoSlider) {
                $('#bs-main-slider').nivoSlider({
                    directionNav: <?php echo ($bs_options["direction_nav"])  ; ?>,
                    manualAdvance: '<?php echo !($bs_options["slider_autoplay"])  ; ?>',
                    effect: '<?php echo $bs_options["transition_effect"];?>',
                    pauseTime: <?php echo ($bs_options["transition_delay"]) * 1000 ; ?>,
                    animSpeed: <?php echo ($bs_options["transition_length"]) * 1000 ; ?>
                });
            }
        });
        /* ]]> */
        </script>
        <?php
    }
    //secondary slider
    if('none' != $bs_options['slider_status_2']){
        ?>
        <script type="text/javascript">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            if(jQuery().nivoSlider) {
                $('#bs-secondary-slider').nivoSlider({
                    controlNav: <?php echo ($bs_options["control_nav_2"])  ; ?>,
                    directionNav: <?php echo ($bs_options["direction_nav_2"])  ; ?>,
                    manualAdvance: '<?php echo !($bs_options["slider_autoplay_2"])  ; ?>',
                    effect: '<?php echo $bs_options["transition_effect_2"];?>',
                    pauseTime: <?php echo ($bs_options["transition_delay_2"]) * 1000 ; ?>,
                    animSpeed: <?php echo ($bs_options["transition_length_2"]) * 1000 ; ?>
                });
            }
        });
        /* ]]> */
        </script>
        <?php
    }
}
add_action('wp_footer', 'bs_slider_js_starter',100);

/**
* Layout Setup
*/

function bs_layout_setup_class(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    $default_layout =  $bs_options['default_layout'];
    if('right-sidebar' == $default_layout){
        $class = ' pull-left ';
    }
    else{
        $class = ' pull-right ';
    }
    return $class;
}

/**
* Add script to footer
*/

function bs_add_scripts_footer(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    // Javascript in Footer
    if( !empty( $bs_options['javascript_footer']  ) ){
        ?>
        <script type='text/javascript'>
        /* <![CDATA[ */
        <?php echo $bs_options['javascript_footer'];?>
         /* ]]> */
        </script>
        <?php
    }
    // Tracking Code
    if( !empty( $bs_options['tracking_code']  ) ){
        echo $bs_options['tracking_code'];
    }
}

add_action('wp_footer', 'bs_add_scripts_footer',100);


/**
* Add script to Header
*/

function bs_add_scripts_header(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if( !empty( $bs_options['javascript_header']  ) ){
        ?>
        <script type='text/javascript'>
        /* <![CDATA[ */
        <?php echo $bs_options['javascript_header'];?>
         /* ]]> */
        </script>
        <?php
    }
}
add_action('wp_head', 'bs_add_scripts_header',100);
////
//Changing Read More text
function bs_excerpt_readmore($more) {
    global $post;
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    return '... <a href="'. get_permalink($post->ID) . '" class="readmore">' .$bs_options['read_more_text']  . '</a>';

}

add_filter('excerpt_more', 'bs_excerpt_readmore');
////
//Changing excerpt length
function bs_custom_excerpt_length( $length ){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    return $bs_options['excerpt_length'];
}
add_filter( 'excerpt_length', 'bs_custom_excerpt_length', 999 );

//
//
function bs_add_secondary_slider_function(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if('none' != $bs_options['slider_status_2'] &&  is_home() ) {
        $slider_category_2 = $bs_options['slider_category_2'];
        $number_of_slides_2 = $bs_options['number_of_slides_2'];
        $args = array(
            'cat' => $slider_category_2,
            'posts_per_page' => $number_of_slides_2,
            );
        $secondary_slider_query = new WP_Query( $args );
        if ( $secondary_slider_query->have_posts() ){
            ?>
             <div class="secondary-slider-wrapper theme-default">
                        <div class="ribbon"></div>
                        <div id="bs-secondary-slider" class="nivoSlider">
                            <?php
                                $slide_count = 0;
                                $slide_data = array();
                            ?>
                            <?php while ( $secondary_slider_query->have_posts() ) : $secondary_slider_query -> the_post();?>
                                <?php
                                if ( '' != get_the_post_thumbnail() ){
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                    $slide_data[$slide_count]['url'] = $thumb['0'];
                                }
                                $slide_data[$slide_count]['ID']        =  get_the_ID() ;
                                $slide_data[$slide_count]['permalink'] = get_permalink(get_the_ID());
                                $slide_data[$slide_count]['title']     = get_the_title();
                                $slide_data[$slide_count]['excerpt']   = get_the_excerpt();
                                ?>
                             <?php $slide_count++; ?>
                            <?php endwhile; ?>
                            <?php foreach ($slide_data as $slide) { ?>
                                <a href="<?php the_permalink(); ?>">
                                 <?php
                                 echo '<img src="'.$slide['url'].'" alt="'.$slide['title'].'" ';
                                 if($bs_options['slider_caption_2'] == 1){
                                    echo ' title="#htmlcaption-'.$slide['ID'].'" ';
                                 }
                                 echo '/>';
                                 ?>
                                </a>
                            <?php }//endforeach ?>
                        </div>
                     <?php unset($slide); ?>
                     <?php foreach ($slide_data as $slide) { ?>
                     <div id="<?php echo 'htmlcaption-'.$slide['ID']; ?>" class="nivo-html-caption">
                        <h4><?php echo $slide['title']; ?></h4>
                        <?php echo $slide['excerpt']; ?>

                    </div>
                     <?php }//endforeach ?>
                 </div>

            <?php

        }//end if post is there

        wp_reset_postdata();


    }//end if is_home()


}
add_action('bluesky_after_main_open','bs_add_secondary_slider_function');
/////
/*
* Add custom CSS
*/

function bs_custom_css(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    if(empty($bs_options['custom_css'])){
        return;
    }
    $output = '<style type="text/css" media="screen">' . "\n";
    $output .= $bs_options['custom_css'];
    $output .= '</style>';
    echo $output;
}
add_action( 'wp_head', 'bs_custom_css' );



/**
 * Redirect WordPress Feeds To FeedBurner
 */
function bs_rss_redirect() {
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;


    if (isset($bs_options['feed_url']) && '' != $bs_options['feed_url']) {
        $url = 'Location: '.$bs_options['feed_url'];
        if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT']))
        {
            header($url);
            header('HTTP/1.1 302 Temporary Redirect');
        }
    }
}
add_action('template_redirect', 'bs_rss_redirect');

//
function bs_copyright_text_content(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    if( empty( $bs_options['copyright_text'])  ){
        return;
    }
    echo '<div class="copyright">'.$bs_options['copyright_text'].'</div>';
}
add_action('bluesky_credits', 'bs_copyright_text_content');

//////
function bs_footer_powered_by(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    if( isset( $bs_options['flg_hide_powered_by']  ) && $bs_options['flg_hide_powered_by'] != 1 ){ ?>
        <div class="footer-powered-by">
            <a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'blue-sky' ), 'WordPress' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( __( 'Theme: %1$s by %2$s.', 'blue-sky' ), '<a href="http://wordpress.org/themes/blue-sky">Blue Sky</a>', '<a href="http://nilambar.net" rel="designer">Nilambar Sharma</a>' ); ?>
        </div>

    <?php } //end if
    return;
}
add_action('bluesky_credits', 'bs_footer_powered_by');

function bs_add_main_slider(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if( ('all' == $bs_options['slider_status']) || 'home' == $bs_options['slider_status']  && is_home() ) {

        $main_slider_image = $bs_options['main_slider_image'];
        if ( !empty($main_slider_image) ){ ?>
        <div class="main-slider-wrapper">
                    <div class="slider-wrapper theme-default">
                        <div class="ribbon"></div>
                        <div id="bs-main-slider" class="nivoSlider">
                            <?php for($i=0 ; $i < 5; $i++ ) : ?>
                                <?php if( empty( $main_slider_image[$i] ) ) continue; ?>

                                <?php if( !empty( $bs_options['main_slider_url'][$i] ) ) : ?>
                                    <?php echo '<a href="'.$bs_options['main_slider_url'][$i]
                                        .'" '.(  (1 == $bs_options['main_slider_new_tab'][$i] ) ? ' target="_blank" ' : '' ).' >'; ?>
                                <?php endif; ?>


                                <?php echo '<img src="'.$main_slider_image[$i].'" '; ?>
                                <?php if( !empty( $bs_options['main_slider_caption'][$i] ) ) : ?>
                                    <?php echo ' title="'. $bs_options['main_slider_caption'][$i] .'" ';  ?>
                                <?php endif; ?>
                                <?php echo '/>'; ?>

                                <?php if( !empty( $bs_options['main_slider_url'][$i] )  ) : ?>
                                    <?php echo '</a>'; ?>
                                <?php endif; ?>

                            <?php endfor; //end for loop ?>
                        </div>
                    </div>
                </div>

        <?php } //end if not empty
    } //end main if
}
add_action('bluesky_after_content_open','bs_add_main_slider');

//footer widgets


function bs_footer_widgets(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;


    if( 1 == $bs_options['flg_enable_footer_widgets'] ){
        echo '<div class="footer-widgets-wrapper">';
        $num_footer = $bs_options['number_of_footer_widgets'];

        $grid = 12/$num_footer;
        for($i = 1 ; $i <= $num_footer; $i++){
            echo '<div class="footer-widget-area col-md-'.$grid.'">';
            ?>
                <?php
                if ( is_active_sidebar( "footer-area-$i" ) ) :
                    dynamic_sidebar( "footer-area-$i" );
                endif;
                ?>
            <?php
            echo '</div>';
        }
        echo '</div>';
    }

}
add_action('bluesky_after_content_close','bs_footer_widgets');

///header masthead
function bs_header_searchbox(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if($bs_options['flg_hide_search_box'] != 1) {
        echo '<div class="search-box-wrapper">';
        get_search_form();
        echo '</div>';
    }
}
add_action('bluesky_before_masthead_close','bs_header_searchbox');

//header social icons
function bs_header_social(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if($bs_options['flg_hide_social_icons'] != 1) {
        bs_generate_social_links();
    }
}
add_action('bluesky_after_container_open','bs_header_social');

//footer social icons
function bs_footer_social(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    if($bs_options['flg_hide_footer_social_icons'] != 1) {
        bs_generate_social_links();
    }
}

add_action('bluesky_before_page_close','bs_footer_social');

function bs_generate_social_links(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    echo '<div class="social-wrapper">';

    if('' != $bs_options['social_email']){
        echo '<a class="social-email" href="mailto:'.esc_attr($bs_options['social_email']).'"></a>';
    }

    $social_sites = array('facebook','twitter','googleplus','youtube','pinterest','linkedin','flickr','tumblr','dribbble','deviantart','rss','instagram','skype','digg','stumbleupon','forrst','500px','vimeo');
    $social_sites =  array_reverse($social_sites);

    foreach ($social_sites as $key => $site) {
        if('' != $bs_options["social_$site"]){
            echo '<a class="social-'.$site.'" href="'.esc_url($bs_options["social_$site"]).'"></a>';
        }
    }
    echo '</div>';

}

////
function bs_goto_top()
{
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    if ($bs_options['flg_enable_goto_top']) {

        wp_enqueue_style('blue-sky-goto-top-style',
            get_stylesheet_directory_uri(). '/thirdparty/goto-top/goto-top.css' );

        echo '<a href="#" class="scrollup">Scroll</a>';

        wp_enqueue_script('blue-sky-goto-top-script',
            get_stylesheet_directory_uri().'/thirdparty/goto-top/goto-top.js',
                array('jquery'));
    }
}
add_action('bluesky_before_container_close','bs_goto_top');

function bs_header_content_stuff(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
?>
    <?php $header_image = get_header_image();
            if ( ! empty( $header_image ) ) { ?>
                <div class="header-image-wrapper">

                        <img id="bs-header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
                    <div class="site-branding">
                        <?php  if( !empty( $bs_options['custom_logo']  ) ) :?>
                            <div class="site-logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <img src="<?php echo $bs_options['custom_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            </div>
                        <?php  else: ?>
                            <div class="site-info">
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                            </div>
                        <?php  endif;?>
                    </div>
                </div>
    <?php } // if ( ! empty( $header_image ) )
    else{
        //if no header image
        ?>
            <div class="only-site-branding">
                <div class="site-branding">
                    <?php  if( !empty( $bs_options['custom_logo']  ) ) :?>
                        <div class="site-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php echo $bs_options['custom_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    <?php  else: ?>
                        <div class="site-info">
                            <h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                            </h1>
                            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </div>
                    <?php  endif;?>
                </div>
            </div>  <!-- .only-site-branding -->
        <?php
    }
    ?>

<?php
}
add_action('bluesky_after_masthead_open','bs_header_content_stuff');

function bs_header_style_custom(){
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    echo '<style type="text/css">';
    echo 'header#masthead{background-color: '.$bs_options['banner_background_color'].';}';
    echo '</style>';

}
add_action('wp_head','bs_header_style_custom');

//
function bs_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'bs_add_editor_styles' );
