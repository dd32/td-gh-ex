<?php
   /**
    * The template for the default sidebar (the left one).
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.2
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   if (function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-left'))
   {
      ?>
      <div id="left-sidebar-wrapper" class="alignleft clear-both">
         <aside id="left-sidebar" class="sidebar" role="complementary">
            <?php dynamic_sidebar('sidebar-left'); ?>
         </aside>
         <a id="hide-left" href="javascript:void();" title="<?php _e('Hide/Show sidebar', 'annarita') ;?>" class="hide-sidebar">&laquo;</a>
      </div>
      <?php
   }
?>