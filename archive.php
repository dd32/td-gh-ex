<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php

	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'sutra' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'sutra' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'sutra' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'sutra' ); ?>
<?php endif; ?>
			</h1>

<?php
	rewind_posts();
	get_template_part( 'loop', 'archive' );
?>
				
				<div id="pagination">
				<?php 
				global $wp_query, $wp_rewrite;
				$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
				
				$pagination = array(
					'base' => @add_query_arg('page','%#%'),
					'format' => '',
					'total' => $wp_query->max_num_pages,
					'current' => $current,
					'show_all' => true,
					'type' => 'plain'
					);
				
				if( $wp_rewrite->using_permalinks() )
					$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
				
				if( !empty($wp_query->query_vars['s']) )
					$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
				
				echo paginate_links( $pagination );
				?>
				</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>