<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Charity
 */

?>
<footer>
  <div class="container">
    <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
          <?php dynamic_sidebar( 'footer-1' );?>
        <?php } ?>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <span><?php esc_html_e('&copy; All Right Reserved ','best-charity');  echo  esc_html(date('Y'));?></span>
      <span><?php bloginfo( 'title' );?> <?php esc_html_e('Design by','best-charity'); ?> <a href="" ><?php esc_html_e('HTML5WP','best-charity'); ?> </a></span>
    </div>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
