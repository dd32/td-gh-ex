<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Fmi
 */

if (!function_exists('vs_entry_content')) {
  function vs_entry_content() {
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
        <?php
        the_content( sprintf(
          wp_kses(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fmi' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ) );
        ?>
      </div>
      <!-- end excerpt (post content) -->

      <?php
    }
  }
}

if (!function_exists('vs_slider')) {
  function vs_slider() {
?>
  <div class="slider-wrap">
    <div class="slider-cycle">
      <?php
      for( $i = 1; $i <= 4; $i++ ) {
        $vs_slider_title = get_theme_mod( 'slider_title'.$i , '' );
        $vs_slider_text  = get_theme_mod( 'slider_text'.$i  , '' );
        $vs_slider_image = get_theme_mod( 'slider_image'.$i , '' );
        $vs_slider_link  = get_theme_mod( 'slider_link'.$i  , '' );
        if( !empty( $vs_slider_image ) ) {
      ?>
          <section id="featured-slider">
            <div class="slider-image-wrap">
              <img alt="<?php echo esc_attr( $vs_slider_title ); ?>" src="<?php echo esc_url( $vs_slider_image ); ?>">
              </div>
              <?php if( !empty( $vs_slider_title ) || !empty( $vs_slider_text ) ) { ?>
                <article class="slider-text-box">
                  <div class="inner-wrap">
                    <div class="slider-text-wrap">
<?php if( !empty( $vs_slider_title )  ) { ?>
<span class="slider-title clearfix">
<a title="<?php echo esc_attr( $vs_slider_title ); ?>" <?php if(!empty($vs_slider_link)){ ?> href="<?php echo esc_url( $vs_slider_link ); ?>"<?php }?>><?php echo esc_html( $vs_slider_title ); ?></a>
</span>
<?php } ?>
<?php if( !empty( $vs_slider_text )  ) { ?>
<span class="slider-content"><?php echo esc_html( $vs_slider_text ); ?></span>
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

if (!function_exists('vs_page_header')) {
  function vs_page_header(){
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

if (!function_exists('vs_excerpt_length')) {
  function vs_excerpt_length($length) {
    $excerpt_length = get_theme_mod('blog_excerpt_length', 40);
    if ($excerpt_length) {
      $excerpt_length = intval($excerpt_length);
    } else {
      $excerpt_length = 40;
    }
    return $excerpt_length;
  }
}
add_filter('excerpt_length', 'vs_excerpt_length');

if (!function_exists('vs_editor_style')) {
  function vs_editor_style() {

    // add stylesheets
    add_editor_style(array(
      'assets/css/editor-style.css',
      'assets/font-awesome/css/font-awesome.min.css'
    ));

  }
}
add_action('init', 'vs_editor_style');
