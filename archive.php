<?php get_header(); ?>

			<div id="content">


	<?php if (have_posts()) : ?>


		 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="archivetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="archivetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Daily archive page'), get_the_time(__('F jS, Y'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Monthly archive page'), get_the_time(__('F, Y'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Yearly archive page'), get_the_time(__('Y'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="archivetitle"><?php _e('Author Archive'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="archivetitle"><?php _e('Blog Archives'); ?></h2>
 	  <?php } ?>
 	  


		
		<?php while (have_posts()) : the_post(); ?>

				<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?> id="post-<?php the_ID(); ?>">
					<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
						<div class="post-title-meta"><?php printf( get_the_category_list(', ')); ?> | <span class="author">Posted by <?php the_author() ?></span>
							<div class="meta-date">
							<span class="month"><?php the_time(__('M')) ?></span>
							<span class="date"><?php the_time(__('d')) ?></span>
							<span class="year"><?php the_time(__('Y')) ?></span>
							</div>
						</div>
					</div>
					<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;')); ?>
					
					<p class="postfooter"><?php the_tags(__('Tags:') . ' ', ', ', '<br />'); ?>
					<?php edit_post_link(__('Edit'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?></p>
				</div>

					</div><!--/entry-->
		<?php endwhile; ?>

	<div class="entry-footer">
		<div id="new-old-navigation">
			<?php if(next_posts_link('<p class="older">Older Entries </p>')) : ?><?php endif ; ?>
			<?php if(previous_posts_link('<p class="newer">Newer Entries </p>')) : ?><?php endif ; ?>
		</div>
	</div>

		
	<?php else :?>
	<div class="post">
		<?php if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.").'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.").'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.")."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.').'</h2>');
		}
	  get_search_form();?>
	  </div>
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


