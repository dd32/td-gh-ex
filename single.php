<?php
/**
 * The template file for single post
 * @package Bar Restaurant
 */
get_header(); ?>
<section id="blog-title-top" style="">
	<div class="container">
		<div class="blog-title">
		    <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blog-innerpage-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="blog-single-inner-page">
            		<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-single', get_post_format() );
							the_post_navigation( array(
								'screen_reader_text' => ' ',
								'next_text' => '<span class="meta-nav-next">' . esc_html__( 'Next >', 'bar-restaurant' ) . '</span> ',
								'prev_text' => '<span class="meta-nav-prev">' . esc_html__( '< Previous', 'bar-restaurant' ) . '</span> ',
							) );
						endwhile; ?>
					    <!-- Commnet Part -->
					     <?php 
					     	echo sprintf('%s',get_the_tag_list('<p><strong>Tags: </strong>',', ','</p>'));
					        if ( comments_open() || get_comments_number() ) {
								comments_template();
							} ?>
						<!-- End Comment Part -->
					<?php endif; ?>
            	</div>
        	</div>
            <?php get_sidebar(); ?>
    	</div>
	</div>
</section>
<?php get_footer();