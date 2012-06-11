<?php
   /**
    * The template for displaying the footer of the theme.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.1
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
?>
      <br class="clear-both" />
      <footer class="main-footer" role="contentinfo">
         <?php
            if (has_nav_menu('footer-menu'))
            {
               wp_nav_menu(array(
                  'theme_location' => 'footer-menu',
                  'container' => 'nav',
               ));
            }

            if (function_exists('dynamic_sidebar') && is_active_sidebar('footer-space'))
            {
               ?>
               <aside id="footer-space" class="clear-both" role="complementary">
                  <?php dynamic_sidebar('footer-space'); ?>
               </aside>
               <?php
            }
         ?>
         <small id="copyright" class="clear-both alignleft">
            <?php _e('Template', 'annarita'); ?>
            <a href="http://wordpress.org/extend/themes/annarita" title="<?php _e('Template', 'annarita'); ?> Annarita">Annarita</a>
            <img src="<?php echo get_template_directory_uri(); ?>/images/rose.png" alt="rose icon" />
            <?php
               _e('created by', 'annarita');
               $theme_data = get_theme_data(get_theme_root() . '/annarita/style.css');
            ?>
            <a href="<?php echo $theme_data['AuthorURI']; ?>" title="Aurelio De Rosa website">Aurelio De Rosa</a>
         </small>
         <a id="go-to-top" href="#" title="<?php _e('Go to top', 'annarita'); ?>" class="alignright">&#8657; <?php _e('Go to top', 'annarita'); ?></a>
         <br class="clear-both" />
      </footer>
      <?php wp_footer(); ?>
   </body>
</html>