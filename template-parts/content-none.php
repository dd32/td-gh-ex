<div class="blog-content" id="blog-content">
 <?php if (is_home() && current_user_can('publish_posts')) : ?>
 <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'abaya' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
 <?php elseif ( is_search() ) : ?>
 <h4><?php printf(__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'abaya')); ?></h4>
 <?php get_search_form(); ?>
 <?php else : ?>
 <h4><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'abaya'); ?></h4>
 <?php get_search_form(); ?>
 <?php endif; ?> 
</div><!--main-->
