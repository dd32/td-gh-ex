<?php
/**
 *
 * @package Avvocato
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
	<section class="section section-page-title" <?php if(get_theme_mod('avvocato_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('avvocato_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
		<div class="overlay">
			<div class="container">
				<div class="gutter">
					<p class="page-title"><?php echo esc_html(get_theme_mod('avvocato_blog_page_title',__( 'Our Blog', 'avvocato' ))); ?></p>
					<p><?php echo esc_html(get_theme_mod('avvocato_blog_subtitle',__( 'Class aptent tactic socislifd lorem ipsum dummy', 'avvocato' ))); ?></p>
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
								<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
								<div class="article-image">
									<?php the_post_thumbnail('featured'); ?>
								</div>						
								<?php endif; ?>		
								<div class="article-text">
									<h2><?php the_title(); ?></h2>
									<p class="meta"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' )); ?> <i class="fa fa-user"></i><?php the_author(', '); ?> <i class="fa fa-comment"></i><?php comments_popup_link( 'No comments', '1 comment', '% comments', 'comments-link', 'Comments are off'); ?></p>
									<?php the_content(); ?>
									<p class="tags"><span></span> <?php the_tags(); ?></p>
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