<?php
/**
 * The archive template file
 * @package WordPress
 */
 
get_header(); 
?>
<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title">
					<h2><?php if ( is_day() ) :
			
						  _e( "Daily Archives: ", 'busi_prof' ); echo (get_the_date()); 
						  
						 elseif ( is_month() ) : 
						 
							 _e( "Monthly Archives: ", 'busi_prof' ); echo (get_the_date( 'F Y' )); 
							 
						 elseif ( is_year() ) :
						 
						 _e( "Yearly Archives: ", 'busi_prof' );  echo (get_the_date( 'Y' )); 
						 
						else : 
						
							 _e( "Blog Archives: ", 'busi_prof' ); 	
							 
						 endif; 
						 ?>
				    </h2>
					<p><?php bloginfo('description');?></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="search_box">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" id="appendedInputButton" class="search_input" placeholder=<?php _e( 'Search', 'busi_prof' ); ?> name="s">
					<input type="button" value="" class="search_btn">
				</form>	
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- End of Page Title -->
<div class="clearfix"></div>

<!-- Blog & Sidebar Section -->
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
						'prev_text'          => __('Previous','busi_prof'),
						'next_text'          => __('Next','busi_prof'),
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
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>