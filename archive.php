<?php get_header(); ?>
<section class="post-wrapper-top jt-shadow clearfix">
	<div class="container">
		<div class="col-lg-12">
			<h2><?php if (is_day()):
                printf(__('Daily Archives: %s', 'awada'), '<span>' . get_the_date() . '</span>');
            elseif (is_month()) :
                printf(__('Monthly Archives: %s', 'awada'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'awada')) . '</span>');
            elseif (is_year()) :
                printf(__('Yearly Archives: %s', 'awada'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'awada')) . '</span>');
            else :
                _e('Archives', 'awada');
            endif; ?></h2>
			<?php awada_breadcrumbs(); ?>
		</div>
	</div>
</section><!-- end post-wrapper-top -->
<section class="blog-wrapper">
	<div class="container">
		<div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="row">
			   <div class="blog-masonry">
			   <?php
				$i = 1;
				while (have_posts()):
                        the_post();
					if($i%2==0){
						$pos = 'last';
					} else {
						$pos = 'first';
					} ?>
					<div class="col-lg-6 <?php echo $pos; ?>">
						<div class="blog-carousel">
							<div class="entry">
								<?php $icon = "";
								$imageSize = 'awada_blog_grid_thumb';
								$img_class = array('class' => 'img-responsive');
								$attachments = rwmb_meta( 'awada_post_gallery', 'type=image&size='.$imageSize,get_the_ID() );
								if($attachments){ ?>
								<div class="flexslider">
									<ul class="slides"><?php
										foreach ($attachments as $attachment) {
											$icon = "fa fa-camera";?>
											<li><img src="<?php echo esc_url($attachment['url']); ?>" class="img-responsive" width="<?php echo $attachment['width'];?>" height="<?php echo $attachment['height']; ?>" alt="<?php echo $attachment['alt'];?>"></li><?php
										} if (has_post_thumbnail()) {
										$icon = "fa fa-picture-o";
										$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
										<li><?php the_post_thumbnail($imageSize, $img_class); ?></li>
										<div class="post-type">
											<i class="<?php echo $icon; ?>"></i>
										</div><!-- end pull-right -->
										<?php } ?>
									</ul><!-- end slides -->    
								</div><!-- end post-slider -->
								<?php } elseif (has_post_thumbnail()) {
										$icon = "fa fa-picture-o";
										$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
										the_post_thumbnail($imageSize, $img_class); ?>
									<div class="magnifier">
										<div class="buttons">
											<a class="st" rel="bookmark" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
											<a class="sf" data-gal="prettyPhoto[product-gallery]" href="<?php echo esc_url($url); ?>"><i class="fa fa-expand"></i></a>
										</div><!-- end buttons -->
									</div><!-- end magnifier -->
									<div class="post-type">
										<i class="<?php echo $icon; ?>"></i>
									</div><!-- end pull-right -->
									<?php } ?>
							</div><!-- end entry -->
							<div class="blog-carousel-header">
								<h3><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="blog-carousel-meta">
									<span><i class="fa fa-calendar"></i><?php echo get_the_date(get_option('date_format'), true); ?></span>
									<span><i class="fa fa-comment"></i><?php comments_popup_link(__('No Comments', 'awada'), __('1 Comment', 'awada'), __('% Comments', 'awada')); ?> <?php edit_post_link(__('Edit', 'awada'), ' &#124; ', ''); ?></span>
									<span><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_attr(the_author()); ?></a></span>
								</div><!-- end blog-carousel-meta -->
							</div><!-- end blog-carousel-header -->
							<div class="blog-carousel-desc">
								<?php the_excerpt(); ?>
							</div><!-- end blog-carousel-desc -->
						</div><!-- end blog-carousel -->
					</div><!-- end col-lg-4 -->
					<?php $i++; endwhile;
					wp_link_pages(); ?>
				</div><!-- end blog-masonry -->
				<div class="clearfix"></div>
				<hr>
				<?php awada_pagination() ; ?>
			</div><!-- end row --> 
		</div><!-- end content -->
		<?php get_sidebar(); ?>
	</div><!-- end container -->
</section><!--end white-wrapper -->
<?php get_footer(); ?>