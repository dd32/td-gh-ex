<?php
/**
	* Template Name: Post - Right Sidebar
	* Template Post Type: post
	*
	* @package anorya
	*/

	get_header();

	
	// load collapsable sidebar
	anorya_display_hidden_sidebar();
	
?>

	<div class="container main-content-container">
		<div class="row">
			
			<div class="col-md-8 col-sm-7">
			<?php
			while ( have_posts() ) : the_post();

				?>
				<article <?php post_class('full-width-post full-width-post-single'); ?>>
					<p class="post-category-desc"><?php esc_html_e('In ','anorya'); ?><span class="post-category-content"> <?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span></p>
					<h1 class="full-width-post-single-title"><?php the_title(); ?></h1>
				
					<?php 
				
					//post format content
					get_template_part( 'template-parts/content-single', get_post_format() ); ?>

					<div class="full-width-post-content-wrap">
						<?php	the_content();  ?>
					</div>
				
					
				
				
					<div class="row single-post-meta">
						<div class="col-md-12 col-sm-12 col-xs-12 post-tags">
						<?php	esc_html_e('TAGS: ','anorya'); 
								echo get_the_tag_list(); ?>
						</div>
					</div>
					<hr/>
				
				
					<?php get_template_part( 'template-parts/author', 'bio' ); ?>
					
					<?php anorya_related_posts();  ?>
					<hr/>
					
					<div class="single-post-pagination">
						<div class="nav-previous">
							<?php previous_post_link( '%link', '<i class="fa  fa-angle-double-left" aria-hidden="true"></i> '.esc_html__( 'Previous Post','anorya' ).'<h2>%title</h2>', true ); ?>
						</div>	
						<div class="nav-next">
							<?php next_post_link( '%link', esc_html__( 'Next Post','anorya' ).' <i class="fa fa-angle-double-right" aria-hidden="true"></i>'.'<h2>%title</h2>', true ); ?>
						</div>
					</div>	
					<hr/>
					
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
				
				</article>
			<?php
			endwhile; // End of the loop.
			?>
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>
	</div>	
	
	<?php get_footer(); ?>