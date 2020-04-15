<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks
 *
 * @package Fmi
 */

// Header Offcanvas Button
if ( ! function_exists( 'vs_header_offcanvas_button' ) ) {
  function vs_header_offcanvas_button() {
    ?>
    <a class="navbar-toggle-offcanvas toggle-offcanvas" href="javascript:void(0)">
      <i class="vs-icon vs-icon-bars"></i>
    </a>
    <?php
  }
}

// Header Logo
if ( ! function_exists( 'vs_header_logo' ) ) {
  function vs_header_logo() {
    ?>
    <div class="site-branding-logo">
      <?php the_custom_logo();?>
      <?php if ( ! get_theme_mod( 'header_title', 0 )):?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php endif;?>
    </div>
    <?php
  }
}

// Header Search
if ( ! function_exists( 'vs_header_search' ) ) {
  function vs_header_search() {
    if ( ! get_theme_mod( 'header_search', 0 )) {
      ?>
      <div class="site-branding-search">
          <?php get_search_form(); ?>
      </div>
      <?php
    }
  }
}

// Navbar Nav Menu
if ( ! function_exists( 'vs_navbar_nav_menu' ) ) {
  function vs_navbar_nav_menu() {
    if ( has_nav_menu( 'primary' ) ) {
      wp_nav_menu( array(
        'menu_class'      => 'navbar-nav',
        'theme_location'  => 'primary',
        'container'       => '',
        'container_class' => '',
      ) );
    }
  }
}

// Scroll To Top
if ( ! function_exists( 'vs_scroll_to_top' ) ) {
  function vs_scroll_to_top() {
    $misc_scroll_to_top = get_theme_mod( 'misc_scroll_to_top', 1 );
    if ( 1 === $misc_scroll_to_top ) {
      ?>
      <a href="#top" class="vs-scroll-to-top">
        <i class="vs-icon vs-icon-chevron-up"></i>
      </a>
      <?php
    }
  }
}

// Off-canvas
if ( ! function_exists( 'vs_offcanvas' ) ) {
  function vs_offcanvas() {
    get_template_part( 'template-parts/offcanvas' );
  }
}

// Single Author
if ( ! function_exists( 'vs_single_author' ) ) {
  function vs_single_author() {
    if ( ! is_singular( 'post' ) ) {
      return;
    }
    if ( get_theme_mod( 'post_about_author', 0 ) ) {
      get_template_part( 'template-parts/post-author' );
    }
  }
}

// Single Prev Next
if ( ! function_exists( 'vs_single_prev_nex' ) ) {
  function vs_single_prev_nex() {
    if ( ! is_singular( 'post' ) ) {
      return;
    }
    if ( get_theme_mod( 'post_prev_next', 1 ) ) {
      get_template_part( 'template-parts/post-prev-next' );
    }
  }
}

// Comments
if ( ! function_exists( 'vs_comments' ) ) {
  function vs_comments() {
    if ( post_password_required() ) {
      return;
    }
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
  }
}
