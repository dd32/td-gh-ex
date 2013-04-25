<footer class="footer">

  <p class="footer-copy" role="contentinfo">
    <?php if( get_option('adelle_theme_footer_credit') == true ) { echo stripslashes( get_option('adelle_theme_footer_credit') ); } else { ?>&copy; <?php _e('Copyright','adelle-theme'); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a> <?php echo date('Y'); ?>. <?php _e('Powered by','adelle-theme'); ?> <a href="<?php echo esc_url('http://www.wordpress.org'); ?>">WordPress</a>. <a href="<?php echo esc_url('http://www.bluchic.com'); ?>" title="<?php _e('Adelle theme designed by BluChic','adelle-theme'); ?>" class="footer-credit"><?php _e('Designed by','adelle-theme'); ?> BluChic</a><?php } ?>
  </p>

</footer><!-- .footer -->

</section><!-- .container -->

<!-- Javascript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Javascript -->

<?php echo adelle_theme_footer_scripts(); ?>

<?php wp_footer(); ?>

</body>
</html>