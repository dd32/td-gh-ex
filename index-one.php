<?php 
global $ak_options;
$ak_settings = get_option( 'ak_options', $ak_options );
?>

<section id="top-section" class="ak-container">
<div id="welcome-text" class="clear">
	<?php
		$welcome_post_id = $ak_settings['welcome_post'];
			if(!empty($welcome_post_id)){
			
			query_posts( 'p='.$welcome_post_id );
				while (have_posts()) : the_post(); ?>
					 
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					
					<?php 
					if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
					?>

					<figure class="welcome-text-image">
						<a href="<?php the_permalink(); ?>">
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
						</a>
					</figure>	
					<?php } ?>
					
					<div  class="welcome-detail<?php if( !has_post_thumbnail() ){ echo " welcome-detail-full-width"; } ?>">
					<p><?php echo ak_excerpt( get_the_content() , 650 ) ?></p>
					<a href="<?php the_permalink(); ?>" class="readmore bttn">Read More</a>
					</div>
					
				<?php endwhile;	
				wp_reset_postdata(); }
				
				else{ ?>
				
				<h1><a href="#">Welcome Message</a></h1>
				<figure class="welcome-text-image">
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/images/demo/welcome-image.jpg" alt="welcome">
				</a>
				</figure>

				<div  class="welcome-detail">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				<a href="#" class="readmore bttn">Read More</a>
				</div>

			<?php } ?>
</div>

<div id="latest-events">

			<?php
				$event_category = $ak_settings['event_cat'];

				if(!empty($event_category)){

	            $loop = new WP_Query( array(
	                'cat' => $event_category,
	                'posts_per_page' => 3,
	                'orderby' => 'date',
	                'order' => 'DSC'
	            )); ?>

	        <h1><a href="<?php echo get_category_link($event_category); ?>">Latest <?php echo get_cat_name($event_category); ?></a></h1>

	        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
	        	<div class="event-list clear">
	        		
	        		<figure class="event-thumbnail">
						<a href="<?php the_permalink(); ?>">
						<?php 
						if( has_post_thumbnail() ){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'event-thumbnail', false ); 
						?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
						<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/demo/event-fallback.jpg" alt="<?php the_title(); ?>">
						<?php } ?>
						
						<div class="event-date">
							<span class="event-date-day"><?php echo get_the_date('j'); ?></span>
							<span class="event-date-month"><?php echo get_the_date('M'); ?></span>
						</div>
						</a>
					</figure>	

					<div class="event-detail">
		        		<h4 class="event-title">
		        			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		        		</h4>

		        		<div class="event-excerpt">
		        			<?php echo ak_excerpt( get_the_content() , 100 ) ?>
		        		</div>
	        		</div>
	        	</div>
	        <?php endwhile; ?>
	        <?php wp_reset_postdata(); 

	        } else { ?>
	        
	        <h1>Latest Events/News</h1>
		        <?php for ( $event_count=1 ; $event_count < 4 ; $event_count++ ) { ?>
		        <div class="event-list clear">
						<figure class="event-thumbnail">
							<a href="#"><img src="<?php echo get_template_directory_uri().'/images/demo/event-'.$event_count.'.jpg'; ?>" alt="<?php echo 'event'.$event_count; ?>">
							<div class="event-date">
								<span class="event-date-day"><?php echo $event_count; ?></span>
								<span class="event-date-month"><?php echo "Mar"; ?></span>
							</div>
							</a>
						</figure>	

						<div class="event-detail">
			        		<h4 class="event-title">
			        			<a href="#">Title of the event-<?php echo $event_count; ?></a>
			        		</h4>

			        		<div class="event-excerpt">
			        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...
			        		</div>
		        		</div>
		        	</div>
		        <?php } 
	        	} ?>
</div>
</section>


<section id="mid-section" class="ak-container">
<?php 
$featured_post1 = $ak_settings['featured_post1'];
$featured_post2 = $ak_settings['featured_post2'];
$featured_post3 = $ak_settings['featured_post3'];
$show_fontawesome_icon = $ak_settings['show_fontawesome'];

if(!empty($featured_post1) || !empty($featured_post2) || !empty($featured_post3)){
    if(!empty($featured_post1)) { ?>
		<div id="featured-post-1" class="featured-post">
			
			<?php
				query_posts( 'p='.$featured_post1 );
				// the Loop
				while (have_posts()) : the_post(); 
					
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
						<a href="<?php the_permalink(); ?>">
                        <div class="featured-overlay">
                			<span class="overlay-plus font-icon-plus"></span>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						</a>
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<a href="<?php the_permalink(); ?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<i class="fa <?php echo $ak_settings['featured_post1_icon'] ?>"></i>
							
					<?php }
					the_title(); ?>
					</a>
					</h2>

					<div class="featured-content">
						<p><?php echo ak_excerpt( get_the_content() , 260 ) ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more bttn">Read More</a>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php }

	if(!empty($featured_post2)) { ?>
		<div id="featured-post-2" class="featured-post">
			
			<?php
				query_posts( 'p='.$featured_post2 );
				// the Loop
				while (have_posts()) : the_post();
					
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
						<a href="<?php the_permalink(); ?>">
                        <div class="featured-overlay">
                			<span class="overlay-plus font-icon-plus"></span>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						</a>
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<a href="<?php the_permalink(); ?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<i class="fa <?php echo $ak_settings['featured_post2_icon'] ?>"></i>
							
					<?php }
					the_title(); ?>
					</a>
					</h2>

					<div class="featured-content">
						<p><?php echo ak_excerpt( get_the_content() , 260 ) ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more bttn">Read More</a>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php } 

	if(!empty($featured_post3)) { ?>
		<div id="featured-post-3" class="featured-post">
			
			<?php
				query_posts( 'p='.$featured_post3 );
				// the Loop
				while (have_posts()) : the_post(); 
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
						<a href="<?php the_permalink(); ?>">
                        <div class="featured-overlay">
                			<span class="overlay-plus font-icon-plus"></span>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						</a>
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<a href="<?php the_permalink(); ?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<i class="fa <?php echo $ak_settings['featured_post3_icon'] ?>"></i>
							
					<?php }
					the_title(); ?>
					</a>
					</h2>

					<div class="featured-content">
						<p><?php echo ak_excerpt( get_the_content() , 260 ) ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more bttn">Read More</a>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php } 
	
	}else{ ?>
	
	<?php for($featured_post=1 ; $featured_post < 4; $featured_post++){ ?>
	<div id="featured-post-<?php echo $featured_post; ?>" class="featured-post">

		<figure class="featured-image">
		<a href="#">
		<div class="featured-overlay">
			<span class="overlay-plus font-icon-plus"></span>
		</div>

		<img src="<?php echo get_template_directory_uri().'/images/demo/featuredimage-'.$featured_post.'.jpg' ?>" alt="<?php echo 'featuredpost'.$featured_post; ?>">
		</a>
		</figure>

		<h2><a href="#">Featured Post <?php echo $featured_post; ?></a></h2>

		<div class="featured-content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate...</p>
			<a href="#" class="read-more bttn">Read More</a>
		</div>
	</div>

	<?php }
	} ?>
</section>


<section id="bottom-section">
	<div class="ak-container">
        <div class="text-box">
		<?php if ( is_active_sidebar( 'textblock-1' ) ) : ?>
		  <?php dynamic_sidebar( 'textblock-1' ); 
        
        else:  
        ?>
        <aside id="text-3" class="widget widget_text">
            <h1 class="widget-title">Why Us</h1>
            <div class="textwidget">
                <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Donec id lacus tempor, bibendum nunc vitae, egestas nisl</li>
                <li>Sed a dui sit amet lacus congue mattis</li>
                <li>Nam sed dui cursus, accumsan diam sed, sodales metus.</li>
                <li>Nulla scelerisque urna sit amet tortor tincidunt, sed bibendum lacus vestibulum.</li>
                </ul>
            </div>
        </aside>
		<?php endif; ?>	
		</div>
        
        <div class="thumbnail-gallery clear">
        <?php 
        $gallery_code = $ak_settings['gallery_code'];
        if ( is_active_sidebar( 'textblock-2' ) ) : ?>
		  <?php dynamic_sidebar( 'textblock-2' ); ?>
		<?php elseif(!empty($gallery_code)): ?>	
		<h1>Gallery</h1>
        <?php 
        echo do_shortcode($gallery_code );
        else: ?>
        <h1>Gallery</h1>
        <div class="gallery">
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img1.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img1" src="<?php echo get_template_directory_uri();?>/images/demo/img1-thumb.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img2.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img2" src="<?php echo get_template_directory_uri();?>/images/demo/img2-thumb.jpg">
            </a>
            </dt>
            </dl>
            <br style="clear: both">
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img3.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img3" src="<?php echo get_template_directory_uri();?>/images/demo/img3-thumb.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img4.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img4" src="<?php echo get_template_directory_uri();?>/images/demo/img4-thumb.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img5.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img5" src="<?php echo get_template_directory_uri();?>/images/demo/img5-thumb.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/img6.jpg">
            <img class="attachment-thumbnail" width="150" height="150" alt="img6" src="<?php echo get_template_directory_uri();?>/images/demo/img6-thumb.jpg">
            </a>
            </dt>
            </dl>
        </div>
        <?php endif; ?>	
		</div>        
        
		<div class="testimonail-slider">
 		<h1>Testimonials</h1>
			<?php
			$testimonail_category = $ak_settings['testimonial_cat'];
			if(!empty($testimonail_category)) {
				
	            $loop = new WP_Query( array(
	                'cat' => $testimonail_category,
	                'post_per_page' => 5,
	                'orderby' => 'date',
	                'order' => 'ASC'
	            )); ?>
	        <div class="testimonail-wrap">
		        <div class="testimonial-slider">
		        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

		        	<div class="testimonial-slide">
			        	<div class="testimonail-list clear">
			        		<div class="testimonail-thumbnail">
			        		<?php 
                            if(has_post_thumbnail()){
                            the_post_thumbnail('thumbnail'); 
                            }else{ ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-dummy.jpg" alt="no-image"/>
                            <?php }?>
			        		</div>

			        		<div class="testimonail-excerpt">
			        			<?php echo ak_excerpt( get_the_content() , 140 ) ?>
			        		</div>
			        	</div>
					<div class="testimoinal-client-name"><?php the_title(); ?></div>
					</div>
                <?php endwhile; ?>
				</div>
			</div>
			<a class="all-testimonial" href="<?php echo get_category_link( $testimonail_category ) ?>">View All Testimonails</a>
	        
	        
	        <?php wp_reset_postdata(); 
			}else{ 
			$client_name=array("","Linda Lee","George Bailey","Micheal Warner","Rosey Partick");
			?>
			<div class="testimonail-wrap">
				<div class="testimonial-slider">
				<?php for ($testimonial_count=1 ; $testimonial_count < 5 ; $testimonial_count++) { ?>
					<div class="testimonial-slide">
			        	<div class="testimonail-list clear">
			        		<div class="testimonail-thumbnail">
			        		<img src="<?php echo get_template_directory_uri().'/images/demo/testimonial-image'.$testimonial_count.'.jpg' ?>" alt="<?php echo $client_name[$testimonial_count]; ?>">
			        		</div>

			        		<div class="testimonail-excerpt">
			        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...
			        		</div>
			        	</div>
						<div class="testimoinal-client-name"><?php echo $client_name[$testimonial_count]; ?></div>
					</div>
				<?php } ?>
				</div>
			</div>
				<a class="all-testimonial" href="<?php get_category_link( $testimonail_category ) ?>">View All Testimonails</a>
			<?php } ?>
		</div>
	</div>
</section>
