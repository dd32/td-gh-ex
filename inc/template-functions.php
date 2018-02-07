<?php
/**
 * Custom template function for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bakery_shop
 */

if( ! function_exists( 'bakery_shop_doctype_cb' ) ) :
/**
 * Doctype Declaration
 * 
 * @since 1.0.1
*/
function bakery_shop_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;


if( ! function_exists( 'bakery_shop_head' ) ) :
/**
 * Before wp_head
 * 
 * @since 1.0.1
*/
function bakery_shop_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;

if( ! function_exists( 'bakery_shop_header_start' ) ) :
/**
 * Header Start
 * 
 * @since 1.0.1
*/
function bakery_shop_header_start(){
    ?>
    <header id="masthead" class="site-header" role="banner">
    <?php 
}
endif;

if( ! function_exists( 'bakery_shop_header_top' ) ) :
/**
 * Header Top
 * 
 * @since 1.0.1
*/
function bakery_shop_header_top(){

    $bakery_shop_ed_social = get_theme_mod('bakery_shop_ed_social', '1');
    if( has_nav_menu('secondary') || $bakery_shop_ed_social ){ 
    ?>
    <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <?php do_action( 'bakery_shop_social_link' );?>
                <!-- Header Top Menu -->
                <?php if( has_nav_menu('secondary') ){ ?>
                <div id="mobile-header-top">
                    <a id="responsive-menu-button-top" href="#sidr-main-top"><i class="fa fa-bars"></i></a>
                </div>
                
                <nav id="top-site-navigation" class="top-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
                </nav>

                <?php } ?>
               
            </div>
        </div>
    <?php 
    }
}
endif;

if( ! function_exists( 'bakery_shop_header_bottom' ) ) :
/**
 * Header Site Branding
 * 
 * @since 1.0.1
*/
function bakery_shop_header_bottom(){
    ?>
    <div class="header-bottom">
        <div class="container">
            <div class="site-branding">
                <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                              the_custom_logo();
                          } 
                ?>
                <div class="text-logo">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php
                        $description = get_bloginfo( 'description', 'display' );
                        if ( esc_html( $description ) || is_customize_preview() ) { ?>
                          <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                  <?php } ?>
                </div>  
            </div><!-- .site-branding -->
    <?php 
}
endif;

if( ! function_exists( 'bakery_shop_header_menu' ) ) :
/**
 * Header Primary Menu
 * 
 * @since 1.0.1
*/
function bakery_shop_header_menu(){
    ?>
    
   	<div id="mobile-header">
        <a id="responsive-menu-button" href="#sidr-main"><i class="fa fa-bars"></i></a>
    </div>
    <nav id="site-navigation" class="main-navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->
    <?php 
}
endif;

if( ! function_exists( 'bakery_shop_header_end' ) ) :
/**
 * Header End
 * 
 * @since 1.0.1
*/
function bakery_shop_header_end(){
    ?>
		  </div>
        </div>
    </header><!-- #masthead -->
    <?php 
}
endif;


/* Home page */

if( ! function_exists( 'bakery_shop_template_section_header' ) ) :
/**
 * Template Section Header
 * 
 * @since 1.0.1
*/
function bakery_shop_template_header( $section_title ){
    $header_query = new WP_Query( array( 
        'p'         => absint( $section_title ),
        'post_type' => 'page'
    ));

        if( absint( $section_title ) && $header_query->have_posts() ){ 
            while( $header_query->have_posts() ){ $header_query->the_post();
    ?>
                <header class="main-header">
                    <?php 
                        echo '<h1>';
                         the_title();
                         echo '</h2>';
                        echo the_excerpt(); 
                    ?>
                </header>
    <?php   }
        wp_reset_postdata();
        }   

}
endif;

if( ! function_exists( 'bakery_shop_slider_cb' ) ) :
/**
 * Home Page Slider Section
 * 
 * @since 1.0.1
*/
function bakery_shop_slider_cb(){
    global $bakery_shop_default_post;
    
    $slider_enable      = get_theme_mod( 'bakery_shop_ed_slider','1' );
    $slider_caption     = get_theme_mod( 'bakery_shop_slider_caption', '1' );
    $slider_readmore    = get_theme_mod( 'bakery_shop_slider_readmore', __( 'Learn More', 'bakery-shop' ) );
   
    if( $slider_enable && is_front_page() && is_home() ){
        echo '<section id="banner" class="banner">';
            echo '<div class="fadeout owl-carousel owl-theme clearfix">';
            for( $i=1; $i<=3; $i++){  
                $bakery_shop_slider_post_id = get_theme_mod( 'bakery_shop_slider_post_'.$i, $bakery_shop_default_post ); 
                if( $bakery_shop_slider_post_id ){
                    $qry = new WP_Query ( array( 'p' => absint( $bakery_shop_slider_post_id ) ) );            
                    if( $qry->have_posts() ){ 
                        while( $qry->have_posts() ){
                        $qry->the_post();
                            ?>
                            <div class="item">
                                <?php 
                                if( has_post_thumbnail() ){ 
                                    the_post_thumbnail( 'bakery-shop-slider' );
                                }else{
                                    echo '<img src="'. esc_url( get_template_directory_uri() ).'/images/banner.png">';
                                } 
                                        if( $slider_caption ){ ?>
                                            <div class="banner-text">
                                                <strong class="title"><h1><?php the_title(); ?></h1></strong>
                                                <?php the_excerpt(); ?>
                                                <div class="button-holder">
                                                    <?php if( $slider_readmore ){ ?> 
                                                        <a class="btn blank" href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html( $slider_readmore );?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                        <?php 
                        }
                    }
                }
            }
            wp_reset_postdata();  
            echo '</div>';
        echo '</section>';
    }    
}
endif;

if( ! function_exists( 'bakery_shop_content_start' ) ) :
/**
 * Content Start
 * 
 * @since 1.0.1
*/
function bakery_shop_content_start(){ 
    $ed_slider = get_theme_mod( 'bakery_shop_ed_slider','1' );
    $class = is_404() ? 'error-holder' : 'row' ;
    
    if( ! is_page_template( 'template-home.php' ) && !( $ed_slider && is_front_page() ) ){
    ?>
    <div id="content" class="site-content">
        <div class="container">
             <div class="<?php echo esc_attr( $class ); ?>">
    <?php
    }
}
endif;

if( ! function_exists( 'bakery_shop_page_content_image' ) ) :
/**
 * Page Featured Image
 * 
 * @since 1.0.1
*/
function bakery_shop_page_content_image(){
    $sidebar_layout = bakery_shop_sidebar_layout();
    if( has_post_thumbnail() )
    ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'bakery-shop-with-sidebar' ) : the_post_thumbnail( 'bakery-shop-without-sidebar' );    
}
endif;


if( ! function_exists( 'bakery_shop_post_content_image' ) ) :
/**
 * Post Featured Image
 * 
 * @since 1.0.1
*/
function bakery_shop_post_content_image(){
    if( has_post_thumbnail() ){
    echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; 
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'bakery-shop-with-sidebar' ) : the_post_thumbnail( 'bakery-shop-without-sidebar' ) ; 
    echo ( !is_single() ) ? '</a>' : '</div>' ;    
    }
}
endif;

if( ! function_exists( 'bakery_shop_post_entry_header' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.1
*/
function bakery_shop_post_entry_header(){
    ?>
    
    <header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php  
                bakery_shop_posted_on(); 
                bakery_shop_categories();
                bakery_shop_comments();
            ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header>

    <?php
}
endif;

if( ! function_exists( 'bakery_shop_archive_entry_header_before' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.1
*/
function bakery_shop_archive_entry_header_before(){
    echo '<div class = "text-holder" >';
}    
endif;   
    
if( ! function_exists( 'bakery_shop_archive_entry_header' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.1
*/
function bakery_shop_archive_entry_header(){
    ?>
    <header class="entry-header">
        <div class="entry-meta">
            <?php bakery_shop_posted_on_date(); ?>
        </div><!-- .entry-meta -->
        <h2 class="entry-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
    </header>   
    <?php
}
endif;

if( ! function_exists( 'bakery_shop_post_author' ) ) :
/**
 * Post Author Bio
 * 
 * @since 1.0.1
*/
function bakery_shop_post_author(){
    if( get_the_author_meta( 'description' ) ){
        global $post;
    ?>
    <section class="author-section">
        <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
            <div class="text-holder">
                <strong class="name"><?php the_author_meta( 'display_name', $post->post_author ); ?></strong>
                <?php the_author_meta( 'description' ); ?>
            </div>
    </section>
    <?php  
    }  
}
endif;

if( ! function_exists( 'bakery_shop_get_comment_section' ) ) :
/**
 * Comment template
 * 
 * @since 1.0.1
*/
function bakery_shop_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
}
endif;

if( ! function_exists( 'bakery_shop_content_end' ) ) :
/**
 * Content End
 * 
 * @since 1.0.1
*/
function bakery_shop_content_end(){

    $ed_slider = get_theme_mod( 'bakery_shop_ed_slider','1' );
    
    if( ! is_page_template( 'template-home.php' ) && !( $ed_slider && is_front_page() ) ){
        echo '</div></div></div>';// .row /#content /.container
    }
}
endif;

if( ! function_exists( 'bakery_shop_footer_start' ) ) :
/**
 * Footer Start
 * 
 * @since 1.0.1
*/
function bakery_shop_footer_start(){
    echo '<footer id="colophon" class="site-footer" role="contentinfo">';

}
endif;


if( ! function_exists( 'bakery_shop_footer_widgets' ) ) :
/**
 * Footer Widgets
 * 
 * @since 1.0.1 
*/
function bakery_shop_footer_widgets(){
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){?>
        <div class="widget-area">
            <div class="container">
                <div class="row">
                    
                    <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-one' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-two' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-three' ); ?>
                    </div>
                    <?php } ?>
                    
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .widget-area -->
<?php } 
}
endif;

if( ! function_exists( 'bakery_shop_footer_credit' ) ) :
/**
 * Footer Credits 
 */
function bakery_shop_footer_credit(){
    echo '<div class="footer-b">';
        echo '<div class="container">'; 
            echo '<div class="site-info">';
                echo esc_html( '&copy;&nbsp;'. date_i18n( 'Y' ), 'bakery-shop' );
                echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';

                printf( '&nbsp;%s', '<a href="'. esc_url( __( 'http://prosystheme.com/wordpress-themes/bakery-shop/', 'bakery-shop' ) ) .'" target="_blank">'. esc_html__( 'Bakery Shop By Prosys Theme. ', 'bakery-shop' ) .'</a>' );
                printf( esc_html__( 'Powered by %s', 'bakery-shop' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'bakery-shop' ) ) .'" target="_blank">'. esc_html__( 'WordPress', 'bakery-shop' ) . '</a>' );
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
endif;

if( ! function_exists( 'bakery_shop_footer_end' ) ) :
/**
 * Footer End
 * 
 * @since 1.0.1 
*/
function bakery_shop_footer_end(){
    echo '</footer>'; // #colophon 
}
endif;

if( ! function_exists( 'bakery_shop_page_end' ) ) :
/**
 * Page End
 * 
 * @since 1.0.1
*/
function bakery_shop_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;
