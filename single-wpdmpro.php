<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
?>
    <div class="row">
		 

        <div class="col-md-12 attire-post-and-comments">
            <div id="single-page-<?php the_ID(); ?>" class="single-page">

				<?php while ( have_posts() ): the_post(); ?>

                    <div <?php post_class( 'post' ); ?>>
                        <div class="clear"></div>
						<?php do_action( "attire_before_content" ); ?>
                        <div class="entry-content">

							<?php
							$ph_active = AttireThemeEngine::NextGetOption( 'ph_active', false );
                              ?>
							<?php the_content(); ?>
                            <div class="clear"></div>
                        </div>
						<?php wp_link_pages(); ?>
						<?php do_action( "attire_after_content" ); ?>
                    </div>
                    <div class="mx_comments">
						<?php comments_template(); ?>
                    </div>

				<?php endwhile; ?>

            </div>
        </div>
    </div>
<?php
get_footer();
