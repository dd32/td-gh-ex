<?php
/*-----------------------------------------------
 * Custom action
 -----------------------------------------------*/
// 1.0 igthemes_header
function igthemes_header() {
    do_action('igthemes_header');
}
// 2.0 igthemes_footer
function igthemes_footer() {
    do_action('igthemes_footer');
}
// 3.0 igthemes_after_header
function igthemes_after_header() {
    do_action('igthemes_after_header');
}
// 4.0 igthemes_before_footer
function igthemes_before_footer() {
    do_action('igthemes_before_footer');
}
// 5.0 igthemes_before_site_content
function igthemes_before_site_content() {
    do_action('igthemes_before_site_content');
}
// 6.0 igthemes_after_site_content
function igthemes_after_site_content() {
    do_action('igthemes_after_site_content');
}
// 7.0 igthemes_before_single
function igthemes_before_single() {
    do_action('igthemes_before_single');
}
// 8.0 igthemes_after_single_content
function igthemes_after_single() {
    do_action('igthemes_after_single_content');
}
// 9.0 igthemes_before_single_title
function igthemes_before_single_title() {
    do_action('igthemes_before_single_title');
}
// 10.0 igthemes_after_single_title
function igthemes_after_single_title() {
    do_action('igthemes_after_single_title');
}
// 11.0 igthemes_before_single_content
function igthemes_before_single_content() {
    do_action('igthemes_before_single_content');
}
// 12.0 igthemes_after_single_content
function igthemes_after_single_content() {
    do_action('igthemes_after_single_content');
}
// 13.0 igthemes_before_sidebar_content
function igthemes_before_sidebar_content() {
    do_action('igthemes_before_sidebar_content');
}
// 14.0 igthemes_after_sidebar_content
function igthemes_after_sidebar_content() {
    do_action('igthemes_after_sidebar_content');
}

/*-----------------------------------------------
 * 1.0 igthemes_header
 -----------------------------------------------*/
// header nav text filter
function igthemes_header_nav_content() {
    $text = '';
    $text = apply_filters( 'igthemes_header_nav_content', $text );
    return $text;
}
function igthemes_header_nav_text( $text ) {
    $text = '';
    return $text;
}
add_filter( 'igthemes_header_nav_content', 'igthemes_header_nav_text' );

// top menu
function igthemes_header_top_menu() { ?>
    <div class="header-menu">
        <div class="grid-1200">
            <div class="row">
                <nav class="header-navigation col12" role="navigation">
                    <?php echo igthemes_header_nav_content(); ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'depth' => 1,  'fallback_cb' => '__return_false') ); ?>
                </nav>
            </div><!-- row -->
        </div><!-- .grid1200 -->
    </div><!-- .header-navigation -->
<?php }
add_action( 'igthemes_header' , 'igthemes_header_top_menu' );

// logo
function igthemes_header_branding() { ?>
    <div class="grid-1200">
        <div class="row">
            <div class="site-branding col12">
    <?php if ( get_header_image() ) : ?>
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" class="header-image">
    <?php endif; // End header image check. ?>
    <?php if ( igthemes_option('logo') ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php echo esc_url(igthemes_option('logo')); ?>" alt="<?php echo esc_attr( bloginfo( 'name' )); ?>"></a>
    <?php else : ?>
        <a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        </a>
        <h2 class="site-description">
            <?php bloginfo( 'description' ); ?>
        </h2>
        <?php endif; ?>
            </div><!-- .site-branding -->
        </div><!-- row -->
    </div><!-- .grid1200 -->
<?php }
add_action( 'igthemes_header' , 'igthemes_header_branding' );


/*-----------------------------------------------
 * 2.0 igthemes_footer
 -----------------------------------------------*/
//credits
function igthemes_footer_credits() { ?>
    <div class="credits">
            <div class="grid-1200">
        <?php printf( esc_html__( 'Proudly powered by ', 'base-wp' )); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'base-wp' ) ); ?>"><?php printf( __( '%s', 'base-wp' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'base-wp' ), 'Base WP', '<a href="http://iograficathemes.com/" rel="designer">Iografica Themes</a>' ); ?>
            </div>
    </div>
<?php }
add_action( 'igthemes_footer' , 'igthemes_footer_credits' );

/*-----------------------------------------------
 * 5.0 igthemes_before_site_content
 -----------------------------------------------*/
//slider
function igthemes_header_slider() {
?>
    <?php get_template_part('core-framework/partials/image-carousel') ?>
<?php }
add_action( 'igthemes_before_site_content' , 'igthemes_header_slider' );

//sidebar
function igthemes_before_content_sidebar() {
?>
    <?php
        if ( is_page_template( 'page-sidebar-left.php' ) ) {
            get_sidebar();
        }
    ?>
<?php }
add_action( 'igthemes_before_site_content' , 'igthemes_before_content_sidebar' );

/*-----------------------------------------------
 * 6.0 igthemes_after_site_content
 -----------------------------------------------*/
//sidebar
function igthemes_after_content_sidebar() {
?>
    <?php
        if ( !is_page_template( 'page-sidebar-left.php' ) && !is_page_template( 'page-fullwidth.php' )  ) {
            if ( class_exists( 'WooCommerce' ) && is_woocommerce() || 
                class_exists( 'WooCommerce' ) && is_cart() || 
                class_exists( 'WooCommerce' ) && is_checkout() || 
                class_exists( 'WooCommerce' ) && is_account_page() || 
                class_exists( 'WooCommerce' ) && is_wc_endpoint_url() ) {
                get_sidebar('shop');
            } else {
                get_sidebar();
            }
        }
    ?>
<?php }
add_action( 'igthemes_after_site_content' , 'igthemes_after_content_sidebar' );

/*-----------------------------------------------
 * 7.0 igthemes_before_single
 -----------------------------------------------*/
//Breadcrumb
function igthemes_breadcrumb() {
if ( igthemes_option('breadcrumb') == '1' && function_exists('yoast_breadcrumb') && !is_page() ) {
    yoast_breadcrumb('<div class="breadcrumb">','</div>');
}
elseif (igthemes_option('breadcrumb') == '1'  && !is_page()) {
    echo '<div class="breadcrumb">';
    if (!is_home()) {
        echo '<a href="'. esc_url(home_url('/')) .'">';
            echo esc_html__('Home', 'base-wp');
        echo '</a>';

    if (is_category() || is_single()) {
        echo " &#47; ";
        the_category(' &#47; ');
        if (is_singular( 'post' )) {
               echo " &#47; ";
               the_title();
            }
        elseif (is_singular()) {
            echo the_title();
            }
        }

        elseif (is_page()) {
            echo the_title();
        }
        elseif (is_archive()) {
            echo single_month_title();
            echo single_tag_title("", false);
        }
    }
        echo '</div>';
    }
}
add_action( 'igthemes_before_single' , 'igthemes_breadcrumb' );

/*-----------------------------------------------
 * 9.0 igthemes_before_single_title
 -----------------------------------------------*/

//page featured image
function igthemes_page_featured_image() { ?>
<?php if ( is_page() && has_post_thumbnail() ) {
    echo "<div class='image'>";
        the_post_thumbnail( 'large', array( 'class' => 'featured-img' ) );
    echo "</div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_page_featured_image' );

//post featured image
function igthemes_post_featured_image() { ?>
<?php if ( !is_archive() && !is_home() && has_post_thumbnail() && igthemes_option('post_featured_image')) {
    echo "<div class='image'>";
        the_post_thumbnail( 'large', array( 'class' => 'featured-img' ) );
    echo "</div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_post_featured_image' );

//featured image index and archive
function igthemes_main_featured_images() { ?>
<?php if ( !is_single() && has_post_thumbnail() && igthemes_option('main_featured_images')) {
     echo "<div class='image'>";
        the_post_thumbnail( 'large', array( 'class' => 'featured-img' ) );
     echo "</div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_main_featured_images' );
