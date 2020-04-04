<?php
/**
 * Template part for displaying posts
 *
 * @package Fmi
 */

$blog_images_hover_effects = get_theme_mod( 'blog_images_hover_effects', 0 );

$orientation = "";
if( $blog_images_hover_effects ){
  $orientation = "vs-overlay-hover";
}
?>
<article <?php post_class( 'post-full' ); ?>>
  <div class="post-outer">

    <?php
    if ( has_post_thumbnail() ) {
    ?>
    <div class="post-inner">
      <div class="post-media">
        <div class="vs-overlay <?php echo esc_attr( $orientation ); ?>">
          <div class="vs-overlay-background">
            <?php the_post_thumbnail(); ?>
          </div>
          <a href="<?php the_permalink(); ?>" class="vs-overlay-link"></a>
        </div>
      </div>
    </div>
    <?php
    }
    ?>

    <div class="post-inner">
      
      <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      </header>

      <?php
      $homepage_date = get_theme_mod( 'homepage_date', 1 );
      $homepage_author = get_theme_mod( 'homepage_author', 1 );
      $homepage_comments = get_theme_mod( 'homepage_comments', 1 );
      if ( $homepage_date || $homepage_author || $homepage_comments ) {
      ?>
      <div class="entry-meta">
        <?php
        if ( $homepage_date || $homepage_author ) {
        ?>
        <div class="entry-meta-inner">
          <?php
          if ( $homepage_date ) { vs_get_meta_date(); }
          if ( $homepage_author ) { vs_get_meta_author(); }
          ?>
        </div>
        <?php
        }
        if ( $homepage_comments ) {
        ?>
        <div class="entry-meta-inner">
          <?php
          if ( $homepage_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
        <?php
        }
        ?>
      </div>
      <?php
      }
      ?>

      <?php
      $homepage_summary = get_theme_mod( 'homepage_summary', 'excerpt' );
      $homepage_read_more = get_theme_mod( 'homepage_read_more', 0 );
      if ( 'excerpt' === $homepage_summary ) {
        ?>
        <div class="entry-excerpt">
          <?php echo wp_kses( get_the_excerpt(), 'post' ); ?>
        </div>
        <?php
        if ( $homepage_read_more ) {
        ?>
        <div class="entry-more">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'fmi' ) ) ); ?>
          </a>
        </div>
        <?php
        }
      } else {
        ?>
        <div class="entry-content">
          <?php
          $more_link_text = false;
          if ( $homepage_read_more ) {
            $more_link_text = sprintf(
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fmi' ),
              get_the_title()
            );
          }
          the_content( $more_link_text );
          ?>
        </div>
        <?php
      }
      ?>

      <?php
      $homepage_categorys = get_theme_mod( 'homepage_categorys', 1 );
      $homepage_tags = get_theme_mod( 'homepage_tags', 1 );
      if ( $homepage_categorys || $homepage_tags ) {
      ?>
      <div class="entry-details">
        <div class="entry-details-inner">
          <?php
          if ( $homepage_categorys ) { vs_get_meta_categorys(); }
          if ( $homepage_tags ) { vs_get_meta_tags(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>

    </div>
  </div>
</article>
