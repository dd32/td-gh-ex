<!--SECOND FORM PAGER-->
  <?php if( get_next_posts_link() || get_previous_posts_link() ) {?>
    <div class="posts-nav cf">
      <?php next_posts_link (__('&larr; Previous', 'baena') ); ?>
      <?php previous_posts_link (__('Recents &rarr;', 'baena') ); ?>
    </div>
  <?php } ?>
<!--THIRD FORM PAGER-->
  <?php 
  // Previous/next page navigation.
  the_posts_pagination( array(
    'prev_text'          => __( 'Previous page', 'baena'),
    'next_text'          => __( 'Next page', 'baena'),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'baena') . ' </span>',
  ) );
  ?>
<!--PAGER CHAPLIN-->
  <nav class="link-pagination">
    <?php if ( get_previous_posts_link() ) : ?>
      <?php previous_posts_link( '<span class="arrow" aria-hidden="true">&larr;</span> ' . __( 'Previous page', 'baena' ) ); ?>
    <?php endif; ?>
    <?php if ( get_next_posts_link() ) : ?>
      <?php next_posts_link( __( 'Next page', 'baena' ) . ' <span class="arrow" aria-hidden="true">&rarr;</span>' ); ?>
    <?php endif; ?>
  </nav><!-- .posts-pagination -->

  