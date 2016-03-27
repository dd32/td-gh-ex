<?php // The template part used when no posts can be found ?>

<section class="no-results">
	
    <header class="page-header">
		<h1 class="page-title entry-title">
			<?php _e( 'Nothing Found', 'satori' ); ?>
        </h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
			<p>
				<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'satori' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
            </p>
		<?php } elseif ( is_search() ) { ?>
			<p>
				<?php echo __( 'Sorry, but nothing matched your search terms', 'satori' ).', "<i>'.get_search_query().'"</i>. '.__( 'Please try using different keywords', 'satori' ).' -'; ?>
            </p>
			<?php get_search_form(); ?>
		<?php } else { ?>
			<p>
				<?php echo __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help', 'satori' ).' -'; ?>
            </p>
			<?php get_search_form(); ?>
		<?php } ?>

	</div>
    
</section>
