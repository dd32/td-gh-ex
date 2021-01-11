<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-5">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php if( get_theme_mod('academic_education_site_title_tagline',true) != ''){ ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
                <p class="site-description">
                  <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 row">
        <div class="col-lg-6 col-md-6">
          <div class="call">
            <?php if( get_theme_mod( 'academic_education_call','' ) != '' || get_theme_mod( 'academic_education_call_text','' ) != '') { ?>
              <div class="row">
                <div class="col-lg-2 col-md-2"><i class="fas fa-phone"></i></div>
                <div class="col-lg-10 col-md-10">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_call_text','') ); ?></p>
                  <a href="tel:<?php echo esc_url( get_theme_mod('academic_education_call','' )); ?>"><?php echo esc_html( get_theme_mod('academic_education_call','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('academic_education_call','') ); ?></span></a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="email">
            <?php if( get_theme_mod( 'academic_education_mail','' ) != '' || get_theme_mod( 'academic_education_mail_text','' ) != '') { ?>
              <div class="row">
                <div class="col-lg-2 col-md-2"><i class="fas fa-envelope-open"></i></div>
                <div class="col-lg-10 col-md-10">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_mail_text','') ); ?></p>
                  <a href="mailto:<?php echo esc_url( get_theme_mod('academic_education_mail','') ); ?>"><?php echo esc_html( get_theme_mod('academic_education_mail','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('academic_education_mail','') ); ?></span></a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div> 
</div>