<?php
 /**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package enigma
 */
 
get_header();
$class = '';
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) {  
?>
	<div class="enigma_header_breadcrum_title">	
		<div class="container">
			<div class="row">
			<?php if(have_posts()) :?>
				<div class="col-md-12">
					<h1>
						<?php 
						if ( is_day() ) :
						/* translators: %s: date. */
							printf( esc_html__( 'Daily Archives: %s', 'enigma' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
						/* translators: %s: month. */
							printf( esc_html__( 'Monthly Archives: %s', 'enigma' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'enigma' ) ) . '</span>' );
						elseif ( is_year() ) :
						/* translators: %s: year. */
							printf( esc_html__( 'Yearly Archives: %s', 'enigma' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'enigma' ) ) . '</span>' );
						else :
							esc_html_e( 'Archives', 'enigma' );
						endif; ?>
					</h1>
				</div>
			<?php endif; ?>	
			</div>
		</div>	
	</div>
<?php } else {
	$class = 'no-breadcrumb';
} ?>
<div class="container">	
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
		<div class="col-md-8">
			<?php 
			if ( have_posts()): 
				while ( have_posts() ): the_post();
					get_template_part('post','content'); ?>		
				<?php endwhile; 
			endif; 
			?>
			<div class="text-center wl-theme-pagination">
		        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
		        <div class="clearfix"></div>
		    </div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>	