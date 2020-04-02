<?php
/**
 * Template part post content
 *
 * @package Fmi
 */

?>
<article <?php post_class( 'entry' ); ?>>
  <?php if (has_post_thumbnail()) {?> 
    <div class="post-media">
      <?php the_post_thumbnail();?>
    </div>
  <?php }?>

  <div class="post-content">
    <div class="entry-header">
      <div class="entry-header-inner">
<?php
    if ( is_singular() ) {
      the_title( '<h1 class="entry-title">', '</h1>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }
?>
      </div>
    </div>

      <?php
      $post_date = get_theme_mod( 'post_date', 1 );
      $post_author = get_theme_mod( 'post_author', 1 );
      $post_comments = get_theme_mod( 'post_comments', 1 );
      if ( $post_date || $post_author || $post_comments ) {
      ?>
      <div class="entry-meta">
        <div class="entry-meta-inner">
          <?php
          if ( $post_date ) { vs_get_meta_date(); }
          if ( $post_author ) { vs_get_meta_author(); }
          ?>
        </div>
        <div class="entry-meta-inner">
          <?php
          if ( $post_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>

    <div class="entry-content clearfix">
      <?php
      the_content();

      wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fmi' ),
        'after' => '</div>',
      ));
      ?>
    </div>

    <?php
    $post_categorys = get_theme_mod('post_categorys', 1);
    $post_tags = get_theme_mod('post_tags', 1);

    if ($post_categorys || $post_tags) {
      if ( 'post' === get_post_type() ) {
        echo '<footer class="entry-footer clearfix">';

        if ($post_categorys) {
          $categories_list = get_the_category_list( esc_html__( ', ', 'fmi' ) );
          if ( $categories_list ) {
            echo '<span class="cat-links"><i class="fa fa-list"></i> ' . $categories_list . '</span>';
          }
        }

        if ($post_tags) {
          $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'fmi' ) );
          if ( $tags_list ) {
            echo '<span class="tags-links"><i class="fa fa-tags"></i> ' . $tags_list . '</span>';
          }
        }
        
        echo '</footer>';
      }
    }
    ?>
  </div>
</article>
