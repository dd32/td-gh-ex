/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="acme-ads"> <a href="http://www.acmethemes.com/themes/acmeblogpro" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',acmeblog_customizer_js_obj.pro));
});