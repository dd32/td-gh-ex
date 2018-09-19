<?php if( !defined( 'ABSPATH' ) ) { exit; } get_header(); ?>

  <main class="section">

    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="article article-page" itemscope itemtype="http://schema.org/CreativeWork">

      <header class="post-header">
        <h1 class="post-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
      </header>
 
      <article class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <?php echo adelle_theme_get_link_pages(); ?>

        <?php comments_template( '/comments.php', true ); ?>

      </article><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>