<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>


	 <?php if ($altop_sidebar_align == "right") { ?> <div id="content" class="con_left"> <?php } ?>	
		<?php if ($altop_sidebar_align == "left") { ?> <div id="content" class="con_right">	<?php } ?>		
			<?php if ($altop_sidebar_align == "none") { ?> <div id="content" class="con_wide"> <?php } ?>	
				<?php if ($altop_sidebar_align == "") { ?> <div id="content" class="con_left">	<?php } ?>		
      <div id="content_inner">
		<?php if (have_posts()) : ?>

 	  <?php if (is_category()) { ?>
		<h2><?php printf(__('Archive for the &#8216; %s &#8217; Category', 'altop'), single_cat_title('', false)); ?></h2>
		
 	  <?php } elseif( is_tag()) { ?>
		<h2><?php printf(__('Posts Tagged &#8216; %s &#8217;', 'altop'), single_tag_title('', false) ); ?></h2>
		
 	  <?php } elseif (is_day()) { ?>
		<h2><?php printf(__('Daily archive for &#8216; %s &#8217;', 'altop'), get_the_time(__('F jS, Y', 'altop'))); ?></h2>
		
 	  <?php } elseif (is_month()) { ?>
		<h2><?php printf(__('Monthly archive for &#8216; %s &#8217;', 'altop'), get_the_time(__('F, Y', 'altop'))); ?></h2>
		
 	  <?php } elseif (is_year()) { ?>
		<h2><?php printf(__('Yearly archive for &#8216; %s &#8217;', 'altop'), get_the_time(__('Y', 'altop'))); ?></h2>
		
	  <?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive', 'altop'); ?></h2>

 	  <?php } ?>

	  
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_content" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link to %s', 'altop'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time(__('jS', 'altop')); ?> <?php the_time(__('F Y', 'altop')); ?> | <?php comments_popup_link(__('0 Comments', 'altop'), __('1 Comment', 'altop'), __('% Comments', 'altop'), '', __('Closed', 'altop') ); ?></small>

				<div class="archiv_entry"> 					
            <div class="entry_inner"> 
				
					<?php if ($altop_sidebar_align == "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('medium'); ?> <?php } //A bigger thumbnail if there is no sidebar ?>
					<?php if ($altop_sidebar_align != "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('thumbnail'); ?> <?php } //Smaller thumbnail if there is a sidebar ?>
					
					<?php the_excerpt(); ?>
					
				<p class="postinfo"> 				
					<?php if ($altop_posts_author == "true") : ?> <?php echo _e('posted by&nbsp;', 'altop'); the_author(); ?> <?php endif ?>
					
					<?php edit_post_link(__('Edit', 'altop'), ' &int; ', ' &int; '); ?> <br />
					<?php the_tags(__('Tags:', 'altop') . ' ', ', ', '<br />'); ?>
					<?php printf(__('Filed under: %s', 'altop'), get_the_category_list(', ')); ?>
				</p>
				</div>
        </div>
			
			<br clear="all" />
			</div>

		<?php endwhile; ?>

		<div id="post-navigation">
			<div class="alignleft"><?php next_posts_link(__("&laquo;&lsaquo; Older Entries", 'altop')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &rsaquo;&raquo;', 'altop')) ?></div>
		</div>
		
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'altop').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'altop').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'altop')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.', 'altop').'</h2>');
		}

	endif;
?>
</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
