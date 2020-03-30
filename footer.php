<?php
/**
 * The template for displaying the footer
 *
 * @package Fmi
 */
?>

<footer id="colophon" class="site-footer">
  <div class="vs-container">
		<div class="site-info clearfix">            
      <?php
      $show_social = get_theme_mod('footer_show_social', 0);
      $show_menu = get_theme_mod('footer_show_menu', 0);

      if (($show_social && !$social_url_empty) || ($show_menu && has_nav_menu('footer'))){
        echo '<div class="site-info-nav hidden-sm hidden-xs">';

        vs_social_links();

        if ($show_menu && has_nav_menu('footer')) {
          echo '<div class="site-info-menu">';
          wp_nav_menu(array(
            'theme_location' => 'footer',
            'container' => 'nav',
            'menu_class' => 'footer-menu list-unstyled clearfix'
          ));
          echo '</div>';
        }
        echo '</div>';
      }
      ?>

      <div class="site-info-copyright <?php if (($show_social && !$social_url_empty) || ($show_menu && has_nav_menu('footer'))){?>have-site-info-nav<?php }?>">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fmi' ) ); ?>"><?php
				printf( esc_html__( 'Proudly powered by %s', 'fmi' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'fmi' ), 'Fmi', '<a href="https://forrss.com/">Forrss</a>' );
			?>
      </div>  
		</div>
  </div>
</footer>

<?php do_action( 'vs_footer_after' ); ?>

</div>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
