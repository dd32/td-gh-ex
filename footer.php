<?php
/*
================================================================================================
Splendid Portfolio - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
        </section>
        <footer id="site-footer" class="site-footer">
            <div id="site-info" class="site-info">
                <span class="footer-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></span>
                <?php printf(__('%s', 'white-spektrum'), 'Powered By: '); ?><a href="<?php echo esc_url('https://wordpress.org'); ?>"><?php printf(__('%s', 'white-spektrum'), 'WordPress'); ?></a>
            </div>
        </footer>
    </section>
    <?php wp_footer(); ?>
</body>
</html>