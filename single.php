<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
 * @package appdetail
 */
get_header();
global $appdetail_theme_options;

$designlayout = $appdetail_theme_options['appdetail-layout'];

$side_col = 'right-s-bar ';

if( 'left-sidebar' == $designlayout ){

	$side_col = 'left-s-bar';
}
?>
<section class="pb-160 s-pad blog-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
				<?php
					while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content','single'); ?>
						<div class="clearfix"></div>
						<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
				?>
				<?php endwhile; // End of the loop.	?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php
get_footer();