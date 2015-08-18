<?php get_header(); ?>

  <section class="section">
  <main role="main" itemprop="mainContentOfPage">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class( "article" ); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <header class="post-header">
        <h2 class="post-title entry-title" itemprop="headline"><?php the_title(); ?></h2>
      </header>
 
      <article class="post-content" itemprop="text">

        <?php the_content(); ?>

        <?php echo adelle_theme_get_link_pages() ?>

        <?php comments_template( '/comments.php', true ); ?>

      </article><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main>
  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>