<?php
/**
 * The template for displaying all pages.
 *
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php the_title();?></h2>
	    <span><?php echo get_breadcrumb(); ?></span>
	</div>	
</section>
<section id="blog-innerpage-content">
    <div class="container">
        <div class="row">               
            <div class="col-xs-12 col-sm-12 col-md-9 pull-right">
                <div class="blog-single-inner-page">
                	<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-single', get_post_format() );

							the_posts_pagination( array(
								'type'	=> 'list',
			                    'screen_reader_text' => ' ',
			                    'prev_text'          => __( 'Previous', 'astrology' ),
			                    'next_text'          => __( 'Next', 'astrology' ),
		                	) );
						endwhile;
					endif; ?>         
				</div>
            </div>
             <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>