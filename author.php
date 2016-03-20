<?php
/**
 * The template for displaying Author archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

get_header(); ?>

<div class="inner" >
	<div id="main-content" >
		

			<?php
			if ( '' != get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/author-bio' );
			}
		?>		

		<?php if ( have_posts() ) : ?>

			<?php
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop properly
				 * with a call to rewind_posts().
				 */
				the_post();
			?>

		<h3><?php printf( __( 'All articles by %s', 'aguafuerte' ), get_the_author() ); ?></h3>

		<div id="posts" class="posts">

		<?php
			/*
			 * Since we called the_post() above, we need to rewind
			 * the loop back to the beginning that way we can run
			 * the loop properly, in full.
			 */
			rewind_posts();

			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			// Previous/next page navigation.
			//aguafuerte_paging_nav();

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>		

		<div class="clearfix"></div>
		</div><!--/posts-->
	</div><!--/main-content-->
    	<?php get_sidebar('sidebar'); ?>  
</div><!--/inner-->
<div class="clearfix"></div>

<?php get_footer(); ?>
