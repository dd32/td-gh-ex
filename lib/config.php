<?php

/**
 * Configuration values
 */

define('POST_EXCERPT_LENGTH', 40);

/**
 * .main classes
 */
function kadence_main_class() {
  if (kadence_display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'span8';
  } else {
    // Classes on full width pages
    $class = 'span12';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function kadence_sidebar_class() {
  return 'span4';
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function kadence_display_sidebar() {

   if ( class_exists( 'woocommerce' ) ) {
      global $smof_data; if(isset($smof_data['shop_layout']) && $smof_data['shop_layout'] == 'sidebar') {
        $sidebar_config = new Kadence_Sidebar(
        array('is_404','is_front_page','is_cart','is_product','is_checkout','is_account_page',array('is_singular', array('portfolio'))
        ),
        array('page-fullwidth.php','page-feature.php','page-portfolio.php','page-staff-grid.php','page-testimonial-grid.php','page-contact.php','page-gallery.php')
      );
      } else {
        $sidebar_config = new Kadence_Sidebar(
          array('is_404','is_front_page','is_shop','is_cart','is_product','is_checkout','is_account_page','is_product_tag','is_product_category',array('is_singular', array('portfolio'))
          ),
          array('page-fullwidth.php','page-portfolio.php','page-feature.php','page-staff-grid.php','page-testimonial-grid.php','page-contact.php','page-gallery.php')
        );
      }
  } else {
  $sidebar_config = new Kadence_Sidebar(
    array('is_404','is_front_page', array('is_singular', array('portfolio'))
      ),
    array('page-fullwidth.php','page-feature.php','page-portfolio.php','page-staff-grid.php','page-testimonial-grid.php','page-contact.php','page-gallery.php')
  );
}

  return $sidebar_config->display;
}

function kadence_display_topbar() {
  global $smof_data;
 if(isset($smof_data['topbar'])) {
  if($smof_data['topbar'] == 1 ) {$topbar = true;} else { $topbar = false;}
} else {$topbar = true;}
  return $topbar;
  }

// Add body class for wide or boxed layout
add_filter('body_class','layout_class_names');
function layout_class_names($classes) {
  global $smof_data;
  // add 'class-name' to the $classes array
  if(isset($smof_data['boxed_layout'])) {
    $layoutstyle = $smof_data['boxed_layout'];
  } else {
    $layoutstyle = 'wide';
  }

if ($layoutstyle == "boxed") {
  $classes[] = 'boxed';
}
else {
  $classes[] = 'wide';
}
  // return the $classes array
  return $classes;
}
/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 * Default: 940px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 940; }
