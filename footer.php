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
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
            </div>
        </section>
        <footer id="colophon" class="site-footer">
            <div id="site-info" class="site-info">
                <?php printf(__('%1$s', 'white-spektrum'), 'Theme By: '); ?><a href="<?php echo esc_url('https://lumiathemes.com'); ?>"><?php printf(__('%1$s', 'white-spektrum'), 'Benjamin Lu'); ?></a><br />
                <?php printf(__('%1$s', 'white-spektrum'), 'Powered By: '); ?><a href="<?php echo esc_url('https://wordpress.org'); ?>"><?php printf(__('%1$s', 'white-spektrum'), 'WordPress'); ?></a><br />
            </div>
        </footer>
    </section>
    <?php wp_footer(); ?>
</body>
</html>
        