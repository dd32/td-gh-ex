<?php

/**
* Template Name: Home
* The template for displaying content for home page
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package aquaparallax
*/

get_header();

?>

<div class="aqa-content-area">
	
	<div class="aqa-top-banner" style="background-image:url(<?php header_image(); ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php bloginfo( 'name' ); ?></h2>
					<p><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</div>
	</div>

<?php if( get_theme_mod( 'aquaparallax_blogpost_section' ) == '1') { ?> 
<div class="aqa-home-blog" id="aqa-hme-blog-section">
<div class="container">
<div class="row">
<div class="aqa-home-blog-header">
<h2 class="aqa-main-title"><?php echo esc_html_e( 'Blog', 'aquaparallax' ); ?></h2>
<p><?php echo esc_html_e( 'Your Latest Blog Posts', 'aquaparallax' ); ?></p>
</div>
<?php $args = array(
		      'post_type' => 'post',
			  'posts_per_page' => 4,
			  );
			  $the_query = new WP_Query( $args );
			  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="aqa-home-blog-inner">
	<div class="aqa-blog-img">
	 <?php the_post_thumbnail( 'full' ); ?>
	</div>
<div class="aqa-blog-content">
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="blog-user-cmd"><span class="aqa-blog-date"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span></p>
	<p><?php the_excerpt(); ?></p>
	<div class="aqa-read-btn"><a href="<?php the_permalink(); ?>" class="read-more-btn"><?php echo esc_html_e( 'Continue Reading', 'aquaparallax' ); ?></a></div>
</div>
</div>
</div><?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php $url = site_url( '/blog/', 'http');  ?>
	<div class="aqa-view-more-btn"><a href="<?php echo esc_url( $url ); ?>"><class="view-more-btn"><?php echo esc_html_e( 'View More', 'aquaparallax' ); ?></a></div>

</div>
</div>
</div>
<?php } ?>

<?php if( get_theme_mod( 'aquaparallax_portfolio_section' ) == '1') { ?>
<div class="aqa-portfolio-section" id="aqa-portfolio-sec">
<div class="container">
<h2 class="aqa-main-title"><?php echo esc_html_e( 'Portfolio', 'aquaparallax' ); ?></h2>
</div>
<div class="container">
<div class="row port_spacing">
	<?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if( is_plugin_active( 'portfolio-gallery/portfolio-gallery.php' ) ) {
		echo do_shortcode("[huge_it_portfolio id='1']"); 
	}
	?> 
</div>
</div>
</div>
<?php } ?>

</div>
<?php get_footer(); ?>