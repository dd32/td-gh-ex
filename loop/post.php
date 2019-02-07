<?php
/**
 * The template part to display a post in the loop
 *
 * @package agncy
 */

if ( is_archive() || is_home() ) {
	$headline_tag = 'h2';
} else {
	$headline_tag = 'h3';
}
?>

<article <?php post_class(); ?>>

	<<?php echo esc_attr( $headline_tag ); ?> class="the_post_title color-primary entry-title">
		<a href="<?php the_permalink(); ?>" class="color-secondary--hover">
			<?php if ( is_sticky() ) : ?>
				<i class="fa fa-thumb-tack sticky-icon"></i>
			<?php endif; ?>
			<?php the_title(); ?>
		</a>
	</<?php echo esc_attr( $headline_tag ); ?>>
	<?php
	if ( has_post_thumbnail() ) :

		$tn_attr = array();

		$image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
		if ( $image_alt ) {
			$tn_attr['alt'] = $image_alt;
		} else {
			$tn_attr['alt'] = get_the_title();
		}
		?>
		<div class="the_thumbnail clearfix">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'agncy_sixteen_nine_medium', $tn_attr ); ?>
			</a>
		</div>
		<?php
	endif;
	?>
	<div class="the_excerpt clearfix entry-summary">
		<?php
		if ( defined( 'IN_LONG_PAGE' ) ) {
			the_excerpt();
		} else {
			the_content();
		}
		?>
	</div>
	<?php
	if ( ! get_theme_mod( 'agncy_hide_archive_meta', false ) ) {
		get_template_part( 'template-parts/post-meta-info' );
	}
	?>
</article>
