<?php 
/**
 * @package Apprise
 *
 */
if ( have_posts() ) : ?>
	<div class="clear"></div>
	<div class="standard-posts-wrapper">
		<div class="posts-wrapper">	
			<div id="post-body">
				<div class="post-single">
					<?php if (of_get_option('enable_breadcrumbs') == '1') { ?>
						<div class="breadcrumbs">
							<div class="breadcrumbs-wrap"> 
								<?php get_template_part( 'breadcrumbs'); ?>
							</div><!--breadcrumbs-wrap-->
						</div><!--breadcrumbs-->
					<?php } 
				// Start the Loop.
				while ( have_posts() ) : the_post();		
					get_template_part('content');
				endwhile; 
					
				if (of_get_option('simple_paginaton') == '1') {
					
					// Displays links for next and previous pages.
					posts_nav_link();
			
				} else {
				
					// Previous/next post navigation.
					apprise_paging_nav();
					
				}
				
				?>
				</div>
				<div class="post-sidebar">
					<div class="short-info">
						<div class="single-meta">
							<?php dynamic_sidebar('secondary-sidebar'); ?>
						</div><!--single-meta-->
					</div><!--short-info-->
				</div><!--post-sidebar-->
			</div><!--posts-body-->
		</div><!--posts-wrapper-->
	</div><!--standard-posts-wrapper-->
	<div class="sidebar-frame">
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php 
else: ?>
	<?php get_template_part( 'content', 'none' );
endif; ?>