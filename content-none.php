<article class="media post not-found"> 
	
	<div class="media-body"> 
	
		<div class="entry-header">
			<h3 class="entry-title"><?php _e( 'Nothing Found', 'sis_spa' ); ?></h3>
		</div>
		
		<div class="entry-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sis_spa' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
			<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sis_spa' ); ?></p>
			<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sis_spa' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
			
		</div>
		
	</div> 
</article>