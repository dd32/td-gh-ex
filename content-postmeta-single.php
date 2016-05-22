<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'privatebusiness' ), get_the_category_list( __( ', ', 'privatebusiness' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'privatebusiness' ), get_the_tag_list('', __( ', ', 'privatebusiness' ) ) ); ?>
	<?php endif; ?>
</div>