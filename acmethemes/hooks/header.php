<?php
if ( ! function_exists( 'acmeblog_set_global' ) ) :
    /**
     * Doctype Declaration
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_set_global() {
        /*Getting saved values start*/
        $acmeblog_default_theme_options = acmeblog_get_default_theme_options();
        $acmeblog_saved_theme_options = acmeblog_get_theme_options();
        $GLOBALS['acmeblog_customizer_all_values'] = array_merge($acmeblog_default_theme_options, $acmeblog_saved_theme_options );
        /*Getting saved values end*/
    }
endif;
add_action( 'acmeblog_action_before_head', 'acmeblog_set_global', 0 );

if ( ! function_exists( 'acmeblog_doctype' ) ) :
    /**
     * Doctype Declaration
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'acmeblog_action_before_head', 'acmeblog_doctype', 10 );

if ( ! function_exists( 'acmeblog_before_wp_head' ) ) :
    /**
     * Before wp head codes
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_before_wp_head() {
        global $acmeblog_customizer_all_values;
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'acmeblog_action_before_wp_head', 'acmeblog_before_wp_head', 10 );

if( ! function_exists( 'acmeblog_wp_head' ) ) :

    /**
     * acmeblog_wp_head
     *
     * @since  acmeblog 1.0.0
     */
    function acmeblog_wp_head(){
        global $acmeblog_customizer_all_values;
        ?>
        <style type="text/css">
            <?php
             $acmeblog_custom_css = $acmeblog_customizer_all_values['acmeblog-custom-css'];
             $acmeblog_custom_css_output = '';
             if ( ! empty( $acmeblog_custom_css ) ) {
                $acmeblog_custom_css_output .= esc_textarea( $acmeblog_custom_css ) ;
             }
             echo $acmeblog_custom_css_output;
             ?>
        </style>
        <?php
    }
endif;
add_action( 'wp_head', 'acmeblog_wp_head' );

if ( ! function_exists( 'acmeblog_body_class' ) ) :
    /**
     * add body class
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_body_class( $acmeblogbody_classes ) {
        global $acmeblog_customizer_all_values;
        if (isset( $acmeblog_customizer_all_values['acmeblog-global-layout'] ) && $acmeblog_customizer_all_values['acmeblog-global-layout'] == 'boxed') {
            $acmeblogbody_classes[] = 'boxed-layout';
        }
        if ( isset( $acmeblog_customizer_all_values['acmeblog-blog-layout'] ) && $acmeblog_customizer_all_values['acmeblog-blog-layout'] == 'alternate-image') {
            $acmeblogbody_classes[] = 'blog-alternate-image';
        }
        $acmeblogbody_classes[] = acmeblog_sidebar_selection();

        return $acmeblogbody_classes;

    }
endif;
add_action( 'body_class', 'acmeblog_body_class', 10, 1);


if ( ! function_exists( 'acmeblog_page_start' ) ) :
    /**
     * page start
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_page_start() {
        ?>
        <div id="page" class="hfeed site">
<?php
    }
endif;
add_action( 'acmeblog_action_before', 'acmeblog_page_start', 15 );

if ( ! function_exists( 'acmeblog_skip_to_content' ) ) :
    /**
     * Skip to content
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'acmeblog' ); ?></a>
    <?php
    }
endif;
add_action( 'acmeblog_action_before_header', 'acmeblog_skip_to_content', 10 );
/**
 * Menu Alignment
 */
function acmeblog_menu_alignment_class(){
    global $acmeblog_customizer_all_values;
    if ( isset($acmeblog_customizer_all_values['acmeblog-menu-alignment']) &&  $acmeblog_customizer_all_values['acmeblog-menu-alignment'] == "menu-right") {
        $acmeblog_alignment_class = "menu-right";
    } else {
        $acmeblog_alignment_class = "menu-left";
    }
    echo $acmeblog_alignment_class;
}

add_action('acmeblog_menu_alignment_class', 'acmeblog_menu_alignment_class');
if ( ! function_exists( 'acmeblog_header' ) ) :
    /**
     * Main header
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_header() {
        global $acmeblog_customizer_all_values;
        ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="top-header-section clearfix">
                <div class="wrapper">
                    <div class="right-header float-right">
                        <?php
                        if ( isset($acmeblog_customizer_all_values['acmeblog-enable-social'] ) && $acmeblog_customizer_all_values['acmeblog-enable-social'] == 1 ) {
                        /* Social Links*/
                            ?>
                            <div class="socials">
                                <?php if ( isset( $acmeblog_customizer_all_values['acmeblog-left-social'] ) && !empty( $acmeblog_customizer_all_values['acmeblog-left-social'] ) ) {
                                    echo $acmeblog_customizer_all_values['acmeblog-left-social'];
                                }
                                if ( isset( $acmeblog_customizer_all_values['acmeblog-facebook-url'] ) && !empty( $acmeblog_customizer_all_values['acmeblog-facebook-url'] ) ) { ?>
                                    <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-facebook-url'] ); ?>" class="facebook" data-title="Facebook" target="_blank">
                                        <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
                                    </a>
                                <?php }
                                if ( isset( $acmeblog_customizer_all_values['acmeblog-twitter-url'] ) && !empty( $acmeblog_customizer_all_values['acmeblog-twitter-url'] ) ) { ?>
                                    <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-twitter-url'] ); ?>" class="twitter" data-title="Twitter" target="_blank">
                                        <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
                                    </a>
                                <?php }
                                if ( isset( $acmeblog_customizer_all_values['acmeblog-youtube-url'] )  && !empty( $acmeblog_customizer_all_values['acmeblog-youtube-url'] ) ) { ?>
                                    <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-youtube-url'] ); ?>" class="youtube" data-title="Youtube" target="_blank">
                                        <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- .top-header-section -->
            <div class="wrapper header-wrapper clearfix">
                <div class="header-container">
                    <div class="site-branding clearfix">
                        <div class="site-logo float-left">
                            <?php if ( isset( $acmeblog_customizer_all_values['acmeblog-header-logo'] ) && !empty( $acmeblog_customizer_all_values['acmeblog-header-logo'] ) ): ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <img src="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-header-logo'] ); ?>" alt="<?php _e('Logo', 'acmeblog')?>">
                                </a>
                            <?php
                            else:
                                if ( is_front_page() && is_home() ) : ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    </h1>
                                <?php else : ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    </p>
                                <?php endif;

                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                                <?php endif;
                            endif; ?>
                        </div>
                        <?php if (isset( $acmeblog_customizer_all_values['acmeblog-header-ads'] ) && !empty( $acmeblog_customizer_all_values['acmeblog-header-ads'] )): ?>
                            <div class="header-ads float-right">
                                <?php echo $acmeblog_customizer_all_values['acmeblog-header-ads']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <?php
                        if ( is_active_sidebar( 'acmeblog-menu-before' ) ) {
                            dynamic_sidebar( 'acmeblog-menu-before' );
                        }
                        ?>
                    </div>
                    <nav id="site-navigation" class="main-navigation clearfix <?php do_action('acmeblog_menu_alignment_class'); ?>" role="navigation">
                        <div class="header-main-menu clearfix">
                            <?php
                            if (isset( $acmeblog_customizer_all_values['acmeblog-show-home-icon']) && $acmeblog_customizer_all_values['acmeblog-show-home-icon'] == 1 ) {
                                if ( is_front_page() ) {
                                    $home_icon_class = 'home-icon front_page_on';
                                } else {
                                    $home_icon_class = 'home-icon';
                                }
                                ?>
                                <div class="<?php echo $home_icon_class; ?>">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="fa fa-home"></i></a>
                                </div>
                            <?php
                            }
                            ?>
                            <?php wp_nav_menu(array('theme_location' => 'primary','container' => 'div', 'container_class' => 'acmethemes-nav')); ?>
                            <?php if ( isset( $acmeblog_customizer_all_values['acmeblog-show-search']) && $acmeblog_customizer_all_values['acmeblog-show-search'] == 1 ):
                                get_search_form();
                            endif; ?>
                        </div>
                        <div class="responsive-slick-menu clearfix"></div>
                    </nav>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->

        </header>

        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'acmeblog_action_header', 'acmeblog_header', 10 );


if ( ! function_exists( 'acmeblog_before_content' ) ) :
    /**
     * Before main content
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_before_content() {
        ?>
        <div class="wrapper content-wrapper clearfix">
                <?php
                if ( is_front_page() ) {
                    echo '<div class="slider-feature-wrap clearfix">';
                    /*Slide*/
                    global $acmeblog_customizer_all_values;
                    if ( isset($acmeblog_customizer_all_values['acmeblog-front-cat']) && !empty($acmeblog_customizer_all_values['acmeblog-front-cat']) ) { ?>
                        <div class="slider-section">
                            <ul class="home-bxslider">
                                <?php
                                if ($acmeblog_customizer_all_values['acmeblog-front-cat'] != '0') {
                                    if ( isset($acmeblog_customizer_all_values['acmeblog-front-post-number']) && !empty($acmeblog_customizer_all_values['acmeblog-front-post-number']) ) {
                                        $acmeblog_number = $acmeblog_customizer_all_values['acmeblog-front-post-number'];
                                    }
                                    else{
                                        $acmeblog_number = 5;
                                    }
                                    $acmeblog_cat_post_args = array(
                                        'cat'                 => $acmeblog_customizer_all_values['acmeblog-front-cat'],
                                        'posts_per_page'      => $acmeblog_number,
                                        'no_found_rows'       => true,
                                        'post_status'         => 'publish',
                                        'ignore_sticky_posts' => true
                                    );
                                    $slider_query = new WP_Query($acmeblog_cat_post_args);
                                    if ($slider_query->have_posts()):
                                        while ($slider_query->have_posts()): $slider_query->the_post();
                                            if (has_post_thumbnail()) {
                                                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                                            } else {
                                                $image_url[0] = get_template_directory_uri() . '/assets/img/slider-placeholder.jpg';
                                            }
                                            ?>
                                            <li>
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo $image_url[0]; ?>"/>
                                                </a>
                                                <div class="slider-desc">
                                                    <div class="above-slider-details">
                                                        <?php
                                                        $archive_year  = get_the_date('Y');
                                                        $archive_month = get_the_date('m');
                                                        $archive_day   = get_the_date('d');
                                                        ?>
                                                        <i class="fa fa-calendar"></i><a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date('F d, Y'); ?></a>
                                                        <i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                                                        <i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?>
                                                    </div>
                                                    <div class="slider-details">
                                                        <a href="<?php the_permalink()?>">
                                                            <div class="slide-title">
                                                                <?php the_title(); ?>
                                                            </div>
                                                            <?php
                                                            $content = acmeblog_words_count(get_the_excerpt() ,12);
                                                            echo '<div class="slide-caption">'.$content.'</div>';
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        acmeblog_list_category();
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                <?php }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    <?php
                    }
                    echo "</div>";
                    $acmeblog_content_id = "home-content";
                } else {
                    $acmeblog_content_id = "content";
                }
                ?>
    <div id="<?php echo $acmeblog_content_id; ?>" class="site-content">
    <?php
        $sidebar_layout = acmeblog_sidebar_selection();
        if( 'both-sidebar' == $sidebar_layout ) {
            echo '<div id="primary-wrap" class="clearfix">';
        }
    }
endif;
add_action( 'acmeblog_action_after_header', 'acmeblog_before_content', 10 );
