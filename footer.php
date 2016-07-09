<?php
/*
================================================================================================
Splendid Portfolio - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
        </div>
    </section>
    <footer id="site-footer" class="site-footer">
        <div id="site-info" class="site-info">
            <div class="info-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'silver-quantum' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'silver-quantum' ), 'WordPress' ); ?></a>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>