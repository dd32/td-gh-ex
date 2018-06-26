<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="logo">
          <?php if( has_custom_logo() ){ academic_education_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p> 
          <?php endif; }?>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 row">
        <div class="call col-md-6 col-sm-4">
          <?php if( get_theme_mod( 'academic_education_call','' ) != '') { ?>
            <div class="col-md-2"><i class="fas fa-phone"></i></div>
            <div class="col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_call_text',__('Have Any Questions?','academic-education')) ); ?></p>
              <p><?php echo esc_html( get_theme_mod('academic_education_call',__('+91 968 923 9632','academic-education')) ); ?></p>
            </div>
          <?php } ?>
        </div>
        <div class="email col-md-6 col-sm-5">
          <?php if( get_theme_mod( 'academic_education_mail','' ) != '') { ?>
            <div class="col-md-2"><i class="fas fa-envelope-open"></i></div>
            <div class="col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('academic_education_mail_text',__('Free Support','academic-education')) ); ?></p>
              <p><?php echo esc_html( get_theme_mod('academic_education_mail',__('info@example.com','academic-education')) ); ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div> 
</div>