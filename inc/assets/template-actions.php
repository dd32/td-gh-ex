<?php
/*-----------------------------------------------------------------
 * HEADER
-----------------------------------------------------------------*/
add_action( 'igthemes_header', 'igthemes_header_content', 10 );
add_action( 'igthemes_header', 'igthemes_main_navigation', 20 );

// header content
if ( ! function_exists( 'igthemes_header_content' ) ) {
    //start function
    function igthemes_header_content() {
        echo '<div class="header-content">';
        if ( has_header_image() ) {
            echo '<img class="header-image" src=" '.get_header_image().' ">';
        }  
        igthemes_header_navigation();
        igthemes_site_branding();
        echo '</div>';
    }
}
// main navigation
if ( ! function_exists( 'igthemes_main_navigation' ) ) {
    //start function
    function igthemes_main_navigation() { ?>
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <?php esc_html_e( 'Menu', 'base-wp' ); ?>
        </button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->
<?php  }
}

/*-----------------------------------------------------------------
 * CONTENT TOP
-----------------------------------------------------------------*/
add_action( 'igthemes_content_top', 'igthemes_header_widget', 10 );
add_action( 'igthemes_content_top', 'igthemes_top_breadcrumb', 20 );
//header widget
if ( ! function_exists( 'igthemes_header_widget' ) ) {
    //start function
    function igthemes_header_widget() {
        if ( is_active_sidebar( 'header-widget' ) ) {
?>
<div class="header-widget-region" role="complementary">
    <?php dynamic_sidebar( 'header-widget' ); ?>
</div>
<?php   }
    }
}

//header widget
if ( ! function_exists( 'igthemes_top_breadcrumb' ) ) {
    //start function
    function igthemes_top_breadcrumb() {
        if (is_singular('post')) {
            igthemes_breadcrumb();
        }
    }
}
/*-----------------------------------------------------------------
 * FOOTER
-----------------------------------------------------------------*/
add_action( 'igthemes_footer', 'igthemes_footer_widgets', 10 );
add_action( 'igthemes_footer', 'igthemes_scroll_top', 20 );
add_action( 'igthemes_footer', 'igthemes_social', 30 );
add_action( 'igthemes_footer', 'igthemes_credit', 40 );

// Credits
if ( ! function_exists( 'igthemes_credit' ) ) {
    function igthemes_credit() {
?>
<div class="site-info">
    <?php echo esc_html( apply_filters( 'igthemes_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
    <?php if ( apply_filters( 'igthemes_credit_link', true ) ) { ?>
        <br /><?php printf( esc_attr__( '%1$s designed by %2$s.', 'base-wp' ), 'Base WP', '<a href="http://www.iograficathemes.com" alt="Free and Premium WordPress Themes & Plugins" title="Free and Premium WordPress Themes & Plugins" rel="designer">Iografica Themes</a>' ); ?>
    <?php } ?>
</div><!-- .site-info -->
<?php
                               }
}

//scroll top
if ( ! function_exists( 'igthemes_scroll_top' ) ) {
    function igthemes_scroll_top() { ?>
    <div class="scroll-top">
        <a href="#mathead" id="scrolltop">
            <span class="icon-arrow-up"></span>
        </a>
    </div>
<?php }
}
// Social
if ( ! function_exists( 'igthemes_social' ) ) {
    function igthemes_social() {
?>
<div class="social-url">
    <?php if ( get_theme_mod('facebook_url') ) {
        $facebook_url = esc_url(get_theme_mod('facebook_url', ''));
        echo "<a href='$facebook_url' title='Facebook' target='_blank' class='facebook-icon'><span class='icon-social-facebook'></span></a>";
    }?>
    <?php if ( get_theme_mod('twitter_url') ) {
        $twitter_url = esc_url(get_theme_mod('twitter_url', ''));
        echo "<a href='$twitter_url' title='Twitter' target='_blank' class='twitter-icon'><span class='icon-social-twitter'></span></a>";
    }?>
    <?php if ( get_theme_mod('google_url') ) {
        $google_url = esc_url(get_theme_mod('google_url', ''));
        echo "<a href='$google_url' title='Google Plus' target='_blank' class='google-icon'><span class='icon-social-google'></span></a>";
    }?>
    <?php if ( get_theme_mod('pinterest_url') ) {
        $pinterest_url = esc_url(get_theme_mod('pinterest_url', ''));
        echo "<a href='$pinterest_url' title='Pinterest' target='_blank' class='pinterest-icon'><span class='icon-social-pinterest'></span></a>";
    }?>
    <?php if ( get_theme_mod('tumblr_url') ) {
        $tumblr_url = esc_url(get_theme_mod('tumblr_url', ''));
        echo "<a href='$tumblr_url' title='Tumblr' target='_blank' class='tumblr-icon'><span class='icon-social-tumblr'></span></a>";
    }?>
    <?php if ( get_theme_mod('instagram_url') ) {
        $instagram_url = esc_url(get_theme_mod('instagram_url', ''));
        echo "<a href='$instagram_url' title='Instagram' target='_blank' class='instagram-icon'><span class='icon-social-instagram'></span></a>";
    }?>
    <?php if ( get_theme_mod('linkedin_url') ) {
        $linkedin_url = esc_url(get_theme_mod('linkedin_url', ''));
        echo "<a href='$linkedin_url' title='Linkedin' target='_blank' class='linkedin-icon'><span class='icon-social-linkedin'></span></a>";
    }?>
    <?php if ( get_theme_mod('dribbble_url') ) {
        $dribbble_url = esc_url(get_theme_mod('dribbble_url', ''));
        echo "<a href='$dribbble_url' title='Dribble' target='_blank' class='dribble-icon'><span class='icon-social-dribbble'></span></a>";
    }?>
    <?php if ( get_theme_mod('youtube_url') ) {
        $youtube_url = esc_url(get_theme_mod('youtube_url', ''));
        echo "<a href='$youtube_url' title='Youtube' target='_blank' class='youtube-icon'><span class='icon-social-youtube'></span></a>";
    }?>
</div><!-- .social url -->
<?php
                               }
}
//widgets
if ( ! function_exists( 'igthemes_footer_widgets' ) ) {
    /**
     * Display the footer widget regions
     *
     * @since  1.0.0
     * @return  void
     */
    function igthemes_footer_widgets() {
        if ( is_active_sidebar( 'footer-4' ) ) {
            $widget_columns = apply_filters( 'igthemes_footer_widget_regions', 4 );
        } elseif ( is_active_sidebar( 'footer-3' ) ) {
            $widget_columns = apply_filters( 'igthemes_footer_widget_regions', 3 );
        } elseif ( is_active_sidebar( 'footer-2' ) ) {
            $widget_columns = apply_filters( 'igthemes_footer_widget_regions', 2 );
        } elseif ( is_active_sidebar( 'footer-1' ) ) {
            $widget_columns = apply_filters( 'igthemes_footer_widget_regions', 1 );
        } else {
            $widget_columns = apply_filters( 'igthemes_footer_widget_regions', 0 );
        }

        if ( $widget_columns > 0 ) : ?>

    <div class="footer-widget-region grid-container">

    <?php
        $i = 0;
        while ( $i < $widget_columns ) : $i++;
        if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
        
        <section class="footer-widget col<?php echo intval( $widget_columns ); ?>">
            <?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
        </section>
        
    <?php 
        endif;
        endwhile; 
    ?>
        
    </div><!-- /.footer-widgets  -->

<?php endif;
    }
}
