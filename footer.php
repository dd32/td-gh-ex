<?php
/*
================================================================================================
Silver Quantum - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
        </section>
    </section>
    <footer id="site-footer" class="site-footer">
        <div class="site-info">
            <span class="site-description"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></span><br />
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'silver-quantum')); ?>"><?php printf(__('Proudly Powered By %s', 'silver-quantum'), 'WordPress'); ?></a>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>