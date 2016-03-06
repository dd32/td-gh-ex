<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'simplyblack' ), get_the_category_list( __( ', ', 'simplyblack' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'simplyblack' ), get_the_tag_list('', __( ', ', 'simplyblack' ) ) ); ?>
	<?php endif; ?>
</div>