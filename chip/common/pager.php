<div class="chipboxm1 chipstyle1">
  <div class="chipboxm1data">
  
    <?php if ( function_exists('wp_pagenavi') ): ?>
    <div><?php wp_pagenavi(); ?></div>
    <?php else: ?>
    <div><?php posts_nav_link('&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;', '&laquo; Previous Page', 'Next Page &raquo;'); ?></div>
    <?php endif; ?>
  
  </div>
</div>