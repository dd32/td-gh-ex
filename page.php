<?php
/**
 * Template for displaying Page content
 *
 * @package Bidnis
 * @since 1.0.0
 * @version 1.2.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container" class="wrapper">

  <?php get_sidebar( 'left' ); ?>

  <main id="site-main" role="main">

    <?php while ( have_posts() ): the_post(); ?>

      <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="page-header">
          
          <?php the_title( '<h1>', '</h1>' ); ?>

          <div class="entry-meta">
            <?php
            edit_post_link(
              sprintf(
                '%1$s<span class="screen-reader-text">%1$s "%2$s"</span>',
                __( 'Edit', 'bidnis' ),
                get_the_title()
              )
            );
            ?>
          </div><!-- .entry-meta -->

        </header><!-- .page-header -->

        <?php if ( get_the_post_thumbnail() !== '' ): ?>
          <a class="post-thumbnail" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail( 'bidnis-featured-image' ); ?>
          </a><!-- .post-thumbnail -->
        <?php endif; ?>
      
        <div class="entry-content">
          <?php the_content(); ?>

          <?php
          wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'bidnis' ),
            'after' => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after' => '</span>',
          ) );
          ?>
        </div><!-- .entry-content -->

      </section>

      <?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
      
    <?php endwhile; ?>

  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-continer -->

<?php get_footer(); ?>