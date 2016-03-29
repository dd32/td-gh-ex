<div class="row blog-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >	
					<div class="blog-content">
					<?php $default_img=array('class'=>'img-responsive'); ?>
						<div class="featured-image">
							<?php if(has_post_thumbnail()) {?>
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('',$default_img);?>
							</a>
						<?php } ?>
							<span class="date hidden-xs"><?php if ( ('F') == get_option( 'date_format' ) ) : ?>
						<?php echo get_the_date('F'); ?>
						<?php else : ?>
						<?php echo get_the_date('F'); ?>
						<?php endif; ?><span><?php echo get_the_date('j'); ?></span></span>
		
						</div>
							<ul class="post-meta">
								<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-pencil-square-o"></i>&nbsp;<?php the_author_link();?></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php if(get_the_category_list() != '') { ?>
								<li><a href="<?php  ?>"><i class="fa fa-folder-open"></i><?php the_category(' , '); ?></a></li>
		<?php } ?>
							</ul>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="post-content"><?php the_content(); ?></p>
								<?php wp_link_pages( array( 'before' => '<div class="row">'.'<div class="blog-pagination">' . __( 'Pages:', 'becorp' ), 'after' => '</div></div>' ) );  ?>
								<a class="btn btn-readmore" href="<?php the_permalink(); ?>"><?php _e('Read More','becorp'); ?></a>
					</div>	
					
				</div>