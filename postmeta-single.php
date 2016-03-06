<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'medical' ), get_the_category_list( __( ', ', 'medical' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'medical' ), get_the_tag_list('', __( ', ', 'medical' ) ) ); ?>
	<?php endif; ?>
</div>