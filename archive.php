<?php get_header(); ?>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y',get_option('date_format')); ?></h2><!-- mrock changed -->
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y',get_option('date_format')); ?></h2><!-- mrock changed -->
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y',get_option('date_format')); ?></h2><!-- mrock changed -->
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
 	  <?php } ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
				  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => __( 'Permanent Link to', 'Commodore' ))); ?>"><?php the_title(); ?></a></h2>
				  <br><h3 style="padding: 0 0 0 25px; margin: -20px;"><time><?php the_time(get_option('date_format')) ?></time></h3>
		    	</header>
		
		    <section>
		      		
				<?php  
				//Get images attached to the post
				if(isset($img)) {
				  unset($img);
				}
				$args = array(  
					'post_type' => 'attachment',  
					'post_mime_type' => 'image',  
					'numberposts' => -1,  
						'order' => 'ASC',  
					'post_status' => null,  
					'post_parent' => $post->ID  
				);  
				$attachments = get_posts($args);  
				if ($attachments) {  
					foreach ($attachments as $attachment) {  
						$img = wp_get_attachment_thumb_url( $attachment->ID );  
								break;  
						}  
				//Display image  
							
				}  
				?>  
				
				<div>
					<?php the_excerpt( __('Read the rest of this entry &raquo;','Commodore')); ?>
					<p class="postmetadata"><?php edit_post_link(__('Edit','Commodore'),'',' | '); ?>  <?php comments_popup_link(__('Share your thoughts on this','Commodore'),__('1 Comment','Commodore'),__('% Comments','Commodore')); ?></p>
				</div>
				
			  </section>
				
			</article>

		<?php endwhile; ?>

			<ul class="prevnext">
				<li><?php next_posts_link(__('&lt; Older Entries','Commodore')) ?></li>
				<li><?php previous_posts_link(__('Newer Entries &gt;','Commodore')) ?></li>
			</ul>
			
	<?php else : ?>
	
		<article>

		<?php

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>","Commodore"), $userdata->display_name);
		} else {
			echo(__("<h2 class='center'>No posts found.</h2>","Commodore"));
		}
		get_search_form();

		?>

		</article>

		<?php endif; ?>
	
<?php get_footer(); ?>