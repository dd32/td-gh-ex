<?php
/**
 * Blog feed and Sidebar
 *
 * @package ariel
 */
$ariel_blog_feed_post_format  = ariel_get_option( 'ariel_blog_feed_post_format' );
$ariel_blog_feed_label        = ariel_get_option( 'ariel_blog_feed_label' );

// Set class for main content depending on sidebar being displayed or not - always displayed in free version
$main_class = 'col-md-9';
?>

<div class="container">
	<div class="row two-columns">
		<div class="main-column <?php echo esc_attr( $main_class ); ?>">
			<div class="blog-feed">
				<?php if ( is_front_page() ) : ?>
					<h2 class="section-title"><?php echo esc_html( $ariel_blog_feed_label ); ?></h2>
				<?php elseif ( is_search() ) : ?>
					<h2 class="page-title"><?php esc_html_e( 'Search Results', 'ariel' ); ?></h2>
				<?php else : ?>
					<h2 class="page-title"><?php echo get_the_archive_title(); ?></h2>
					<?php echo get_the_archive_description(); ?>
				<?php endif; ?>

				<?php
					if ( $ariel_blog_feed_post_format == 'Grid' ) :
						get_template_part( 'parts/blog', 'grid' );
					elseif ( $ariel_blog_feed_post_format == 'List' ) :
						get_template_part( 'parts/blog', 'list' );
					endif;
				?>
			</div>
		</div>

		<?php get_sidebar(); ?>

    </div>
</div>
