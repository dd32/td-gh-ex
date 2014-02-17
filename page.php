<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * Page Template
 *
 */
?>

<?php get_header();

	if(have_posts()) :
	while(have_posts()) : the_post();

?>

	<div class="container" id="main-content">

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div id="page-container" <?php post_class("left with-sidebar"); ?>>

				<?php the_content();

					$args = array(
						'before'           => '<br class="clear" /><div class="paged_nav">' . __('Pages:', 'icefit'),
						'after'            => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'nextpagelink'     => __('Next page', 'icefit'),
						'previouspagelink' => __('Previous page', 'icefit'),
						'pagelink'         => '%',
						'echo'             => 1
					);
					wp_link_pages( $args );
				?><br class="clear" /><?php
				edit_post_link(__('Edit', 'boldr'), '<span class="editlink">', '</span><br class="clear" />'); ?>
				<br class="clear" />
			<?php	// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || get_comments_number()!=0 ) : ?>
				<!-- comments section -->
				<div class="comments">
				<?php comments_template( '', true ); ?>
				<?php next_comments_link(); previous_comments_link(); ?>
				</div>
				<!-- end comments section -->
			<?php endif; ?>

			<?php endwhile; ?>
				<?php else : ?>
				<h2><?php _e('Not Found', 'boldr'); ?></h2>
				<p><?php _e('What you are looking for isn\'t here...', 'boldr'); ?></p>

			<?php endif; ?>
		</div>
		<!-- End page container -->

		<div id="sidebar-container" class="right">
			<ul id="sidebar">
			   <?php dynamic_sidebar( 'sidebar' ); ?>
			</ul>
		</div>		
		<!-- End sidebar -->
	</div>
	<!-- End main content -->
<?php get_footer(); ?>