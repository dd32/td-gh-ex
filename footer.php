<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
</div><!-- .site-mask -->
<footer id="footer" class="footer-wrap">

      <?php
      get_template_part( 'template-parts/footer/footer', 'widgets' );

      get_template_part( 'template-parts/footer/site', 'info' );

      ?>
      <a href="#0"  class="scroll_to_top cd-top floating-action button secondary" data-smooth-scroll>
      <i class="fa fa-angle-up "></i>
      </a>
  </footer>


</div><!-- #site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
