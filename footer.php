<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base WP
 */

?>

<?php igthemes_after_site_content(); ?>

</div><!-- .row -->
    </div><!-- #content -->

<?php igthemes_before_footer(); ?>

    <footer id="colophon" class="site-footer" role="contentinfo">
          <div class="site-info grid-1200">
            <div class="row">
            <?php get_template_part('core-framework/partials/sidebar-footer') ?>
            <?php get_template_part('core-framework/partials/social') ?>
            </div><!-- .row -->
        </div><!-- .site-info -->
            <?php igthemes_footer(); ?>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
