<?php
/**
 * The template for displaying all pages.
 *
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php the_title();?></h2>
		    <div class="breadCumbs"><?php astrology_custom_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blog-innerpage-content">
    <div class="container">
        <div class="row responsiveLayout">
            <?php get_sidebar(); ?>
            <div class="col-xs-12 col-sm-12 col-md-9 sidebar">
                <div class="blog-single-inner-page">
                	<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-page', get_post_format() );							
						endwhile;
						//Commnet Part
				        if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						//End Comment Part
					endif; ?>         
				</div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();