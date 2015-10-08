<div class="row blog-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >	
					<div class="blog-content">
					<?php $default_img=array('class'=>'img-responsive'); ?>
						<div class="featured-image">
							<?php if(has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$default_img); ?> </a>
					<?php endif; ?>
							<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
		
						</div>
							<ul class="post-meta">
								<li><a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_the_author(); ?></i></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php $categories_list = get_the_category_list( __( ', ', 'becorp' ) ); ?>
								<li><a href="<?php  ?>"><i class="fa fa-folder-open"></i><?php echo $categories_list; ?></a></li>
							</ul>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="post-content"><?php the_content(); ?></p>
								<a class="btn btn-readmore" href="<?php the_permalink(); ?>"><?php _e('Read More','becorp'); ?></a>
					</div>
				</div>
				<?php 
					$defaults = array(
						  'before'           => '<div class="row">'.'<div class="blog-pagination">' . __( 'Pages:','becorp'  ),
						  'after'            => '</div>'.'</div>',
						  'link_before'      => '',
						  'link_after'       => '',
						  'next_or_number'   => 'number',
						  'separator'        => ' ',
						  'nextpagelink'     => _e( ''  ,'becorp' ),
						  'previouspagelink' => _e( '' ,'becorp'),
						  'pagelink'         => '%',
						  'echo'             => 1
						  );
						  wp_link_pages( $defaults ); ?>