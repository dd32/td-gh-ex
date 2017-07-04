<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template Name: Left Sidebar Page 
 * ----------------------------------------------------------------------------------------
 */
?>

<?php get_header(); ?>

<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ashe_options( 'general_content_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="col1-lsidebar">

	<?php 

	// Sidebar Alt
	get_template_part( 'templates/sidebars/sidebar', 'alt' );

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

 	?>

	<!-- Main Container -->
	<div class="main-container">
		
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php

			if ( have_posts() ) :

			// Loop Start
			while ( have_posts() ) : the_post();

				if ( has_post_thumbnail() ) {
					echo '<div class="post-media">';
						the_post_thumbnail('ashe-full-thumbnail');
					echo '</div>';
				}

				echo '<header class="post-header">';
					echo '<h1 class="post-title">'. get_the_title() .'</h1>';
				echo '</header>';
				
				echo '<div class="post-content">';
					the_content('');
				echo '</div>';

			endwhile; // Loop End

			endif;

			?>

		</article>

		<?php get_template_part( 'templates/single/comments', 'area' ); ?>

	</div><!-- .main-container -->

</div><!-- #page-content -->

<?php get_footer(); ?>