<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package Adagio Lite
 */

get_header(); ?>

<div id="wrapper">
  <div id="contentwrapper">
    <?php
			the_archive_title( '<h1 class="entry-title"><span>', '</span></h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
    <div id="content">
      <?php if ( have_posts() ) : ?>
      <?php
				while ( have_posts() ) : the_post();
						if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) :
							get_template_part( 'content', 'portfolio' );
						else :
							get_template_part( 'content', get_post_format() );
						endif;
					endwhile;
				?>
      <?php adagio_paging_nav(); ?>
      <?php else : ?>
      <h2 class="center">
        <?php esc_html_e( 'Not Found', 'adagio-lite' ); ?>
      </h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
