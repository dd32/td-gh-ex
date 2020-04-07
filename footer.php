<?php
/**
 * The template for displaying the footer
 *
 * @package Fmi
 */

?>
<footer id="colophon" class="site-footer">
  <div class="vs-container">
    <div class="site-info <?php echo vs_site_info_center(); ?>">
      <div class="site-info-inner">
        <?php
        $footer_text_display = get_theme_mod( 'footer_text_display', 0 );
        if ( $footer_text_display ) {
        ?>
        <div class="footer-text">
          <?php echo do_shortcode( get_theme_mod( 'footer_text' ) ); ?>
        </div>
        <?php
        }
        ?>

        <div class="footer-copyright">
          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fmi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'fmi' ), 'WordPress' ); ?></a><span class="sep"> | </span><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fmi' ), 'Fmi', '<a href="https://forrss.com/">Forrss</a>' ); ?>
        </div>
      </div>
      <div class="site-info-inner">
        <?php
        $footer_menu_display = get_theme_mod( 'footer_menu_display', 0 );
        if ( $footer_menu_display ) {
        ?>
        <div class="footer-menu">
          <?php
          if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
              'theme_location'   => 'footer',
              'menu_class'       => 'navbar-nav',
              'depth'            => 1,
            ) ); 
          }
          ?>
        </div>
        <?php
        }
        ?>

        <?php
        $footer_social_display = get_theme_mod( 'footer_social_display', 0 );
        if ( $footer_social_display ) {
        ?>
        <div class="footer-social">
          <?php
          vs_social_links();
          ?>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</footer>

</div>
</div>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
