  <article class="article" itemscope itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">

    <div class="post-text"><h2 class="post-title entry-title" itemprop="headline"><?php _e( 'Not Found', 'adelle' ); ?></h2></div>

    <article class="post-content entry-content" itemprop="text">

      <p><?php _e( 'You have come to a page that is either not existing or already been removed', 'adelle' ); ?>.</p>

      <?php get_search_form();?>

      <div class="colleft">
        <h3><?php _e( 'Archives by month', 'adelle' ); ?></h3>
        <ul>
          <?php wp_get_archives( 'type=monthly' ); ?>
        </ul>
      </div>
      <div class="colright">
        <h3><?php _e( 'Archives by category', 'adelle' ); ?></h3>
        <ul>
          <?php wp_list_categories( 'sort_column=name' ); ?>
        </ul>
      </div>
      <div class="clearfix">&nbsp;</div>

    </article><!-- .post-content -->

  </article><!-- .article -->