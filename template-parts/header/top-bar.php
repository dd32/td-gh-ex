<?php 
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-7">
        <div class="timebox">
          <?php if( get_theme_mod( 'academic_education_timming','' ) != '') { ?>
            <i class="far fa-clock"></i><span class="phone"><?php echo esc_html( get_theme_mod('academic_education_timming','')); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="social-media">
            <?php if( get_theme_mod( 'academic_education_facebook_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'academic_education_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','academic-education' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'academic_education_twitter_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'academic_education_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','academic-education' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'academic_education_google_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'academic_education_google_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google-plus','academic-education' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'academic_education_youtube_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'academic_education_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','academic-education' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'academic_education_pint_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'academic_education_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','academic-education' );?></span></a>
            <?php } ?>
          </div>
        </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
