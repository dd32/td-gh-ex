<?php get_header(); ?>
		<div id = "main-content">
			<?php if(have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('content', get_post_format()); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
				<?php silverquantum_content_nav(); ?>
			<?php else : ?>
				<article>
					<?php if( current_user_can( 'edit_posts' )) : ?>
						<header class = "entry-title">
						<?php _e('No Posts to Display','silverquantum'); ?>
						</header>
							<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'silverquantum' ), admin_url( 'post-new.php' ) ); ?></p>
							</div>
					<?php else : ?>
						<header class="entry-title">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'silverquantum' ); ?></h1>
						</header>
							<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'silverquantum' ); ?></p>
							<?php get_search_form(); ?>
							</div>
					<?php endif; ?>
				</article>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php wp_footer(); ?>
<?php get_footer(); ?>