<?php
/**
 * Custom template tags for this theme
 *
 * @package fmi
 */

if (!function_exists('fmi_entry_header')) {
  function fmi_entry_header() {
    $show_date = get_theme_mod('blog_show_date', 1);
    $show_author = get_theme_mod('blog_show_author', 1);
    $show_comments_counter = get_theme_mod('blog_show_comments_counter', 1);

    echo '<header class="entry-header clearfix">';

    if ( is_singular() ) {
      the_title( '<h1 class="entry-title">', '</h1>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }

    if ($show_date || $show_author || $show_comments_counter) {
      if ( 'post' === get_post_type() ) {
        echo '<div class="entry-meta clearfix">';

        if ($show_date) {
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
        }

        if ($show_author) {
          $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
          echo '<span class="byline"><i class="fa fa-user" aria-hidden="true"></i> ' . $byline . '</span>';
        }

        if ($show_comments_counter) {
          if (! post_password_required() ) {
            if (comments_open()) {
              echo '<span class="comments-link"><i class="fa fa-comments"></i> <a href="'.get_the_permalink().'#comments">';
              comments_number(esc_html__('No Comments', 'fmi'), esc_html__('1 Comment', 'fmi'), esc_html__('% Comments', 'fmi'));
              echo '</a></span>';
            } else if (get_comments_number()) { 
              echo '<span class="comments-link"><i class="fa fa-comments"></i> <a href="'.get_the_permalink().'#comments">';
              comments_number('', esc_html__('1 Comment', 'fmi'), esc_html__('% Comments', 'fmi'));
              echo '</a></span>'; 
            }
          }
        }

        echo '</div><!-- .entry-meta -->';
      }
    }

    echo '</header><!-- .entry-header -->';
  }
}

if (!function_exists('fmi_entry_footer')) {
  function fmi_entry_footer() {
    $show_categories = get_theme_mod('blog_show_categories', 1);
    $show_tags = get_theme_mod('blog_show_tags', 1);

    if ($show_categories || $show_tags) {
      if ( 'post' === get_post_type() ) {
        echo '<footer class="entry-footer clearfix">';

        if ($show_categories) {
          $categories_list = get_the_category_list( esc_html__( ', ', 'fmi' ) );
          if ( $categories_list ) {
            echo '<span class="cat-links"><i class="fa fa-list" aria-hidden="true"></i> ' . $categories_list . '</span>';
          }
        }

        if ($show_tags) {
          $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'fmi' ) );
          if ( $tags_list ) {
            echo '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . $tags_list . '</span>';
          }
        }
        
        echo '</footer><!-- .entry-footer -->';
      }
    }
  }
}

if (!function_exists('fmi_posts_navigation')) {
  function fmi_posts_navigation() {
    the_posts_navigation(array(
      'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i> '.esc_html__('Older posts','fmi'),
      'next_text'  => esc_html__('Newer posts','fmi').' <i class="fa fa-caret-right" aria-hidden="true"></i>'      
    ));
  }
}

if (!function_exists('fmi_post_navigation')) {
  function fmi_post_navigation(){
    the_post_navigation( array(
          'prev_text' => '<span>'.esc_html__('Previous Post','fmi').'</span> %title',
          'next_text' => '<span>'.esc_html__('Next Post','fmi').'</span> %title'
    ) );
  }
}

if (!function_exists('fmi_comments_navigation')) {
  function fmi_comments_navigation(){
    the_comments_navigation(array(
      'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i> '.esc_html__( 'Older comments' ,'fmi'),
      'next_text' => esc_html__( 'Newer comments' ,'fmi').' <i class="fa fa-caret-right" aria-hidden="true"></i>'
    ));
  }
}

if (!function_exists('fmi_posts_pagination')) {
  function fmi_posts_pagination(){
    the_posts_pagination(array(
      'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i>',
      'next_text' => '<i class="fa fa-caret-right" aria-hidden="true"></i>'
    ));
  }
}
