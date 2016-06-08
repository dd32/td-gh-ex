<?php $becorp_options=becorp_theme_default_data(); 
$home_post_slide_option = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );?>
<div class="testimonial-section wow fadeInUp animated" data-wow-delay="100ms" data-wow-duration="300ms">   
  <div class="solid-callout padding30">
   <div class='container'>  
      <div class="carousel slide" data-ride="carousel" data-interval="3000" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
		<?php $i=0;
						$count_posts = $home_post_slide_option['home_blog_slider_post_count'];
						$args = array('post_type' => 'post' , 'posts_per_page' => $count_posts, 'post__not_in'=>get_option('sticky_posts')); 	
						$testimonial = new WP_Query( $args ); 
						if( $testimonial->have_posts() )
						{ while ( $testimonial->have_posts() ) : $testimonial->the_post();
						?>
						<li data-target="#quote-carousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ echo 'active';} ?>"></li>
						<?php $i++; endwhile; } else {
						?>
					  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
					  <li data-target="#quote-carousel" data-slide-to="1"></li>
					  <li data-target="#quote-carousel" data-slide-to="2"></li>
					  <?php } ?>
					</ol>
      
        
        <!-- Carousel Slides / Quotes -->
        
		<div class="carousel-inner">
		  <?php	$t=true;
				$i=1;
				$count_posts = $home_post_slide_option['home_blog_slider_post_count'];
						$args = array('post_type' => 'post' , 'posts_per_page' => $count_posts, 'post__not_in'=>get_option('sticky_posts'));
				$testimonial = new WP_Query( $args );
          if ( $testimonial->have_posts() ) {
			while ( $testimonial->have_posts() ) :
				$testimonial->the_post(); ?>
          <div class="item <?php if($t==true){echo 'active';}$t=false; ?>">
              <div class="row">
			  <?php $default_img=array('class'=>'img-circle'); ?>
                <div class="testi-img wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
				<?php if(has_post_thumbnail()) { ?>
							<?php the_post_thumbnail();?>
						<?php } else {?> 
				<?php echo '<img alt="" src="'. get_template_directory_uri() . '/images/default.png' .'">';?>
			<?php } ?>
                </div>
				
                  <small><?php the_title();?></small>
				  <p><?php echo get_service_excerpt(); ?></p>
              </div>
          </div>		  
        
		  <?php $i=2;
		  endwhile; } ?>
       </div>
      </div>                          
  </div> 
  </div>
 </div> 