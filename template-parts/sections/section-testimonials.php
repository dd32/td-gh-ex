<?php
/**
 * Testimonial Section
 * @package beetech
 */
?>

<?php
	$section_option = get_theme_mod( 'homepage_testimonials_option');
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'testimonials_section_title');
        $testimonials_cat_id = get_theme_mod('testimonials_cat_id');
?>
		<section class="bt-testimonials" id="bt-section-testimonials">
    		<div class="bt-wrapper">
                <?php if($section_title){ ?>
        			<div class="bt-section-header">
        				<h2><?php echo esc_html($section_title); ?></h2>
        			</div>
                <?php } ?>
                <?php
                $testimonials_cat_query = new WP_Query(array('post_type'=>'post','cat'=>absint($testimonials_cat_id),'posts_per_page'=>-1));
                if($testimonials_cat_query->have_posts()):
                ?>
    			<div class="testimonial">
                    <div class="testiSlider">
                    
                        <?php while($testimonials_cat_query->have_posts()): $testimonials_cat_query->the_post(); 
                        $testimonial_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_testimonial_home');
                        ?>
            				<div class="slide">
            					<?php if(get_the_content()){ ?>
                                <p>
            						<?php echo esc_attr(wp_trim_words(get_the_content(),30,'&hellip;')); ?> 
            					</p>
                                <?php } ?>
            					<div class="img-holder">
            						<img src="<?php echo esc_url($testimonial_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
            					</div>
                                <?php if(get_the_title()){ ?>
            					<div class="name-holder">
            						<?php the_title(); ?>
            					</div>
                                <?php } ?>
            				</div>
                        <?php endwhile; ?>
                        
                    </div>
    			</div>
                <?php endif; ?>
    		</div>
    	</section>

<?php } ?>