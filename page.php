<?php get_header(); ?>
<section  class="twelve columns clearfix">
	<div class="fix content">
					<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>
						<div class="post_title">
						<h2><?php the_title(); ?></h2>
                        </div>
                        <div class="post_info">
                            Posted in: <?php the_category(', '); ?>| Posted on:<?php the_time('M d, Y') ?>
                        </div>
                        <div class="post_content">
                        <div class="post_tumb_single">
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail('post_single');
						} 
						?>	
                        </div>
                        <div class="post_text">
						<?php the_content(); ?>
						</div>
                        <?php comments_template(); ?>
					   <?php
						if ( comments_open() ) :
						  echo '<p>';
						  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
						  echo '</p>';
						endif;
						?>

					<?php endwhile; ?>
					</div>
					 

					<?php else : ?>

						<h3><?php _e('404 Error&#58; Not Found'); ?></h3>

					<?php endif; ?>
				</div>
</section>
<section class="four columns clearfix">
<?php get_sidebar(); ?>
</section>
<footer class="footer sixteen columns">
<?php get_footer(); ?>
</footer>