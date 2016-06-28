<?php
/**
 *
 * Template name: Blog Posts
 *
 * @package bellini
 */
get_header(); ?>

<div class="row">
<div id="primary" class="content-area <?php bellini_blog_sidebar(); ?>">
<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
<?php
		//Fix homepage pagination
		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}
		$args = array(
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged,
			);

		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query( $args );

		if ( $wp_query->have_posts() ) {

			echo '<header class="col-md-12 page__header entry-header">';
			echo '<div class="single page-meta">';
			the_title( '<h1 class="entry-title element-title single-page__title" itemprop="headline">', '</h1>' );
			bellini_breadcrumb_integration();
			$header_description = get_post_meta( get_the_ID(),'_bellini_header_description',true);
			echo '<div class="page__description">';
			echo $header_description;
			echo '</div>';
			echo '</header>';
			echo '<section class="blog">';
			echo '<div class="bellini__canvas">';


			
			while ( $wp_query->have_posts() ) : $wp_query->the_post();

				if ( get_option('bellini_layout_blog', 'layout-1') == 'layout-1' ):
					get_template_part( 'template-parts/content' );
				endif;

				if ( get_option('bellini_layout_blog', 'layout-1') == 'layout-5' ):
					get_template_part( 'template-parts/content-lb-5');
				endif;

			endwhile;
				bellini_pagination();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		wp_reset_postdata(); ?>
    	</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar('blog'); ?>
</div><!-- row -->
</div>
<?php get_footer(); ?>