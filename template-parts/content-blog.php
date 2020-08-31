<?php 
/*
*
* The file for display blog content for beshop theme
*
*/

?>
<div class="bshop-blog-list">
	<?php if(has_post_thumbnail()): ?>
	<div class="bshop-list-flex">
		<div class="beshop-blog-img">
			<?php beshop_post_thumbnail(); ?>
		</div>
	<?php else: ?>
	<div class="bshop-list-flex no-img">
	<?php endif; ?>

		<div class="beshop-blog-text">
			<div class="beshop-btext">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							beshop_posted_on();
							beshop_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
			</header><!-- .entry-header -->

				

				<div class="entry-content">
					<?php
					the_excerpt();
					?>
				</div><!-- .entry-content -->
				
			</div>

		</div>
	
	
	</div>	

	

		
</div>