<!-- Loop Post -->
<div class="loop-post-wrap">
					
	<h2 class="loop-title"><a href="<?php the_permalink(); ?>">
		<?php 
			if ( the_title( '', '', false ) != '' ){
				echo the_title();
			}	
			else {						
				echo 'Untitled';
			}
		?>
	</a></h2>
	
	<?php if ( asteroid_option('ast_blog_date') == 1 ) : ?>
		<div class="loop-date"><?php the_time('F j, Y'); ?></div>
	<?php endif; ?>
	
	<div class="loop-categories"><?php the_category(' '); ?></div>

	<div class="loop-entry">
						
		<?php if ( asteroid_option('ast_post_display_type') == 1 ) : ?>
		
			<?php if ( asteroid_option('ast_excerpt_thumbnails') == 1 ) : ?>
				<?php if ( has_post_thumbnail()) : ?>
					<a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail') ; ?></a>
				<?php endif ; ?>
			<?php endif ; ?>
			
			<div class="excerpt-text">
				<?php the_excerpt(); ?>
			</div>
			
		<?php else : ?>				
		
			<?php the_content(); ?>
			
		<?php endif ; ?>
		
		<div class="page-links">
		<?php wp_link_pages( array(
			'before'           => '<div>' . 'Pages: ',
			'after'            => '</div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'nextpagelink'     => ('Next page'),
			'previouspagelink' => ('Previous page'),
			'pagelink'         => '%',
			'echo'             => 1 ) 
			);
		?>
		</div>
	
	</div>	

	<?php if ( asteroid_option('ast_post_display_type') == 1 ) : ?>
		<div class="read-more">
			<a href="<?php the_permalink(); ?>" class="read-more-button">Read More</a>
		</div>
	<?php else : ?>
		<div class="loop-tags"><?php the_tags(); ?></div>
	<?php endif ; ?>
	
</div><!-- Loop Post -->
