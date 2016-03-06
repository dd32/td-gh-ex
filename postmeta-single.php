<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'multicolors' ), get_the_category_list( __( ', ', 'multicolors' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'multicolors' ), get_the_tag_list('', __( ', ', 'multicolors' ) ) ); ?>
	<?php endif; ?>
</div>