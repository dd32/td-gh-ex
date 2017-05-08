<?php
 /**
 * Template Name: Full Width
 * @package astrology
 */
get_header(); 
if(!is_front_page()){ ?>
<section id="blog-title-top">
    <div class="container">
        <div class="blog-title">
            <h2><?php the_title(); ?></h2>
            <div class="breadCumbs"><?php astrology_custom_breadcrumbs(); ?></div>
        </div>
    </div>
</section>
<?php } ?>
<section>
    <div class="container">
        <div class="row">               
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="blog-single-inner-page fullWidth">
                	<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-full', get_post_format() );
						endwhile;
					endif;
                    if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
				</div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();