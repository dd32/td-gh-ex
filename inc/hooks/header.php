<?php
/*
* Header Hook Section 
* @since 1.0.0
*/
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package appdetail
------------------------------ */
if ( ! function_exists( 'appdetail_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_doctype_action() {
    	?>
    	<!DOCTYPE html>
    	<html <?php language_attributes(); ?> class="boxed">
    	<?php
    }
endif;
add_action( 'appdetail_doctype', 'appdetail_doctype_action', 10 );

/* --------------------------
* Header hook of the theme.
* @since 1.0.0
* @package appdetail
-------------------------- */
if ( ! function_exists( 'appdetail_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_head_action() {
    	?>
    	<meta charset="<?php bloginfo( 'charset' ); ?>">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="profile" href="https://gmpg.org/xfn/11">
    	<?php
    }
endif;
add_action( 'appdetail_head', 'appdetail_head_action', 10 );

/* -----------------------
* Header skip link hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_skip_link_head' ) ) :
    /**
     * Header skip link hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_skip_link_head() {
    	?>
    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'appdetail' ); ?></a>
    	<?php
    }
endif;
add_action( 'appdetail_skip_link_action', 'appdetail_skip_link_head', 10 );

/* -------------------------
* Header section start wrapper theme.
* @since 1.0.0
* @package appdetail
------------------------- */
if ( ! function_exists( 'appdetail_header_start_wrapper' ) ) :
    /**
     * Header section start wrapper theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_start_wrapper() {
    	?>
    	<div id="page">
    		<?php
    	}
    endif;
    add_action( 'appdetail_header_start_wrapper_action', 'appdetail_header_start_wrapper', 10 );


/* ----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_lower_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_lower_section() {
    	?>
        
            

        <!-- ====== Header Section ====== -->
    <header class="appin-menu">
        <nav class="navbar navbar-default menubar main-menu multi-menu-bar" data-spy="affix" data-offset-top="100">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    if (has_custom_logo()) { ?>

                        <a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
                            <?php  the_custom_logo();?>
                        </a>
                    <?php } 
                    else {
                        ?>  
                        <div class="togo-text">
                            <?php
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php
                            endif;
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif; ?>
                        </div>
                    <?php } ?>                    
                </div>
                <div class="collapse navbar-collapse nav navbar-nav navbar-right" id="menu">
                    <?php 
                    if ( has_nav_menu('primary'))
                    {
                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navigation' ) ); 
                    }
                    else
                        { ?>
                            <ul class="navigation">
                                <li class="menu-item">
                                    <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','appdetail'); ?></a>
                                </li>
                            </ul>
                        <?php }     
                    ?>
                </div>
            </div>
        </nav>
        <script type="text/javascript">
    /*----------------------------------------------
    ----------- Slick Nav  --------------------
    -------------------------------------------------*/
    if (jQuery('#menu').length) {
        jQuery('#menu').slicknav({
            brand: '<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php the_custom_logo(); ?></a>',
            appendTo: 'header',
        });
    }
      </script>
            <!-- menubar ends -->
    </header>
    <!-- ====== End Header Section ====== -->
    <?php
    	}
    endif;
    add_action( 'appdetail_header_lower_section_action', 'appdetail_header_lower_section', 10 );

 /* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_breadcrumb_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_breadcrumb_action() { ?>       
            <section class="s-pad inner-banner-area">
                <div class="container">
                    <?php if(!is_home() || !is_front_page () ) {
                        appdetail_breadcrumb();
                    }
                    ?>
                </div>
            </section>
            <?php
    }
endif;
add_action( 'appdetail_breadcrumb_section_action', 'appdetail_breadcrumb_action', 10 );   

/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_slider_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_slider_action() {
    	global $appdetail_theme_options;
    	$appdetail_theme_options  = appdetail_get_theme_options();
    	$appdetail_category_cat   = $appdetail_theme_options['appdetail-feature-cat'];
    	if( $appdetail_category_cat > 0 ){ ?>
    		<section class="top-banner" id="top" <?php if($appdetail_theme_options['appdetail-slider-background-image']!=''){ ?> style="background: url(<?php echo esc_url($appdetail_theme_options['appdetail-slider-background-image']); ?>);" <?php } ?>>
                <div class="container">
					<?php if(is_home() || is_front_page () ) {
						appdetail_home_slider();
					}
					?>
				</div>
    		</section>
    		<?php
    	}
    }
endif;
add_action( 'appdetail_header_slider_section_action', 'appdetail_header_slider_action', 10 );


/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_service_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_service_action() {
        global $appdetail_theme_options;
        $appdetail_theme_options  = appdetail_get_theme_options();
        $appdetail_category_cat   = $appdetail_theme_options['appdetail-service-cat'];
        if( $appdetail_category_cat > 0 ){ ?>
            <section id="about" class="about s-pad">
                <div class="container">
                    <?php if(is_home() || is_front_page () ) {
                        appdetail_home_service();
                    }
                    ?>
                </div>
            </section>
            <?php
        }
    }
endif;
add_action( 'appdetail_header_service_section_action', 'appdetail_header_service_action', 10 );

/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_video_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_video_action() {
        global $appdetail_theme_options;
        $appdetail_theme_options  = appdetail_get_theme_options();
        $appdetail_category_cat   = $appdetail_theme_options['appdetail-service-cat'];
        if( $appdetail_category_cat > 0 ){ ?>
            <section id="video" class="video s-pad text-center">
                <div class="container">
                    <?php if(is_home() || is_front_page () ) {
                        appdetail_home_video();
                    }
                    ?>
                </div>
            </section>
            <?php
        }
    }
endif;
add_action( 'appdetail_header_video_section_action', 'appdetail_header_video_action', 10 );

/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_screenshot_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_screenshot_action() {
        global $appdetail_theme_options;
        $appdetail_theme_options  = appdetail_get_theme_options();
        $appdetail_category_cat   = $appdetail_theme_options['appdetail-screenshot-cat'];
        if( $appdetail_category_cat > 0 ){ ?>
            <section id="screenshots" class="screenshots s-pad">
                    <?php if(is_home() || is_front_page () ) {
                        appdetail_home_screenshot();
                    }
                    ?>
            </section>
            <?php
        }
    }
endif;
add_action( 'appdetail_header_screenshot_section_action', 'appdetail_header_screenshot_action', 10 );

/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_testimonial_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_testimonial_action() {
        global $appdetail_theme_options;
        $appdetail_theme_options  = appdetail_get_theme_options();
        $appdetail_category_cat   = $appdetail_theme_options['appdetail-testimonial-cat'];
        if( $appdetail_category_cat > 0 ){ ?>
            <section id="client" class="client s-pad">
                    <?php if(is_home() || is_front_page () ) {
                        appdetail_home_testimonial();
                    }
                    ?>
            </section>
            <?php
        }
    }
endif;
add_action( 'appdetail_header_testimonial_section_action', 'appdetail_header_testimonial_action', 10 );
/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package appdetail
----------------------- */
if ( ! function_exists( 'appdetail_header_blog_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_blog_action() {
        global $appdetail_theme_options;
        $appdetail_theme_options  = appdetail_get_theme_options();
        $appdetail_category_cat   = $appdetail_theme_options['appdetail-blog-cat'];
        if( $appdetail_category_cat > 0 ){ ?>
            <section id="blog" class="blog s-pad">
                    <?php if(is_home() || is_front_page () ) {
                        appdetail_home_blog();
                    }
                    ?>
            </section>
            <?php
        }
    }
endif;
add_action( 'appdetail_header_blog_section_action', 'appdetail_header_blog_action', 10 );

/* ----------------------
* Header end wrapper section hook of the theme.
* @since 1.0.0
* @package appdetail
---------------------- */


if ( ! function_exists( 'appdetail_header_end_wrapper' ) ) :
    /**
     * Header end wrapper section hook of the theme.
     *
     * @since 1.0.0
     */
    function appdetail_header_end_wrapper() { ?>

    <div id="content" class="site-content s-pad">
    			<div class="container">
    				<div class="row">

    					<?php
    				}
    			
    		endif;
    		add_action( 'appdetail_header_end_wrapper_action', 'appdetail_header_end_wrapper', 10 );
