<div class="bhumi_blog_area ">
<?php $cpm_theme_options = bhumi_get_options();
if($cpm_theme_options['blog_title'] !='') { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="bhumi_heading_title">
					<h3><?php echo esc_attr($cpm_theme_options['blog_title']); ?></h3>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="container">
	<div class="row" id="bhumi_blog_section">
	<?php 	if ( have_posts()) :
			$args = array( 'post_type' => 'post','post_status'=>'publish','posts_per_page' => 6 ,'ignore_sticky_posts' => 1);
			$post_type_data = new WP_Query( $args );
			while($post_type_data->have_posts()):
			$post_type_data->the_post(); ?>
			<div class="col-md-4 col-sm-12 scale-in d2 pull-left in">
			<div class="bhumi_blog_thumb_wrapper">
				<div class="bhumi_blog_thumb_wrapper_showcase">
					<?php $img = array('class' => 'bhumi_img_responsive');
							if(has_post_thumbnail()):
							the_post_thumbnail('home_post_thumb',$img);
					endif; ?>
					<div class="bhumi_blog_thumb_wrapper_showcase_overlay">
						<div class="bhumi_blog_thumb_wrapper_showcase_overlay_inner ">
							<div class="bhumi_blog_thumb_wrapper_showcase_icons">
								<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</div>
				</div>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt( __( 'Read More' , 'bhumi' ) ); ?>
				<a href="<?php the_permalink(); ?>" class="bhumi_blog_read_btn"><?php _e('Read More','bhumi'); ?></a>
				<div class="bhumi_blog_thumb_footer">
					<ul class="bhumi_blog_thumb_date">
						<li><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
						<li><i class="fa fa-clock-o"></i>
						<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
						<?php echo get_the_date('F d ,Y'); ?>
						<?php else : ?>
						<?php echo get_the_date(); ?>
						<?php endif; ?>
						</li>
						<li><i class="fa fa-comments-o"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></li>
					</ul>
				</div>
			</div>
			</div>
			<?php  endwhile;
			else : ?>
			<div class="col-md-4 col-sm-12 scale-in d2 pull-left in">
			<div class="bhumi_blog_thumb_wrapper">
				<div class="bhumi_blog_thumb_wrapper_showcase">
					<img  alt="bhumi" src="<?php echo esc_url(CPM_TEMPLATE_DIR_URI . '/images/wall/img(11).jpg' ?>)">
					<div class="bhumi_blog_thumb_wrapper_showcase_overlay">
						<div class="bhumi_blog_thumb_wrapper_showcase_overlay_inner ">
							<div class="bhumi_blog_thumb_wrapper_showcase_icons">
								<a title="bhumi" href="#"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</div>
				</div>
				<h2><a href="#"><?php _e('NO Post','bhumi'); ?></a></h2>

				<div class="bhumi_tags">
					<?php _e('Tags :&nbsp;','bhumi'); ?>
					<a href="#"><?php _e('Bootstrap','bhumi'); ?></a>
					<a href="#"><?php _e('HTML5','bhumi'); ?></a>

				</div>
				<p><?php _e('Add You Post To show post here..','bhumi'); ?></p>
				<a href="#" class="bhumi_blog_read_btn"><?php _e('Read More','bhumi'); ?></a>
				<div class="bhumi_blog_thumb_footer">
					<ul class="bhumi_blog_thumb_date">
						<li><i class="fa fa-user"></i><a href="#"><?php _e('By Admin','bhumi'); ?></a></li>
						<li><i class="fa fa-clock-o"></i><?php _e(' November 9 2013','bhumi'); ?></li>
						<li><i class="fa fa-comments-o"></i><a href="#"><?php _e('10','bhumi'); ?></a></li>
					</ul>
				</div>
			</div>
			</div>
		<?php endif; ?>
	</div>
	</div>
</div>