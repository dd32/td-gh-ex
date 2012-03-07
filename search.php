<?php get_header(); ?>
<div id="archive-title"></div>
<div id="content" class="clear" > <!-- begin content -->	
	<div id="left-column"> <!-- begin left-column -->
		<div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
			<div>Search results for "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; echo ''; echo '<strong>'; echo $key; echo'" : </strong>'; echo " $count count(s).<br/><br/>"; wp_reset_query(); ?></div>
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
          <div <?php post_class(); ?>>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <div class="entry">
              <?php 
              if ( has_post_thumbnail()) 
              {
                  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                  echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                  the_post_thumbnail(); 
                  echo '</a>';
              } ?>	
              <?php the_excerpt(); ?> 
              <div class="clear"></div>
            </div>
						<div class="info-bar">
							<p class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> &nbsp;|&nbsp;</p>
							<p class="date"><?php the_time(get_option('date_format')) ?></p>
							<?php autoshow_the_category(); ?>
							<?php autoshow_the_tags(); ?>
							<p class="edit-link"><?php edit_post_link('Edit','&nbsp;|&nbsp;',''); ?></p>
        	 				<?php if(function_exists('the_ratings')) { ?><div class="rating"><?php the_ratings();?> </div> <?php } ?>
	         	</div>	
	        </div>
	      <?php endwhile; ?>
				<?php if (  $wp_query->max_num_pages > 1 )
				{ 
		   		if(function_exists('wp_pagenavi')) { ?><div id="navigation"><?php wp_pagenavi(); ?></div><?php }
	      	else { ?>
            <div id="navigation" class="old-navi">
              <?php next_posts_link( '&larr; Older posts', '' ); ?>&nbsp;
	            <?php previous_posts_link( 'Newer posts &rarr;', '' ); ?>
						</div> <!-- end navigation -->
	       	<?php } ?>
				<?php } ?>
			<?php else : ?>    
				<p>Sorry, but you are looking for something that isn't here.</p> 					
			<?php endif; ?>
		</div> <!-- end left-column-inner -->
	</div> <!-- end left-column -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>