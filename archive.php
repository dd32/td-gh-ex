<?php

/*
 * The template for displaying Archive pages
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, belfast
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */

get_header(); ?>


	
	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
			<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<?php 
				
				if ( is_archive() ){
					the_archive_title('<h1 class="archive-title">', '</h1>');
				}elseif ( is_home() ){
					echo '<h1 class="archive-title">'.esc_html__( 'Blog', 'belfast' ).'</h1>';
				}elseif(is_search()){
					echo '<h1 class="archive-title">'.esc_html__( 'Search Result', 'belfast' ).'</h1>';
				} else{
					the_title( '<h1 class="archive-title">', '</h1>' );
				
				}
				
				?>

			</header><!-- .archive-header -->



			<?php /* The loop */ ?>


				<?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile; ?>

    

                <?php belfast_paging_nav(); ?>

    

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>

		</div><!-- #content -->
        <?php get_sidebar();?>
	</div>



<?php get_footer(); ?>