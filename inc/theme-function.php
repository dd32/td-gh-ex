<?php
/**
 * Slider Function
 *
 * @since appdetail 1.0.0
 *
 */

if (!function_exists('appdetail_breadcrumb')) :
    function appdetail_breadcrumb()
    {
        if(is_archive()){
        ?>
    <!-- ====== top-banner starts ====== -->
    <div class="row">
        <div class="col-md-12">
            <div class="inner-banner-box">
                <h2><?php the_archive_title(); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'appdetail' ); ?></a></li>
                        <li><?php the_archive_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== ends Top-banner ====== -->
    <?php } else if(is_404()) { ?>
    <!-- ====== top-banner starts ====== -->
    <div class="row">
        <div class="col-md-12">
            <div class="inner-banner-box">
                <h2><?php echo esc_html__('Page Not Found','appdetail'); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'appdetail' ); ?></a></li>
                        <li><?php echo esc_html__('Page Not Found','appdetail'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== ends Top-banner ====== -->
    <?php } else { ?>
    <!-- ====== top-banner starts ====== -->
    <div class="row">
        <div class="col-md-12">
            <div class="inner-banner-box">
                <h2><?php the_title(); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'appdetail' ); ?></a></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== ends Top-banner ====== -->
<?php }  } endif;

if (!function_exists('appdetail_home_slider')) :
    function appdetail_home_slider()
    {
        ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="top-banner-content">
                <?php global $appdetail_theme_options; ?>
                <h2 class="wow fadeInDown" data-wow-delay=".4s"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-slider-title'] );
                        ?></h2>
                <p class="wow fadeInDown" data-wow-delay=".6s"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-slider-description'] );
                        ?></p>
                <?php
                        $appdetail_slider_read_more = esc_html( $appdetail_theme_options['appdetail-slider-read-more'] ) ;
                    ?>
                    <?php if( !empty( $appdetail_slider_read_more ) ){ ?>
                         <a class="btn btn-video wow fadeInDown" data-wow-delay=".8s" data-lity=""
                    href="<?php echo esc_url($appdetail_theme_options['appdetail-slider-video-url'] ); ?>">         
                        <i class="fa fa-play"></i><?php                                  
                            echo $appdetail_slider_read_more;
                        ?>
                        </a>
                    <?php  } ?>                
            </div>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">
            <div class="mobile-wrap">
                <div id="mobile" class="mobile owl-carousel">
                    <?php 
                        global $appdetail_theme_options;
                        $category_id = $appdetail_theme_options['appdetail-feature-cat'];
                        $args = array( 'cat' =>$category_id , 'posts_per_page' => -1 );
                        $query = new WP_Query($args);
                        if($query->have_posts()):
                          while($query->have_posts()):
                           $query->the_post();
                           if(has_post_thumbnail()){
                               $image_id = get_post_thumbnail_id();
                               $image_url = wp_get_attachment_image_src( $image_id,'',true );
                    ?>                    
                    <div class="item">
                        <img src="<?php echo esc_url($image_url[0]);?>">
                    </div>
                    <?php } endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php   }



 endif;

/************************* Home Service Section************************************/
if (!function_exists('appdetail_home_service')) :
    function appdetail_home_service()
    {
        global $appdetail_theme_options;
        $sercategory_id = $appdetail_theme_options['appdetail-service-cat'];
        ?>
   
        <div class="row">
            <div class="col-sm-12">
                <div class="all-title">                   
                    <h3 class="t-border"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-service-title'] );
                        ?></h3>
                    <p><?php
                            echo esc_html( $appdetail_theme_options['appdetail-service-description'] );
                        ?></p>
                </div>
            </div>
        </div>
        <div class="row o-hid center-grid">
            <?php 
                $args = array( 'cat' =>$sercategory_id , 'posts_per_page' => -1 );
                $query = new WP_Query($args);
                if($query->have_posts()):
                  while($query->have_posts()):
                   $query->the_post();
                   if(has_post_thumbnail()){
                       $image_id = get_post_thumbnail_id();
                       $image_url = wp_get_attachment_image_src( $image_id,'',true );
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="about-item wow slideInUp">
                    <img src="<?php echo esc_url($image_url[0]);?>">
                    <h4 class="h-border"><?php the_title(); ?></h4>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
            <?php } endwhile; wp_reset_postdata(); endif; ?>
        </div>
<?php   } endif;

/************************* Home Video Section************************************/

if (!function_exists('appdetail_home_video')) :
    function appdetail_home_video()
    {
        global $appdetail_theme_options;
        ?>
   <div class="row">
        <div class="col-sm-12">
            <div class="video-wrap">
                <img class="lapi wow animated" src="<?php echo esc_url($appdetail_theme_options['appdetail-video-background-image'] ); ?>">
                <a data-lity="" href="<?php echo esc_url($appdetail_theme_options['appdetail-video-url'] ); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/vid-con.png">
                </a>
            </div>
        </div>
    </div>
<?php   } endif;

/************************* Home Screenshot Section************************************/

if (!function_exists('appdetail_home_screenshot')) :
    function appdetail_home_screenshot()
    {
        global $appdetail_theme_options;
        $screencategory_id = $appdetail_theme_options['appdetail-screenshot-cat'];
        ?>
         <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="all-title">
                        <h3 class="t-border"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-screenshot-title'] );
                        ?></h3>
                    <p><?php
                            echo esc_html( $appdetail_theme_options['appdetail-screenshot-description'] );
                        ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($screencategory_id!=''){ ?>
            <style type="text/css">
                .swiper-container::before {
                    background: url(<?php echo get_template_directory_uri() ?>/assets/images/iphone-top.png) no-repeat right;
                }
            </style>
        <?php } ?> 
        <div class="swiper-container appin-screenshot"> 
            <div class="swiper-wrapper">
                <?php 
                $args = array( 'cat' =>$screencategory_id , 'posts_per_page' => -1 );
                $query = new WP_Query($args);
                if($query->have_posts()):
                  while($query->have_posts()):
                   $query->the_post();
                   if(has_post_thumbnail()){
                       $image_id = get_post_thumbnail_id();
                       $image_url = wp_get_attachment_image_src( $image_id,'',true );
            ?>
            <div class="swiper-slide">
                <img class="img-responsive" src="<?php echo esc_url($image_url[0]);?>">
            </div>
            <?php } endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
        <div class="screen-nav clearfix">
            <div class="prev">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="next">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
<?php   } endif;

/************************* Home Testimonial Section************************************/

if (!function_exists('appdetail_home_testimonial')) :
    function appdetail_home_testimonial()
    {
        global $appdetail_theme_options;
        $testicategory_id = $appdetail_theme_options['appdetail-testimonial-cat'];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="all-title">
                        <h3 class="t-border"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-testimonial-title'] );
                        ?></h3>
                    <p><?php
                            echo esc_html( $appdetail_theme_options['appdetail-testimonial-description'] );
                        ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="testi owl-carousel owl-theme" id="testi">
                 <?php 
                    $args = array( 'cat' =>$testicategory_id , 'posts_per_page' => -1 );
                    $query = new WP_Query($args);
                    if($query->have_posts()):
                      while($query->have_posts()):
                       $query->the_post();
                       if(has_post_thumbnail()){
                           $image_id = get_post_thumbnail_id();
                           $image_url = wp_get_attachment_image_src( $image_id,'',true );
                ?>
                <div class="testimonial">
                    <div class="testi-top">
                        <div class="tag"></div>
                        <div class="quote">
                            <h5><?php echo get_the_date(); ?></h5>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="student">
                        <img class="photo" src="<?php echo esc_url($image_url[0]);?>">
                        <h4><?php the_title(); ?></h4>
                    </div>
                </div>
               <?php } endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    <!-- ====== End client ====== -->
<?php   } endif;

/************************* Home Blog Section************************************/
if (!function_exists('appdetail_home_blog')) :
    function appdetail_home_blog()
    {
        global $appdetail_theme_options;
        $blogcategory_id = $appdetail_theme_options['appdetail-blog-cat'];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="all-title">
                        <h3 class="t-border"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-blog-title'] );
                        ?></h3>
                    <p><?php
                            echo esc_html( $appdetail_theme_options['appdetail-blog-description'] );
                        ?></p>
                    </div>
                </div>
            </div>
            <div class="row center-grid">
                <?php 
                    $args = array( 'cat' =>$blogcategory_id , 'posts_per_page' => -1 );
                    $query = new WP_Query($args);
                    if($query->have_posts()):
                      while($query->have_posts()):
                       $query->the_post();
                       if(has_post_thumbnail()){
                           $image_id = get_post_thumbnail_id();
                           $image_url = wp_get_attachment_image_src( $image_id,'',true );
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-top">
                            <img src="<?php echo esc_url($image_url[0]);?>">
                        </div>
                        <div class="blog-admin">
                            <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>">
                        </div>
                        <div class="blog-bottom">
                            <h4 class="h-border"><?php echo esc_html__( 'By', 'appdetail' ); ?> <?php the_author(); ?>
                                    </a></h4>
                            <span><?php echo get_the_date(); ?></span>

                            <h5 class="h-border"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <?php the_excerpt(); ?>
                        </div>
                        <a class="btn btn-custom" href="<?php the_permalink(); ?>"><?php
                            echo esc_html( $appdetail_theme_options['appdetail-read-more-text'] );
                        ?></a>
                    </div>
                </div>
                <?php } endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    <!-- ====== End client ====== -->
<?php   } endif;

/**

 * Post Navigation Function
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('appdetail_posts_pagination') ) :
    function appdetail_posts_pagination() {
       
            the_posts_pagination();
        }
       
    
endif;
add_action( 'appdetail_action_navigation', 'appdetail_posts_pagination', 10 );

/*
* Remove [...] from default fallback excerpt content
*
*/
function appdetail_excerpt_more( $more ) {
  if(is_admin())
  {
    return $more;
  }
  return '...';
}
add_filter( 'excerpt_more', 'appdetail_excerpt_more');


/*
* Widget Enqueue 
*/
if (!function_exists('appdetail_widgets_backend_enqueue')) : 
function appdetail_widgets_backend_enqueue($hook){  

  if ( 'widgets.php' != $hook )
   {
            return;
        
   }
    wp_register_script( 'appdetail-custom-widgets', get_template_directory_uri().'/assets/js/widgets.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'appdetail-custom-widgets' );
}

add_action( 'admin_enqueue_scripts', 'appdetail_widgets_backend_enqueue' );

endif;

/**
 * Sanitizing the select callback example
 *
 * @since appdetail 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('appdetail_sanitize_select') ) :
   
    function appdetail_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**
 * Sanitize checkbox field
 *
 *  @since appdetail 1.0.0
 */
if (!function_exists('appdetail_sanitize_checkbox')) :
    function appdetail_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;

/**
 * Sanitizing the image callback example
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @since appdetail 1.0.0
 *
 * @param string $image Image filename.
 * @param $setting Setting instance.
 * @return string the image filename if the extension is allowed; otherwise, the setting default.
 *
 */
if ( !function_exists('appdetail_sanitize_image') ) :
    function appdetail_sanitize_image( $image, $setting ) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
endif;