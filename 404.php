<?php get_header(); ?>

  <main class="section">

    <article class="article article-page" itemscope itemtype="http://schema.org/CreativeWork">

      <header class="post-header">
        <h2 class="post-title entry-title" itemprop="headline"><?php _e( 'Error 404 - Not Found', 'adelle' ); ?></h2>
      </header>

      <article class="post-content entry-content" itemprop="text">

        <p><?php echo _e( '404 Not Found', 'adelle' ); ?></p>

        <?php get_search_form();?>

        <section class="left">
          <h3><?php _e( 'Archives by month', 'adelle' ); ?></h3>
          <ul>f
            <?php wp_get_archives( 'type=monthly' ); ?>
          </ul>
        </section>
        <section class="right">
          <h3><?php _e( 'Archives by category', 'adelle' ); ?></h3>
          <ul>
            <?php wp_list_categories( 'sort_column=name' ); ?>
          </ul>
        </section>
        <div class="clearfix">&nbsp;</div>

      </article><!-- .post-content -->

    </article><!-- .article -->

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>