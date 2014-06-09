<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AccesspressLite
 */
?>

<?php 
global $post, $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$event_category = $accesspresslite_settings['event_cat'];
$show_events = $accesspresslite_settings['rightsidebar_show_latest_events'];
$testimonail_category = $accesspresslite_settings['testimonial_cat'];
$blog_category = $accesspresslite_settings['blog_cat'];
$show_testimonials = $accesspresslite_settings['rightsidebar_show_testimonials'];
$post_class = get_post_meta( $post -> ID, 'accesspresslite_sidebar_layout', true );
if($post_class=='right-sidebar' || $post_class=='both-sidebar' || empty($post_class) || is_archive()){
?>
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php
        if(!empty($blog_category) && is_category($blog_category)){
          if ( is_active_sidebar( 'blog-sidebar' ) ) :
			 dynamic_sidebar( 'blog-sidebar' );
		  endif; 
        }else{
			if($show_events==1) {
				if(!empty($event_category)){
				$loop = new WP_Query( array(
	                'cat' => $event_category,
	                'posts_per_page' => 3,
	            )); ?>
	        <aside id="latest-events" class="clear">
	        <h1 class="widget-title"><?php echo get_cat_name($event_category); ?></h1>

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
		        			<?php echo accesspresslite_excerpt( get_the_content() , 50 ) ?> 
		        		</div>
	        		</div>
	        	</div>
	        <?php endwhile; ?>
	        <?php if(!empty($accesspresslite_settings['view_all_text'])){ ?>
	        <a class="all-events" href="<?php echo get_category_link( $event_category ) ?>"><?php echo $accesspresslite_settings['view_all_text']; ?></a>
	        <?php } ?>
	        <?php wp_reset_postdata(); ?>
	        </aside>
	        <?php
	        } else { ?>
	        <aside id="latest-events" class="clear">
	        <h1 class="widget-title">Latest Events/News</h1>
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
			        			Lorem Ipsum is simply dummy text of the printing and..
			        		</div>
		        		</div>
		        	</div>
		        <?php } ?>
		        <a class="all-events" href="#">View All Events</a>
		        </aside>
	        <?php } 
	        }?>

        <?php wp_reset_query(); ?>

	    <?php if($show_testimonials == 1){ ?>
		<aside class="widget testimonail-sidebar clear">
 		<h1 class="widget-title">Testimonials</h1>
			<?php
			
			if(!empty($testimonail_category)) {
				
	            $loop = new WP_Query( array(
	                'cat' => $testimonail_category,
	                'posts_per_page' => 3,
	            )); ?>
	        <div class="testimonail-wrap">
		        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

			        <div class="testimonail-list">
			        	<div class="testimonail-thumbnail">
			        		<?php 
                            if(has_post_thumbnail()){
                            the_post_thumbnail('thumbnail'); 
                            }else{ ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-dummy.jpg" alt="no-image"/>
                            <?php }?>
		        		</div>

			        	<div class="testimonail-excerpt">
			        		<?php echo accesspresslite_excerpt( get_the_content() , 90 ) ?>
			        	</div>
			        	<div class="clear"></div>
					<div class="testimoinal-client-name"><?php the_title(); ?></div>
					</div>
			<?php endwhile; ?>
	        </div>
            <?php if(!empty($accesspresslite_settings['view_all_text'])){ ?>
            <a class="all-testimonial" href="<?php echo get_category_link( $testimonail_category ) ?>"><?php echo $accesspresslite_settings['view_all_text']; ?></a>
            <?php } ?>
            
	        <?php wp_reset_postdata(); 
			}else{ 
			$client_name=array("","Linda Lee","George Bailey","Micheal Warner");
			?>
			<div class="testimonail-wrap">
				<?php for ($testimonial_count=1 ; $testimonial_count < 4 ; $testimonial_count++) { ?>
			        	<div class="testimonail-list clear">
			        		<div class="testimonail-thumbnail">
			        		<img src="<?php echo get_template_directory_uri().'/images/demo/testimonial-image'.$testimonial_count.'.jpg' ?>" alt="<?php echo $client_name[$testimonial_count]; ?>">
			        		</div>

			        		<div class="testimonail-excerpt">
			        			Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer..
			        		</div>
			        		<div class="clear"></div>
			        	<div class="testimoinal-client-name"><?php echo $client_name[$testimonial_count]; ?></div>
			        	</div>
						
				<?php } ?>
				</div>
			<a class="all-testimonial" href="#">View All Testimonials</a>
			<?php } ?>
			</aside>
			<?php } ?>
		

		<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		<?php endif; ?>
        <?php } ?>
	</div><!-- #secondary -->
<?php } ?>
