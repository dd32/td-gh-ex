<?php get_header(); ?>

	<!-- start of Content part -->
	<div id="content" class="grid_8">

<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<div class="box single-post"><h2 class="pagetitle"><?php
	/* If this is a category archive */
	if (is_category()) {
		printf(__('Archive for the &#8216;%s&#8217; Category', '5years'), single_cat_title('', false));
	/* If this is a tag archive */
	} elseif( is_tag() ) {
		printf(__('Posts Tagged &#8216;%s&#8217;', '5years'), single_tag_title('', false) );
	/* If this is a daily archive */
	} elseif (is_day()) {
		printf(_c('Archive for %s|Daily archive page', '5years'), get_the_time(__('F jS, Y', '5years')));
	/* If this is a monthly archive */
	} elseif (is_month()) {
		printf(_c('Archive for %s|Monthly archive page', '5years'), get_the_time(__('F, Y', '5years')));
	/* If this is a yearly archive */
	} elseif (is_year()) {
		printf(_c('Archive for %s|Yearly archive page', '5years'), get_the_time(__('Y', '5years')));
	/* If this is an author archive */
	} elseif (is_author()) {
		_e('Author Archive', '5years');
	/* If this is a paged archive */
	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		_e('Blog Archives', '5years');
	} ?></h2></div>

		<?php while (have_posts()) : the_post(); ?>

		<!-- start of Archive post -->
		<div class="box" id="post-<?php the_ID(); ?>">
			<div class="da-com">
				<div class="levo"><?php the_time('j. F Y.'); ?></div>
				<div class="desno"><a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('No comments', '5years'), __('1 comment', '5years'), __('% comments', '5years') );?></a></div>
			</div>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php the_title(); $br;?></a></h2>
			<div class="entry">
				<?php the_excerpt(); ?>
			</div>
			<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php _e("Continue reading...", "5years"); ?></a></div>
		</div>
		<!-- end of Archive post -->

		<?php endwhile; ?>

		<!-- start of Pagination -->
		<div class="pagination">
			<div class="levo" title="<?php _e("List recent posts", "5years"); ?>"><?php previous_posts_link('&larr; ' . __('Newer posts', '5years')) ?></div><div class="desno" title="<?php _e("List older posts", "5years"); ?>"><?php next_posts_link(__('Older posts', '5years') . ' &rarr;') ?></div>
		</div>
		<!-- end of Pagination -->
	<?php else :
		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", '5years').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.", '5years').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", '5years')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.', '5years').'</h2>');
		}
		get_search_form();
	endif;
?>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>
