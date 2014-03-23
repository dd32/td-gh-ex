<?php
if ( ! function_exists( 'blue_planet_slider_js_starter' ) ) :
    function blue_planet_slider_js_starter(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if('none' != $bp_options['slider_status']){
            $bp_options["slider_autoplay"] = ( isset( $bp_options["slider_autoplay"]) ) ? $bp_options["slider_autoplay"] : 0;
            ?>
            <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(document).ready(function($){
                if(jQuery().nivoSlider) {
                    $('#bp-main-slider').nivoSlider({
                        directionNav: <?php echo esc_attr($bp_options["direction_nav"])  ; ?>,
                        manualAdvance: '<?php echo !($bp_options["slider_autoplay"])  ; ?>',
                        effect: '<?php echo esc_attr($bp_options["transition_effect"]);?>',
                        pauseTime: <?php echo (esc_attr($bp_options["transition_delay"]) ) * 1000 ; ?>,
                        animSpeed: <?php echo ( esc_attr( $bp_options["transition_length"]) )* 1000 ; ?>
                    });
                }
            });
            /* ]]> */
            </script>
            <?php
        }
        //secondary slider
        if('none' != $bp_options['slider_status_2']){
            ?>
            <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(document).ready(function($){
                if(jQuery().nivoSlider) {
                    $('#bp-secondary-slider').nivoSlider({
                        controlNav: <?php echo esc_attr($bp_options["control_nav_2"])  ; ?>,
                        directionNav: <?php echo esc_attr($bp_options["direction_nav_2"])  ; ?>,
                        manualAdvance: '<?php echo !($bp_options["slider_autoplay_2"])  ; ?>',
                        effect: '<?php echo esc_attr( $bp_options["transition_effect_2"] );?>',
                        pauseTime: <?php echo ( esc_attr( $bp_options["transition_delay_2"]) )* 1000 ; ?>,
                        animSpeed: <?php echo ( esc_attr( $bp_options["transition_length_2"]) )* 1000 ; ?>
                    });
                }
            });
            /* ]]> */
            </script>
            <?php
        }
    }
endif; // blue_planet_slider_js_starter
add_action('wp_footer', 'blue_planet_slider_js_starter',100);

if ( ! function_exists( 'blue_planet_layout_setup_class' ) ) :
    // Layout Setup
    function blue_planet_layout_setup_class(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        $default_layout =  $bp_options['default_layout'];
        if('right-sidebar' == $default_layout){
            $class = ' pull-left ';
        }
        else{
            $class = ' pull-right ';
        }
        return $class;
    }
endif; // blue_planet_layout_setup_class

if ( ! function_exists( 'blue_planet_add_scripts_footer' ) ) :
    // Add script to footer
    function blue_planet_add_scripts_footer(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( !empty( $bp_options['javascript_footer']  ) ){
            ?>
            <script type='text/javascript'>
            /* <![CDATA[ */
            <?php echo esc_js( $bp_options['javascript_footer'] ) ;?>
             /* ]]> */
            </script>
            <?php
        }
    }
endif; // blue_planet_add_scripts_footer

add_action('wp_footer', 'blue_planet_add_scripts_footer',100);

if ( ! function_exists( 'blue_planet_add_scripts_header' ) ) :
    // Add script to Header
    function blue_planet_add_scripts_header(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( !empty( $bp_options['javascript_header']  ) ){
            ?>
            <script type='text/javascript'>
            /* <![CDATA[ */
            <?php echo esc_js( $bp_options['javascript_header'] ) ;?>
             /* ]]> */
            </script>
            <?php
        }
    }
endif; // blue_planet_add_scripts_header
add_action('wp_head', 'blue_planet_add_scripts_header',100);

if ( ! function_exists( 'blue_planet_excerpt_readmore' ) ) :
    //Changing Read More text
    function blue_planet_excerpt_readmore($more) {
        global $post;
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        $output = '... <a href="'. esc_url( get_permalink($post->ID) ) . '" class="readmore">' . esc_attr( $bp_options['read_more_text'] )  . '</a>';
        $output = apply_filters( 'blue_planet_filter_read_more_content' , $output );
        return $output;
    }
endif; // blue_planet_excerpt_readmore
add_filter('excerpt_more', 'blue_planet_excerpt_readmore');


if ( ! function_exists( 'blue_planet_custom_excerpt_length' ) ) :
    // Changing excerpt length
    function blue_planet_custom_excerpt_length( $length ){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        return apply_filters( 'blue_planet_filter_excerpt_length', esc_attr( $bp_options['excerpt_length'] ) );
    }
endif; // blue_planet_custom_excerpt_length
add_filter( 'excerpt_length', 'blue_planet_custom_excerpt_length', 999 );

if ( ! function_exists( 'blue_planet_add_secondary_slider_function' ) ) :
    // Secondary slider
    function blue_planet_add_secondary_slider_function(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if('none' != $bp_options['slider_status_2'] &&  ( is_home() || is_front_page() ) ) {
            $slider_category_2 = esc_attr( $bp_options['slider_category_2'] );
            $number_of_slides_2 = esc_attr( $bp_options['number_of_slides_2'] );
            $args = array(
                'cat' => $slider_category_2,
                'posts_per_page' => $number_of_slides_2,
                );
            $secondary_slider_query = new WP_Query( $args );
            if ( $secondary_slider_query->have_posts() ){
                ?>
                 <div class="secondary-slider-wrapper theme-default">
                            <div class="ribbon"></div>
                            <div id="bp-secondary-slider" class="nivoSlider">
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
                                     if($bp_options['slider_caption_2'] == 1){
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
endif; // blue_planet_add_secondary_slider_function
add_action('blue_planet_after_main_open','blue_planet_add_secondary_slider_function');
/////

/*
* Add custom CSS
*/
if ( ! function_exists( 'blue_planet_custom_css' ) ) :
    function blue_planet_custom_css(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        if(empty($bp_options['custom_css'])){
            return;
        }
        $output = '<style type="text/css" media="screen">' . "\n";
        $output .= esc_textarea( $bp_options['custom_css'] ) ;
        $output .= '</style>';
        echo $output;
    }
endif; // blue_planet_custom_css
add_action( 'wp_head', 'blue_planet_custom_css' );



/**
 * Redirect WordPress Feeds To FeedBurner
 */
if ( ! function_exists( 'blue_planet_rss_redirect' ) ) :
    function blue_planet_rss_redirect() {
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;


        if (isset($bp_options['feed_url']) && '' != $bp_options['feed_url']) {
            $url = 'Location: '.esc_url( $bp_options['feed_url'] ) ;
            if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT']))
            {
                header($url);
                header('HTTP/1.1 302 Temporary Redirect');
            }
        }
    }
endif; // blue_planet_rss_redirect

add_action('template_redirect', 'blue_planet_rss_redirect');


if ( ! function_exists( 'blue_planet_copyright_text_content' ) ) :
    // Copyright text in footer
    function blue_planet_copyright_text_content(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        if( empty( $bp_options['copyright_text'])  ){
            return;
        }
        echo '<div class="copyright">' . apply_filters( 'blue_planet_filter_copyright_text_content', esc_html( $bp_options['copyright_text'] ) ) . '</div>';
    }
endif; // blue_planet_copyright_text_content

add_action('blue_planet_credits', 'blue_planet_copyright_text_content');


if ( ! function_exists( 'blue_planet_footer_powered_by' ) ) :
    // Powered by content in footer
    function blue_planet_footer_powered_by(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        if( isset( $bp_options['flg_hide_powered_by']  ) && 1 != $bp_options['flg_hide_powered_by'] ){ ?>
            <div class="footer-powered-by">
                <a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'blue-planet' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( __( 'Theme: %1$s by %2$s.', 'blue-planet' ), '<a href="http://wordpress.org/themes/blue-planet">Blue Planet</a>', '<a href="http://nilambar.net" rel="designer">Nilambar Sharma</a>' ); ?>
            </div>

        <?php } //end if
        return;
    }
endif; // blue_planet_footer_powered_by
add_action('blue_planet_credits', 'blue_planet_footer_powered_by');

// Main slider
if ( ! function_exists( 'blue_planet_add_main_slider' ) ) :
    function blue_planet_add_main_slider(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( ('all' == $bp_options['slider_status']) ||  ( 'home' == $bp_options['slider_status']  && is_front_page() ) ) {

            $main_slider_image = $bp_options['main_slider_image'];
            if ( !empty($main_slider_image) ){ ?>
            <div class="main-slider-wrapper">
                        <div class="slider-wrapper theme-default">
                            <div class="ribbon"></div>
                            <div id="bp-main-slider" class="nivoSlider">
                                <?php for($i=0 ; $i < 5; $i++ ) : ?>
                                    <?php if( empty( $main_slider_image[$i] ) ) continue; ?>

                                    <?php if( !empty( $bp_options['main_slider_url'][$i] ) ) : ?>
                                        <?php echo '<a href="'.esc_url($bp_options['main_slider_url'][$i])
                                            .'" '.(  (1 == $bp_options['main_slider_new_tab'][$i] ) ? ' target="_blank" ' : '' ).' >'; ?>
                                    <?php endif; ?>


                                    <?php echo '<img src="'.esc_url($main_slider_image[$i]).'" '; ?>
                                    <?php if( !empty( $bp_options['main_slider_caption'][$i] ) ) : ?>
                                        <?php echo ' title="'. esc_attr($bp_options['main_slider_caption'][$i]) .'" ';  ?>
                                    <?php endif; ?>
                                    <?php echo '/>'; ?>

                                    <?php if( !empty( $bp_options['main_slider_url'][$i] )  ) : ?>
                                        <?php echo '</a>'; ?>
                                    <?php endif; ?>

                                <?php endfor; //end for loop ?>
                            </div>
                        </div>
                    </div>

            <?php } //end if not empty
        } //end main if
    }
endif; // blue_planet_add_main_slider
add_action('blue_planet_after_content_open','blue_planet_add_main_slider');


if ( ! function_exists( 'blue_planet_footer_widgets' ) ) :
    // footer widgets
    function blue_planet_footer_widgets(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;


        if( 1 == $bp_options['flg_enable_footer_widgets'] ){
            echo '<div class="footer-widgets-wrapper">';
            $num_footer = $bp_options['number_of_footer_widgets'];

            $grid = 12 / $num_footer;
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
endif; // blue_planet_footer_widgets
add_action('blue_planet_after_content_close','blue_planet_footer_widgets');

if ( ! function_exists( 'blue_planet_header_searchbox' ) ) :
    // header masthead
    function blue_planet_header_searchbox(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( 1 != $bp_options['flg_hide_search_box'] ) {
            echo '<div class="search-box-wrapper">';
            get_search_form();
            echo '</div>';
        }
    }
endif; // blue_planet_header_searchbox
add_action('blue_planet_before_masthead_close','blue_planet_header_searchbox');


if ( ! function_exists( 'blue_planet_header_social' ) ) :
    // header social icons
    function blue_planet_header_social(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( 1 != $bp_options['flg_hide_social_icons'] ) {
            blue_planet_generate_social_links();
        }
    }
endif; // blue_planet_header_social
add_action('blue_planet_after_container_open','blue_planet_header_social');

if ( ! function_exists( 'blue_planet_footer_social' ) ) :
    // footer social icons
    function blue_planet_footer_social(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        if( 1 != $bp_options['flg_hide_footer_social_icons'] ) {
            blue_planet_generate_social_links();
        }
    }
endif; // blue_planet_footer_social

add_action('blue_planet_before_page_close','blue_planet_footer_social');

if ( ! function_exists( 'blue_planet_generate_social_links' ) ) :
    function blue_planet_generate_social_links(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;

        echo '<div class="social-wrapper">';

        if('' != $bp_options['social_email']){
            echo '<a class="social-email" href="mailto:'.esc_attr($bp_options['social_email']).'"></a>';
        }

        $social_sites = array(
                'facebook'    =>    'facebook',
                'twitter'     =>    'twitter',
                'googleplus'  =>    'googleplus',
                'youtube'     =>    'youtube',
                'pinterest'   =>    'pinterest',
                'linkedin'    =>    'linkedin',
                'flickr'      =>    'flickr',
                'tumblr'      =>    'tumblr',
                'dribbble'    =>    'dribbble',
                'deviantart'  =>    'deviantart',
                'rss'         =>    'rss',
                'instagram'   =>    'instagram',
                'skype'       =>    'skype',
                'digg'        =>    'digg',
                'stumbleupon' =>    'stumbleupon',
                'forrst'      =>    'forrst',
                '500px'       =>    '500px',
                'vimeo'       =>    'vimeo',
            );
        $social_sites = apply_filters( 'blue_planet_filter_social_sites', $social_sites );
        $social_sites =  array_reverse($social_sites);

        foreach ($social_sites as $key => $site) {
            if('' != $bp_options["social_$site"]){
                if ('skype' == $site ) {
                    echo '<a class="social-'.$site.'" href="skype:'.esc_attr($bp_options["social_$site"]).'?call"></a>';
                }
                else{
                    echo '<a class="social-'.$site.'" href="'.esc_url($bp_options["social_$site"]).'"></a>';
                }
            }
        }
        echo '</div>';
    }
endif; // blue_planet_generate_social_links

////
if ( ! function_exists( 'blue_planet_goto_top' ) ) :
    function blue_planet_goto_top()
    {
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        if ($bp_options['flg_enable_goto_top']) {

            wp_enqueue_style('blue-planet-goto-top-style',
                get_template_directory_uri(). '/thirdparty/goto-top/goto-top.css' );

            echo '<a href="#" class="scrollup">'. __('Scroll', 'blue-planet') . '</a>';

            wp_enqueue_script('blue-planet-goto-top-script',
                get_template_directory_uri().'/thirdparty/goto-top/goto-top.js',
                    array('jquery'));
        }
    }
endif; // blue_planet_goto_top
add_action('blue_planet_before_container_close','blue_planet_goto_top');

if ( ! function_exists( 'blue_planet_header_content_stuff' ) ) :
    function blue_planet_header_content_stuff(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
    ?>
        <?php $header_image = get_header_image();
                if ( ! empty( $header_image ) ) { ?>
                    <div class="header-image-wrapper">

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="bs-header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                            <div class="site-branding">
                                <div class="site-info">
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    </h1>
                                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </div>
                            </div>
                    </div>
        <?php } // if ( ! empty( $header_image ) )
        else{
            //if no header image
            ?>
            <div class="only-site-branding">
                <div class="site-branding">
                    <div class="site-info">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                </div>
            </div>  <!-- .only-site-branding -->
            <?php
        }
        ?>

    <?php
    }
endif; // blue_planet_header_content_stuff
add_action('blue_planet_after_masthead_open','blue_planet_header_content_stuff');

if ( ! function_exists( 'blue_planet_header_style_custom' ) ) :
    function blue_planet_header_style_custom(){
        global $blueplanet_options_settings;
        $bp_options = $blueplanet_options_settings;
        echo '<style type="text/css">';
        echo 'header#masthead{background-color: '.esc_attr($bp_options['banner_background_color']).';}';
        echo '</style>';

    }
endif; // blue_planet_header_style_custom
add_action('wp_head','blue_planet_header_style_custom');

//
if ( ! function_exists( 'blue_planet_add_editor_styles' ) ) :
    function blue_planet_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif; // blue_planet_add_editor_styles
add_action( 'init', 'blue_planet_add_editor_styles' );
