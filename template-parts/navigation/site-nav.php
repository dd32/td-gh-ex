<?php 
/*
* Display Theme menus
*/
?>

<div class="header">
  <div class="container">
    <div class="menubox">
        <div class="toggle-menu responsive-menu">
          <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','academic-education'); ?></span></button>
        </div>
          <div id="menu-sidebar" class="nav sidebar">
            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'academic-education' ); ?>">
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','academic-education'); ?></span></a>
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
  </div>
</div>