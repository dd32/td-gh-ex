<?php get_header(); ?>

<div id="content">

<?php if ( have_posts() ) : ?>
	<h1 class="archive"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for <strong>%s</strong>', 'baris' ), '' . get_search_query() . '' ); ?></h1>
	
	<?php get_template_part( 'content' ); ?>
	
	<?php else : ?>
	<h1 class="archive"><strong><?php _e( 'No Search Result Found', 'ari' ); ?></strong></h1>
		<div class="post">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'baris' ); ?></p>
		</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>