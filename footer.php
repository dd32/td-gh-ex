<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bellini
 */
?>
</div><!-- #content -->
<?php if ( is_active_sidebar( 'sidebar-footer' ) ):?>
    <div id="secondary" class="widget-area__footer container-fluid" role="complementary">
    <div class="container">
    <div class="row">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div>
    </div>
    </div><!-- #secondary -->
<?php endif;?>

<footer id="colophon" class="site-footer container-fluid" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
<div class="row">
	<div class="col-md-12 site-info">
        <?php if(get_theme_mod('bellini_copyright_text', '') !== '') : ?>
            <?php echo do_shortcode(get_theme_mod( 'bellini_copyright_text')); ?>
        <?php else: ?>
    		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bellini' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bellini' ), 'WordPress' ); ?></a>
    		<span class="sep"> | </span>
    		<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bellini' ), 'bellini', '<a href="http://pangolinthemes.com/" rel="author">Pangolin</a>' ); ?>
	<?php endif; ?>
    </div><!-- .site-info -->
</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>