<?php
/**
 * The template for displaying archive page
 */
 
get_header(); 

$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );
?>
<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title">
					<h2><?php if ( is_day() ) :
			
							printf( esc_html__( '%1$s %2$s', 'busiprof' ), $current_options['archive_prefix'], esc_html(get_the_date()) );
						  
						 elseif ( is_month() ) : 
						 
							printf( esc_html__( '%1$s %2$s', 'busiprof' ), $current_options['archive_prefix'], esc_html(get_the_date()) );
							 
						 elseif ( is_year() ) :
						 
							printf( esc_html__( '%1$s %2$s', 'busiprof' ), $current_options['archive_prefix'], esc_html(get_the_date()) );						 
						 
						else : 
							esc_html_e( "Blog Archive", 'busiprof' );
						 endif; 
						 ?>
				    </h2>
				</div>
			</div>
			<div class="col-md-6">
				<ul class="page-breadcrumb">
					<?php if (function_exists('busiprof_custom_breadcrumbs')) busiprof_custom_breadcrumbs();?>
				</ul>
			</div>
		</div>
	</div>	
</section>
<!-- End of Page Title -->
<div class="clearfix"></div>

<!-- Blog & Sidebar Section -->
<div id="content">
<section>		
	<div class="container">
		<div class="row">
			<!--Blog Posts-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					<?php 
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
					
						get_template_part( 'content','' );
						
					endwhile;
					?>
					<!-- Pagination -->			
					<div class="paginations">
						<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => esc_html__('Previous','busiprof'),
						'next_text'          => esc_html__('Next','busiprof'),
						'screen_reader_text' => ' ',
						) ); ?>
					</div>
					<?php endif; ?>
					<!-- /Pagination -->
				</div>
			<!--/End of Blog Posts-->
			</div>
			<!--Sidebar-->
			<?php get_sidebar();?>
			<!--/End of Sidebar-->
		</div>	
	</div>
</section>
</div>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>