<?php
/**
 * The template part for top header
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo">
          <?php if( has_custom_logo() ){ automotive_centre_the_custom_logo();
            }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="row info-box">
          <?php if( get_theme_mod( 'automotive_centre_phone_text') != '' || get_theme_mod( 'automotive_centre_phone_number') != '') { ?>
            <div class="col-lg-2 col-md-12 col-3">
              <i class="fas fa-phone"></i>
            </div>
            <div class="col-lg-10 col-md-12 col-9">
              <h6><?php echo esc_html(get_theme_mod('automotive_centre_phone_text',''));?></h6>
              <p><?php echo esc_html(get_theme_mod('automotive_centre_phone_number',''));?></p>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-4 col-md-3">
        <div class="row info-box">
          <?php if( get_theme_mod( 'automotive_centre_email_text') != '' || get_theme_mod( 'automotive_centre_email_address') != '') { ?>
            <div class="col-lg-2 col-md-12 col-3">
              <i class="fas fa-envelope-open"></i>
            </div>
            <div class="col-lg-10 col-md-12 col-9">
              <h6><?php echo esc_html(get_theme_mod('automotive_centre_email_text',''));?></h6>
              <p><?php echo esc_html(get_theme_mod('automotive_centre_email_address',''));?></p>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-2 col-md-3">
        <?php if( get_theme_mod( 'automotive_centre_top_button_url') != '' || get_theme_mod( 'automotive_centre_top_button_text') != '') { ?>
          <div class="top-btn">
            <a href="<?php echo esc_url(get_theme_mod('automotive_centre_top_button_url',''));?>"><?php echo esc_html(get_theme_mod('automotive_centre_top_button_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'SELL YOUR CAR','automotive-centre' );?></span></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>