<?php
/*
 * Get and show the testimonials
 */
$prefix            = atlast_agency_get_prefix();
$testimonialParent = absint( get_theme_mod( $prefix . '_testimonials_parent_page', '' ) );
$isEnabled         = get_theme_mod( $prefix . '_enable_testimonials_section', false );

$testimonialBg = get_the_post_thumbnail_url($testimonialParent,'full');
$teamColor = '';
if ( $isEnabled == true && $testimonialParent != 0):
	?>
    <div id="home-team" class="homepage testimonial-section pad-tb-120" <?php echo ($testimonialBg != false ? ' style="background:url('.esc_url($testimonialBg).') center no-repeat; background-size:cover;"' :'');?>>
		<?php get_template_part( 'template-parts/custom-pages/homepage/testimonials/testimonial-style-1'); ?>
    </div>

<?php endif; ?>