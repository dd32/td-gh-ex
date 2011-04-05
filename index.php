<?php
/*
Template Name: Default Index
Copyright (C) 2011 CyberChimps

*/
?>

<?php get_header(); ?>

<div id="content_wrap">
		
	<div id="content_left">
	
		<!--Insert Feature Slider-->
	
	<?php $hideslider = get_option('if_hide_slider') ?  : 'unchecked'; ?>
		<?php if ($hideslider == 'unchecked' ):?>
			<?php include (TEMPLATEPATH . '/sections/slider.php' ); ?>
		<?php endif;?>
	
		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="post_container">
			
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

						<?php include (TEMPLATEPATH . '/sections/meta.php' ); ?>

							<div class="entry">
								<?php the_content(); ?>
							</div><!--end entry-->
						<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						
							<?php 
								$hidefblike		= get_option('if_show_fb_like') ?  : 'unchecked';
							?>
							<?php if ($hidefblike != 'unchecked' ):?>
							<div class="fb" >
								<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:530px; height:28px"></iframe>
							</div>
							<?php endif;?>
							<!--end fb-->
						
							<div class="tags">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
							</div><!--end tags-->

							<div class="postmetadata">
										<?php include (TEMPLATEPATH . '/sections/share.php' ); ?>
								<div class="comments">
									<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
								</div><!--end comments-->	
							</div><!--end postmetadata-->
							
				</div><!--end post_class-->
				
		</div><!--end post_container-->

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/sections/pagination.php' ); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div> <!--end content_padding-->
	</div> <!--end content_left-->

	<?php get_sidebar(); ?>
	
</div><!--end content_wrap-->
<div class="clear"></div>

<?php get_footer(); ?>