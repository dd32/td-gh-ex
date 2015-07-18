<?php get_header(); ?>
<?php get_template_part('index', 'banner'); ?>
<!-- Blog & Sidebar Section -->
<div class="container">
	<div class="row blog_sidebar_section">
		<!--Blog-->
		<div class="<?php corpbiz_post_layout_class(); ?>" >
		<?php if ( have_posts() ) : ?>
			<h1>
				<?php printf( __( "Search Results for: %s", 'corpbiz' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>			
			<?php while ( have_posts() ) : the_post();  ?>
			<?php get_template_part('content','');?>		
			<?php endwhile; ?>
			<?php corpbiz_post_link(); ?>	
			<?php else : ?>
						<h2><?php _e( "Nothing Found", 'corpbiz' ); ?></h2>
						<div class="qua_searching">
							<p>
							<?php _e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'corpbiz' ); ?></p>
							<?php get_search_form(); ?>
						</div>	
			<?php endif; ?>
		
		</div>
		<?php get_sidebar(); ?>
		</div>
	</div>	
<?php get_footer(); ?>