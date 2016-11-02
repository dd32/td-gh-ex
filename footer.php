	<div class="clearboth"></div>
</div><!-- #content -->

<?php if ( get_theme_mod( 'conica-footer-layout' ) == 'conica-footer-layout-social' ) : ?>

    <?php get_template_part( '/templates/footer/footer-social' ); ?>
    
<?php elseif ( get_theme_mod( 'conica-footer-layout' ) == 'conica-footer-layout-none' ) : ?>

    <?php get_template_part( '/templates/footer/footer-none' ); ?>
    
<?php else : ?>
	
	<?php get_template_part( '/templates/footer/footer-standard' ); ?>
    
<?php endif; ?>

<?php echo ( get_theme_mod( 'conica-site-layout' ) == 'conica-site-boxed' ) ? '</div>' : ''; ?>
	
	<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div> <!-- Scroll To Top Button -->
</div> <!-- #page -->

<?php wp_footer(); ?>
</body>
</html>