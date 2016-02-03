<?php
/**
 *
 * Template name: Blog Posts
 *
 * @package bellini
 */
get_header(); ?>
<div class="content-wrapper">
<div class="row">

<div id="primary" class="content-area <?php bellini_sidebar_content_class(); ?>">
<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
<section class="blog">

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
			'posts_per_page' => '3',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged,
			);

		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query( $args );


		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			if ( get_theme_mod('bellini_layout_blog') == 'layout-1' ):
					get_template_part( 'template-parts/content' );
				else:
					get_template_part( 'template-parts/content', 'lb-1' );
				endif;
			endwhile;
				bellini_pagination();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		wp_reset_postdata();
	?>

    	</section>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar('blog'); ?>
</div><!-- row -->
</div>
<?php get_footer(); ?>
?>