<?php
/**
 * The template for displaying the footer.
 *
 * @package BestCorporate
 * @since BestCorporate 1.2
 */
?>
</div>
<!-- #main -->

<footer id="colophon" role="contentinfo">
  <div id="gotop"><a href="#branding">TOP OF PAGE</a></div>
  <div id="site-generator">
    <?php do_action( 'best_corporate_credits' ); ?>
    <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'best_corporate' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'best_corporate' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'best_corporate' ), 'WordPress' ); ?></a><span class="sep"> | </span> <?php printf( __( 'Theme: %1$s', 'best_corporate' ), 'Best Corporate WordPress Theme' ); ?></div>
</footer>
<!-- #colophon -->
</div>
<!-- #page -->
<?php wp_footer(); ?>
</body></html>