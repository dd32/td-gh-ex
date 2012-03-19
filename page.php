<?php get_header(); ?>
<div id="archive-title"></div>
<div id="content" class="clear" > <!-- begin content -->	
	<div id="left-column"> <!-- begin left-column -->
		<div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
	        <div <?php post_class(); ?>>
	        	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	        	<?php 
	 					if ( has_post_thumbnail()) 
	 					{
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
	   					echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
	   					the_post_thumbnail(); 
	   					echo '</a>';
	 					} ?>	
	 					<div class="entry">
							<?php the_content(); ?>
							<div class="clear"></div>
	 					</div>
            <div class="info-bar-top"></div>
            <div class="clear"></div>
						<div class="info-bar">
							<p class="edit-link"><?php edit_post_link('Edit','&nbsp;|&nbsp;',''); ?></p>
        	 		<?php if(function_exists('the_ratings')) { ?><div class="rating"><?php the_ratings();?> </div> <?php } ?>
	         	</div>	
            <div class="info-bar-bottom"></div>
            <div class="clear"></div>
	        </div>
          <p>Trackback URL for this post: <?php trackback_url(); ?></p>
	        <?php comments_template(); ?>
	      <?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- end left-column-inner -->
	</div> <!-- end left-column -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>