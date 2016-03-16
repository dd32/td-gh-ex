<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bakes_And_Cakes
 */

global $post;
$bakes_and_cakes_sidebar_layout = '';

if( $post )
$bakes_and_cakes_sidebar_layout = get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="text-holder">
			<header class="entry-header">

				<?php 

				do_action('bakes_and_cakes_breadcrumbs');

				the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

		    <?php if( has_post_thumbnail() ){ ?>
		    <div class="post-thumbnail">
		        <?php ( is_active_sidebar( 'right-sidebar' ) && ( $bakes_and_cakes_sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'bakes-and-cakes-image' ) : the_post_thumbnail( 'bakes-and-cakes-image-full' ) ; ?>
		    </div>
		    <?php }?>
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakes-and-cakes' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'bakes-and-cakes' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
