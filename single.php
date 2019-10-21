<?php get_header(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part( 'inc/loop', get_post_format() ); ?>
				
				<div class="clear"></div>
					<nav id="nav-single">
						<p class="nav-previous"><?php previous_post_link( '%link', __( 'Previous: %title', 'bb10' ) ); ?></p>
						<p class="nav-next"><?php next_post_link( '%link', __( 'Next: %title', 'bb10' ) ); ?></p>
					</nav><!-- #nav-single -->
				<div class="clear"></div>
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'inc/content', 'none' ); ?>

			<?php endif; ?>
		</div><!--#hjylPosts-->
<?php if(!bb10_IsMobile) get_sidebar(); ?>		
<?php get_footer(); ?>