</div><!-- ends main -->
<footer class="site-footer"  role="complementary">
    <section id="colophon">
                <?php
                if (is_active_sidebar('first-footer-widget-area') ||
                    is_active_sidebar('second-footer-widget-area') ||
                    is_active_sidebar('third-footer-widget-area') ||
                    is_active_sidebar('fourth-footer-widget-area')
                   ) {
                ?>
                    <?php get_sidebar('footer'); ?>
                    <?php 
                     } 
                     ?>
    </section><!-- ends colophon# -->
        <section class="site-info" role="contentinfo">
            <div id="credit">
	        <p>&copy; <?php echo date("Y"); echo esc_attr( " " ); echo esc_attr( bloginfo('name') ); ?></p>
                <div class="site-info-right"><a href="#"><?php _e( ' -Top- ', 'betilu' ); ?></a></div>
            </div>
        </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>

