<?php
/**
 * The Template for displaying all single posts.
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			<div style="width:728px; height:90px; display: block; background: #545151;"><?php include("pagetopad.php") ?></div>
				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'd5smartia' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'd5smartia' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'd5smartia' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>