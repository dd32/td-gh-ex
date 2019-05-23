<?php
/**
 * The template file to display the post thumbnail
 *
 * @package agncy
 */

$disable_thumbnail_override = get_post_meta( get_the_ID(), 'disable_the_thumbnail', true );
$disable_thumbnail_default  = get_theme_mod( 'agncy_disable_the_thumbnail' );

if ( empty( $disable_thumbnail_override ) && $disable_thumbnail_override !== '0' ) {
	// Make sure to only disable on singular templates.
	$disable_thumbnail = is_singular() ? get_theme_mod( 'agncy_disable_the_thumbnail' ) : false;
} else {
	// If we have an override value, use that one.
	$disable_thumbnail = (bool) $disable_thumbnail_override;
}


if ( has_post_thumbnail() && ! $disable_thumbnail ) : ?>
	<div class="thumbnail-wrapper">
		<div class="container">
			<div class="row">
				<div class="the_thumbnail">
					<?php the_post_thumbnail( 'agncy_sixteen_nine_medium' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
