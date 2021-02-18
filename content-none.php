<section class = "<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
	<h3 class="entry-title">
		<?php 
			if ( is_404() ) { _e( 'Page not available', 'siverquantum' ); }
			else if ( is_search() ) { printf( __( 'Nothing found for: <small>', 'siverquantum') . get_search_query() . '</small>' ); }
			else { _e( 'Nothing Found', 'siverquantum' );}
		?>
	</h3>
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'siverquantum' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
					
			<?php elseif ( is_404() ) : ?>
					
					<p><?php _e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'siverquantum' ); ?></p>
					<?php get_search_form(); ?>
					
	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'siverquantum' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php _e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'siverquantum' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</section>
    <?php
    if ( is_404() || is_search() ) {
        
        ?>
    <header class="page-header"><h3 class="page-title"><?php _e( 'Most Recent Posts.', 'siverquantum' ); ?></h3></header>
    <?php

        $args = array(
            'posts_per_page' => 6
        );

        $latest_posts_query = new WP_Query( $args );
		
        if ( $latest_posts_query->have_posts() ) {
                while ( $latest_posts_query->have_posts() ) {

                    $latest_posts_query->the_post();

                    get_template_part( 'content', get_post_format() );

                }
        }
        wp_reset_postdata();

    }
    ?>