<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arouse
 */
?>

<?php 

$arouse_post_layout = get_theme_mod('archive_listing_layout', 'grid');
$arouse_post_class = ( $arouse_post_layout === 'grid' ) ? 'arouse-post-grid' : 'arouse-post-list';

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( $arouse_post_class ); ?>>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'featured' ); ?>
			<?php } else { ?>
				<div class="entry-thumb-plchldr"></div>
			<?php } ?>
		</a>
	</div>

	<div class="post-content-wrapper">
		<header class="entry-header">
			<div class="arouse-entry-category">
				<?php arouse_category_list() ?>
			</div><!-- .entry-meta -->

			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/*the_content( sprintf(
					/* translators: %s: Name of current post. */
					//wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arouse' ), array( 'span' => array( 'class' => array() ) ) ),
					//the_title( '<span class="screen-reader-text">"', '"</span>', false )
				//) );*/
					the_excerpt();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arouse' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="entry-meta">
			<?php arouse_posted_on(); ?>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->