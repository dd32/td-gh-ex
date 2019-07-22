<?php
/**
 * Single post entry display Template
 *
 * @package Cambay
 * @since 1.0.0
 */

?>

<div class="dp-entry entry fw-tab-6 fw-tabr-4">
	<div class="entry-index-wrapper">
		<?php
		if ( aamla_get_mod( 'aamla_thumbnail_placeholder', 'none' ) || has_post_thumbnail() ) {
			$aamla_featured_content = [
				[ 'aamla_get_template_partial', 'template-parts/meta', 'meta-permalink' ],
				[ 'aamla_markup', 'dp-thumbnail', [ [ 'the_post_thumbnail', 'aamla-medium' ] ] ],
			];

			aamla_markup( 'dp-featured-content', $aamla_featured_content );
		}
		?>
		<div class="sub-entry">
			<div class="dp-categories">
				<?php the_category( ', ' ); ?>
			</div>
			<?php
			if ( get_the_title() ) {
				the_title(
					sprintf(
						'<h2 class="dp-title"><a class="dp-title-link" href="%s" rel="bookmark">',
						esc_url( get_permalink() )
					),
					'</a></h2>'
				);
			}
			?>
		</div>
	</div>
</div>
