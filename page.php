<?php
/**
 * The template for displaying all pages.
 *
 * @package Avvocato
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
	<section class="section section-page-title" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()))); ?>')"  <?php  endif; ?>>
		<div class="overlay">
			<div class="container">
				<div class="gutter">
					<p class="page-title"><?php the_title(); ?></p>
					<?php the_excerpt(); ?>
				</div>
			</div> <!--  END container  -->
		</div> <!--  END overlay  -->
	</section> <!--  END section-page-title  -->
	<div class="section section-blog">
		<div class="container">
			<div class="column-container blog-container">			
				<div class="column-9-12 left">
					<div class="gutter">
						<div class="inner-page-container">
							<article class="single-post">	
								<div class="article-text">
									<?php the_content(); ?>
									<div class="clear"></div>
								</div>
								<p><?php posts_nav_link(); ?></p>
								<div class="padinate-page"><?php wp_link_pages(); ?></div> 	
								<div class="comments">
									<?php comments_template(); ?>
								</div>
							</article>
						</div>
					</div>
				</div>
				<div class="column-3-12 right">
					<div class="gutter">
						<?php  get_sidebar(); ?>
					</div>
				</div>				
			</div>
		</div> <!--  ENd container  -->
	</div> <!--  END section-blog  -->
<?php endwhile; ?>		
<?php get_footer(); ?>
