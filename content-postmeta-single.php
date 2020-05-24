<?php
/*
 * Postmeta used by files single and single-full.
 */
?>

<div class="postmetadata postmetadata-bottom">
	<?php printf( __( 'Category: %s', 'medical' ), get_the_category_list( __( ', ', 'medical' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'medical' ), get_the_tag_list('', __( ', ', 'medical' ) ) ); ?>
	<?php endif; ?>
	<?php $format = get_post_format(); ?>
	<?php if (has_post_format() ) : ?>
		<?php echo '|'; ?> <?php printf( __( 'Format: %s', 'medical' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_post_format_link( $format ) ), get_post_format_string( $format ) ) ); ?>
	<?php endif; ?>
</div>
