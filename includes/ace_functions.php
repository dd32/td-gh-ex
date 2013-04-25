<?php
// ==================================================================
// Theme custom css
// ==================================================================
function adelle_theme_css() {

  if( get_option("adelle_theme_css") ) { ?>
    <style type="text/css">
    <?php echo stripslashes( get_option('adelle_theme_css') ); ?>
    </style>
  <?php }

}

// ==================================================================
// Heading
// ==================================================================
function adelle_theme_heading() {

  if( get_header_image() == true ) { ?>
    <a href="<?php echo esc_url( home_url() ); ?>">
      <img src="<?php header_image(); ?>" class="header-title" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
    </a>
  <?php } elseif( is_home() || is_front_page() ) { ?>
      <h1><a href="<?php echo esc_url( home_url() ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
      <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php } else { ?>
      <h5><a href="<?php echo esc_url( home_url() ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
      <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php }

}

// ==================================================================
// Header scripts
// ==================================================================
function adelle_theme_header_scripts() {

  if( get_option('adelle_theme_header_scripts') ) { echo stripslashes( get_option('adelle_theme_header_scripts') ); }

}

// ==================================================================
// Footer scripts
// ==================================================================
function adelle_theme_footer_scripts() {

  if( get_option('adelle_theme_footer_scripts') ) { echo stripslashes( get_option('adelle_theme_footer_scripts') ); }

}