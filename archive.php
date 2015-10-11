<?php get_header(); ?>

<?php fgymm_show_page_header_section(); ?>

<div id="main-content-wrapper">
	<div id="main-content">
	<?php if ( have_posts() ) : ?>

				<?php
				// starts the loop
				while ( have_posts() ) :

					the_post();

					/*
					 * Include the post format-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
	?>
				<div class="navigation">
					<?php echo paginate_links( array( 'prev_next' => '', ) ); ?>
				</div>  
	<?php else :

				// if no content is loaded, show the 'no found' template
				get_template_part( 'template-parts/content', 'none' );
			
		  endif; ?>
	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>