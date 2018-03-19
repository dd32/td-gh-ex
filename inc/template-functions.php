<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package fmi
 */

if (!function_exists('fmi_post_excerpt')) {
  function fmi_post_excerpt() {
    $excerpt_type = get_theme_mod('blog_excerpt_type', 'excerpt');
    if ($excerpt_type == 'excerpt') {
      ?>

      <!-- excerpt -->
      <div class="entry-content clearfix">
        <?php the_excerpt(); ?>
      </div>
      <!-- end excerpt -->

      <?php
    } else {
      ?>

      <!-- excerpt (post content) -->
      <div class="entry-content clearfix">
        <?php the_content('[...]', false); ?>
      </div>
      <!-- end excerpt (post content) -->

      <?php
    }
  }
}

if (!function_exists('fmi_slider')) {
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
}

if (!function_exists('fmi_page_header')) {
  function fmi_page_header(){
    // author page
    if (is_author()) {
?>
      <header class="page-header">
        <h1 class="page-title"><?php the_archive_title();?></h1>
        <?php if (get_the_author_meta('description')) { ?>
        <div class="archive-description"><?php the_author_meta('description'); ?></div>
        <?php }?>
      </header><!-- .page-header -->
<?php
    // category/tag page
    } else if (is_category() || is_tag()) {
?>
      <header class="page-header">
        <h1 class="page-title"><?php the_archive_title();?></h1>
        <?php if (get_the_archive_description()) { ?>
        <div class="archive-description"><?php the_archive_description();?></div>
        <?php }?>
      </header><!-- .page-header -->
<?php
    // search results page
    } else if (is_search()) { 
?>
      <header class="page-header">
        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fmi' ), '<span>' . get_search_query() . '</span>' );?></h1>
      </header><!-- .page-header -->
<?php
    // archive page
    } else if (is_archive()) {
?>
      <header class="page-header">
        <h1 class="page-title"><?php the_archive_title();?></h1>
      </header><!-- .page-header -->
<?php
    }
  }
}

if (!function_exists('fmi_get_custom_style')) {
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
}
