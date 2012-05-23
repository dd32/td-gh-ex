<?php
   /**
    * This file contains several functions to create the
    * Settings page of the theme.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   function annarita_options()
   {
      annarita_init_options_values();

      add_theme_page(__('Settings', 'annarita'), __('Settings', 'annarita'), 'manage_options', 'annarita-options', 'annarita_options_page');
      register_setting('annarita_options', 'annarita_options', 'annarita_validate_options');

      add_settings_section('general-settings', __('General settings', 'annarita'), 'annarita_general_settings', __FILE__);
      add_settings_field('related_posts', __('Related posts', 'annarita'), 'annarita_related_posts', __FILE__, 'general-settings');
      add_settings_field('sidebars_cookie', __('Sidebars cookie', 'annarita'), 'annarita_sidebars_cookie', __FILE__, 'general-settings');
   }

   function annarita_init_options_values()
   {
      if (get_option('annarita_options') === false)
      {
         add_option(
                 'annarita_options',
                 array(
                     'related_posts' => 'true'
                 )
         );
      }
   }

   function annarita_options_page()
   {
      if (!current_user_can('manage_options'))
         wp_die(__( 'You do not have sufficient permissions to access this page.', 'annarita'));
      ?>
      <div id="icon-themes" class="icon32">
         <br />
      </div>
      <div class="wrap">
         <h2><?php _e('Annarita options', 'annarita'); ?></h2>
         <p>
            <?php _e('Use this page to customize the template based on your preferences.', 'annarita'); ?>
         </p>
         <form name="form-options" method="post" action="options.php">
            <?php
               settings_fields('annarita_options');
               do_settings_sections(__FILE__);

               submit_button();
            ?>
         </form>
      </div>
      <?php
   }

   function annarita_validate_options($annarita_options)
   {
      return $annarita_options;
   }

   function annarita_general_settings()
   {
   }

   function annarita_related_posts()
   {
      $options = get_option('annarita_options');
      ?>
      <label for="related-posts"><?php _e('Display related posts', 'annarita'); ?>: </label>
      <?php
         echo '<input name="annarita_options[related_posts]" type="checkbox" value="true" ';
         if (isset($options['related_posts']) && $options['related_posts'] == 'true')
            echo 'checked="checked"';
         echo ' />';
   }

   function annarita_sidebars_cookie()
   {
      $options = get_option('annarita_options');
      ?>
      <label for="sidebars-cookie"><?php _e('Use cookies to save the preference of the users to show or hide sidebars', 'annarita'); ?>: </label>
      <?php
         echo '<input name="annarita_options[sidebars_cookie]" type="checkbox" value="true" ';
         if (isset($options['sidebars_cookie']) && $options['sidebars_cookie'] == 'true')
            echo 'checked="checked"';
         echo ' />';
   }
?>
