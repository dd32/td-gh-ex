<?php $awada_theme_options = awada_theme_options();
if ($awada_theme_options['home_blog'] == 1){ ?>
<section class="grey-wrapper jt-shadow">
	<div class="container">
		<div class="general-title">
			<?php if ($awada_theme_options['home_blog_title'] != ""){ ?>
			<h2><?php echo esc_attr($awada_theme_options['home_blog_title']); ?></h2>
			<hr>
			<?php } if ($awada_theme_options['home_blog_description'] != ""){ ?>
			<p class="lead"><?php echo esc_attr($awada_theme_options['home_blog_description']); ?></p>
			<?php } ?>
		</div><!-- end general title -->
		<?php $imageSize = 'awada_blog_home_thumb'; ?>
		<div class="blog-masonry masonry2">
			<?php
			$args = array('post_type' => 'post', 'posts_per_page' => -1);
            query_posts($args);
			if (query_posts($args)) {
			$i = 1;
			$j = 1;
			while (have_posts()):the_post();
			if($i==1){
				$pos = 'first';
			} elseif($i==2){
				$pos = '';
			} else if($i==3){
				$pos = 'last';
				$i = 0;
			} ?>
			<div class="col-lg-4 <?php echo $pos; ?>" id="roww-<?php echo $j; ?>">
				<div id="post-<?php the_ID(); ?>" <?php post_class('blog-carousel'); ?>>
					<div class="entry">
						<?php $icon = "";
						global $imageSize;
						$img_class = array('class' => 'img-responsive'); ?>
						<?php if (has_post_thumbnail()) {
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
					<?php if (!(class_exists('WooCommerce') && (is_cart() || is_checkout()))) {?>
					<div class="blog-carousel-header">
						<h3><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="blog-carousel-meta">
							<span><i class="fa fa-calendar"></i><?php echo get_the_date(get_option('date_format'), true); ?></span>
							<span><i class="fa fa-comment"></i><?php comments_popup_link(__('No Comments', 'awada'), __('1 Comment', 'awada'), __('% Comments', 'awada')); ?> <?php edit_post_link(__('Edit', 'awada'), ' &#124; ', ''); ?></span>
							<span><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_attr(the_author()); ?></a></span>
						</div><!-- end blog-carousel-meta -->
					</div><!-- end blog-carousel-header -->
					<?php } ?>
					<div class="blog-carousel-desc">
						<?php if(is_page() || is_singular()) { the_content(); } else { the_excerpt(); } ?>
					</div><!-- end blog-carousel-desc -->
				</div><!-- end blog-carousel -->
			</div><!-- end col-lg-4 -->
			<?php $i++; $j++; endwhile;
			} ?>
		</div><!-- end blog-masonry -->
	</div><!-- end container -->
	<div class="buttons padding-top text-center post-btn2">
		<a class="btn btn-primary btn-lg append-button1" title=""><?php _e('Load More Posts', 'awada'); ?></a>
	</div>
</section><!-- end white-wrapper -->
<?php } ?>