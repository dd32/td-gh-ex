<?php
	
	/**
	* The template for displaying 404 pages (not found)
	*/

	
	get_header();  ?>

	<main class="container main-content-container">
		<div class="row">
			<?php if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'left'){ 
					get_sidebar(); 
				} ?>
			<div class="<?php echo esc_attr(anorya_main_content_class('SEARCH')); ?>">
				
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'anorya' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like something went wrong! Nothing was found at this location. Maybe try a search?', 'anorya' ); ?></p>

					<div class="not-found-search">
					<?php
						get_search_form();
						
					?>
					</div>
				</div>
			</div>	
				<?php if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'right'){ 
					get_sidebar(); 
				} ?>	
			
		</div>
	</main>	


<?php
	get_footer();
?>