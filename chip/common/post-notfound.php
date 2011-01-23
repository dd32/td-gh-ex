<div class="chipboxm1 chipstyle1 margin10b">
  <div class="chipboxm1data">    
    <h2 class="blue margin10b">Nothing Found</h2>
    <?php if( is_404() ): ?>
	<p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
	<?php elseif( is_search() ): ?>
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    <?php else: ?>
    <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
    <?php endif; ?>
    <p><?php get_search_form(); ?></p>
  </div>
</div>