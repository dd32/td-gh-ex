<?php
/** portada.php
 *
 * Template Name: Portada principal
 *
 * The template used for displaying page content in portada.php
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athenea
 */

get_header(); ?>

    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <h3><?php echo of_get_option('principal_1a','no entry'); ?></h3>
            <p><?php echo of_get_option('principal_1b','no entry'); ?></p>
            <p><a href="<?php echo of_get_option('principal_1c','no entry'); ?>" class="btn btn-primary btn-lg" role="button"><?php echo of_get_option('principal_1d','no entry'); ?></a></p>
          </div>
          <div class="col-md-6 text-center">
            <h3><?php echo of_get_option('principal_2a','no entry'); ?></h3>
            <p><?php echo of_get_option('principal_2b','no entry'); ?></p>
            <p><a href="<?php echo of_get_option('principal_2c','no entry'); ?>" class="btn btn-primary btn-lg" role="button"><?php echo of_get_option('principal_2d','no entry'); ?></a></p>
          </div>
        </div>
      </div>
    </div>

<div class="container">
   <div class="row transbody">    
    <div id="primary" class="col-md-8">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php athenea_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div><!-- #primary col-md-8 -->
    <div class="col-md-4">
	  <div class="well">
       <?php get_sidebar(); ?>
      </div>
    </div><!-- col-md-4 -->
   </div><!-- /row -->
</div><!--/container-->

    <div class="jumbotron">
      <div class="container">
        <div class="container marketing">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h3>cualquier cosa que se me ocurra</h3>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div>
      </div>
    </div>
    
<?php get_footer(); ?>