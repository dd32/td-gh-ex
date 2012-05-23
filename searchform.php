<?php
   /**
    * The form used to search the content of the website.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
?>
<form role="search" name="search" id="search" action="<?php echo home_url(); ?>" method="get">
   <input type="text" name="s" id="search-query" placeholder="<?php echo __('Search', 'annarita') . '...'; ?>" accesskey="s" />
   <input type="submit" value="<?php _e('Search', 'annarita'); ?>" />
</form>