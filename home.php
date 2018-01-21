<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package atoz
 */

get_header(); ?>

<!-- Slider -->
<?php if( get_theme_mod( 'atoz_slider_check' ) == 1 ) {?>
<section id="sb-home" class="text-center">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">     
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">            
			<?php atoz_featured_slider(); ?>        
		</div>   
		<!-- Controls --> 
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
			<span class="fa fa-angle-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> 
		</a> 
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
			<span class="fa fa-angle-right" aria-hidden="true"></span> <span class="sr-only">Next</span>
		</a> 
	</div>
</section>
<?php }?>

<!-- Search Form -->
<?php if( get_theme_mod( 'atoz_search_check' ) == 1 ) {?>
<section id="atoz-search" style="padding-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 ">          
				<?php echo get_search_form(); ?>
			</div>
		</div>
	</div>
</section>
<?php }?>

<!-- Blog Listing -->
<section id="sb-imgbox">
	<div class="container">
		<div class="row text-center">
			<h2 class="blogpost_title">
				<?php if (  get_theme_mod( 'atoz_post_title' ) ) { echo esc_html(get_theme_mod( 'atoz_post_title' ));}?>
			</h2>
			<p class="blogpost_desc">
				<?php if (  get_theme_mod( 'atoz_post_desc' ) ) { echo esc_html(get_theme_mod( 'atoz_post_desc' ));}?>
			</p>
			<?php
			if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>
				<div class="clearfix"></div>				
			<?php 	
				the_posts_pagination( array(
					'prev_text' =>	esc_attr( '<<', 'atoz' ),
					'next_text' => 	esc_attr( '>>', 'atoz' ),
				) );
			?>
			<?php wp_reset_postdata(); ?>           
			<?php else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atoz' ); ?></p>	
			<?php endif; ?>	
		</div>
	</div>
</section>

<!-- Featured Item & Defaults --> 
<?php if( get_theme_mod( 'atoz_Featured_check' ) == 1 && !is_paged()) {
	$atoz_background_img   = esc_url( get_theme_mod( 'atoz_bg_image' ) );   
	$atoz_background_img_static   = get_template_directory_uri() . "/img/article-bg.jpg";
	$back_grd_img = $atoz_background_img ? "$atoz_background_img" : "$atoz_background_img_static";  
	$atoz_quote_bg_color=  esc_attr(get_theme_mod( 'atoz_quote_bg_color', esc_attr('#f4d629', 'atoz')));
?>

<section id="service" class="service" style="background-image:url(<?php echo esc_url($back_grd_img);?>)">
	<div class="container">
		<div class="row">
			<div class="col-md-7 serv-img">				
				<?php
				   $background_img   = esc_url( get_theme_mod( 'atoz_image' ) );   
				   $background_img_static   = get_template_directory_uri() . "/img/ser-1.png";
				   $image = $background_img ? "$background_img" : "$background_img_static"; 
				?>
				<img src='<?php echo esc_url($image); ?>' class='img-responsive wow animated fadeInLeft'>; 
			</div>
			<div class="col-md-5 text-center serv-content wow animated fadeInRightBig">
				<?php   
					$atoz_title  = get_theme_mod( 'atoz_title', esc_html__('TITLE OF THE ITEM', 'atoz' ));
					if ($atoz_title != '') echo '<h4>' . esc_html($atoz_title) . ' </h4>';
				?>
				<?php   
					$atoz_feat_desc  = get_theme_mod( 'atoz_feat_desc', esc_html__('Description goes here. This is the featured item section of the theme.', 'atoz' ));
					if ($atoz_feat_desc != '') echo '<p>' . wp_kses_post($atoz_feat_desc) . ' </p>';
				?>
				<?php 
				   $atoz_url_title  = get_theme_mod( 'atoz_url_title', esc_html__('Add Button Text', 'atoz' ));
				   $atoz_url_link=  get_theme_mod( 'atoz_url_link', esc_attr('#', 'atoz') );          
				   if ($atoz_url_title != '' && $atoz_url_link != '') echo '<a href="' . esc_url($atoz_url_link) . '"  class="btn btn-outline-primary">  ' . esc_html($atoz_url_title) . ' </a>'; 
				?>				
			</div>
		</div>
	</div>
</section>
<?php }?>
<?php
get_footer();