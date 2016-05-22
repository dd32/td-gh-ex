<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'darkelements' ), get_the_category_list( __( ', ', 'darkelements' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'darkelements' ), get_the_tag_list('', __( ', ', 'darkelements' ) ) ); ?>
	<?php endif; ?>
</div>