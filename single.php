<?php
/**
 * The template file for single post
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
            <div class="col-xs-12 col-sm-12 col-md-9 content">
                <div class="blog-single-inner-page">
            		<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-single', get_post_format() );
							
							edit_post_link(	
								sprintf(
									/* translators: %s: Name of current post */
									__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'astrology' ),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
							the_post_navigation( array(
								'screen_reader_text' => ' ',
								'next_text' => '<span class="meta-nav-next">' . __( 'Next', 'astrology' ) . '</span> ',
								'prev_text' => '<span class="meta-nav-prev">' . __( 'Previous', 'astrology' ) . '</span> ',
							) );
						endwhile;
					    //Commnet Part
				     	echo get_the_tag_list('<p><strong>Tags: </strong>',', ','</p>');
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