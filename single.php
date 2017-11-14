<?php
/**
 * The template for displaying all single posts
 *
 * @package anorya
 */

	get_header();

	
	// load collapsable sidebar
	anorya_display_hidden_sidebar();
	
?>

	<div class="container main-content-container">
		<div class="row">
			
			<?php if(get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden' ) == 'left'){ 
					get_sidebar(); 
				} ?>
				
			<div class="<?php echo esc_attr(anorya_main_content_class('SINGLE')); ?>">
			<?php
			while ( have_posts() ) : the_post();

				?>
				<article <?php post_class('full-width-post full-width-post-single'); ?>>
					<p class="post-category-desc"><?php print __('In ','anorya'); ?><span class="post-category-content"> <?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span></p>
					<h1 class="full-width-post-single-title"><?php the_title(); ?></h1>
				
					<?php 
				
					//post format content
					get_template_part( 'template-parts/content-single', get_post_format() ); ?>

					<div class="full-width-post-content-wrap">
						<?php	the_content();  ?>
					</div>
				
					
				
				
					<div class="row single-post-meta">
						<div class="col-md-6 col-sm-6 col-xs-12 post-tags">
						<?php	print __('TAGS: ','anorya'); 
								echo get_the_tag_list(); ?>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 post-social-share">
							<?php print __('SHARE THIS POST:','anorya'); ?>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://twitter.com/home?status=<?php print esc_html(str_replace(' ','+',get_the_title($post->ID))); echo '-'; the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
							<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php get_the_post_thumbnail_url($post->ID,'anorya_large');?>&description=<?php print esc_html(str_replace(' ','-',get_the_title($post->ID))); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
						</div>
					</div>
					<hr/>
				
				
					<?php get_template_part( 'template-parts/author', 'bio' ); ?>
					
					<?php anorya_related_posts();  ?>
					<hr/>
					
					<div class="single-post-pagination">
						<div class="nav-previous">
							<?php previous_post_link( '%link', __( '<i class="fa  fa-angle-double-left" aria-hidden="true"></i> Previous Post','anorya' ).'<h2>%title</h2>', true ); ?>
						</div>	
						<div class="nav-next">
							<?php next_post_link( '%link', __( 'Next Post <i class="fa fa-angle-double-right" aria-hidden="true"></i>','anorya' ).'<h2>%title</h2>', true ); ?>
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
			
			<?php if(get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden' ) == 'right'){ 
					get_sidebar(); 
				} ?>	
		</div>
	</div>	
	
	<?php get_footer(); ?>