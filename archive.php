<?php
	/**
	* The template for displaying archive pages
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*
	* @package anorya
	*/

	get_header(); ?>

	<main class="container main-content-container">
		<div class="row">
			
			<?php if(get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden' ) == 'left'){ 
					get_sidebar(); 
				} ?>

			<div class="<?php echo esc_attr(anorya_main_content_class('ARCHIVES')); ?>" itemscope itemtype="http://schema.org/ItemList">

		<?php
		
		if ( have_posts() ) : 
			
			if(get_theme_mod( 'anorya_archives_layout_setting', 'anorya_full_width' )){
				$anorya_archives_layout = get_theme_mod( 'anorya_archives_layout_setting', 'anorya_full_width' );
			}
			
			if(is_author()){
				get_template_part( 'template-parts/author', 'bio' );
			}	
			
			
			$anorya_loop_index = 0;
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				switch($anorya_archives_layout){
					case 'anorya_full_width_layout':
						get_template_part( 'template-parts/content-fullwidth', 'none' );
						break;
					case 'anorya_list_layout':
						get_template_part( 'template-parts/content-list', 'none' );
						break;
					case 'anorya_grid_layout' :
						get_template_part( 'template-parts/content-grid', 'none' );
						break;
					case 'anorya_full_width_list_layout':
						if($anorya_loop_index == 0){
							get_template_part( 'template-parts/content-fullwidth', 'none' );
							$anorya_loop_index = 1;
						}	
						else{
							get_template_part( 'template-parts/content-list', 'none' );
						}	
						break;
					case 'anorya_full_width_grid_layout':
						if($anorya_loop_index == 0){
							get_template_part( 'template-parts/content-fullwidth', 'none' );
							$anorya_loop_index = 1;
						}	
						else{
							get_template_part( 'template-parts/content-grid', 'none' );
						}	
						break;
					default:
						get_template_part( 'template-parts/content-fullwidth', 'none' );
						break;
				}	
					
			endwhile; ?>

			<div class="posts-pagination col-md-12">
					
				<?php print str_replace('role="navigation"','',get_the_posts_pagination( array(
												'mid_size' => 2,
												'prev_text' => '<i class="fa  fa-angle-double-left" aria-hidden="true"></i>'.esc_html__( 'Previous','anorya' ),
												'next_text' => esc_html__( 'Next ','anorya' ).'<i class="fa fa-angle-double-right" aria-hidden="true"></i>',) ));    
												 
				?>
				</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
			
			<?php 
				if(get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden' ) == 'right'){ 
					get_sidebar(); 
				}
			?>
		</div>
	</main>	
	
<?php get_footer(); ?>