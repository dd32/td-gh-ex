<?php
/**
 * Header Navigation File
 *
 * @package advance-startup
 */
?>

<div id="header">
  <div class="main-menu">
    <div class="container">
      <div class="menu-color">
        <div class="row ">
          <div class="col-lg-11 col-md-6 col-6">
            <div class="toggle-menu responsive-menu">
              <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-startup'); ?></span></button>
            </div>
            <div id="menu-sidebar" class="nav side-menu">
              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-startup' ); ?>">
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-startup'); ?></span></a>
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu-navigation clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
              </nav>
            </div>
          </div>
          <div class="col-lg-1 col-md-6 col-6 search-box">
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