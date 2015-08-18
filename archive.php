<?php get_header(); ?>

  <section class="section">
  <main role="main" itemprop="mainContentOfPage">

    <?php if ( have_posts() ) : ?>
      <?php if ( is_category() ) { ?>
        <h3 class="pagetitle"><?php _e( 'Archive of', 'adelle-theme' ); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e( 'category', 'adelle-theme' ); ?></h3>
      <?php } elseif ( is_tag() ) { ?>
        <h3 class="pagetitle"><?php _e( 'Posts Tagged', 'adelle-theme' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h3>
      <?php } elseif (is_day()) { ?>
        <h3 class="pagetitle"><?php the_time( 'F jS Y' ); ?> <?php _e( 'archive', 'adelle-theme' ); ?></h3>
      <?php } elseif (is_month()) { ?>
        <h3 class="pagetitle"><?php the_time( 'F Y' ); ?> <?php _e( 'archive', 'adelle-theme' ); ?></h3>
      <?php } elseif (is_year()) { ?>
        <h3 class="pagetitle"><?php the_time( 'Y' ); ?> <?php _e( 'archive', 'adelle-theme' ); ?></h3>
      <?php } elseif (is_author()) { ?>
        <h3 class="pagetitle"><?php _e( 'Author Archive', 'adelle-theme' ); ?></h3>
      <?php } ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'list' ); ?>

    <?php endwhile; ?>

      <?php echo adelle_theme_pagination_links(); ?>

    <?php else : get_template_part( 'content', 'none' ); endif; ?>

  </main>
  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>