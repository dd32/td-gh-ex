<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'bluegray' ), get_the_category_list( __( ', ', 'bluegray' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'bluegray' ), get_the_tag_list('', __( ', ', 'bluegray' ) ) ); ?>
	<?php endif; ?>
</div>