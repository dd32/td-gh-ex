<?php 
/**
 * 
 * @package Avvocato 
 */
?>
<div class="section section-blog">
	<div class="container">
		<div class="column-container blog-container">
			<div class="column-9-12 left">
				<div class="gutter">
					<div class="inner-page-container">
						<?php while (have_posts()) : the_post(); ?>
						<article class="article-blog">
						    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
								<div class="article-image">
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('avvocato-photo-800-500'); ?></a>
								</div>
								<?php endif; ?>
								<div class="article-text">
									<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title(get_the_ID())) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
									<p class="meta"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' )); ?> <i class="fa fa-user"></i><?php the_author(); ?> <i class="fa fa-comment"></i><?php comments_popup_link( 'No comments', '1 comment', '% comments', 'comments-link', 'Comments are off'); ?></p>
									<?php the_excerpt(); ?>
								</div>
								<div class="button-container">
									<a class="button-large" href="<?php the_permalink() ?>"><?php _e( 'Read More', 'avvocato' ); ?></a>
								</div>
							</div>
						</article>
						<?php endwhile; ?>						
						<p class="pagination">
						<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
								<span class="left button-gray"><?php next_posts_link(__('Previous Posts', 'avvocato')) ?></span>
								<span class="right button-gray"><?php previous_posts_link(__('Next posts', 'avvocato')) ?></span>			
						<?php } ?>
						</p>
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