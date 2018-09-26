<?php 
/*
============================================================================================================================
White Spektrum - footer.php
============================================================================================================================
The footer.php template file only displays the footer section such as copyright, links and secondary navigation and social.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
        </div>
        <div id="secondary" class="secondary-navigation">

        </div>
        <?php Benlumia007\Backdrop\Menu\display_social(); ?>
        <div id="footer" class="site-footer">
            <div class="site-info">
                <?php printf(esc_html__('Copyright &#169; %1$s. %2$s', 'white-spektrum'), date_i18n('Y'), Benlumia007\Backdrop\Site\output_site_link()); ?><br />
                <?php printf(esc_html__('Powered By %1$s and %2$s', 'white-spektrum'), Benlumia007\Backdrop\Site\output_wp_link(), Benlumia007\Backdrop\Site\output_theme_link()); ?>
            </div>
        </div>
    </section>
<?php wp_footer(); ?>
</body>
</html>