<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">      
      <div class="email col-lg-4 col-md-4">
        <?php if( get_theme_mod( 'adventure_travelling_mail_text' ) != '' || get_theme_mod( 'adventure_travelling_mail' ) != '') { ?>
          <div class="row">
            <div class="col-lg-2 col-md-2"><i class="fas fa-envelope-open"></i></div>
            <div class="col-lg-10 col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('adventure_travelling_mail_text','')); ?></p>
              <p><?php echo esc_html( get_theme_mod('adventure_travelling_mail','') ); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <?php if( has_custom_logo() ){ adventure_travelling_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p> 
          <?php endif; }?>
        </div>
      </div>
      <div class="call col-lg-4 col-md-4">
        <?php if( get_theme_mod( 'adventure_travelling_call_text' ) != '' || get_theme_mod( 'adventure_travelling_call' ) != '') { ?>
          <div class="row">
            <div class="col-lg-10 col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('adventure_travelling_call_text','') ); ?></p>
              <p><?php echo esc_html( get_theme_mod('adventure_travelling_call','') ); ?></p>
            </div>
            <div class="col-lg-2 col-md-2"><i class="fas fa-phone"></i></div>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div> 
</div>