<?php
/**
 * Template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Aplos
 * @since Aplos 1.2.0
 */
?>

</div><!-- #main .site-main -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
	<?php do_action('aplos_credits'); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e('A Semantic Personal Publishing Platform', 'aplos'); ?>" rel="generator"><?php printf(__('Proudly powered by %s', 'aplos'), 'WordPress'); ?></a>
        <span class="sep"> | </span>
        <?php printf(__('Theme: %1$s by %2$s.', 'aplos'), 'Aplos', '<a href="http://andynoelker.com/" rel="designer">Andy Noelker</a>'); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>

