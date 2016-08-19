<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package avata
 */

get_header(); ?>
<section class="page-main" id="content">
  <div class="container">
	<div id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">
            
			<section class="error-404 not-found row">
            <div class="col-main col-md-9">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'avata' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'avata' ); ?></p>

					<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/" role="search">
						<label>
							<span class='screen-reader-text'><?php _e( 'Search', 'avata'); ?></span>
							<input type="search" name="s" />
						</label> 
						<input type="submit" name="submit" value="<?php _e( 'Search', 'avata' ); ?>" class="search-submit" />
					</form>				

	
				</div><!-- .page-content -->
                </div>
                
               <aside id="sidebar" class="col-aside-right col-md-3">
                
                <?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'avata' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>
                    
                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                	<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( avata_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'avata' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>
                </div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</section>
<?php get_footer(); ?>
