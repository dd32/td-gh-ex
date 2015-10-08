<?php
$becorp_options=theme_default_data(); 
$home_latest_post_option = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
if($home_latest_post_option['home_blog_enabled'] == 1 ) { ?>
<div class="container">
	<div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		   <h2><?php echo $home_latest_post_option['blog_title_one'];?>&nbsp;&nbsp;<span><?php echo $home_latest_post_option['blog_title_two'];?></</span> </h2>
		   <p><?php echo $home_latest_post_option['blog_description'];?></p>
		</div>
      </div>	
    </div>
            <div class="row">
			<?php
				global $i; $norecord=1;
					$k=1;
				$count_posts=$home_latest_post_option['post_display_count'];
				if(have_posts()) :
				$args = array('post_type' => 'post' , 'posts_per_page'=>$count_posts, 'post__not_in'=>get_option('sticky_posts'));
				$blog_default = new WP_Query($args);
				while($blog_default->have_posts()):
					$blog_default->the_post();?>
				<div class="col-sm-6">
					<div class="media home-blog">
					<?php $default_img = array('class' => "img-responsive");
						if(has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-blog-thumb',$default_img);?> </a>
									<?php endif; if(has_post_thumbnail()) { ?>
							<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
							<?php } else { echo""; } ?>
						<div class="media-body home-blog-content">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_content(); ?>
							
							<ul class="post-meta">
								<li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o"></i><?php echo get_the_author(); ?></a></li>
								<li><a href=""><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								
								<?php if(get_the_category_list() != '') { ?>
								<li><a href="#"><i class="fa fa-folder-open"></i><?php the_category(' '); ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<?php if($k%2==0) { echo "<div class='clearfix'></div>";  } $k++; $norecord=1;  endwhile; endif;  ?>				
            </div>
</div>
<?php } ?>