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
        &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?><br>
        <a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'athenea' ), 'WordPress' ); ?> <div alt="f205" class="genericon genericon-wordpress"></div></a>
        <span class="sep"> | </span>
        <?php printf( __( 'Theme: %1$s by %2$s.', 'athenea' ), 'Athenea', '<a href="http://www.ibermega.com/" rel="designer">IBERMEGA digital</a>' ); ?>
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