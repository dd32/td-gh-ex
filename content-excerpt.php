		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php anderson_display_thumbnail_and_categories_index(); ?>
		
		<div class="post-content">

			<?php the_title( sprintf( '<h2 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<div class="entry-meta postmeta"><?php anderson_display_postmeta(); ?></div>
			
			<div class="entry clearfix">
				<?php the_excerpt(); ?>
				<a href="<?php esc_url(the_permalink()) ?>" class="more-link"><?php esc_html_e( '&raquo; Read more', 'anderson-lite' ); ?></a>
			</div>
						
		</div>

	</article>