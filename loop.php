<!-- Loop Post -->
<div class="loop-post-wrap">

	<?php if ( ( asteroid_option('loop_date_on') == 1 ) && ( get_post_type() != 'page' ) ) : ?>
		<div class="post-date">
			<div class="mdate"><?php the_time('M') ; ?></div>
			<div class="pdate"><?php the_time('d') ; ?></div>
		</div>
	<?php endif ; ?>
					
	<h2 class="loop-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<div class="loop-cat"><?php the_category(' '); ?></div>

	<div class="loop-entry">
						
		<?php if ((asteroid_option('post_display_type')) == 'choice1' ) : ?>
		
			<?php if ( has_post_thumbnail()) : ?>
				<a class="post-thumbnail left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-excerpt') ; ?></a>
			<?php endif ; ?>	
			
			<?php the_excerpt(); ?>
		
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

	<?php if ((asteroid_option('post_display_type')) == 'choice1' ) : ?>
		<div class="read-more">
			<a href="<?php the_permalink(); ?>" class="read-more-button">Read More</a>
		</div>
	<?php endif ; ?>
	
	<div class="clear"></div>
</div><!-- Loop Post -->
