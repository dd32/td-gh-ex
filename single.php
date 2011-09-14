<?php get_header(); ?>

<div id="content" class="narrow">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p class="metadata"><span class="capitalize"><?php the_author_posts_link(); ?></span> | <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a> | <?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?></p>
			</div>
			
			<!--Show Ads Below Post Title -->
			<?php if ( isset($options['posttop_adcode']) && ($options['posttop_adcode']!="") ){ ?>
			<div id="topad"><?php echo(stripslashes ($options['posttop_adcode']));?></div>
			<?php } ?>
			
			<?php the_content( __('<p>Read more &raquo;</p>', 'undedicated') ); ?>
			<?php wp_link_pages( __('before=<div class="post-page-links">Pages:&after=</div>', 'undedicated')) ; ?>
			
			<!--Show Ads Below Post -->
			<?php if ( isset($options['postend_adcode']) && ($options['postend_adcode']!="") ){ ?>
			<div id="bottomad"><?php echo(stripslashes ($options['postend_adcode']));?></div>
			<?php } ?>
			
			<div class="post-meta">
				<p><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php _e('was posted on','undedicated'); ?> <strong><?php the_time( get_option( 'date_format' ) ) ?></strong> <?php _e('at','undedicated'); ?> <strong><?php the_time() ?></strong> <?php _e('in','undedicated'); ?> <?php the_category(', ');?> <?php _e('and','undedicated'); ?><?php the_tags( __(' tagged as ', 'undedicated'), ', ', ''); ?>.
				<?php _e('It was last modified on','undedicated'); ?> <strong><?php the_modified_date('F j, Y'); ?></strong> <?php _e('at','undedicated'); ?> <strong><?php the_modified_time(); ?></strong>. 
				<?php _e('You can follow any responses to this entry through the','undedicated'); ?> <?php post_comments_feed_link(__('RSS 2.0','undedicated')); ?> <?php _e('feed.','undedicated'); ?>				
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php _e('You can','undedicated'); ?> <a href="#respond"><?php _e('leave a response','undedicated'); ?></a> <?php _e('or','undedicated'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','undedicated'); ?></a> <?php _e('from your site.','undedicated'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can ','undedicated'); ?><a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','undedicated'); ?></a> <?php _e('from your site.','undedicated'); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','undedicated'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','undedicated'); ?>
							<?php }?>
				<?php edit_post_link(__('Edit this post &raquo;','undedicated'), '<span>', '</span>'); ?></p>
				<p><?php _e('Share on ', 'undedicated'); ?><a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>"><?php _e('Twitter','undedicated'); ?></a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>"><?php _e('Facebook', 'undedicated'); ?></a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>"><?php _e('Delicious', 'undedicated'); ?></a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>"><?php _e('Digg', 'undedicated'); ?></a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>"><?php _e('Reddit', 'undedicated'); ?></a></p>
			</div>
			
		<!--Next Previous Links-->
		<ul class="next-prev-links">
				<li><?php previous_post_link('%link',  __('&laquo;Previous Post','undedicated') );?></li>
				<li><?php next_post_link('%link', __('Next Post &raquo;','undedicated') ); ?></li>
		</ul>	

		<!--RELATED POSTS-->
		<?php
			$original_post = $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
			  $first_tag = $tags[0]->term_id;
			  $args=array(
			    'tag__in' => array($first_tag),
			    'post__not_in' => array($post->ID),
			    'showposts'=>3,
			    'ignore_sticky_posts'=>1
			   );
			  $my_query = new WP_Query($args);
			  if( $my_query->have_posts() ) {
			      echo "<div class=\"relatedposts\">";
			      _e('<h3 class="relatedtitle">Related Posts</h3>','undedicated');
			      echo "<ul>";
			    while ($my_query->have_posts()) : $my_query->the_post(); ?>
		  
		   <li class="relatedthumb">
		   <!-- IF HAS THUMBNAIl DEFINED-->
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<!-- Post Thumbnail TimThumb-->
			<?php	if ( has_post_thumbnail() ) { ?>
			<?php // Show the thumbnail
			echo get_the_post_thumbnail( $post->ID, 'thumbnail');
			?>
			<?php } else { ?>
			<!-- If post has no image, show default icon -->
			<img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />	
			<?php }	?> <!-- has thumbnail else close -->
			<!-- /Post Tumbnail -->
			</a>
			
			<span><a class="relatedtext" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php the_title(); ?>
			</a></span>
			</li>
   		<?php endwhile;
        echo "</ul>";
		echo "</div>";
		}
		}
	$post = $original_post;
	wp_reset_query();
	?>

	<hr />
<!--RELATED POSTS ENDS-->
		</div><!--#post-->

		<?php endwhile; ?>
		
	<?php else : ?>
		
			<h2 class="page-title"><?php _e('Not Found','undedicated');?></h2>
			<p><?php _e('Sorry, but you are looking for something that is not here','undedicated');?></p>
			<?php get_search_form(); ?>
				
			<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>			

	
	<?php endif; ?>

	<?php comments_template(); ?>
	
	</div><!--#content-->
	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>