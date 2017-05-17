<?php

/**
* Template Name: Home
* The template for displaying content for home page
* @link https://codex.wordpress.org/Template_Hierarchy
* @package Aquaparallax
*/

get_header();

?>

<div class="aqa-content-area">
	<?php if(get_theme_mod( 'aqua_banner_image' )) { ?>
	<div class="aqa-top-banner" style="background-image:url(<?php echo esc_url( get_theme_mod( 'aqua_banner_image' ), 'No image has been saved yet.' ); ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo esc_html( get_theme_mod( 'aqua_banner_title' ), 'aquaparallax' ); ?></h2>
					<p><?php echo esc_html( get_theme_mod( 'aqua_banner_content' ), 'aquaparallax' ); ?></p>
					<p><a href="<?php echo esc_url( get_theme_mod( 'aqua_read_link' ), 'No link has been saved yet.' ); ?>">Read More</a> <a class="banner-btn" href="<?php echo esc_url( get_theme_mod( 'aqua_download_link' ), 'aqua' ); ?>">Download Now</a></p>
				</div>
			</div>
		</div>
	</div>
	<?php }
	else {	?>
	<div class="aqa-top-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo esc_html( 'Simple Parallax Theme Just for You', 'aquaparallax' ); ?></h2>
					<p><?php echo esc_html( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'aquaparallax' ); ?></p>
					<p><a href="<?php echo esc_url( get_theme_mod( 'aqua_read_link' ), 'No link has been saved yet.' ); ?>"><?php echo esc_html( 'Read More', 'aquaparallax' ); ?></a> <a class="banner-btn" href="<?php echo esc_url( get_theme_mod( 'aqua_download_link' ), 'aquaparallax' ); ?>"> <?php echo esc_html( 'Download Now', 'aquaparallax' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>
<div class="aqa-service-section" id="features">
<div class="container">
<div class="row">
<div class="aqa-home-services-header">
<h2 class="aqa-main-title"><?php echo esc_html( get_theme_mod( 'aqua_feature_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_feature_content' ), 'aquaparallax' ); ?></h2></p>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="aqa-service-inner">
<p class="service-icon"><i class="<?php echo esc_html( get_theme_mod( 'aqua_feature_one_icon' ), 'aquaparallax' ); ?>" aria-hidden="true"></i></p>
<h2><?php echo esc_html( get_theme_mod( 'aqua_feature_one_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_feature_one_content' ), 'aquaparallax' ); ?></p>
</div>

</div>
<div class="col-md-3 col-sm-6 col-xs-12">

<div class="aqa-service-inner">
<p class="service-icon"><i class="<?php echo esc_html( get_theme_mod( 'aqua_feature_two_icon' ), 'aquaparallax' ); ?>" aria-hidden="true"></i></p>
<h2><?php echo esc_html( get_theme_mod( 'aqua_feature_two_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_feature_two_content' ), 'aquaparallax' ); ?></p>
</div>

</div>
<div class="col-md-3 col-sm-6 col-xs-12">

<div class="aqa-service-inner">
<p class="service-icon"><i class="<?php echo esc_html( get_theme_mod( 'aqua_feature_three_icon' ), 'aquaparallax' ); ?>" aria-hidden="true"></i></p>
<h2><?php echo esc_html( get_theme_mod( 'aqua_feature_three_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_feature_three_content' ), 'aquaparallax' ); ?></p>
</div>

</div>
<div class="col-md-3 col-sm-6 col-xs-12">

<div class="aqa-service-inner">
<p class="service-icon"><i class="<?php echo esc_html( get_theme_mod( 'aqua_feature_four_icon' ), 'aquaparallax' ); ?>" aria-hidden="true"></i></p>
<h2><?php echo esc_html( get_theme_mod( 'aqua_feature_four_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_feature_four_content' ), 'aquaparallax' ); ?></p>
</div>

</div>

</div>
</div>
</div>

<div class="aqa-home-parllex" id="aqa-parallax" style="background-image:url(<?php echo esc_url( get_theme_mod( 'aqua_parallax_image' ), 'aquaparallax' ); ?>);">
<div class="container">
<div class="row">

<div class="col-md-12">
<h2><?php echo esc_html( get_theme_mod( 'aqua_parallax_title' ), 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( get_theme_mod( 'aqua_parallax_content' ), 'aquaparallax' ); ?></p>
<p class="parllex-btn"><a href="<?php echo esc_url( get_theme_mod( 'aqua_parallax_link' ), 'No link has been saved yet' ); ?>"> More info </a></p>
</div>

</div>
</div>
</div>
<?php if( get_theme_mod( 'aqua_blogpost_section' ) == '1') { ?> 
<div class="aqa-home-blog" id="aqa-hme-blog-section">
<div class="container">
<div class="row">
<div class="aqa-home-blog-header">
<h2 class="aqa-main-title"><?php echo esc_html( 'Blog', 'aquaparallax' ); ?></h2>
<p><?php echo esc_html( 'Your Latest Blog Posts', 'aquaparallax' ); ?></p>
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
	<div class="aqa-read-btn"><a href="<?php the_permalink(); ?>" class="read-more-btn">Continue Reading</a></div>
</div>
</div>
</div><?php endwhile; ?>
<?php $url = site_url( '/blog/', 'http');  ?>
	<div class="aqa-view-more-btn"><a href="<?php echo esc_url( $url ); ?>"><class="view-more-btn">View More</a></div>

</div>
</div>
</div>
<?php } ?>

<?php if( get_theme_mod( 'aqua_portfolio_section' ) == '1') { ?>
<div class="aqa-portfolio-section" id="aqa-portfolio-sec">
<div class="container">
<h2 class="aqa-main-title"><?php echo esc_html( 'Portfolio', 'aquaparallax' ); ?></h2>
</div>
<div class="container">
<div class="row port_spacing">
	<?php echo do_shortcode('[wonderplugin_gridgallery id=1]'); ?>
</div>
</div>
</div>
<?php } ?>

<?php if( get_theme_mod( 'aqua_testimonial_section' ) == '1') { ?> 
<div class="aqa-testimonial-section" id="aqa-testimonial-sec"> 
<div class="container">

<h2 class="aqa-main-title"><?php echo esc_html( 'TESTIMONIALS', 'aquaparallax' ); ?></h2>
<div class="cd-testimonials-wrapper cd-container">

    <ul class="cd-testimonials">
    <?php $args = array(
	'post_type' => 'testimonial',
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();    ?>
        <li>
            <p><?php the_content(); ?></p>
            <div class="cd-author">
              	<?php the_post_thumbnail( array(100, 100) ); ?>
                <ul class="cd-author-info">
                    <li><?php $client_name = get_post_meta($post->ID, 'Client Name'); ?><?php if($client_name) { echo $client_name[0]; }?></li>
                    <li><?php $client_company = get_post_meta($post->ID, 'Client Company'); ?><?php if($client_company) { echo $client_company[0]; }?></li>
                </ul>
            </div>
        </li>
      <?php endwhile; ?>
    </ul> 
</div> 
</div>
</div>
<?php } ?>

</div>
<?php get_footer(); ?>