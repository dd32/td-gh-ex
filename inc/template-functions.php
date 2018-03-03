<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package fmi
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fmi_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'fmi_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function fmi_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'fmi_pingback_header' );

function fmi_sidebar_select() { 
  if(is_page()){
    $page_layout = get_theme_mod( 'page_layout', 0);
    if($page_layout){
    
    }else{
      get_sidebar();
    }
  }else{
    $home_layout = get_theme_mod( 'home_layout', 0);
    if($home_layout){
    
    }else{
      get_sidebar();
    }
  }
}

function fmi_body_class( $classes ) {
  if(is_page()){
    $page_layout = get_theme_mod( 'page_layout', 0);
    if($page_layout){
      $classes[] = 'no-sidebar-full-width';
    }else{
  
    }
  }else{
    $home_layout = get_theme_mod( 'home_layout', 0);
    if($home_layout){
      $classes[] = 'no-sidebar-full-width';
    }else{

    }
  }
  return $classes;
}
add_filter( 'body_class', 'fmi_body_class' );

function fmi_slider() {
?>
  <div class="slider-wrap">
    <div class="slider-cycle">
      <?php
      for( $i = 1; $i <= 4; $i++ ) {
        $fmi_slider_title = get_theme_mod( 'slider_title'.$i , '' );
        $fmi_slider_text  = get_theme_mod( 'slider_text'.$i  , '' );
        $fmi_slider_image = get_theme_mod( 'slider_image'.$i , '' );
        $fmi_slider_link  = get_theme_mod( 'slider_link'.$i  , '' );
        if( !empty( $fmi_slider_image ) ) {
      ?>
          <section id="featured-slider">
            <div class="slider-image-wrap">
              <img alt="<?php echo esc_attr( $fmi_slider_title ); ?>" src="<?php echo esc_url( $fmi_slider_image ); ?>">
              </div>
              <?php if( !empty( $fmi_slider_title ) || !empty( $fmi_slider_text ) ) { ?>
                <article class="slider-text-box">
                  <div class="inner-wrap">
                    <div class="slider-text-wrap">
<?php if( !empty( $fmi_slider_title )  ) { ?>
<span class="slider-title clearfix">
<a title="<?php echo esc_attr( $fmi_slider_title ); ?>" <?php if(!empty($fmi_slider_link)){ ?> href="<?php echo esc_url( $fmi_slider_link ); ?>"<?php }?>><?php echo esc_html( $fmi_slider_title ); ?></a>
</span>
<?php } ?>
<?php if( !empty( $fmi_slider_text )  ) { ?>
<span class="slider-content"><?php echo esc_html( $fmi_slider_text ); ?></span>
<?php } ?>
                    </div>
                  </div>
              </article>
            <?php } ?>
          </section>
        <?php
        }
      }
      ?>
    </div>
    <nav id="controllers" class="clearfix">
    </nav>
  </div>
<?php
}

function fmi_get_custom_style(){
    $css = '';
    $primary_color = esc_attr( get_theme_mod( 'theme_color' ) );
    if ( $primary_color ) {
        $primary_color = '#'.$primary_color;
$css .= '
blockquote{
  border-left: 4px solid '.$primary_color.';
}
button,
input[type="button"],
input[type="reset"],
input[type="submit"]{
  background: '.$primary_color.';
}
input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="range"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="time"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="color"]:focus,
textarea:focus{
  border:1px solid '.$primary_color.';
}
a{
  color:'.$primary_color.';
}
.site-title a{
  color:'.$primary_color.';
}
.site-title a:hover,
.site-title a:focus,
.site-title a:active{
  color:'.$primary_color.';
}
.main-navigation{
  background: '.$primary_color.';
}
.main-navigation .menu >li ul{
  background:'.$primary_color.';
}
.entry-title{
  color:'.$primary_color.';
}
.entry-meta a:hover,
.entry-meta a:focus{
  color:'.$primary_color.';
}
.entry-footer a:hover,
.entry-footer a:focus{
  color:'.$primary_color.';
}
.widget a:hover,
.widget a:focus{
  color:'.$primary_color.';
}
.comment-meta a:hover,
.comment-meta a:focus{
  color:'.$primary_color.';
}
.comment-meta .fn a:hover,
.comment-meta .fn a:focus{
  color:'.$primary_color.';
} 
.pagination .nav-links a:hover,
.pagination .nav-links a:focus{
  color:'.$primary_color.';
}
.pagination .nav-links .current {
  color:'.$primary_color.';
}
.site-info a:hover,
.site-info a:focus{
  color:'.$primary_color.';
}   
#back_top{
  background:'.$primary_color.';
}
#slider-title a {
  background: '.$primary_color.';
}
.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span{
  color: '.$primary_color.';
  background-color: '.$primary_color.';
}
.slider-wrap .owl-theme .owl-controls .owl-buttons div {
  color: '.$primary_color.';
}
@media (max-width: 991px){
  .main-navigation{
    background: none;
  }
}
';
  }
  
    $primary_color2 = esc_attr( get_theme_mod( 'theme_color_2' ) );
    if ( $primary_color2 ) {
        $primary_color2 = '#'.$primary_color2;
$css .= '
a:hover,
a:focus, 
a:active{
  color:'.$primary_color2.';
}
.menu-toggle i{
  color:'.$primary_color2.';
}
.widget-title{
  color:'.$primary_color2.';
}
.post-navigation span{
  color:'.$primary_color2.';
}
';
    }
    return $css;
}