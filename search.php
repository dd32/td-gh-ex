<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
		
			<h2 id="search-title" class="archive-title">
				<?php printf( __( 'Search Results for: %s', 'rubine-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h2>
			
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
				if ( 'post' == get_post_type() ) :
		
					get_template_part( 'content' );
				
				else :
				
					get_template_part( 'content', 'search' );
					
				endif;
		
			endwhile;
			
			rubine_display_pagination();

		else : ?>

			<div class="type-page">
				
				<h2 class="page-title entry-title"><?php _e('No matches', 'rubine-lite'); ?></h2>
				
				<div class="entry clearfix">
					
					<p><?php esc_html_e('Please try again, or use the navigation menus to find what you search for.', 'rubine-lite'); ?></p>
					
					<?php get_search_form(); ?>
					
				</div>
				
			</div>

		<?php endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	