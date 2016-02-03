<div id="post-<?php the_ID(); ?>" <?php post_class('blog-carousel'); ?>>
	<div class="entry">
		<?php $icon = "";
		global $imageSize;
		$img_class = array('class' => 'img-responsive');
		$attachments = rwmb_meta( 'awada_post_gallery', 'type=image&size='.$imageSize,get_the_ID() );
		?>
		<?php if((has_post_thumbnail()) && ($attachments) || (get_post_meta(get_the_ID(), 'awada_video_post_url', true)) || ($attachments) || (get_post_meta(get_the_ID(), 'awada_video_post_url', true))){ ?>
		<div class="flexslider">
			<ul class="slides"><?php
			if ($attachments) {
				foreach ($attachments as $attachment) {
					$icon = "fa fa-camera";?>
					<li><img src="<?php echo esc_url($attachment['url']); ?>" class="img-responsive" width="<?php echo $attachment['width'];?>" height="<?php echo $attachment['height']; ?>" alt="<?php echo $attachment['alt'];?>"></li><?php
				}
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
			<span><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_attr(the_author()); ?></a></span>
			 <?php
                if (get_the_tag_list() != '') {
                    ?>
                    <span><i class="fa fa-user"></i>
                        <?php the_tags(); ?>
                    </span>
                <?php } ?>
		</div><!-- end blog-carousel-meta -->
	</div><!-- end blog-carousel-header -->
	<div class="blog-carousel-desc">
		<?php if(is_page()) { the_content(); } else { the_excerpt(); } ?>
	</div><!-- end blog-carousel-desc -->
</div><!-- end blog-carousel -->