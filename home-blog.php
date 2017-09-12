<?php 
$becorp_options=becorp_theme_default_data(); 
$home_blog_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); 
//if($portfolio_options['home_portfolio_enabled'] == 'on' ) { ?>
<div class="portfolio-section">
<div class="container">
 <div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		   <h2 class="wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><?php echo $home_blog_setting['blog_title_one']; ?><span><?php echo $home_blog_setting['blog_title_two']; ?></span> </h2>
		   <p class="wow fadeInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><?php echo $home_blog_setting['blog_section_desc']; ?></p>
		</div>
      </div>	
    </div>
	<div class="col-md-12">
		<ul class="project-scroll-btn">
			<li><a class="project-prev" href="#newCarousel" data-slide="prev"></a></li>
			<li><a class="project-next" href="#newCarousel" data-slide="next"></a></li>    
		</ul>
	</div>
  <div class="clearfix"></div>
   <div class="row">  
	 <div class="col-md-12 wow fadeInDown animated" data-wow-delay="0.4s">
	  <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="newCarousel">
	    
		 <div id="gallery" class="carousel-inner">
					 <?php
			$t=true;
		 $count_posts= esc_attr($home_blog_setting['post_display_count']);
		 $args = array (
			'post_type' => 'post','posts_per_page' =>$count_posts,'field'=> 'id');
			$portfolio_query = new WP_Query($args);
							
			if( $portfolio_query->have_posts() ) { 
				while($portfolio_query->have_posts()) : 
						$portfolio_query->the_post(); ?>
				<div class="item <?php if($t==true){echo 'active';} $t=false;  ?>">
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left">
					  <div class="portfolio-area">
						<div class="portfolio-image">
							<?php 
							$img = array('class' => 'img-responsive');
							if(has_post_thumbnail()) { 
											the_post_thumbnail('',$img); } else { ?>
											<a href="<?php the_permalink(); ?>"><?php echo '<img alt="" src="'. get_template_directory_uri() . '/images/default-port.jpg' .'">';?></a>

											<?php } ?>
							  <div class="caption">
								   <div class="portfolio-icon">
								    <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"><i class="fa fa-link"></i></a>
								     
								   </div>
						     </div>
						</div>
						<div class="portfolio-content">
						  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						   <p><?php echo get_service_excerpt(); ?></p>
						</div>
					</div>
				 </div>
				</div><?php endwhile; } ?>
				
			</div>
			
	</div>
  </div>
  </div>
  </div>
 </div>
 <?php //} ?>