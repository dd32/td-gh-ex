<div class="container">
	<footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            
            <small class="d-block mb-3 text-muted"> 
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'apelle-uno' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: WordPress. */
				printf( esc_html( 'Proudly powered by %s.'), __('WordPress', 'apelle-uno' ) );
				?>
			</a>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?></small>
            <?php the_tags();?>
          </div>
          <div id="container-apelleuno-footer-1" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-1' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-1' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
          <div id="container-apelleuno-footer-2" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-2' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-2' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
          <div id="container-apelleuno-footer-3" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-3' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-3' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
        </div>
      </footer>
      </div>
  <?php 

    wp_footer();
?>
</body>
</html>