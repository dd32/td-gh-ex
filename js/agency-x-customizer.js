/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="agency-x-ads"> <a href="https://justwpthemes.com/downloads/agency-x-plus/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',agency_x_customizer_js_obj.pro));
});