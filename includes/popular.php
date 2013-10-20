<h4>Popular post</h4>
<div id="populars">
<?php query_posts('showposts=5&orderby=comment_count');?>

    <?php while ( have_posts() ) : the_post(); ?>
	 <span class="ltl"> <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></span>
								<div class="pop">
						<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/thumb.jpg" /><?php } ?></div> 		
																	</a>
							<?php endwhile; ?>
									</div>					
					<div style="clear:both;"></div>