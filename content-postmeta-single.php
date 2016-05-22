<?php
/*
 * Postmeta used by file single.
 */
?>

<div class="postmetadata">
	<?php printf( __( 'Category: %s', 'myknowledgebase' ), get_the_category_list( __( ', ', 'myknowledgebase' ) ) ); ?>
	<?php if(has_tag() ) : ?>
		<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'myknowledgebase' ), get_the_tag_list('', __( ', ', 'myknowledgebase' ) ) ); ?>
	<?php endif; ?>
</div>