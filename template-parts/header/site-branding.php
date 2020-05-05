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
          <?php if( has_custom_logo() ){ 
            academic_education_the_custom_logo();
          }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p> 
          <?php endif; }?>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 row">
        <div class="col-lg-6 col-md-6">
          <div class="call">
            <?php if( get_theme_mod( 'academic_education_call','' ) != '') { ?>
              <div class="row">
                <div class="col-lg-2 col-md-2"><i class="fas fa-phone"></i></div>
                <div class="col-lg-10 col-md-10">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_call_text','') ); ?></p>
                  <p><?php echo esc_html( get_theme_mod('academic_education_call','') ); ?></p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="email">
            <?php if( get_theme_mod( 'academic_education_mail','' ) != '') { ?>
              <div class="row">
                <div class="col-lg-2 col-md-2"><i class="fas fa-envelope-open"></i></div>
                <div class="col-lg-10 col-md-10">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_mail_text','') ); ?></p>
                  <p><?php echo esc_html( get_theme_mod('academic_education_mail','') ); ?></p>
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