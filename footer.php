<?php
/**
 * Barista - Footer Content
 *
 * This file contains the end of </section> and footer content
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
</section>
    <footer class="site-footer">
        <div class="siteinfo">
            <?php _e('Theme By: Benajmin Lu', 'barista'); ?> <br />
        <a href ="<?php echo esc_url(home_url('/')); ?>"><?php _e('Powered By: WordPress', 'barista'); ?></a>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>