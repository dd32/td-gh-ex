<?php
$prefix             = atlast_agency_get_prefix();
$testimonialsParent = absint( get_theme_mod( $prefix . '_testimonials_parent_page', '' ) );
$sectionTitles      = atlast_agency_show_section_title( $testimonialsParent );
?>
<div class="section-container testimonial-section-content">
    <div class="container grid-xl">
        <div class="columns">
            <div class="column col-7 col-md-12 col-mr-auto col-sm-12">
		        <?php
		        $args  = array(
			        'post_type'   => 'page',
			        'parent'    => $testimonialsParent,
			        'hierarchical'=> false,
			        'sort_column' => 'menu_order',
                    'number' => 2
		        );
		        $pages = get_pages( $args );
		        if ( $pages != false ):?>
                    <div class="testimonial-wrapper">
                        <?php foreach ( $pages as $pp ):
	                        $thumbID = get_post_thumbnail_id( $pp->ID );
	                        $src     = wp_get_attachment_image_src( $thumbID, 'atlast-agency-testimonial-image-front' );
                            ?>
                        <div class="single-testimonial-inlist">
                            <h5 class="testimonial-name">
                                <?php echo esc_html( $pp->post_title ); ?>
                            </h5>
                            <p class="testimonial-texts">
                                <?php echo esc_html( $pp->post_excerpt ); ?>
                            </p>
                            <img src="<?php echo esc_url($src[0]); ?>" class="img-responsive testimonial-image"/>
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <?php endforeach ; ?>
                    </div>
		        <?php endif; ?>
            </div>
            <div class="column col-4 col-md-12 col-sm-12">
                <div class="padding-with-color">
	                <?php if ( ! empty( $sectionTitles['title'] ) && $sectionTitles['title'] != false ) : ?>
                        <h3><?php echo esc_html( $sectionTitles['title'] ); ?></h3>
	                <?php endif; ?>
                    <p>
		                <?php if ( ! empty( $sectionTitles['excerpt'] ) && $sectionTitles['excerpt'] != false ) : ?>
			                <?php echo $sectionTitles['excerpt'] ?>
		                <?php endif; ?>
                    </p>
                    <a href="<?php echo esc_url(get_permalink($testimonialsParent)); ?>" class="akis-btn is-danger is-uppercase"><?php echo esc_html__('View Testimonials','atlast-agency');?></a>
                </div>

            </div>
        </div>
    </div>
</div>