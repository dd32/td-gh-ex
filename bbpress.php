<?php
/*
 bbPress Template
 @since Agama v1.0.2
*/
get_header(); ?>

	<div id="primary" class="site-content <?php agama_primary_class(); ?>">
		<div id="content" role="main">
		
			<?php if(have_posts()): the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="post-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'agama' ), 'after' => '</div>' ) ); ?>
					</div>
				
				</div>
			
			<?php endif; ?>
		
		</div>
	</div>

<?php agama_l_sidebar(); ?>
<?php agama_r_sidebar(); ?>

<?php get_footer(); ?>