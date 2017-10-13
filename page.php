<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package atoz
 */

get_header(); ?>

<div id="single-banner"> 
    <div class="content wow fdeInUp">
      <div class="container">
     	<?php
			while ( have_posts() ) : the_post();
			?>
        <h1><?php the_title(); ?></h1>        
         <!--breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><?php get_breadcrumb(); ?></a></li>
        </ol>
      </div>
    </div>
</div>

<section id="sb-imgbox">
  <div class="container">
    <div class="row">
			<?php
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
      </div>
    </div>
</section>

<?php
get_footer();