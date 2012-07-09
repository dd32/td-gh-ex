<?php
   /**
    * The template for displaying the additional sidebar (the right one).
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.4
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   if (function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-right'))
   {
      ?>
      <div id="right-sidebar-wrapper" class="alignright">
         <aside id="right-sidebar" class="sidebar" role="complementary">
            <?php dynamic_sidebar('sidebar-right'); ?>
         </aside>
         <a id="hide-right" href="javascript:void();" title="<?php _e('Hide/Show sidebar', 'annarita') ;?>" class="hide-sidebar">&raquo;</a>
      </div>
      <?php
   }
?>