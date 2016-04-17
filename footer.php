<?php
/*
================================================================================================
White Spektrum - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
================================================================================================
*/
?>
        </div>
    </section>
    <footer id="main-footer" class="site-footer">
        <div class="site-info">
            <?php printf(esc_html__('Theme by %1$s', 'white-spektrum'), 'Benjamin Lu'); ?><br />
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'white-spektrum' ) ); ?>"><?php printf( esc_html__( 'Proudly Powered by %s', 'white-spektrum' ), 'WordPress' ); ?></a>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>