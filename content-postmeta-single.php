<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'onecolumn' ), get_the_category_list( __( ', ', 'onecolumn' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'onecolumn' ), get_the_tag_list('', __( ', ', 'onecolumn' ) ) ); ?>
	<?php endif; ?>
</div>