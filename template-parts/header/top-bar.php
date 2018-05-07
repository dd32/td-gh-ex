<?php 
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-7">
        <div class="timebox">
          <?php if( get_theme_mod( 'academic_education_timming','' ) != '') { ?>
            <i class="far fa-clock"></i><span class="phone"><?php echo esc_html( get_theme_mod('academic_education_timming',__('Monday - Friday: 10:00-17:00 Saturday - Sunday','academic-education') )); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-md-5 col-sm-5">
        <div class="social-media">
          <?php if( get_theme_mod( 'academic_education_facebook_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'academic_education_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'academic_education_twitter_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'academic_education_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'academic_education_google_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'academic_education_google_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'academic_education_youtube_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'academic_education_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'academic_education_pint_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'academic_education_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>