<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Athenea
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
 <div class="container">
    <div class="site-info">
     <div class="row">
      <div class="col-xs-8">
        <?php do_action( 'athenea_credits' ); ?>
        Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?><br>
        <?php printf( __( 'Proudly powered by %s', 'athenea' ), '<a href="http://www.wordpress.org/" title="WordPress"><div alt="f205" class="genericon genericon-wordpress"></div> WordPress</a>' ); ?>
        <span class="sep"> | </span>
        <a href="<?php echo esc_url( __( 'http://www.ibermega.com/themes/', 'athenea' ) ); ?>" rel="designer"><?php _e('Theme Athenea designed by','athenea'); ?> <?php _e('IBERMEGA themes','athenea'); ?></a>
      </div>
      <div class="col-xs-4">
      <a href="#toop" class="scroller pull-right" data-section="#page" title="<?php _e( 'Top', 'athenea' ); ?>"><span class="genericon-collapse"></span></a>
      </div>
      </div>
     </div><!-- #row -->
    </div><!-- .site-info -->
 </div><!--/container-->
</footer><!-- #colophon -->
    
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>