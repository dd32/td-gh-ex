<?php
/*
Template Name: No Sidebar (Full Width)
 */
?>
	<?php get_header(); ?>
		<div id = "site-article-full">
			<?php if(have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('content', 'page') ?>
				<?php endwhile; ?>
				<?php whitespektrum_content_nav(); ?>
			<?php else : ?>
				<article>
					<?php if( current_user_can( 'edit_posts' )) : ?>
						<header class = "entry-header">
						<h1 class = "entry-title"><?php _e('No Posts to Display','whitespektrum'); ?></h1>
						</header>
							<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'whitespektrum' ), admin_url( 'post-new.php' ) ); ?></p>
							</div>
					<?php else : ?>
						<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'whitespektrum' ); ?></h1>
						</header>
							<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'whitespektrum' ); ?></p>
							<?php get_search_form(); ?>
							</div>
					<?php endif; ?>
				</article>
			<?php endif; ?>
		</div>
	<?php get_sidebar('front'); ?>
<?php get_footer(); ?>