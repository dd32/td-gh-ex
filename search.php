<?php
/**
 * The template for displaying search results pages
 *
 * @package anorya
 */

	get_header();

	// load collapsable sidebar
	anorya_display_hidden_sidebar();	
?>

	<div class="container">
		<div class="row">
			<?php if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'left'){ 
					get_sidebar(); 
				} ?>
			<div class="<?php echo esc_attr(anorya_main_content_class('SEARCH')); ?>">
			<?php
			if ( have_posts() ) : ?>

				<?php  if(get_theme_mod( 'anorya_archives_layout_setting', 'anorya_full_width' )){
				$anorya_archives_layout = get_theme_mod( 'anorya_archives_layout_setting', 'anorya_full_width' );
				}  ?>
				
				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'anorya' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
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
						default:
							get_template_part( 'template-parts/content-list', 'none' );
							break;
					}

				endwhile; ?>

				<div class="posts-pagination col-md-12">
					
				<?php print str_replace('role="navigation"','',get_the_posts_pagination( array(
												'mid_size' => 2,
												'prev_text' =>'<i class="fa  fa-angle-double-left" aria-hidden="true"></i> '.esc_html__( 'Previous','anorya' ),
												'next_text' => esc_html__( 'Next','anorya' ).' <i class="fa fa-angle-double-right" aria-hidden="true"></i>',) ));
												 
				?>
				</div>

			<?php  else :

				get_template_part( 'template-parts/content', 'none' );

			endif;  ?>
			
			</div>
			
			<?php if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'right'): 
					get_sidebar(); 
				  endif; ?>
		</div>
	</div>	
	
	<?php get_footer(); ?>