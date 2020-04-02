<?php
/**
 * Template part for displaying posts in the standard post format
 *
 * @package Fmi
 */

?>
<article <?php post_class( 'post-full' ); ?>>
  <?php if (has_post_thumbnail()) {?> 
  <div class="post-media">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail();?></a>
  </div>
  <?php }?>

  <div class="post-content">
    <?php
    echo '<header class="entry-header">';

    if ( is_singular() ) {
      the_title( '<h1 class="entry-title">', '</h1>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }

    echo '</header>';
    ?>

      <?php
      $archive_date = get_theme_mod( 'archive_date', 1 );
      $archive_author = get_theme_mod( 'archive_author', 1 );
      $archive_comments = get_theme_mod( 'archive_comments', 1 );
      if ( $archive_date || $archive_author || $archive_comments ) {
      ?>
      <div class="entry-meta">
        <div class="entry-meta-inner">
          <?php
          if ( $archive_date ) { vs_get_meta_date(); }
          if ( $archive_author ) { vs_get_meta_author(); }
          ?>
        </div>
        <div class="entry-meta-inner">
          <?php
          if ( $archive_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>

      <?php
      $archive_summary = get_theme_mod( 'archive_summary', 'excerpt' );
      if ( 'excerpt' === $archive_summary ) {
        ?>
        
        <div class="entry-excerpt">
          <?php
          $post_excerpt = get_the_excerpt();
          echo wp_kses( $post_excerpt, 'post' );
          ?>
        </div>
        
        <?php
      } else {
        ?>
        
        <div class="entry-content">
          <?php
          the_content( sprintf(
            wp_kses(
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fmi' ),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            get_the_title()
          ) );
          ?>
        </div>
        
        <?php
      }
      ?>

    <?php
    $archive_categorys = get_theme_mod('archive_categorys', 1);
    $archive_tags = get_theme_mod('archive_tags', 1);

    if ($archive_categorys || $archive_tags) {
      if ( 'post' === get_post_type() ) {
        echo '<footer class="entry-footer clearfix">';

        if ($archive_categorys) {
          $categories_list = get_the_category_list( esc_html__( ', ', 'fmi' ) );
          if ( $categories_list ) {
            echo '<span class="cat-links"><i class="fa fa-list"></i> ' . $categories_list . '</span>';
          }
        }

        if ($archive_tags) {
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
