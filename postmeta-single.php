<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'darkorange' ), get_the_category_list( __( ', ', 'darkorange' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'darkorange' ), get_the_tag_list('', __( ', ', 'darkorange' ) ) ); ?>
	<?php endif; ?>
</div>