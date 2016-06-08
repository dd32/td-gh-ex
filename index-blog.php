<?php
$becorp_options=becorp_theme_default_data(); 
$home_latest_post_option = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
if($home_latest_post_option['home_blog_enabled'] == 1 ) { ?>
<div class="home-blog-section">
<div class="container">
	<div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		   <h2 class="wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><?php echo $home_latest_post_option['blog_title_one'];?>&nbsp;&nbsp;<span><?php echo $home_latest_post_option['blog_title_two'];?></span> </h2>
		   <p class="wow fadeInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><?php echo $home_latest_post_option['blog_description'];?></p>
		</div>
      </div>	
    </div>
	<div class="clearfix"></div>
       <div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-12">
						<ul class="project-scroll-btn">
							<li><a class="project-prev" href="#home-blog" data-slide="prev"></a></li>
							<li><a class="project-next" href="#home-blog" data-slide="next"></a></li>    
						</ul>
					</div>
				</div>
              <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="home-blog">				
				<div class="carousel-inner">
				<?php
					$t=true;
				$count_posts=$home_latest_post_option['post_display_count'];
				if(have_posts()) :
				$args = array('post_type' => 'post' , 'posts_per_page'=>$count_posts, 'post__not_in'=>get_option("sticky_posts"));
				$blog_default = new WP_Query($args);
				while($blog_default->have_posts()):
					$blog_default->the_post();?>
              
			    
					<div class="item <?php if($t==true){echo 'active';} $t=false;  ?>">
					 <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-delay="100ms" data-wow-duration="300ms">
					   <div class="blog-item">	
							<div class="blog-content">
							   <div class="portfolio-area blog-overly">
						         <div class="portfolio-image">
								 <?php $default_img = array('class' => "img-responsive");
						          if(has_post_thumbnail()) {?> 
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-blog-thumb',$default_img); ?> </a>
									<span class="date"><?php echo get_the_date('M') ?><span><?php echo get_the_date('j'); ?></span></span> <?php } 
									else { ?>
									<a href="<?php the_permalink(); ?>"><?php echo '<img alt="" src="'. get_template_directory_uri() . '/images/default.png' .'">';?></a>
								<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
								<?php } ?>
									<div class="caption">
									   <div class="portfolio-icon">
										 <a href="#"><i class="fa fa-link"></i></a>
									   </div>
									 </div>
								 </div>
								</div>
								<ul class="post-meta">
							     <li><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></li>
								 <li><i class="fa fa-comments"></i>&nbsp;&nbsp;<?php comments_popup_link( '0', '1', '%', '', '-'); ?></li>
								 <?php $categories_list = get_the_category_list( __( ', ', 'becorp' ) ); ?>
								 <li><i class="fa fa-folder-open"></i>&nbsp;&nbsp;<?php echo $categories_list; ?></li>
							    </ul>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="post-content"><?php echo get_service_excerpt();?></p>
							</div>
						</div>
					 </div>
				   </div>
				   <?php  endwhile; endif;  ?>
				   </div>
				   
				</div>
              </div>
            </div>				
        </div>
	</div>
</div>
<?php } ?>