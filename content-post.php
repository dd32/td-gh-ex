<div class="blog-item wow fadeInDown animated" id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-wow-delay="0.4s">	
					<div class="blog-content">
					<?php $default_img=array('class'=>'img-responsive'); ?>
					  <div class="portfolio-area blog-overly">
						<div class="portfolio-image">
							<?php if(has_post_thumbnail()) { ?>
							<a href="<?php the_permalink(); ?>">
								<?php	the_post_thumbnail('',$default_img); ?>
								</a>
								<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
								<?php } else { ?>
								<a href="<?php the_permalink(); ?>"><?php echo '<img alt="" src="'. get_template_directory_uri() . '/images/default.png' .'">';?></a>
								<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
								<?php } ?>
							 <div class="caption">
							   <div class="portfolio-icon">
								 <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
							   </div>
						     </div>
	                     </div>
						</div>
						<ul class="post-meta">
							    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o"></i><?php echo get_the_author(); ?></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php $categories_list = get_the_category_list( __( ', ', 'becorp' ) ); ?>
								<li><a href="<?php  ?>"><i class="fa fa-folder-open"></i><?php echo $categories_list; ?></a></li>
						</ul>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="post-content"><?php echo get_service_excerpt();?></p>
					</div>
				</div>