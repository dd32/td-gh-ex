<?php
/*
============================================================================================================================
Silver Quantum - /framework/general/footer.php
============================================================================================================================
This framework.php template file allows you to add features and functionality has been preset to be used in this WordPress theme which is store
in the theme's framework directory.

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Display (Custom Footer)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Display (Custom Footer)
============================================================================================================================
*/
function silver_quantum_display_site_footer() {
    do_action('silver_quantum_display_site_footer');
}
function silver_quantum_output_site_footer() { ?>
    <div id="footer" class="site-footer">
        <div class="site-info">
            <?php printf(esc_html__('Copyright &#169; %1$s. %2$s', 'silver-quantum'), date_i18n('Y'), silver_quantum_output_site_link()); ?><br />
            <?php printf(esc_html__('Powered By %1$s and %2$s', 'silver-quantum'), silver_quantum_output_wp_link(), silver_quantum_output_theme_link()); ?>
        </div>
    </div>
<?php }
add_action('silver_quantum_display_site_footer', 'silver_quantum_output_site_footer');