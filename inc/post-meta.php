<?php
/**
 * Post Meta Helper Functions
 *
 * @package Fmi
 */

if ( ! function_exists( 'vs_get_meta_categorys' ) ) {
  /**
   * Сategory
   */
  function vs_get_meta_categorys() {
    $category_list = get_the_category_list();
    if ( $category_list ) {
      ?>
      <span class="meta-category"><i class="vs-icon vs-icon-list"></i><?php echo $category_list; ?></span>
      <?php
    }
  }
}

if ( ! function_exists( 'vs_get_meta_date' ) ) {
  /**
   * Date
   */
  function vs_get_meta_date() {
    $time_string = get_the_date();
    if ( get_the_time( 'd.m.Y H:i' ) !== get_the_modified_time( 'd.m.Y H:i' ) ) {
      if ( ! get_theme_mod( 'misc_published_date', true ) ) {
        $time_string = get_the_modified_date();
      }
    }
    ?>
    <span class="meta-date"><i class="vs-icon vs-icon-calendar"></i><?php echo apply_filters( 'vs_post_meta_date_output', $time_string ); ?></span>
    <?php
  }
}

if ( ! function_exists( 'vs_get_meta_author' ) ) {
  /**
   * Author
   */
  function vs_get_meta_author() {
    ?>
    <span class="meta-author"><i class="vs-icon vs-icon-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
    <?php
  }
}

if ( ! function_exists( 'vs_get_meta_comments' ) ) {
  /**
   * Comments
   */
  function vs_get_meta_comments() {
    if ( ! comments_open() ) {
      return;
    }
    ?>
    <span class="meta-comments"><i class="vs-icon vs-icon-comments"></i><?php comments_popup_link( esc_html__( '0 Comments', 'fmi' ), esc_html__( '1 Comment', 'fmi' ), '% ' . esc_html__( 'Comments', 'fmi' ), 'comments-link', '' ); ?></span>
    <?php
  }
}

if ( ! function_exists( 'vs_get_meta_tags' ) ) {
  /**
   * Tags
   */
  function vs_get_meta_tags() {
    $tags_list = get_the_tag_list();
    if ( $tags_list ) {
      ?>
      <span class="meta-tags"><i class="vs-icon vs-icon-tags"></i><?php echo $tags_list; ?></span>
      <?php
    }
  }
}
