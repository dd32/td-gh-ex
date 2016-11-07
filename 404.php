<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php esc_html_e( "Oops! That page can't be found", 'astrology' ); ?></h2>
	    <span><?php echo get_breadcrumb(); ?></span>
	</div>	
</section>
<section id="blogcontent">
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-9">
                <div class="bloginner-content-part2">
                	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'astrology' ); ?></p>	
					<?php get_search_form(); ?>
                </div>
        	</div>
        </div>
    </div>
</section>
<?php get_footer(); ?>