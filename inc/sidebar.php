<? // LEFT SIDEBAR ?>

<div id="leftsidebar">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
		
<h2><?php _e('Search'); ?></h2>
				<?php include (TEMPLATEPATH . '/inc/searchform.php'); ?>

		       <h2><?php _e('Recent entries'); ?></h2>
		       <ul>
<?php query_posts('showposts=6'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>"><?php the_title() ?> <span>[<?php the_time('d.m') ?>]</span></a></li>
<?php endwhile; endif; ?>
</ul>

		       
                       <h2><?php _e('Categories'); ?></h2>
		       <ul>
	<?php wp_list_cats('sort_column=name&hide_empty=0&optioncount=0&hierarchical=1'); ?>
		        </ul>
 
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for the year <?php the_time('Y'); ?>.</p>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives.</p>

			<?php } ?>
			
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>		

<h2><?php _e('Dialogue'); ?></h2>

<?php
		//This grabs recent comments
		global $wpdb;
	
		$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
			comment_post_ID, comment_author, comment_date_gmt, comment_approved,
			comment_type,comment_author_url,
			SUBSTRING(comment_content,1,30) AS com_excerpt
			FROM $wpdb->comments
			LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
			$wpdb->posts.ID )
			WHERE comment_approved = '1' AND comment_type = '' AND
			post_password = ''
			ORDER BY comment_date_gmt DESC
			LIMIT 4";
	
		$comments = $wpdb->get_results($sql);
		$output = $pre_HTML;
		$output .= "\n<ul>";
		
		foreach ($comments as $comment) {
		
			$output .= "\n<li>".strip_tags($comment->comment_author)
			.": " . "<a href=\"" . get_permalink($comment->ID) .
			"#comment-" . $comment->comment_ID . "\" title=\"on " . 
			$comment->post_title . "\"> &quot;" . strip_tags($comment->com_excerpt)
			."...&quot;</a></li>";
		}
		$output .= "\n</ul>";
		$output .= $post_HTML;
		
		echo $output;
		?>

                <?php } ?>          
		
<?php endif; ?>
</div>
<? // END LEFT SIDEBAR ?>



<? // RIGHT SIDEBAR ?>	
	<div id="rightsidebar">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
		
<div class="log"><?php bloginfo('description'); ?></div>

<h2><?php _e('About'); ?></h2>
<?php if ( (is_home())  ) { ?>
<ul><li>
<?php query_posts('pagename=about');?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content_rss('', FALSE, '', 20); ?>
</li></ul>
<?php endwhile; endif; ?>  		
<?php } ?>
			
			<h2><?php _e('Archives'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>

			<h2>Sidenotes</h2>
<?php query_posts('showposts=1&offset=3'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<ul><li>
<h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>

<?php the_content_rss('', FALSE, 'more_file', 10); ?>
<a href="<?php the_permalink() ?>" title="Read the full story: <?php the_title_attribute(); ?>">Read on &#8594;</a>
</li></ul>
<?php endwhile; endif; ?>
	           
                       
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>						
		
                        <h2><?php _e('Liens'); ?></h2>
				<ul>
<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
				</ul>
			<h2><?php _e('Meta'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					
					<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WP</a></li>
					<?php wp_meta(); ?>
				</ul>
			

<?php } ?>

<?php endif; ?>
</div>
<? // END RIGHT SIDEBAR ?>