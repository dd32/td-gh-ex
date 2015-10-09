<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	</header><!--/.entry-header -->
	
	<div class="entry-summary">
		<p>
			<?php if ( has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</p>
		
		<?php theme_excerpt(); ?>
		
		<!-- read more start -->
		<p><a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-link"></i> <?php _e( 'read more', 'avien-light' ); ?></a></p>
		<!-- read more end -->
	</div>
	
</article><!--/#post-->