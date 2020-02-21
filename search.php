<?php  get_header(); ?>
	<article id="search-results">
	<?php  if (have_posts()) : ?>
		<?php /* translators: %s: Search query. */
	printf( __( 'Search Results for: %s', 'commodore' ), get_search_query() );
	                                ?>
		<h2 class="pagetitle"><?php _e("Search Results for","commodore"); ?> &quot;<?php  the_search_query(); ?>&quot;</h2>
		<?php
	while (have_posts()) :
	the_post();
	?>
			<div <?php  post_class()  ?>>
				<h3 id="post-<?php  the_ID(); ?>">&bull; <a href="<?php  the_permalink()  ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => __( 'Permanent Link to', 'commodore' ))); ?>"><?php the_title(); ?></a></h3>
				<small><?php  the_time(get_option('date_format'))  ?></small>
			</div>
		<?php  endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link(__('&laquo; Older Entries','commodore'))  ?></div>
			<div class="alignright"><?php  previous_posts_link(__('Newer Entries &raquo;','commodore'))  ?></div>
		</div>
	<?php  else : ?>
		<h2><?php _e("READY.","commodore"); ?><br><?php  the_search_query(); ?></h2>
		<h2 class="center"><?php _e("SYNTAX&nbsp;&nbsp;ERROR<br>READY.","commodore"); ?></h2>
	<?php  endif; ?>

	</article>
<?php  get_footer(); ?>
