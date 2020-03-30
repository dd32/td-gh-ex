<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks
 *
 * @package Fmi
 */

if ( ! function_exists( 'vs_social_links' ) ) {
  /**
   * Social Links
   */
  function vs_social_links() {
    $social_url = array();
    $social_list = array(
'facebook',
'twitter',
'instagram',
'pinterest',
'youtube',
'telegram',
'vimeo',
'soundcloud',
'spotify',
'dribbble',
'behance',
'github',
'ok',
'vk',
'xing',
'linkedin',
'twitch',
'flickr',
'snapchat',
'medium',
'weibo',
'wechat',
'tumblr',
'reddit',
'bloglovin',
'rss'
    );
    foreach ($social_list as $social_list_value) {
      $social_url[$social_list_value] = get_theme_mod( 'social_'.$social_list_value);
    }
    $social_url_empty = true;
    foreach ($social_url as $social_url_key => $social_url_value) {
      if ($social_url_value) {
        $social_url_empty = false;
        break;
      }
    }
    if ( ! $social_url_empty ) {
      ?>
      <div class="social-links-wrap">
      <?php
      foreach ($social_url as $social_url_key => $social_url_value) {
        if ( $social_url_value ) {
          echo '<a href="'.esc_url( $social_url_value ).'" target="_blank"><i class="vs-icon vs-icon-'.esc_attr( $social_url_key ).'"></i></a>';
        }
      }
      ?>
      </div>
      <?php
    }
  }
}

if ( ! function_exists( 'vs_scroll_to_top' ) ) {
  /**
   * Scroll To Top
   */
  function vs_scroll_to_top() {
    $misc_scroll_to_top = get_theme_mod( 'misc_scroll_to_top', true );
    if ( true === $misc_scroll_to_top ) {
      ?>
      <a href="#top" class="vs-scroll-to-top">
        <i class="vs-icon vs-icon-chevron-up"></i>
      </a>
      <?php
    }
  }
}

if ( ! function_exists( 'vs_offcanvas' ) ) {
  /**
   * Off-canvas
   */
  function vs_offcanvas() {
    get_template_part( 'template-parts/offcanvas' );
  }
}
