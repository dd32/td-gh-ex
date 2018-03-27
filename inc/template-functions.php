<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package fmi
 */

if (!function_exists('fmi_entry_content')) {
  function fmi_entry_content() {
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

if (!function_exists('fmi_excerpt_length')) {
  function fmi_excerpt_length($length) {
    $excerpt_length = get_theme_mod('blog_excerpt_length', 40);
    if ($excerpt_length) {
      $excerpt_length = intval($excerpt_length);
    } else {
      $excerpt_length = 40;
    }
    return $excerpt_length;
  }
}
add_filter('excerpt_length', 'fmi_excerpt_length');

if (!function_exists('fmi_editor_style')) {
  function fmi_editor_style() {

    // add stylesheets
    add_editor_style(array(
      'assets/css/editor-style.css',
      'assets/font-awesome/css/font-awesome.min.css'
    ));

  }
}
add_action('init', 'fmi_editor_style');
