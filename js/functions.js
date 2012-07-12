/**
 * @author Aurelio De Rosa <aurelioderosa@gmail.com>
 * @version 1.0.5
 * @link http://wordpress.org/extend/themes/annarita
 * @package AurelioDeRosa
 * @subpackage Annarita
 * @since Annarita 1.0
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
 */

function createStickyLabel()
{
   return jQuery('<div>')
          .addClass('sticky-label')
          .append(
               jQuery('<span>')
               .addClass('sticky-text')
               .text(objectL10n.sticky)
          );
}

function initCookie()
{
   var value;

   value = jQuery.cookie('left-sidebar');
   if (value == null)
   {
      jQuery.cookie('left-sidebar', 'show', {path: '/'});
      value = 'show';
   }

   if ((value == 'show') == (jQuery('#left-sidebar').css('display') == 'none'))
      toggleSidebar('left-sidebar');
   if ((value == 'show') == (jQuery('#hide-left').text() == '»'))
      toggleHiderLabel('hide-left');

   value = jQuery.cookie('right-sidebar');
   if (value == null)
   {
      jQuery.cookie('right-sidebar', 'show', {path: '/'});
      value = 'show';
   }

   if ((value == 'show') == (jQuery('#right-sidebar').css('display') == 'none'))
      toggleSidebar('right-sidebar');
   if ((value == 'show') == (jQuery('#hide-right').text() == '«'))
      toggleHiderLabel('hide-right');
}

function initContentWidth()
{
   if (jQuery('#left-sidebar').size() == 0)
   {
      jQuery('body')
      .append(jQuery('<aside></aside>')
      .attr('id', 'left-sidebar')
      .addClass('sidebar'));
      toggleSidebar('left-sidebar');
   }

   if (jQuery('#right-sidebar').size() == 0)
   {
      jQuery('body')
      .append(jQuery('<aside></aside>')
      .attr('id', 'right-sidebar')
      .addClass('sidebar'));
      toggleSidebar('right-sidebar');
   }
}

function toggleSidebar(id)
{
   var sidebarWidth = jQuery('#' + id).outerWidth(true);
   if (jQuery('#' + id).css('display') == 'none')
      jQuery('#content').css('width', '-=' + sidebarWidth + 'px');
   else
      jQuery('#content').css('width', '+=' + sidebarWidth + 'px');
   jQuery('#' + id).toggle();
}

function toggleHiderLabel(id)
{
   if (jQuery('#' + id).text() == '«')
      jQuery('#' + id).html('&raquo;');
   else
      jQuery('#' + id).html('&laquo;');
}

function toggleCookie(key)
{
   if(jQuery.cookie(key) == 'hide')
      jQuery.cookie(key, 'show', {path: '/'});
   else
      jQuery.cookie(key, 'hide', {path: '/'});
}

function setRateWidth()
{
   jQuery('.current-rating').each(
      function()
      {
         // The width has to be set in this way:
         // max_width * current_rate / max_rate
         var parent = jQuery(this).parent();
         jQuery(this).width(
            Math.round(parent.width() *
            jQuery.trim(jQuery(this).text()) /
            jQuery.trim(parent.children().last().text()))
         );
      }
   );
}