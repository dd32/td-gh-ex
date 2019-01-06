<?php
/**
 * Header Navigation File
 *
 * @package advance-education
 */
?>

<div id="header">
  <div class="main-menu">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="logo">
            <?php if( has_custom_logo() ){ advance_education_the_custom_logo();
             }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; }?>
          </div>
        </div>
        <div class="col-lg-8 col-md-7">
          <div class="nav">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <div class="search-box">
            <i class="fas fa-search"></i>
          </div>
        </div>
      </div>
      <div class="serach_outer">
        <div class="closepop"><i class="far fa-window-close"></i></div>
        <div class="serach_inner">
         <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>