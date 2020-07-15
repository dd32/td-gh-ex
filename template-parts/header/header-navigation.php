<?php
/**
 * Header Navigation File
 *
 * @package advance-education
 */
?>
<div id="header" class="<?php if( get_theme_mod( 'advance_education_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
  <div class="main-menu">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
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
          </div>
        </div>
        <div class="col-lg-8">  
          <div id="menu-sidebar" class="nav sidebar">
            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-education' ); ?>">
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu-navigation clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              ?>
              <div id="contact-info">
                <?php if( get_theme_mod('advance_education_time') != ''){ ?>
                  <div class="time">
                    <span><?php echo esc_html( get_theme_mod('advance_education_time','')); ?></span>
                  </div>
                <?php } ?>
                <?php if( get_theme_mod('advance_education_phone1') != ''){ ?>
                  <div class="phone">
                    <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_education_phone1','' )); ?></span>
                  </div> 
                <?php } ?>
                <?php if( get_theme_mod('advance_education_mail1') != ''){ ?>
                  <div class="mail">
                    <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_education_mail1','')); ?></span>
                  </div>  
                <?php } ?>
                <?php get_search_form();?>
                <div class="account-btn">
                  <a href="<?php the_permalink((get_option('woocommerce_myaccount_page_id'))); ?>"><?php echo esc_html_e('MY ACCOUNT','advance-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'MY ACCOUNT','advance-education' );?></span></a>
                </div>
              </div>
              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="advance_education_resmenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-education'); ?></span></a>
            </nav>
          </div>
        </div>
        <div class="col-lg-1">
          <a href="#" onclick="advance_education_search_open()" class="search-box">
            <i class="fas fa-search"></i><span class="screen-reader-text"><?php esc_html_e( 'Search','advance-education' );?></span>
          </a>
        </div>
      </div>
      <div class="serach_outer">
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
        <a href="#maincontent" onclick="advance_education_search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','advance-education' );?></span></a>
      </div>
    </div>
  </div>
</div>