<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bcorporate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bcorporate_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bcorporate_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bcorporate_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bcorporate_pingback_header' );

/***************************************************
bcorporate custom fucntions
****************************************************/

/*
=================================================
Homepage Aboutus Section Function
@Action: bcorporate_home_about_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_about_sec_fnc' ) ) :

function bcorporate_home_about_sec_fnc() {
	$bcorporate_about_image = get_theme_mod('homepage_about_background');
	?>
	<section id="bcorporate_home_about_wrap" style="background-image: url(<?php if($bcorporate_about_image){ echo esc_url( $bcorporate_about_image );}?>)">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_about_main_text' ) );?>
				</h1>
				<div class="about_mid_text col-md-12 col-sm-12 col-lg-6 offset-lg-3">
					<p><?php esc_html_e( get_theme_mod( 'homepage_about_sub_text' ) );?></p>
				</div>
				<div class="about_bottom_text">
					<a href="#"><span><?php esc_html_e( get_theme_mod( 'homepage_about_bottom_text' ) );?></span></a>
				</div>
				<div class="about_video_section">
					<?php echo wp_oembed_get( esc_url( get_theme_mod( 'homepage_video_url' ) ) ); ?>
				</div>
			</div>
		</div></div>
	</section>
	<?php 
	}
endif;

/*
=================================================
Homepage Feature Section Function
@Action: bcorporate_home_feature_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_feature_sec_fnc' ) ) :

function bcorporate_home_feature_sec_fnc() {
	?>
	<section id="bcorporate_home_feature_wrap" class="text-center">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_feature_main_title' ) );?>
				</h1>
			</div>
		</div>
		<div class="row home_feature_post_wrap">
			<?php
		    	$bcorporate_featured_id = get_theme_mod('homepage_feature_category');
		    	if(!empty($bcorporate_featured_id)){
		    		$bcorporate_feature_query  = new WP_Query( array( 
															'cat' => absint( $bcorporate_featured_id ) , 
															'posts_per_page' => 5 
														) );

				while ( $bcorporate_feature_query->have_posts() ) : $bcorporate_feature_query->the_post();
		     ?>
		    	<div class="services_single-wrap">
			    	<div class="header_part_feature">
			    		<div class="home_feature_icon"><img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_services') );?>"></div>
			    		
			    	</div>
			    	<div class="content_part_feature">
			    		<h3><?php the_title(); ?></h3>
			    		<p><?php esc_html_e( wp_trim_words(get_the_content(), '22', '') ); ?></p>
			    	</div>
		    	</div>	
		 	<?php endwhile; wp_reset_query(); } ?>
		</div></div>
	</section>
	<?php 
	}
endif;


/*
=================================================
Homepage Portfolio Section Function
@Action: bcorporate_home_portfolio_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_portfolio_sec_fnc' ) ) :

function bcorporate_home_portfolio_sec_fnc() {
	?>
	<section id="bcorporate_home_portfolio_wrap" class="text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_portfolio_main_title' ) );?>
				</h1>
				<div class="col-md-12 col-sm-12 col-lg-6 offset-lg-3 homepage_portfolio_sub_text"><p ><?php esc_html_e( get_theme_mod( 'homepage_portfolio_sub_text' ) );?></p>
			</div></div>
		</div>
		<div class="row home_portfolio_post_wrap">
			<?php
		    	$bcorporate_portfolio_id = get_theme_mod('homepage_portfolio_category');
		    	if(!empty($bcorporate_portfolio_id)){
		    		$bcorporate_portfolio_query  = new WP_Query( array( 
															'cat' => absint( $bcorporate_portfolio_id ) , 
															'posts_per_page' => 5 
														) );

				while ( $bcorporate_portfolio_query->have_posts() ) : $bcorporate_portfolio_query->the_post();
		     ?>
			    <div class="col-md-6 col-sm-6 col-lg-4 portfolio_single">
			    	<div class="portfolio_single_wrap">
			    	<div class="portfolio_image">
			    		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
			    	</div>
			    	<div class="content_part_portfolio text-left">
			    		<h3><a href="#"><?php the_title(); ?></a></h3>
			    		<div class="category">
			    			<?php the_category(); ?>
			    		</div>	
			    		<div class="main_content_portfolio">
			    			<p><?php esc_html_e( wp_trim_words(get_the_content(), '22', '') ); ?></p>
			    		</div>
			    			
			    	</div>
			     	
			    </div></div>
		 	<?php endwhile; wp_reset_query();
		 	}
		 	 ?>
		</div></div>
	</section>
	<?php 
	}
endif;


/*
=================================================
Homepage ctaone Section Function
@Action: bcorporate_home_ctaone_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_ctaone_sec_fnc' ) ) :

function bcorporate_home_ctaone_sec_fnc() {
	?>
	<section id="bcorporate_home_ctaone_wrap" class="text-center">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_cta_one_main_title' ) );?>
				</h1>
				<p class="bcorporate_home_ctaone_sub-text"><?php esc_html_e( get_theme_mod( 'homepage_cta_one_sub_title' ) );?></p>
				<?php if( get_theme_mod('homepage_cta_one_button_url') ): ?>
					<div class="btn BE-btn-primary"><a href="<?php echo esc_url( get_theme_mod('homepage_cta_one_button_url') ); ?>" class="btn cta-btn">
						<?php esc_html_e( get_theme_mod( 'homepage_cta_one_button_text' ) );?></a>
					</a>
				<?php endif; ?>
			</div>
		</div></div>
	</section>
	<?php
	} 
endif;


/*
=================================================
Homepage Services Section Function
@Action: bcorporate_home_services_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_services_sec_fnc' ) ) :

function bcorporate_home_services_sec_fnc() {
	?>
	<section id="bcorporate_home_services_wrap" class="text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_services_main_title' ) );?>
				</h1>
				<div class="col-md-12 col-sm-12 col-lg-6 offset-lg-3 "><p><?php esc_html_e( get_theme_mod( 'homepage_services_sub_title' ) );?></p>
			</div></div>
		</div>
		<div class="row home_services_post_wrap">
			<?php
		    	$bcorporate_services_id = get_theme_mod('homepage_services_category');
		    	if(!empty($bcorporate_services_id)){
		    		$bcorporate_services_query  = new WP_Query( array( 
															'cat' => absint( $bcorporate_services_id ) , 
															'posts_per_page' => 5 
														) );

				while ( $bcorporate_services_query -> have_posts() ) : $bcorporate_services_query -> the_post();
		     ?>
			    <div class="col-md-6 col-sm-6 col-lg-4 services_single">
			    	<div class="services_single-warp">
			    	<div class="services_image">
			    		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
			    	</div>
			    	<div class="content_part_services">
			    		<h3><a href="#"><?php the_title(); ?></a></h3>
			    		<div class="main_content_services">
			    			<p><?php esc_html_e( get_the_content() ); ?></p>
			    		</div>	
			    	</div>
			    </div></div>
		 	<?php endwhile; wp_reset_query();
		 	}
		 	 ?>
		</div></div>
	</section>
	<?php 
	}
endif;

/*
=================================================
Homepage Blog Section Function
@Action: bcorporate_home_blog_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_blog_sec_fnc' ) ) :

function bcorporate_home_blog_sec_fnc() {
	?>
	<section id="bcorporate_home_blog_wrap" class="text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_blog_main_title' ) );?>
				</h1>
				<div class="col-md-12 col-sm-12 col-lg-6 offset-lg-3 "><p><?php esc_html_e( get_theme_mod( 'homepage_blog_sub_title' ) );?></p></div>
			</div>
		</div>
		<div class="row home_blog_post_wrap">
			<?php
		    	$bcorporate_blog_id = get_theme_mod('homepage_blog_category');
		    	if(!empty($bcorporate_blog_id)){
		    		$bcorporate_blog_query  = new WP_Query( array( 
															'cat' => absint( $bcorporate_blog_id ) , 
															'posts_per_page' => 5 
														) );

				while ( $bcorporate_blog_query -> have_posts() ) : $bcorporate_blog_query -> the_post();
		     ?>
			    <div class="col-md-6 col-sm-6 col-lg-4 blog_single text-left">
			    	<div class="services_image">
			    		<a href="<?php the_permalink();?>">
			    			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
			    		</a>
			    	</div>
			    	<div class="content_part_blog">
			    		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
			    		<p class="blog_homepage_date"><?php echo esc_html( 'by', 'bcorporate'); ?>
			    			<span class="bcorp_blog_author"><?php esc_html_e( get_the_author(),'bcorporate' );?></span> | 
			    			<span class="bcorp_blog_date"> <?php esc_html_e( get_the_date(), 'bcorporate' );?> </span></p>
			    		<div class="main_content_blog"><p>
			    			<?php esc_html_e( wp_trim_words( get_the_content(), 24, '...' ) ); ?></p>
			    		</div>
			    		<div class="BE-btn-primary btn">
			    			<a href="<?php the_permalink(); ?>" class="read_me_blog btn">Read Full Story</a>
			    			
  						</div>
  						<div class="Bcorp_comment pull-right">
  							<a href="<?php the_permalink();?>" class="comment_num">
			    				<i class="fa fa-comment-o" aria-hidden="true"></i>
  								<?php echo absint( get_comments_number() ); ?>
  							</a>
  						</div>

			    	</div>
			    </div>
		 	<?php endwhile; wp_reset_query();
		 	}
		 	 ?>
		</div></div>
	</section>
	<?php 
	}
endif;


/*
=================================================
Homepage Testimonial Section Function
@Action: bcorporate_home_testimonial_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_testimonial_sec_fnc' ) ) :

function bcorporate_home_testimonial_sec_fnc() {
	?>
	<section id="bcorporate_home_testimonial_wrap" class="text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<span class="homepage_testimonial_sub_title"><?php esc_html_e( get_theme_mod( 'homepage_testimonial_sub_title' ) );?></span>
				<h1 class="homepage_testimonial_main_title">
					<?php esc_html_e( get_theme_mod( 'homepage_testimonial_main_title' ) );?>
				</h1>
				
			</div>
		</div>
		<div class="row home_blog_post_wrap">
			<?php
		    	$bcorporate_testimonial_id = get_theme_mod('homepage_testimonial_category');
		    	if(!empty($bcorporate_testimonial_id)){
		    		$bcorporate_testimonial_query  = new WP_Query( array( 
															'cat' => absint( $bcorporate_testimonial_id ) , 
															'posts_per_page' => 5 
														) );

				while ( $bcorporate_testimonial_query -> have_posts() ) : $bcorporate_testimonial_query -> the_post();
		     ?>
			    <div class="col-md-4 col-sm-4 testimonial_single">
			    	<div class="main_content_testimonial">
			    		<p><?php esc_html_e( wp_trim_words( get_the_content(), 20, '...' ) ); ?></p>
			    	</div>
			    	<div class="testimonial_image">
			    		<a href="<?php the_permalink();?>">
			    			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_testimonial') );?>">
			    		</a>
			    	</div>
			    	<div class="testimonial_author">
			    		<h3><?php the_title(); ?></h3>
			    	</div>
			    </div>
		 	<?php endwhile; wp_reset_query();
		 	}
		 	 ?>
		</div></div>
	</section>
	<?php 
	}
endif;

/*
=================================================
Homepage ctatwo Section Function
@Action: bcorporate_home_ctatwo_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_ctatwo_sec_fnc' ) ) :

function bcorporate_home_ctatwo_sec_fnc() {
	?>
	<section id="bcorporate_home_ctatwo_wrap" class="text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>
					<?php esc_html_e( get_theme_mod( 'homepage_cta_two_main_title' ) );?>
				</h1>
				<div class="col-md-12 col-sm-12 col-lg-6 offset-lg-3 "><p  class="bcorporate_home_ctatwo_sub-text"><?php esc_html_e( get_theme_mod( 'homepage_cta_two_sub_title' ) );?></p></div>
				<?php if( get_theme_mod('homepage_cta_two_button_url') ): ?>
					<div class="BE-btn-primary btn"><a href="<?php echo esc_url( get_theme_mod('homepage_cta_two_button_url') ); ?>" class="btn cta-btn">
						<?php esc_html_e( get_theme_mod( 'homepage_cta_two_button_text' ) );?></a>
					</a>
				<?php endif; ?>
			</div>
		</div></div>
	</section>
	<?php
	} 
endif;
