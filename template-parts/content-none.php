<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package astrology
 */
?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php _e( 'Nothing Found', 'astrology' ); ?></h2>
	</div>	
</section>
<section id="blog-innerpage-content">
<div class="container">
	<div class="row">            
   		<div class="col-xs-12 col-sm-12 col-md-9 pull-right">
        	<div class="blog-single-inner-page">
        		<div class="bloginner-content-part">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<h4><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'astrology' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h4>

					<?php elseif ( is_search() ) : ?>

					<h4><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'astrology' ); ?></h4>
					<div class="astrology-search-form">
						<?php get_search_form(); ?>
					</div>
					<?php else : ?>

					<h4><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'astrology' ); ?></h4>
					<?php get_search_form(); ?>
					<?php endif; ?>
				</div>
        	</div>
        </div>
        	<?php get_sidebar(); ?>
    </div>
</div>
</section>