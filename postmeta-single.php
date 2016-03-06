<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'shipyard' ), get_the_category_list( __( ', ', 'shipyard' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'shipyard' ), get_the_tag_list('', __( ', ', 'shipyard' ) ) ); ?>
	<?php endif; ?>
</div>