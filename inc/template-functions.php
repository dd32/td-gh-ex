<?php
/**
 * Template Functions
 *
 * @package Fmi
 */

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
