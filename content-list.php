  <article <?php post_class( 'article' ); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/CreativeWork">

    <header class="post-header">
      <div class="post-date radius-100 updated" itemprop="dateModified"><span itemprop="datePublished" content="<?php the_time( get_option( 'date_format' ) ); ?>"><a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'd' ) ?></span><br /><?php echo get_the_date( 'M' ) ?><br /><?php echo get_the_date( 'Y' ) ?></a></div>
      <h2 class="post-title entry-title" itemprop="headline"><a itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" href="<?php the_permalink(); ?>" rel="<?php esc_attr_e( 'bookmark', 'adelle' ); ?>"><?php the_title(); ?></a></h2>
      <div class="post-category"><?php _e( 'categories', 'adelle' ); ?>: <?php the_category( ', ' ); ?></div>
    </header>

      <?php if( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post_thumb', array( 'class'=>'alignleft' ) ); ?></a>
      <?php } ?>

      <article class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <footer class="post-footer">
          <ul class="post-info-meta">
            <li class="post-info-comment"><div class="post-comment"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php comments_popup_link( __( '0 comments', 'adelle' ), __( '1 Comment', 'adelle' ), __( '% Comments', 'adelle' ) ); ?></div></li>
          </ul>
        </footer><!-- .post-footer -->

      </article><!-- .post-content -->

  </article><!-- .article -->