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
					<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
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
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more Letraset sheets containing Lorem Ipsum passages, and moreLetraset sheets containing Lorem Ipsum passages</p>
				<a href="#" class="readmore">Read More</a>
				</div>

			<?php } ?>
</div>

<div id="latest-events">

			<?php
				$event_category = $ak_settings['event_cat'];

				if(!empty($event_category)){

	            $loop = new WP_Query( array(
	                'cat' => $event_category,
	                'post_per_page' => 3,
	                'orderby' => 'date',
	                'order' => 'ASC'
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
			        			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has..
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
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
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
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
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
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
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
			<p>Apple pie icing sweet. Brownie jelly-o applicake applicake sweet roll liquorice bear claw. Jujubes carrot cake cotton candy sweet tart brownie. Tiramisu applicake jujubes.</p>
			<a href="#" class="read-more">Read More</a>
		</div>
	</div>

	<?php }
	} ?>
</section>

<?php wp_reset_query(); ?>

<section id="ak-blog">
	<section class="ak-container" id="ak-blog-post">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar('right'); ?>
	</section>
</section>

<?php wp_reset_query(); ?>

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
                <li>Product Development</li>
                <li>Prototyping</li>
                <li>Engineering Design</li>
                <li>Supply Chain Management</li>
                <li>Program Management</li>
                <li>Electronic Manufacturing</li>
                <li>Post Manufacturing Support</li>
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
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/Angkor-Wat-Cambodia-Siem-Reap-Hrtfried-Schmid-best-picture-gallery.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="Angkor-Wat-Cambodia-Siem-Reap-Hrtfried-Schmid-best-picture-gallery" src="<?php echo get_template_directory_uri();?>/images/demo/Angkor-Wat-Cambodia-Siem-Reap-Hrtfried-Schmid-best-picture-gallery-150x150.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-angel-oak-south-carolina-MarkRegs-photo.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="best-picture-gallery-angel-oak-south-carolina-MarkRegs-photo" src="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-angel-oak-south-carolina-MarkRegs-photo-150x150.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-Arizona-Antelope-Canyon-Farols-Fotos-photo.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="best-picture-gallery-Arizona-Antelope-Canyon-Farols-Fotos-photo" src="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-Arizona-Antelope-Canyon-Farols-Fotos-photo-150x150.jpg">
            </a>
            </dt>
            </dl>
            <br style="clear: both">
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-Brazil-Rio-de-Janeiro-Jesus-iko-photo.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="best-picture-gallery-Brazil-Rio-de-Janeiro-Jesus-iko-photo" src="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-Brazil-Rio-de-Janeiro-Jesus-iko-photo-150x150.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-India-Maldives-Vilu-Reef-resort-deckchair-pic.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="best-picture-gallery-India-Maldives-Vilu-Reef-resort-deckchair-pic" src="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-India-Maldives-Vilu-Reef-resort-deckchair-pic-150x150.jpg">
            </a>
            </dt>
            </dl>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
            <a class="fancybox-gallery" href="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-landscape-mountain-house-Chris-archi3d-photo.jpg" data-fancybox-group="group">
            <img class="attachment-thumbnail" width="150" height="150" alt="best-picture-gallery-landscape-mountain-house-Chris-archi3d-photo" src="<?php echo get_template_directory_uri();?>/images/demo/best-picture-gallery-landscape-mountain-house-Chris-archi3d-photo-150x150.jpg">
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
			        			Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...
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

<?php get_footer(); ?>
