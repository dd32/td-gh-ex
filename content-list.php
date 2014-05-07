  <article <?php post_class( 'article' ); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

    <header class="post-header">
      <div class="post-date radius-100"><span><a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'd' ) ?></span><br /><?php echo get_the_date( 'M' ) ?><br /><?php echo get_the_date( 'Y' ) ?></a></div>
      <h2 class="post-title" itemprop="name"><a href="<?php the_permalink(); ?>" rel="<?php esc_attr_e( 'bookmark','adelle-theme' ); ?>"><?php the_title(); ?></a></h2>
      <div class="post-category"><?php _e( 'categories', 'adelle-theme' ); ?>: <?php the_category( ', ' ) ?></div>
    </header>

    <?php if ( has_post_thumbnail() ) { ?>
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
      <?php the_post_thumbnail( 'post_thumb', array( 'class'=>'alignleft' ) ); ?>
    <?php } ?>
      
      <article class="post-content">

        <?php the_content(); ?>

        <footer class="post-footer">
          <ul class="post-info-meta">
            <li class="post-info-comment"><div class="post-comment"><?php comments_popup_link( __( '0 comment','adelle-theme' ), __( '1 Comment','adelle-theme' ), __( '% Comments','adelle-theme' ) ); ?></div></li>
          </ul>
        </footer><!-- .post-footer -->

      </article><!-- .post-content -->

  </article><!-- .article -->