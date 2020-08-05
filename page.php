<?php
/**
 * The template for displaying all pages
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

    <?php if( 'left' == agama_sidebar_position() ): ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>
    
	<div id="primary" class="site-content <?php echo esc_attr( Agama::bs_class() ); ?>">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>
                <?php comments_template( '', true ); ?>
            
			<?php endwhile; // end of the loop. ?>

		</div>
	</div><!-- #primary -->

    <?php if( 'right' == agama_sidebar_position() ): ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

<?php get_footer(); ?>