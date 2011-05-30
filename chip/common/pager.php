<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="chipboxm1 chipstyle1">
  <div class="chipboxm1data">
  
    <?php if ( function_exists( 'wp_pagenavi' ) ): ?>
    <div><?php wp_pagenavi(); ?></div>
    <?php else: ?>
    <div><?php posts_nav_link('', '&laquo; Previous Page', 'Next Page &raquo;'); ?></div>
    <?php endif; ?>
  
  </div>
</div>
<?php endif; ?>