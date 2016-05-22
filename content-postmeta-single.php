<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'leftside' ), get_the_category_list( __( ', ', 'leftside' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'leftside' ), get_the_tag_list('', __( ', ', 'leftside' ) ) ); ?>
	<?php endif; ?>
</div>