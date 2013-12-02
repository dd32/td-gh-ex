<?php if($wp_query->max_num_pages > 1) : ?>
    <div class="pagination">
    	<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'autoadjust' ) ); ?></div>
    	<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'autoadjust' ) ); ?></div>
    </div>
<?php endif; ?>