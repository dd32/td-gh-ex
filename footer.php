<?php
/**
 * The template for displaying the footer
 *
 * - Includes navigation menu and copyright.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */
?>

<footer>
  <div class="container">
    <nav class="clearfix">
      <ul>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-1</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-2</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-3</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-4</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-5</a></li>
      </ul>
      <ul>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-6</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-7</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-8</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-9</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-10</a></li>
      </ul>
      <ul>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-11</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-12</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-13</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-14</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">footer-menu-15</a></li>
      </ul>
    </nav>
  </div><!-- .container -->
  <div id="copyright">
    <small>Copyright &copy; <?php bloginfo('name');?> All rights reserved.</small>
  </div>
</footer>

<?php wp_footer();?>

</body>
</html>