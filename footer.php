<?php
/*
================================================================================================
Beyond Expectations - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
?>
        </div>
    </div>
    <div id="main-footer" class="site-footer cf">
        <div class="site-info">
            <?php printf(esc_html__('Theme By: %1$s', 'beyond-expectations' ), 'Benjamin Lu'); ?><br />
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beyond-expectations' ) ); ?>"><?php printf( esc_html__( 'Proudly Powered By: %s', 'beyond-expectations' ), 'WordPress' ); ?></a>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>

