<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage akhada-fitness-gym
 * @since 1.0
 * @version 0.3
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php akhada_fitness_gym_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<img src="<?php the_post_thumbnail_url(); ?>">
		<?php			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'akhada-fitness-gym' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>