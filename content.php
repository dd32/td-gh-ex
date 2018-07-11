<?php
/**
 * The default template for displaying content
 */ ?>
<div class="blog-box padding-top-0 clearfix">
	<?php if(has_post_thumbnail()): ?>
		<div><?php if(!is_singular()): ?><a href="<?php the_permalink(); ?>"> <?php endif; ?>
			<?php
			if(is_page_template('page-template/full-width.php')){
				the_post_thumbnail('full');	
			}else{	
				the_post_thumbnail('multishop-blog-image');
				$image_blog_class = 'class=blog-image';
			} if(!is_singular()): ?></a><?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="blog-body">
		<h4>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h4>
		<?php multishop_entry_meta(); 
		  if(is_singular()){
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'multishop' ),
					'after' => '</div>',
				) );
		  }else{
				the_excerpt();
		  } ?>
	</div>
</div>
