<?php
 /**
 * Template Name: Full Width
 * @package astrology
 */
get_header(); ?>
<section>
    <div class="container">
        <div class="row">               
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="blog-single-inner-page fullWidth">
                	<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-full', get_post_format() );
						endwhile;
					endif; ?>         
				</div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();