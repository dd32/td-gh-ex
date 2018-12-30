<?php
/**
 * Template for displaying entry footers
 *
 * @package Bidnis
 * @since 1.2.0
 */
?>
<footer class="entry-footer">

  <?php
  if ( has_tag() && get_theme_mod( 'entry_meta_tags', true ) ): ?>
    <span class="entry-meta-tags">
      <?php the_tags( '', ', ' ); ?>
    </span><!-- .entry-meta-tags -->
  <?php endif; ?>
  
  <?php if ( get_theme_mod( 'author_bio', true ) ): ?>
    <div class="author-bio">
      <?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

      <div>
        <?php
        printf(
          '<span>' . __( 'Author: %s', 'bidnis' ) . '</span>',
          sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_the_author()
          )
        );
        ?>

        <p><?php the_author_meta( 'description' ); ?></p>
      </div>
    </div><!-- .author-bio -->
  <?php endif; ?>
  
  <?php
  the_post_navigation( array(
    'prev_text' => 
      '<span class="screen-reader-text">' . __( 'Previous post', 'bidnis' ) . '</span>
       <span>' . __( 'Previous', 'bidnis' ) . '</span>
       <span>%title</span>',
    'next_text' => 
      '<span class="screen-reader-text">' . __( 'Next post', 'bidnis' ) . '</span>
       <span>' . __( 'Next', 'bidnis' ) . '</span>
       <span>%title</span>',
  ) );
  ?>
</footer><!-- .entry-footer -->