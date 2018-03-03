<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fmi
 */

if ( ! function_exists( 'fmi_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function fmi_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( 'c' ) ),
      esc_html( get_the_modified_date() )
    );

    $time_string = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
    echo '<span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i> ' . $time_string . '</span>';

    $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
    echo '<span class="byline"><i class="fa fa-user" aria-hidden="true"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

    if (! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
            __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fmi' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      echo '</span>';
    }
  }
endif;

if ( ! function_exists( 'fmi_entry_footer' ) ) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function fmi_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', 'fmi' ) );
      if ( $categories_list ) {
        echo '<span class="cat-links"><i class="fa fa-list" aria-hidden="true"></i> ' . $categories_list . '</span>';
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'fmi' ) );
      if ( $tags_list ) {
        echo '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . $tags_list . '</span>';
      }
    }
  }
endif;

function fmi_posts_navigation() {
  the_posts_navigation(array(
    'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i> '.esc_html__('Older posts','fmi'),
    'next_text'  => esc_html__('Newer posts','fmi').' <i class="fa fa-caret-right" aria-hidden="true"></i>'      
  ));
}

function fmi_post_navigation(){
  the_post_navigation( array(
        'prev_text' => '<span>'.esc_html__('Previous Post','fmi').'</span> %title',
        'next_text' => '<span>'.esc_html__('Next Post','fmi').'</span> %title'
  ) );
}

function fmi_comments_navigation(){
  the_comments_navigation(array(
    'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i> '.esc_html__( 'Older comments' ,'fmi'),
    'next_text' => esc_html__( 'Newer comments' ,'fmi').' <i class="fa fa-caret-right" aria-hidden="true"></i>'
  ));
}

function fmi_posts_pagination(){
  the_posts_pagination(array(
    'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i>',
    'next_text' => '<i class="fa fa-caret-right" aria-hidden="true"></i>'
  ));
}