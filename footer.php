<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">

  <p class="footer-copy" role="contentinfo">
    &copy; <?php _e( 'Copyright', 'adelle-theme' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> <?php echo date( 'Y' ); ?>. <?php _e( 'Powered by', 'adelle-theme' ); ?> <a href="<?php echo esc_url( 'http://www.wordpress.org' ); ?>">WordPress</a>. <a href="<?php echo esc_url( 'http://www.bluchic.com' ); ?>" title="<?php _e( 'Theme designed by BluChic', 'adelle-theme' ); ?>" class="footer-credit"><?php _e( 'Designed by', 'adelle-theme' ); ?> BluChic</a>
  </p>

</footer><!-- .footer -->

</section><!-- .container -->

<?php if( is_active_sidebar( 'footer-widget-instagram' ) ) : ?>
<footer class="footer-instagram" role="complementary">
  <?php dynamic_sidebar( 'footer-widget-instagram' ); ?>
</footer><!-- .footer-instagram -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>