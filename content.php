			<div id="post-<?php the_ID(); ?>" <?php post_class('blog_section'); ?>>
				<?php if(has_post_thumbnail()): ?>
				<?php $defalt_arg =array('class' => "img-responsive"); ?>
				<div class="blog_post_img">					
					<?php the_post_thumbnail('', $defalt_arg); ?>					
				</div>
				<?php endif; 
				corpbiz_post_meta_content(); ?>
				<div class="blog_post_content">
					<?php the_content(__( 'Read More' , 'corpbiz' )); ?><?php if(wp_link_pages()) { wp_link_pages();  } ?>	
				</div>	
			</div>