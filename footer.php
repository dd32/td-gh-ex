<?php
/*
================================================================================================
Barista - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
        </section>
        <footer id="site-footer" class="site-footer">
            <div id="site-info" class="site-info">
                <div class="info-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'barista' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'barista' ), 'WordPress' ); ?></a>
                </div>
        </footer>
    </section>
    <?php wp_footer(); ?>
</body>
</html>