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
  <div id="copyright">
    <small><?php printf(__( 'Copyright &copy; %s All Rights Reserved.', 'base-for-original' ), get_bloginfo('name') ); ?></small>
  </div>
</footer>

<?php wp_footer();?>

</body>
</html>