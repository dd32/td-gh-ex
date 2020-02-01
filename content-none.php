<?php
/*
 * Nothing found used by files 404, archive, index and search.
 */
?>

<h1 class="page-title"><?php _e( 'Nothing Found', 'leftside' ); ?></h1>
<p><?php _e('Sorry, no posts matched your criteria.', 'leftside'); ?></p>
<?php if ( is_search() || is_404() ) : ?>
	<?php get_search_form(); ?>
<?php endif; ?>
