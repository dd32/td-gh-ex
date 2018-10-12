<?php
/**
 * The template part for the posts pagination
 *
 * @package agncy
 */

$pagination_args = array(
	'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
	'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
);
?>
<div class="col-xs-12 the_pagination">
	<?php the_posts_pagination( $pagination_args ); ?>
</div>
